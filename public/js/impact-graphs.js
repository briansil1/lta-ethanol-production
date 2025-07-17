let allGraphs = [];

$( function() {
    $('#tab-3').on('click', function (evt) {
        if (!('co2' in allGraphs)) {
            $('#v-pills-co2-tab').click();
        }
    });

    $('#v-pills-tab > a').each(function(i) {
        $(this).off().on('click', changeGraphTab);
    });

    $('#chart-tab-country-compare-impact').off().on('change', function (evt) {
        evt.preventDefault();
        country_impact_compare_id = $('#chart-tab-country-compare-impact').val();
        country_compare_name = $( "#chart-tab-country-compare-impact option:selected" ).text();
        if (country_impact_compare_id > 0)
            window.location.replace(_getCountryUrl(country_id, country_impact_compare_id));
    });

    $('#chart-accordion-country-compare-impact').off().on('change', function (evt) {
        evt.preventDefault();
        country_impact_compare_id = $('#chart-accordion-country-compare-impact').val();
        country_compare_name = $( "#chart-accordion-country-compare-impact option:selected" ).text();
        if (country_impact_compare_id > 0)
            window.location.replace(_getCountryUrl(country_id, country_impact_compare_id));
    });

    $('.download-impact').off().on('click', function (evt) {
        window.open(_getImpactFileUrl(), '_blank');
    })

    if (country_id > 0 && _current_tab == '3') {
        $('#v-pills-co2-tab').click();
    }
})

function changeGraphTab() {
    $('.tab-chart-container .tab-content > .tab-pane').removeClass('show active').addClass('hide');
    const parts = this.id.split('-');
    country_id = $('#country-select').val();
    if (parts[2] in allGraphs && allGraphs[parts[2]]) {
        $('#chart-accordion-pills-' + parts[2]).addClass('show active');
        $('#chart-tab-pills-' + parts[2]).addClass('show active');
    } else {
        $.get({
            url: _getEmissionsByCountryURL(country_id, parts[2], country_impact_compare_id > 0 ? country_impact_compare_id : null),
            success: function (response) {
                if (!response.error) {
                    const national_emissions = response.data['country'];
                    const europe_emissions = response.data['europe'];
                    const usa_emissions = response.data['usa'];
                    $('#chart-accordion-pills-' + parts[2]).addClass('show active');
                    $('#chart-tab-pills-' + parts[2]).addClass('show active');
                    const graphData = {
                        labels: ['E0', 'E10', 'E15', 'E20', 'E25', 'E30'],
                        datasets: [{
                            label: _emissions_euro,
                            data: [europe_emissions['e0'], europe_emissions['e10'], europe_emissions['e15'], europe_emissions['e20'], europe_emissions['e25'], europe_emissions['e30']],
                            backgroundColor: '#CF8228',
                            borderColor: '#CF8228',
                            pointRadius: 0,
                            type: 'line',
                            borderCapStyle: 'round'
                        }, {
                            label: _emissions_usa,
                            data: [usa_emissions['e0'], usa_emissions['e10'], usa_emissions['e15'], usa_emissions['e20'], usa_emissions['e25'], usa_emissions['e30']],
                            backgroundColor: '#72AC4D',
                            borderColor: '#72AC4D',
                            pointRadius: 0,
                            type: 'line',
                        }, {
                            label: country_name,
                            data: [national_emissions['e0'], national_emissions['e10'], national_emissions['e15'], national_emissions['e20'], national_emissions['e25'], national_emissions['e30']],
                            backgroundColor: '#0A5D74',
                            borderColor: '#0A5D74',
                            type: 'bar'
                        }]
                    };
                    let e0_vehicles = '<span class="impact-vehicles">' + ('e0' in response.data['country_vehicles'] && response.data['country_vehicles']['e0'] ? response.data['country_vehicles']['e0'] : '-') + '</span>'
                    let e10_vehicles = '<span class="impact-vehicles">' + ('e10' in response.data['country_vehicles'] ? response.data['country_vehicles']['e10'] : '-') + '</span>';
                    let e15_vehicles = '<span class="impact-vehicles">' + ('e15' in response.data['country_vehicles'] ? response.data['country_vehicles']['e15'] : '-') + '</span>';
                    let e20_vehicles = '<span class="impact-vehicles">' + ('e20' in response.data['country_vehicles'] ? response.data['country_vehicles']['e20'] : '-') + '</span>';
                    let e25_vehicles = '<span class="impact-vehicles">' + ('e25' in response.data['country_vehicles'] ? response.data['country_vehicles']['e25'] : '-') + '</span>';
                    let e30_vehicles = '<span class="impact-vehicles">' + ('e30' in response.data['country_vehicles'] ? response.data['country_vehicles']['e30'] : '-') + '</span>';
                    if ('compare' in response.data) {
                        const compare_emissions = response.data['compare'];
                        graphData['datasets'].push({
                            label: country_compare_name,
                            data: [compare_emissions['e0'], compare_emissions['e10'], compare_emissions['e15'], compare_emissions['e20'], compare_emissions['e25'], compare_emissions['e30']],
                            backgroundColor: '#742457',
                            borderColor: '#742457',
                            type: 'bar'
                        })
                        e0_vehicles += ' | <span class="impact-vehicles-compare">' + ('e0' in response.data['compare_vehicles'] && response.data['compare_vehicles']['e0'] ? response.data['compare_vehicles']['e0'] : ' - ') + '</span>';
                        e10_vehicles += ' | <span class="impact-vehicles-compare">' + ('e10' in response.data['compare_vehicles'] ? response.data['compare_vehicles']['e10'] : ' - ') + '</span>';
                        e15_vehicles += ' | <span class="impact-vehicles-compare">' + ('e15' in response.data['compare_vehicles'] ? response.data['compare_vehicles']['e15'] : ' - ') + '</span>';
                        e20_vehicles += ' | <span class="impact-vehicles-compare">' + ('e20' in response.data['compare_vehicles'] ? response.data['compare_vehicles']['e20'] : ' - ') + '</span>';
                        e25_vehicles += ' | <span class="impact-vehicles-compare">' + ('e25' in response.data['compare_vehicles'] ? response.data['compare_vehicles']['e25'] : ' - ') + '</span>';
                        e30_vehicles += ' | <span class="impact-vehicles-compare">' + ('e30' in response.data['compare_vehicles'] ? response.data['compare_vehicles']['e30'] : ' - ') + '</span>';
                    }
                    $('.tab-' + parts[2] + ' .vehicles-stop .e0').html(e0_vehicles);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e10').html(e10_vehicles);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e15').html(e15_vehicles);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e20').html(e20_vehicles);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e25').html(e25_vehicles);
                    $('.tab-' + parts[2] + ' .vehicles-stop .e30').html(e30_vehicles);
                    allGraphs[parts[2]] = drawGraph('chart-tab-' + parts[2], graphData, _emission_titles[parts[2]]);
                    drawGraph('chart-accordion-' + parts[2], graphData, _emission_titles[parts[2]]);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
}

function drawGraph(id, data, title) {
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
