//const { result } = require("lodash");



let lang_json= {};

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
                'octane_number': 'Octane Type',
                'updated': 'Updated',
                'file': 'File.csv',
                'ordinary': 'Regular',
                'superior': 'Superior',
                'missing_field': 'Please fill all the fields'
            }
}

function getSpanishJson() {
    return {
                'octane_number': 'Tipo Octanaje',
                'updated': 'Actualizacion',
                'file': 'Archivo.csv',
                'ordinary': 'Regular',
                'superior': 'Superior',
                'missing_field': 'Favor de capturar todos los campos para el cálculo'
            }
}

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

    $('#modal-price-update-open').on('click', evt => {
        evt.preventDefault();
        const modalGasolineEthanolBlending = document.getElementById('modalGasolineEthanolBlending');

        // Select all input and textarea elements within the modal
        const inputs = modalGasolineEthanolBlending.querySelectorAll('input, textarea');

        //Iterate through each input and clear its value
        inputs.forEach(input => {
            input.value = '';
        });

    });
   

    $('#modal-price-update-continue').on('click', evt => {
        evt.preventDefault();

        const inputHiddenLanguage = $('#user_locale_hidden').val(); //document.getElementById('user_locale_hidden');
        let lang = "";

        if (inputHiddenLanguage) {
            lang = inputHiddenLanguage;
        }
        else{
            lang = 'en_US';
        }

        lang_json = GetLanguageJson(lang);

        
        var x = document.getElementById('price-update-form').checkValidity();
        if (x) {

            let gasoline_regular = $('#price_gasoline_regular').val();
            let gasoline_premium = $('#price_gasoline_premium').val();
            let normal_butane = $('#price_normal_butane').val();
            let ethanol = $('#price_ethanol').val();
            let emtbe = $('#price_mtbe').val();
            let btx_weighted = $('#price_btx_weighted').val();
            country_id = $('#country-select').val();
            
            //determinePriceUpdate(country_id, 2.427, 2.737, 1.02622916666667, 1.665, 3.022, 3.8894)
            determinePriceUpdate(country_id, gasoline_regular, gasoline_premium, normal_butane, ethanol, emtbe, btx_weighted)

            const modalGasolineEthanolBlending = document.getElementById('modalGasolineEthanolBlending');
            
            // Select all input and textarea elements within the modal
            const inputs = modalGasolineEthanolBlending.querySelectorAll('input, textarea');

        } else {
            console.log('Not Valid')
            
            alert(lang_json.missing_field);
        }        

    });

    

    $('#modal-price-update-download').on('click', evt => {
        evt.preventDefault();

        let gasolineRegular = $('#price_gasoline_regular').val();
        let gasolinePremium = $('#price_gasoline_premium').val();
        let normalButane = $('#price_normal_butane').val();
        let ethanol = $('#price_ethanol').val();
        let emtbe = $('#price_mtbe').val();
        let btxWeighted = $('#price_btx_weighted').val();
        country_id = $('#country-select').val();

        $.get({
            url: _getPriceUpdateResultsURL(country_id, gasolineRegular, gasolinePremium, normalButane, ethanol, emtbe, btxWeighted),
            success: function (response) {
                if (!response.error) {
                    console.log(response);
                    let result = [];

                    result = generateExcel(response, result, 'constant_octane_number', 'hystoric');
                    result = generateExcel(response, result, 'constant_octane_number', 'estimate');

                    result = generateExcel(response, result, 'constant_octane_number', 'blank');
                    
                    result = generateExcel(response, result, 'increased_octane_number', 'hystoric');
                    result = generateExcel(response, result, 'increased_octane_number', 'estimate');

                    const csvData =  json2csv.parse(result);
                    console.log(result);

                    downloadCSV([lang_json.file], csvData);

                }
            },
            error: function (response) {
                alert("There was a problem. Please try again." + response);
                console.log(response);
            }
        });

    });

    // $('#modal-price-update-continue').on('click', evt => {
    //     evt.preventDefault();
        
        
    // });
});

