var current_action = 'go';
let continent_json = {};

function GetLanguageJson(lang) {

  switch (lang) {
    case 'en_US':
      continent_json = getEnglishJson();
      break;
    case 'es_MX':
      continent_json = getSpanishJson();
    break;
    default:
      continent_json = getEnglishJson();
  }

  return continent_json;
}

function getEnglishJson() {
    return {
                'america': 'LATIN AMERICA',
                'asia_africa': 'ASIA-AFRICA',
                'europa': 'EUROPE',
                'global': 'GLOBAL'
            }
}

function getSpanishJson() {
    return {
                'america': 'AMÉRICA LATINA',
                'asia_africa': 'ASIA-AFRICA',
                'europa': 'EUROPA',
                'global': 'GLOBAL'
            }
}

$(function () {

    const inputHiddenLanguage = $('#user_locale_hidden').val();
    let lang = "";

    if (inputHiddenLanguage) {
        lang = inputHiddenLanguage;
    }
    else{
        lang = 'en_US';
    }

    continent_json = GetLanguageJson(lang);

    const continent_label = document.getElementById('tool_continent');
    continent_label.innerHTML = continent_json.america;
  
    $('#switch_continent_america').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_json.america;
    });

    $('#switch_continent_asia_africa').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_json.asia_africa;
    });

    $('#switch_continent_europe').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_json.europa;
    });

    $('#switch_continent_global').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_json.global;
    });


    _auth_modal = new bootstrap.Modal(document.querySelector("#exampleModal"))
    _tools_modal = new bootstrap.Modal(document.querySelector("#exampleModal2"))
    _reset_pass_modal = new bootstrap.Modal(document.querySelector("#request-reset"))
    _password_form_modal = new bootstrap.Modal(document.querySelector("#reset-password"))

    $('#reports').off().on('click', function (evt) {
        evt.preventDefault();
        if (_is_logged) {
            goToReport();
        } else {
            current_action = 'go';
            _auth_modal.show();
        }
    })

    $('#forgot-your-password-link').off().on('click', function (evt) {
        evt.preventDefault();
        _auth_modal.hide();
        _reset_pass_modal.show();
    });

    $('#tools, #tools-secondary').off().on('click', function (evt) {
        evt.preventDefault();
        if (_is_logged)
            window.location.href = _url_tools;
        else {
            current_action = 'tools';
            _auth_modal.show();
        }
    })

    $('#download-report').off().on('click', function (evt) {
        evt.preventDefault();
        if (_is_logged) {
            downloadReport();
        } else {
            current_action = 'download';
            _auth_modal.show();
        }
    })

    $('#registry-form').off().on('submit', function(evt) {
        evt.preventDefault();
        $.post({
            "url": _url_post_register,
            "headers": {
                'X-CSRF-TOKEN': _csrf_token
            },
            "data": $(this).serialize() + '&json=1',
            "success": function(response) {
                _is_logged = true;
                _csrf_token = 'token' in response ? response.token : __csrf_token;
                _auth_modal.hide();
                $('.logout-container').removeClass('hidden')
                if (current_action == 'go') {
                    goToReport();
                } else if(current_action == 'tools') {
                    window.location.href = _url_tools;
                } else {
                    downloadReport();
                }
            },
            "error": function(response) {
                // mark errors
                const result = response.responseJSON;
                let errors = '';
                if ('errors' in result) {
                    for(const selector in result.errors) {
                        errors += result.errors[selector] + '<br>'
                    }
                } else {
                    errors = 'Error desconocido';
                }
                $('.sign-up-errors').html(errors).parent().removeClass('d-none');
            }
        })
    });

    $('#login-form').off().on('submit', login);

    $('#reset-request-form').off().on('submit', requestToken);

    $('#reset-token-form').off().on('submit', requestReset);

    $('input').off('change').on('change', () => $('.login-errors, .sign-up-errors, .reset-request-errors, .reset-form-errors').parent().addClass('d-none'));

    $('.lang-select').off('change').on('change', function (evt) {
        window.location.replace(this.value);
    });

    $('#logout-button, #logout-button-2').off('click').on('click', function (evt) {
        evt.preventDefault();
        const logout_url = $(this).attr('href');
        if (_is_logged) {
            $.post({
                "url": logout_url,
                "headers": {
                    'X-CSRF-TOKEN': _csrf_token
                },
                "data": 'json=1',
                "success": function () {
                    window.location.href = _url_home;
                },
                "error": function (response) {
                    console.log(response);
                }
            })
        }
    });

    if (_show_reset_form) {
        _password_form_modal.show();
    }
});

