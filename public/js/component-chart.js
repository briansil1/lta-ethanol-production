let componentCharts = [];
let components_array = {
    'catalytic_gasoline': '#006680',
    'reformate': '#762157',
    'isomerate': '#ffa400',
    'alkylate': '#d18316',
    'isobutane': '#3d7dca',
    'normal_butane': '#003e6a',
    'isopentane': '#7F7362',
    'coker_naphtha': '#694230',
    'heavy_naphtha': '#aa2d2a',
    'light_primary_naphtha': '#5b6770',
    'domestic_naphtha': '#003e6a',
    'high_octane_blendstock': '#5b6770',
    'mtbe': '#f6cf3f',
    'aromatics': '#522d6d',
    'raffinate': '#694230',
    'normal_pentane': '#B43286',
    'hydrocracked_gasoline': '#F9EDB9',
    'low_octane_blendstock': '#003e6a',
    'ethanol': '#6ba53a',
};
let currentChart = [];

$( function() {
    $('#chart-tab-clean-selects').on('click', evt => {
        let countrySelect = document.querySelector('#chart-tab-country-compare-component');
        let gasolineSelect = document.querySelector('#chart-tab-country-compare-gasoline');
        let qualitySelect = document.querySelector('#chart-tab-country-compare-quality');
        countrySelect.selectedIndex = 0;
        gasolineSelect.selectedIndex = 0;
        qualitySelect.selectedIndex = 0;
        $(countrySelect).change();
    });

    $('#chart-accordion-clean-selects').on('click', evt => {
        evt.preventDefault();
        const countryId = $('#country-select')[0].value
        window.location.replace(_getCountryUrl(countryId));
    });

    $('#chart-tab-country-gasoline').on('change', function(evt) {
        let gasoline = this.value;
        let quality = $('#chart-tab-country-quality').val();
        let quality_text = $('#chart-tab-country-quality option:selected').text()
        country_id = $('#country-select').val();
        country_compomnent_compare_id = $('#chart-tab-country-compare-component').val();
        if (country_id > 0 && gasoline && gasoline !== '0' && quality && quality !== '0') {
            $('.restriction-text').html(quality_text);
            createGraph('chart-tab-components', country_id, gasoline, quality)
        }
    });

    $('#chart-tab-country-quality').on('change', function(evt) {
        let gasoline = $('#chart-tab-country-gasoline').val();
        let quality = this.value;
        let quality_text = $('#chart-tab-country-quality option:selected').text()
        country_id = $('#country-select').val();
        country_compomnent_compare_id = $('#chart-tab-country-compare-component').val();
        if (country_id > 0 && gasoline && gasoline !== '0' && quality && quality !== '0') {
            $('.restriction-text').html(quality_text);
            createGraph('chart-tab-components', country_id, gasoline, quality)
        }
    });

    $('#chart-tab-country-compare-gasoline').on('change', function(evt) {
        let gasoline = this.value;
        let quality = $('#chart-tab-country-compare-quality').val();
        let quality_text = $('#chart-tab-country-compare-quality option:selected').text()
        country_compomnent_compare_id = $('#chart-tab-country-compare-component').val();
        if (country_compomnent_compare_id > 0 && gasoline && gasoline !== '0' && quality && quality !== '0') {
            $('.restriction-text-compare').html(quality_text);
            createGraph('chart-tab-components-compare', country_compomnent_compare_id, gasoline, quality, false)
        }
    });

    $('#chart-tab-country-compare-quality').on('change', function(evt) {
        let gasoline = $('#chart-tab-country-compare-gasoline').val();
        let quality = this.value;
        let quality_text = $('#chart-tab-country-compare-quality option:selected').text()
        country_compomnent_compare_id = $('#chart-tab-country-compare-component').val();
        if (country_compomnent_compare_id > 0 && gasoline && gasoline !== '0' && quality && quality !== '0') {
            $('.restriction-text-compare').html(quality_text);
            createGraph('chart-tab-components-compare', country_compomnent_compare_id, gasoline, quality, false)
        }
    });

    $('#chart-tab-country-compare-component').off().on('change', changeCountry);

    $('#chart-tab-download-component-db').on('click', () => window.open(_getComponentsFileUrl(), '_blank'));
    $('#chart-accordion-download-component-db').on('click', () => window.open(_getComponentsFileUrl(), '_blank'));
});