function generateExcel(response, json_data, octane_number, type_of_data){
    let t_country =  document.getElementById('th_country_text');
    let t_prices =  document.getElementById('th_price_text');
    let t_gasoline =  document.getElementById('th_gasoline_text');
    let t_gasoline_e0 =  document.getElementById('th_gasoline_e0_text');
    let t_gasoline_e10 =  document.getElementById('th_gasoline_e10_text');
    let t_gasoline_e15 =  document.getElementById('th_gasoline_e15_text');
    let t_gasoline_e20 =  document.getElementById('th_gasoline_e20_text');
    let t_gasoline_e25 =  document.getElementById('th_gasoline_e25_text');
    let t_gasoline_e30 =  document.getElementById('th_gasoline_e30_text');

    let Octane = lang_json.octane_number;
    let price_row = lang_json.updated;
    
    for(const gasoline_quality in response.data.gasoline_quality_rows) {
        if(gasoline_quality == octane_number){
        const gas_quality = response.data.gasoline_quality_rows[gasoline_quality];
            for(const gasoline_type in gas_quality.gasoline_type_rows) {
                const gas_type = gas_quality.gasoline_type_rows[gasoline_type];

                if(type_of_data == "hystoric"){
                    json_data.push({ [t_country.innerHTML]: 2024, ' ': gasoline_type, [Octane]: octane_number, [t_gasoline_e0.innerHTML]: gas_type.blendstok_constant.equivalent_gasoline_e0.price, [t_gasoline_e10.innerHTML]: gas_type.blendstok_constant.gasoline_e10.price, [t_gasoline_e15.innerHTML]: gas_type.blendstok_constant.gasoline_e15.price, [t_gasoline_e20.innerHTML]: gas_type.blendstok_constant.gasoline_e20.price, [t_gasoline_e25.innerHTML]: gas_type.blendstok_constant.gasoline_e25.price, [t_gasoline_e30.innerHTML]: gas_type.blendstok_constant.gasoline_e30.price});
                }
                else if(type_of_data == "estimate"){
                    json_data.push({ [t_country.innerHTML]: price_row, ' ': gasoline_type, [Octane]: octane_number, [t_gasoline_e0.innerHTML]: gas_type.blendstok_constant.equivalent_gasoline_e0.estimate_price, [t_gasoline_e10.innerHTML]: gas_type.blendstok_constant.gasoline_e10.estimate_price, [t_gasoline_e15.innerHTML]: gas_type.blendstok_constant.gasoline_e15.estimate_price, [t_gasoline_e20.innerHTML]: gas_type.blendstok_constant.gasoline_e20.estimate_price, [t_gasoline_e25.innerHTML]: gas_type.blendstok_constant.gasoline_e25.estimate_price, [t_gasoline_e30.innerHTML]: gas_type.blendstok_constant.gasoline_e30.estimate_price});
                }
            };
        }
    };
    return json_data;
}

function downloadCSV(filename, csvData){
    const element = document.createElement("a");

    element.setAttribute('href', `data:text/csv;charset=utf-8,${csvData}`);
    element.setAttribute('download', filename);

    document.body.appendChild(element);
    element.click();
}


// function validatePriceUpdateInput() {
//         alert("Anda en el validate");

//     if (document.getElementById('price_gasoline_regular') == null || document.getElementById('price_gasoline_regular').value=="") {
//             alert("Field Gasoline (Regular) cannot be empty.");
//             return false;
//     }
//     if (document.getElementById('price_gasoline_premium') == null || document.getElementById('price_gasoline_premium').value=="") {
//             alert("Field Gasoline (Premium) cannot be empty.");
//             return false;
//     }
//     if (document.getElementById('price_normal_butane') == null || document.getElementById('price_normal_butane').value=="") {
//             alert("Field Normal Butane cannot be empty.");
//             return false;
//     }
//     if (document.getElementById('price_ethanol') == null || document.getElementById('price_ethanol').value=="") {
//             alert("Field Ethanol cannot be empty.");
//             return false;
//     }
//     if (document.getElementById('price_mtbe') == null || document.getElementById('price_mtbe').value=="") {
//             alert("Field MBTE cannot be empty.");
//             return false;
//     }
//     if (document.getElementById('price_btx_weighted') == null || document.getElementById('price_btx_weighted').value=="") {
//             alert("Field BTX Weighted Average cannot be empty.");
//             return false;
//     }