var login = (evt) => {
    evt.preventDefault();
    $.post({
        "url": _url_post_login,
        "headers": {
            'X-CSRF-TOKEN': _csrf_token
        },
        "data": $('#login-form').serialize() + '&json=1',
        "success": (response) => {
            if (!('errors' in response && response.errors)) {
                _is_logged = true;
                _csrf_token = 'token' in response ? response.token : _csrf_token;
                _auth_modal.hide();
                $('.logout-container').removeClass('hidden')
                if (current_action == 'go') {
                    goToReport();
                } else if (current_action == 'tools') {
                    window.location.href = _url_tools;
                } else {
                    downloadReport();
                }
            }
        },
        "error": (response) => {
            // mark errors
            const result = response.responseJSON;
            let errors = '';
            if ('errors' in result) {
                for(const selector in result.errors) {
                    errors += result.errors[selector] + '<br>'
                }
            } else {
                errors = 'Error desconocido';
            }
            $('.login-errors').html(errors).parent().removeClass('d-none');
        }
    });
}

var requestToken = (evt) => {
    evt.preventDefault();
    $.post({
        url: _url_post_request_token,
        headers: {
            'X-CSRF-TOKEN': _csrf_token
        },
        data: $('#reset-request-form').serialize() + '&json=1',
        success: (response) => {
            if (!('errors' in response && response.errors)) {
                $('#reset-request-form')[0].reset();
                _csrf_token = 'token' in response ? response.token : _csrf_token;
                $('.reset-request-errors').html(response.message).addClass('success').parent().removeClass('d-none');
            }
        },
        error: (response) => {
            // mark errors
            const result = response.responseJSON;
            let errors = '';
            if ('errors' in result) {
                for(const selector in result.errors) {
                    errors += result.errors[selector] + '<br>'
                }
            } else {
                errors = 'Error desconocido';
            }
            $('.reset-request-errors').html(errors).removeClass('success').parent().removeClass('d-none');
        }
    });
}

var requestReset = (evt) => {
    evt.preventDefault();
    $.post({
        "url": _url_post_reset_pass,
        "headers": {
            'X-CSRF-TOKEN': _csrf_token
        },
        "data": $('#reset-token-form').serialize() + '&json=1',
        "success": (response) => {
            if (!('errors' in response && response.errors)) {
                $('#reset-token-form')[0].reset();
                _csrf_token = 'token' in response ? response.token : _csrf_token;
                $('.reset-form-errors').html(response.message).addClass('success').parent().removeClass('d-none');
            }
        },
        "error": (response) => {
            // mark errors
            const result = response.responseJSON;
            let errors = '';
            if ('errors' in result) {
                for(const selector in result.errors) {
                    errors += result.errors[selector] + '<br>'
                }
            } else {
                errors = 'Error desconocido';
            }
            $('.reset-form-errors').html(errors).removeClass('success').parent().removeClass('d-none');
        }
    });
}

var downloadReport = function() {
    let index = $('#country').val();
    if (index && index.length) {
        window.open(_getPDFUrl(index), '_blank');
    } else {
        window.open(_getPDFUrl(index), '_blank');
    }
}

var goToReport = function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#reports-container").offset().top - 80
    }, 500);
}
