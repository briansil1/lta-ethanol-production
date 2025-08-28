let allGraphsGHG = [];

$( function() {
    $('#tab-4').on('click', function (evt) {
        if (!('redii' in allGraphsGHG)) {
            $('#v-ghg-redii-tab').click();
        }
    });

    $('#v-ghg-tab > a').each(function(i) {
        $(this).off().on('click', changeGraphTabGhg);
    });

    $('#chart-tab-country-compare-ghg').off().on('change', function (evt) {
        evt.preventDefault();
        country_impact_ghg_compare_id = $('#chart-tab-country-compare-ghg').val();
        country_compare_ghg_name = $( "#chart-tab-country-compare-ghg option:selected" ).text();
        if (country_impact_ghg_compare_id > 0){
            window.location.replace(_getCountryUrl(country_id, country_impact_ghg_compare_id));
        }
    });

    $('#chart-accordion-ghg-country-compare-impact').off().on('change', function (evt) {
        evt.preventDefault();
        country_impact_ghg_compare_id = $('#chart-accordion-ghg-country-compare-impact').val();
        country_compare_ghg_name = $( "#chart-accordion-ghg-country-compare-impact option:selected" ).text();
        if (country_impact_ghg_compare_id > 0){
            window.location.replace(_getCountryUrl(country_id, country_impact_ghg_compare_id));
        }
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
            url: _getGhgByCountryURL(country_id, parts[2], country_impact_ghg_compare_id > 0 ? country_impact_ghg_compare_id : null),
            success: function (response) {
                if (!response.error) {
                    console.log(response.data);
                    const ghg_emission = response.data['ghg_emission'];
                    const redvsbase_emission = response.data['redvsbase_emission'];
                    const redvstarget_emission = response.data['redvstarget_emission'];
                    $('#chart-accordion-ghg-' + parts[2]).addClass('show active');
                    $('#chart-tab-ghg-' + parts[2]).addClass('show active');
                    const graphDataGhg = {
                        labels: ['E0', 'E10', 'E15', 'E20', 'E25', 'E30'],
                        datasets: [{
                            label: country_name,
                            data: [ghg_emission['e0'], ghg_emission['e10'], ghg_emission['e15'], ghg_emission['e20'], ghg_emission['e25'], ghg_emission['e30']],
                            backgroundColor: '#0A5D74',
                            borderColor: '#0A5D74',
                            type: 'bar'
                        }]
                    };
                    let e0_reduction = '<span class="impact-vehicles">' + 'Reduction(%)= ' + ('e0' in redvsbase_emission && redvsbase_emission['e0'] ? redvsbase_emission['e0']+'%' : '-') + '</span>'
                    let e10_reduction = '<span class="impact-vehicles">' + ('e10' in redvsbase_emission ? redvsbase_emission['e10']+'%' : '-') + '</span>';
                    let e15_reduction = '<span class="impact-vehicles">' + ('e15' in redvsbase_emission ? redvsbase_emission['e15']+'%' : '-') + '</span>';
                    let e20_reduction = '<span class="impact-vehicles">' + ('e20' in redvsbase_emission ? redvsbase_emission['e20']+'%' : '-') + '</span>';
                    let e25_reduction = '<span class="impact-vehicles">' + ('e25' in redvsbase_emission ? redvsbase_emission['e25']+'%' : '-') + '</span>';
                    let e30_reduction = '<span class="impact-vehicles">' + ('e30' in redvsbase_emission ? redvsbase_emission['e30']+'%' : '-') + '</span>';
                    
                    let e0_target = '<span class="impact-vehicles">' + 'Target Participation(%)= ' + ('e0' in redvstarget_emission && redvstarget_emission['e0'] ? redvstarget_emission['e0']+'%' : '-') + '</span>'
                    let e10_target = '<span class="impact-vehicles">' + ('e10' in redvstarget_emission ? redvstarget_emission['e10']+'%' : '-') + '</span>';
                    let e15_target = '<span class="impact-vehicles">' + ('e15' in redvstarget_emission ? redvstarget_emission['e15']+'%' : '-') + '</span>';
                    let e20_target = '<span class="impact-vehicles">' + ('e20' in redvstarget_emission ? redvstarget_emission['e20']+'%' : '-') + '</span>';
                    let e25_target = '<span class="impact-vehicles">' + ('e25' in redvstarget_emission ? redvstarget_emission['e25']+'%' : '-') + '</span>';
                    let e30_target = '<span class="impact-vehicles">' + ('e30' in redvstarget_emission ? redvstarget_emission['e30']+'%' : '-') + '</span>';
                    
                    
                    if ('compare_emission_ghg' in response.data) {
                        const compare_emission_ghg = response.data['compare_emission_ghg'];
                        const compare_emission_ghg_redvsbase = response.data['compare_emission_ghg_redvsbase'];
                        const compare_emission_ghg_redvstarget = response.data['compare_emission_ghg_redvstarget'];
                        graphDataGhg['datasets'].push({
                            label: country_compare_name,
                            data: [compare_emission_ghg['e0'], compare_emission_ghg['e10'], compare_emission_ghg['e15'], compare_emission_ghg['e20'], compare_emission_ghg['e25'], compare_emission_ghg['e30']],
                            backgroundColor: '#742457',
                            borderColor: '#742457',
                            type: 'bar'
                        })
                        e0_reduction += ' | <span class="impact-vehicles-compare">' + ('e0' in compare_emission_ghg_redvsbase && compare_emission_ghg_redvsbase['e0'] ? compare_emission_ghg_redvsbase['e0']+'%' : ' - ') + '</span>';
                        e10_reduction += ' | <span class="impact-vehicles-compare">' + ('e10' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e10']+'%' : ' - ') + '</span>';
                        e15_reduction += ' | <span class="impact-vehicles-compare">' + ('e15' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e15']+'%' : ' - ') + '</span>';
                        e20_reduction += ' | <span class="impact-vehicles-compare">' + ('e20' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e20']+'%' : ' - ') + '</span>';
                        e25_reduction += ' | <span class="impact-vehicles-compare">' + ('e25' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e25']+'%' : ' - ') + '</span>';
                        e30_reduction += ' | <span class="impact-vehicles-compare">' + ('e30' in compare_emission_ghg_redvsbase ? compare_emission_ghg_redvsbase['e30']+'%' : ' - ') + '</span>';

                        e0_target += ' | <span class="impact-vehicles-compare">' + ('e0' in compare_emission_ghg_redvstarget && compare_emission_ghg_redvstarget['e0'] ? compare_emission_ghg_redvstarget['e0']+'%' : ' - ') + '</span>';
                        e10_target += ' | <span class="impact-vehicles-compare">' + ('e10' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e10']+'%' : ' - ') + '</span>';
                        e15_target += ' | <span class="impact-vehicles-compare">' + ('e15' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e15']+'%' : ' - ') + '</span>';
                        e20_target += ' | <span class="impact-vehicles-compare">' + ('e20' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e20']+'%' : ' - ') + '</span>';
                        e25_target += ' | <span class="impact-vehicles-compare">' + ('e25' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e25']+'%' : ' - ') + '</span>';
                        e30_target += ' | <span class="impact-vehicles-compare">' + ('e30' in compare_emission_ghg_redvstarget ? compare_emission_ghg_redvstarget['e30']+'%' : ' - ') + '</span>';
                    }
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
