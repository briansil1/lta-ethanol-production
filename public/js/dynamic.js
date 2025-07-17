$(function () {
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
})
