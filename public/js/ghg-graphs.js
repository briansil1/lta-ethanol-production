let allGraphsGHG = [];

function GetLanguageJson(lang) {

  switch (lang) {
    case 'en_US':
      lang_json = getEnglishJson();
      break;
    case 'es_MX':
      lang_json = getSpanishJson();
    break;
    default:
      lang_json = getEnglishJson();
  }

  return lang_json;
}

function getEnglishJson() {
    return {
                'reduction': 'Reduction(%)= ',
                'target_participation': 'Target Participation(%)= '
            }
}

function getSpanishJson() {
    return {
                'reduction': 'Reducción(%)= ',
                'target_participation': 'Participación Objetivo(%)= '
            }
}

$( function() {
    $('#tab-4').on('click', function (evt) {
        if (!('redii' in allGraphsGHG)) {
            $('#v-ghg-redii-tab').click();
        }
    });

    $('#v-ghg-tab > a').each(function(i) {
        $(this).off().on('click', changeGraphTabGhg);
    });

    $('.download-impact').off().on('click', function (evt) {
        window.open(_getImpactFileUrl(), '_blank');
    })

    if (country_id > 0 && _current_tab == '4') {
        $('#v-ghg-redii-tab').click();
    }
})

function changeGraphTabGhg() {
    $('.tab-chartghg-container .tab-content > .tab-pane').removeClass('show active').addClass('hide');
    const parts = this.id.split('-');
    country_id = $('#country-select').val();
    if (parts[2] in allGraphsGHG && allGraphsGHG[parts[2]]) {
        $('#chart-accordion-ghg-' + parts[2]).addClass('show active');
        $('#chart-tab-ghg-' + parts[2]).addClass('show active');
    } else {
        $.get({
            url: _getGhgByCountryURL(country_id),
            success: function (response) {
                if (!response.error) {
                    console.log(response.data);
                    const ghg_redii = response.data['ghg_redii'];
                    const redvsbase_redii = response.data['redvsbase_redii'];
                    const redvstarget_redii = response.data['redvstarget_redii'];
                    $('#chart-accordion-ghg-' + parts[2]).addClass('show active');
                    $('#chart-tab-ghg-' + parts[2]).addClass('show active');
                    const graphDataGhg = {
                        labels: ['E0', 'E10', 'E15', 'E20', 'E25', 'E30'],
                        datasets: [{
                            label: 'RED II',
                            data: [ghg_redii['e0'], ghg_redii['e10'], ghg_redii['e15'], ghg_redii['e20'], ghg_redii['e25'], ghg_redii['e30']],
                            backgroundColor: '#0A5D74',
                            borderColor: '#0A5D74',
                            type: 'bar'
                        }]
                    };

                    const inputHiddenLanguage = $('#user_locale_hidden').val();
                    let lang = "";

                    if (inputHiddenLanguage) {
                        lang = inputHiddenLanguage;
                    }
                    else{
                        lang = 'en_US';
                    }

                    lang_json = GetLanguageJson(lang);

                    let e0_reduction = '<span class="impact-vehicles">' + lang_json.reduction + ('e0' in redvsbase_redii && redvsbase_redii['e0'] ? redvsbase_redii['e0']+'%' : '-') + '</span>'
                    let e10_reduction = '<span class="impact-vehicles">' + ('e10' in redvsbase_redii ? redvsbase_redii['e10']+'%' : '-') + '</span>';
                    let e15_reduction = '<span class="impact-vehicles">' + ('e15' in redvsbase_redii ? redvsbase_redii['e15']+'%' : '-') + '</span>';
                    let e20_reduction = '<span class="impact-vehicles">' + ('e20' in redvsbase_redii ? redvsbase_redii['e20']+'%' : '-') + '</span>';
                    let e25_reduction = '<span class="impact-vehicles">' + ('e25' in redvsbase_redii ? redvsbase_redii['e25']+'%' : '-') + '</span>';
                    let e30_reduction = '<span class="impact-vehicles">' + ('e30' in redvsbase_redii ? redvsbase_redii['e30']+'%' : '-') + '</span>';
                    
                    let e0_target = '<span class="impact-vehicles">' + lang_json.target_participation + ('e0' in redvstarget_redii && redvstarget_redii['e0'] ? redvstarget_redii['e0']+'%' : '-') + '</span>'
                    let e10_target = '<span class="impact-vehicles">' + ('e10' in redvstarget_redii ? redvstarget_redii['e10']+'%' : '-') + '</span>';
                    let e15_target = '<span class="impact-vehicles">' + ('e15' in redvstarget_redii ? redvstarget_redii['e15']+'%' : '-') + '</span>';
                    let e20_target = '<span class="impact-vehicles">' + ('e20' in redvstarget_redii ? redvstarget_redii['e20']+'%' : '-') + '</span>';
                    let e25_target = '<span class="impact-vehicles">' + ('e25' in redvstarget_redii ? redvstarget_redii['e25']+'%' : '-') + '</span>';
                    let e30_target = '<span class="impact-vehicles">' + ('e30' in redvstarget_redii ? redvstarget_redii['e30']+'%' : '-') + '</span>';
                    
                    
                    // if ('compare_emission_ghg' in response.data) {
                        const ghg_greet = response.data['ghg_greet'];
                        // const compare_emission_ghg_redvsbase = response.data['redvsbase_greet'];
                        // const compare_emission_ghg_redvstarget = response.data['redvstarget_greet'];
                        graphDataGhg['datasets'].push({
                            label: 'GREET',
                            data: [ghg_greet['e0'], ghg_greet['e10'], ghg_greet['e15'], ghg_greet['e20'], ghg_greet['e25'], ghg_greet['e30']],
                            backgroundColor: '#742457',
                            borderColor: '#742457',
                            type: 'bar'
                        })
                        // e0_reduction += ' | <span class="impact-vehicles-compare">' + ('e0' in compare_emission_ghg_redvsbase && compare_emission_ghg_redvsbase['e0'] ? compare_emission_ghg_redvsbase['e0']+'%' : ' - ') + '</span>';
                        // e10_reduction += ' | <span class="impact-vehicles-compare">' + ('e10' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e10']+'%' : ' - ') + '</span>';
                        // e15_reduction += ' | <span class="impact-vehicles-compare">' + ('e15' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e15']+'%' : ' - ') + '</span>';
                        // e20_reduction += ' | <span class="impact-vehicles-compare">' + ('e20' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e20']+'%' : ' - ') + '</span>';
                        // e25_reduction += ' | <span class="impact-vehicles-compare">' + ('e25' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e25']+'%' : ' - ') + '</span>';
                        // e30_reduction += ' | <span class="impact-vehicles-compare">' + ('e30' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e30']+'%' : ' - ') + '</span>';

                        // e0_target += ' | <span class="impact-vehicles-compare">' + ('e0' in compare_emission_ghg_redvstarget && compare_emission_ghg_redvstarget['e0'] ? compare_emission_ghg_redvstarget['e0']+'%' : ' - ') + '</span>';
                        // e10_target += ' | <span class="impact-vehicles-compare">' + ('e10' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e10']+'%' : ' - ') + '</span>';
                        // e15_target += ' | <span class="impact-vehicles-compare">' + ('e15' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e15']+'%' : ' - ') + '</span>';
                        // e20_target += ' | <span class="impact-vehicles-compare">' + ('e20' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e20']+'%' : ' - ') + '</span>';
                        // e25_target += ' | <span class="impact-vehicles-compare">' + ('e25' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e25']+'%' : ' - ') + '</span>';
                        // e30_target += ' | <span class="impact-vehicles-compare">' + ('e30' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e30']+'%' : ' - ') + '</span>';
                    // }
                    $('.tab-' + parts[2] + ' .vehicles-stop .e0').html(e0_reduction);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e10').html(e10_reduction);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e15').html(e15_reduction);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e20').html(e20_reduction);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e25').html(e25_reduction);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e30').html(e30_reduction);
                    
                    $('.tab-' + parts[2] + ' .target .e0').html(e0_target);
                    $('.tab-' + parts[2] + ' .target .e10').html(e10_target);
                    $('.tab-' + parts[2] + ' .target .e15').html(e15_target);
                    $('.tab-' + parts[2] + ' .target .e20').html(e20_target);
                    $('.tab-' + parts[2] + ' .target .e25').html(e25_target);
                    $('.tab-' + parts[2] + ' .target .e30').html(e30_target);
                    allGraphsGHG[parts[2]] = drawGraphghg('chart-tab-' + parts[2], graphDataGhg, _emission_titles[parts[2]]);
                    drawGraphghg('chart-accordion-' + parts[2], graphDataGhg, _emission_titles[parts[2]]);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
}

function drawGraphghg(id, data, title) {
    var ctx = document.getElementById(id);
    return new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: !!title,
                    text: title
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}