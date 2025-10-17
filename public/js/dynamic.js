let continent_names_json = {};

function GetLanguageJsonn(lang) {

  switch (lang) {
    case 'en_US':
      continent_names_json = getEnglishJsonn();
      break;
    case 'es_MX':
      continent_names_json = getSpanishJsonn();
    break;
    default:
      continent_names_json = getEnglishJsonn();
  }

  return continent_names_json;
}

function getEnglishJsonn() {
    return {
                'america': 'LATIN AMERICA',
                'america_id': '1',
                'asia_africa': 'ASIA-AFRICA',
                'asia_africa_id': '3',
                'europa': 'EUROPE',
                'europa_id': '2',
                'global': 'GLOBAL'
            }
}

function getSpanishJsonn() {
    return {
                'america': 'AMÉRICA LATINA',
                'america_id': '1',
                'asia_africa': 'ASIA-AFRICA',
                'asia_africa_id': '3',
                'europa': 'EUROPA',
                'europa_id': '2',
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

    continent_names_json = GetLanguageJsonn(lang);

    const continent_label = document.getElementById('tool_continent');
    // continent_label.innerHTML = continent_names_json.america;
  
    $('#switch_continent_america').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_names_json.america;
        window.location.href = _get_change_continent(1);
    });

    $('#switch_continent_asia_africa').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_names_json.asia_africa;
        window.location.href = _get_change_continent2(3);
    });

    $('#switch_continent_europe').on('click', evt => {
        evt.preventDefault();
        continent_label.innerHTML = continent_names_json.europa;
        window.location.href = _get_change_continent2(2);
    });

    $('.lang-select').off('change').on('change', function (evt) {
        window.location.replace(this.value);
    });

    $('#country-select').off('change').on('change', function (evt) {
        window.location.replace(_getCountryUrl(this.value));
    });

    $('.country-compare').off('change').on('change', function (evt) {
        const countryId = $('#country-select')[0].value
        window.location.replace(_getCountryUrl(countryId, this.value));
    });

    $('.nav-tabs > li > span.nav-link-3').on('click', function (evt) {
       _current_tab = this.id.split('-')[1];
       $('.lang-select option').each(function (i, el) {
           let new_url = this.value.split('/');
           new_url[5] = _current_tab;
           this.value = (new_url.join('/'));
       });
       

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

    $('.download-profile').off().on('click', function (evt) {
        window.open(_getProfilePDFUrl(), '_blank');
    })

    $('.download-profile-europe').off().on('click', function (evt) {
        window.open(_getProfileEuropePDFUrl(), '_blank');
    })

    $('.download-profile-asia-africa').off().on('click', function (evt) {
        window.open(_getProfileAsiaAfricaPDFUrl(), '_blank');
    })
})