function changeCountry(evt) {
    country_compare_id = parseInt(this.value);
    country_compare_name = this.options[this.value].text;
    if (country_compare_id !== 0) {
        $.get({
            url: _getComponentsListURL(country_compare_id),
            success: (response) => {
                if (('error' in response && !response.error) || !'error' in response) {
                    let gasolineHTML = '';
                    let qualityHTML = '';
                    $.each(response.data.gasoline, (i, el) => gasolineHTML += `<option value="${el.gasoline_type}">${el.gasoline_option_name}</option>`);
                    $.each(response.data.quality, (i, el) => qualityHTML += `<option value="${el.quality_restriction}">${el.quality_option_name}</option>`);
                    $('.compare-image img').each((i, el) => el.src = _getComponentImageURL(response.data.country.name)); // Change Image to compare
                    $('.ccname').each((i, el) => { // Change RON Country name
                       const parts = el.innerHTML.split('-');
                       parts[1] = ` ${country_compare_name} `;
                       el.innerHTML = parts.join('-');
                    });
                    let gasolineSelect = document.querySelector('#chart-tab-country-compare-gasoline');
                    if (gasolineSelect)
                        gasolineSelect.innerHTML = gasolineHTML;
                    let qualitySelect = document.querySelector('#chart-tab-country-compare-quality');
                    if (gasolineSelect)
                        qualitySelect.innerHTML = qualityHTML;
                    $('.single-country').removeClass('col-12').addClass('col-6');
                    $('.compare-country').removeClass('hidden');

                    for(let id in currentChart) {
                        currentChart[id].options.aspectRatio = 16 / 15;
                        currentChart[id].resize();
                    }
                }
            },
            error: (response) => console.log(response)
        });
    }
    else {
        $('.single-country').removeClass('col-6').addClass('col-12');
        $('.compare-country').addClass('hidden');

        for(let id in currentChart) {
            currentChart[id].options.aspectRatio = 2 / 1;
            currentChart[id].resize();
        }

        if (currentChart['chart-tab-components-compare'])
            currentChart['chart-tab-components-compare'].destroy() // Remove Chart

        $('.restriction-text-compare').html('');

        // Remove RONs and prices from html
        $('#chart-accordion-e0-price-data-compare').html(' - ');
        $('#chart-tab-e0-price-data-compare').html(' - ');
        $('#chart-accordion-e0-ron-data-compare').html(' - ');
        $('#chart-tab-e0-ron-data-compare').html(' - ');
        $('#chart-accordion-e10-price-data-compare').html(' - ');
        $('#chart-tab-e10-price-data-compare').html(' - ');
        $('#chart-accordion-e10-ron-data-compare').html(' - ');
        $('#chart-tab-e10-ron-data-compare').html(' - ');
        $('#chart-accordion-e15-price-data-compare').html(' - ');
        $('#chart-tab-e15-price-data-compare').html(' - ');
        $('#chart-accordion-e15-ron-data-compare').html(' - ');
        $('#chart-tab-e15-ron-data-compare').html(' - ');
        $('#chart-accordion-e20-price-data-compare').html(' - ');
        $('#chart-tab-e20-price-data-compare').html(' - ');
        $('#chart-accordion-e20-ron-data-compare').html(' - ');
        $('#chart-tab-e20-ron-data-compare').html(' - ');
        $('#chart-accordion-e25-price-data-compare').html(' - ');
        $('#chart-tab-e25-price-data-compare').html(' - ');
        $('#chart-accordion-e25-ron-data-compare').html(' - ');
        $('#chart-tab-e25-ron-data-compare').html(' - ');
        $('#chart-accordion-e30-price-data-compare').html(' - ');
        $('#chart-tab-e30-price-data-compare').html(' - ');
        $('#chart-accordion-e30-ron-data-compare').html(' - ');
        $('#chart-tab-e30-ron-data-compare').html(' - ');
    }
}