//     let gasoline_regular = $('#price_gasoline_regular').val() != '' ? $('#price_gasoline_regular').val() : 6;
//     let gasoline_premium = $('#price_gasoline_premium').val()
//     let normal_butane = $('#price_normal_butane').val()
//     let ethanol = $('#price_ethanol').val()
//     let emtbe = $('#price_emtbe').val()
//     let btx_weighted = $('#price_btx_weighted').val()
//     country_id = $('#country-select').val();
    
// //             //determinePriceUpdate(country_id, 2.427, 2.737, 1.02622916666667, 1.665, 3.022, 3.8894)
//     determinePriceUpdate(country_id, gasoline_regular, gasoline_premium, normal_butane, ethanol, emtbe, btx_weighted)

// }


function determinePriceUpdate(country_id, gasolineRegular, gasolinePremium, normalButane, ethanol, emtbe, btxWeighted) {
    $.get({
        url: _getPriceUpdateResultsURL(country_id, gasolineRegular, gasolinePremium, normalButane, ethanol, emtbe, btxWeighted),
        success: function (response) {
            if (!response.error) {
            
            const modal_1 = document.querySelector('#modalGasolineEthanolBlending');
            const modal_1_obj = bootstrap.Modal.getOrCreateInstance(modal_1);
            modal_1_obj.hide();

            const modal_2 = document.querySelector('#modalGasolineEthanolBlending_2');
            const modal_2_obj = bootstrap.Modal.getOrCreateInstance(modal_2);
            modal_2_obj.show();            

            const table_data_constant_octane = document.getElementById('table-data-constant-octane');
            table_data_constant_octane.innerHTML = formatPriceUpdateTable(response, 'constant_octane_number');
            
            const table_data_increased_octane = document.getElementById('table-data-increased-octane');
            table_data_increased_octane.innerHTML = formatPriceUpdateTable(response, 'increased_octane_number');

            }
        },
        error: function (response) {
            alert("There was a problem. Please try again." + response);
            console.log(response);
        }
    });
    

}

function formatPriceUpdateTable(response, octane_number){
    let html_table_data_historic = "";
    let html_table_data_updated = "";

    for(const gasoline_quality in response.data.gasoline_quality_rows) {
        if(gasoline_quality == octane_number){
        const gas_quality = response.data.gasoline_quality_rows[gasoline_quality];
            for(const gasoline_type in gas_quality.gasoline_type_rows) {
                const gas_type = gas_quality.gasoline_type_rows[gasoline_type];
                html_table_data_historic+= '<tr class="table-primary"><th class="data_historic_header">2024</th><th class="data_historic_header">'+ gasoline_type + '<th class="data_historic_data">' + gas_type.blendstok_constant.equivalent_gasoline_e0.price +'</th><th class="data_historic_data">' + gas_type.blendstok_constant.gasoline_e10.price +'</th><th class="data_historic_data">' + gas_type.blendstok_constant.gasoline_e15.price +'</th><th class="data_historic_data">' + gas_type.blendstok_constant.gasoline_e20.price +'</th><th class="data_historic_data">' + gas_type.blendstok_constant.gasoline_e25.price +'</th><th class="data_historic_data">' + gas_type.blendstok_constant.gasoline_e30.price +'</th></tr>';
                html_table_data_updated+= '<tr class="table-primary"><th class="data_updated_header">'  + lang_json.updated + '</th><th class="data_updated_header">'+ gasoline_type + '<th class="data_updated_data">' + gas_type.blendstok_constant.equivalent_gasoline_e0.estimate_price +'</th><th class="data_updated_data">' + gas_type.blendstok_constant.gasoline_e10.estimate_price +'</th><th class="data_updated_data">' + gas_type.blendstok_constant.gasoline_e15.estimate_price +'</th><th class="data_updated_data">' + gas_type.blendstok_constant.gasoline_e20.estimate_price +'</th><th class="data_updated_data">' + gas_type.blendstok_constant.gasoline_e25.estimate_price +'</th><th class="data_updated_data">' + gas_type.blendstok_constant.gasoline_e30.estimate_price +'</th></tr>';
            };
        }
    };
    return html_table_data_historic + html_table_data_updated;
}


function retrieveGasoline() {
    return 'response.data.gasoline_quality_rows.constant_octane_number.gasoline_type_rows.superior.blendstok';
}



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