function drawComponentChart(id, data, title, showYAxis) {
    if (showYAxis === undefined) {
        showYAxis = true;
    }
    let ctx = document.getElementById(id);
    return new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    padding: 'inherit, inherit, 10px',
                    onClick: () => false,
                    display: false
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
            aspectRatio: country_compomnent_compare_id != 0 ? 16 / 15 : 2 / 1,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    },
                    ticks: {
                        format: {
                            style: 'percent'
                        },
                        color: showYAxis ? '#666666' : '#f6f4f0',
                        position: showYAxis ? 'left' : 'right',
                    },
                    stacked: true,
                    min: 0,
                    max: 1,
                },
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    },
                    stacked: true
                }
            }
        }
    });
}

function createGraph(idSel, country_id, gasoline, quality, showYAxis) {
    if (showYAxis === undefined) {
        showYAxis = true;
    }
    $.get({
        url: _getGasolineComponentsByCountryURL(country_id, gasoline, quality),
        success: function (response) {
            if (!response.error) {
                const country_data = response.data.component;
                const groupedComponents = {};
                $.each(country_data, (index, row) => {
                    $.each(components_array, (component_name, color) => {
                        if (component_name in groupedComponents) {
                            groupedComponents[component_name].data.push(row.component[component_name] ? parseFloat(row.component[component_name])/100 : null);
                        } else {
                            groupedComponents[component_name] = {
                                label: _component_legends[component_name],
                                data: [row.component[component_name] ? parseFloat(row.component[component_name])/100 : null],
                                backgroundColor: color,
                                borderColor: color
                            }
                        }
                    });
                    switch (index) {
                        case 'equivalent-gasoline-e0':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e0-price-data' : '#chart-tab-e0-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e0-price-data' : '#chart-accordion-e0-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e0-ron-data' : '#chart-tab-e0-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e0-ron-data' : '#chart-accordion-e0-ron-data-compare').html(row.component['ron']);
                            break;
                        case 'gasoline-e10':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e10-price-data' : '#chart-tab-e10-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e10-price-data' : '#chart-accordion-e10-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e10-ron-data' : '#chart-tab-e10-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e10-ron-data' : '#chart-accordion-e10-ron-data-compare').html(row.component['ron']);
                            break;
                        case 'gasoline-e15':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e15-price-data' : '#chart-tab-e15-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e15-price-data' : '#chart-accordion-e15-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e15-ron-data' : '#chart-tab-e15-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e15-ron-data' : '#chart-accordion-e15-ron-data-compare').html(row.component['ron']);
                            break;
                        case 'gasoline-e20':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e20-price-data' : '#chart-tab-e20-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e20-price-data' : '#chart-accordion-e20-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e20-ron-data' : '#chart-tab-e20-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e20-ron-data' : '#chart-accordion-e20-ron-data-compare').html(row.component['ron']);
                            break;
                        case 'gasoline-e25':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e25-price-data' : '#chart-tab-e25-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e25-price-data' : '#chart-accordion-e25-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e25-ron-data' : '#chart-tab-e25-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e25-ron-data' : '#chart-accordion-e25-ron-data-compare').html(row.component['ron']);
                            break;
                        case 'gasoline-e30':
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e30-price-data' : '#chart-tab-e30-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e30-price-data' : '#chart-accordion-e30-price-data-compare').html(row.component['price']);
                            $(idSel === 'chart-tab-components' ? '#chart-tab-e30-ron-data' : '#chart-tab-e30-ron-data-compare').html(row.component['ron']);
                            $(idSel === 'chart-accordion-components' ? '#chart-accordion-e30-ron-data' : '#chart-accordion-e30-ron-data-compare').html(row.component['ron']);
                            break;
                    }
                });
                const compsTD = [];
                $.each(groupedComponents, (i, comp) => {
                    let sum = 0;
                    comp.data.forEach(el => {
                        sum += el ? el : 0;
                    });
                    if (sum <= 0) {
                        compsTD.push(i);
                    }
                });
                compsTD.forEach(el => {
                   delete groupedComponents[el];
                });
                const graphData = {
                    labels: ['E0', 'E10', 'E15', 'E20', 'E25', 'E30'],
                    datasets: Object.values(groupedComponents)
                };
                if (currentChart[idSel])
                    currentChart[idSel].destroy()
                currentChart[idSel] = drawComponentChart(idSel, graphData, '', showYAxis)
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}
