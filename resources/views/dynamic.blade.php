@extends('layouts.main', [
    'route_name' => 'routes.tools',
    'tools_country' => isset($country) ? $country : null,
    'tools_compare' => isset($compareCountry) ? $compareCountry : null,
])

@section('title', __('dynamic.title'))

@section('scriptvars')
    <script type="application/javascript">
        var _url_home = "{{ route(__('routes.home')) }}";
        var _csrf_token = "{{ csrf_token() }}";
        var _is_logged = @auth true @else false @endauth;
        var _token_form_modal = null;
        var _current_tab = '{{ $tab }}';
        var country_id = '{{ isset($country->id) && $country ? $country->id : '' }}';
        var country_name = '{{ isset($country->id) && $country ? __('countries.' . $country->name) : '' }}';
        var country_profile_compare_id = {{ $tab == 1 ? isset($compareCountry) && $compareCountry ? $compareCountry->id : '0' : '0' }};
        var country_component_compare_id = {{ $tab == 2 ? isset($compareCountry) && $compareCountry ? $compareCountry->id : '0' : '0' }};
        var country_impact_compare_id = {{ $tab == 3 ? isset($compareCountry) && $compareCountry ? $compareCountry->id : '0' : '0' }};

        var country_compare_name = @if(isset($compareCountry) && $compareCountry) '{{ __('countries.' . $compareCountry->name) }}' @else {{ 'null' }} @endif;
        var _emission_titles = {
            'co2': '{{ __('dynamic.content.impact-tab.graph-title-co2') }}',
            'thc': '{{ __('dynamic.content.impact-tab.graph-title-thc') }}',
            'co': '{{ __('dynamic.content.impact-tab.graph-title-co') }}',
            'pm': '{{ __('dynamic.content.impact-tab.graph-title-pm') }}',
            'nox': '{{ __('dynamic.content.impact-tab.graph-title-nox') }}',
            'btx': '{{ __('dynamic.content.impact-tab.graph-title-btx') }}'
        };
        var _emissions_euro = '{{ __('dynamic.content.impact-tab.graph-euro-emissions') }}';
        var _emissions_usa = '{{ __('dynamic.content.impact-tab.graph-usa-emissions') }}';
        var _country_component_compare = {{ isset($compareCountry) && $compareCountry ? 'true' : 'false' }};
        var _component_legends = {
            'catalytic_gasoline': '{{ __('dynamic.content.component-tab.legends.catalytic_gasoline') }}',
            'reformate': '{{ __('dynamic.content.component-tab.legends.reformate') }}',
            'isomerate': '{{ __('dynamic.content.component-tab.legends.isomerate') }}',
            'alkylate': '{{ __('dynamic.content.component-tab.legends.alkylate') }}',
            'isobutane': '{{ __('dynamic.content.component-tab.legends.isobutane') }}',
            'normal_butane': '{{ __('dynamic.content.component-tab.legends.normal_butane') }}',
            'isopentane': '{{ __('dynamic.content.component-tab.legends.isopentane') }}',

            'normal_pentane': '{{ __('dynamic.content.component-tab.legends.normal_pentane') }}',
            'hydrocracked_gasoline': '{{ __('dynamic.content.component-tab.legends.hydrocracked_gasoline') }}',

            'coker_naphtha': '{{ __('dynamic.content.component-tab.legends.coker_naphtha') }}',
            'heavy_naphtha': '{{ __('dynamic.content.component-tab.legends.heavy_naphtha') }}',
            'light_primary_naphtha': '{{ __('dynamic.content.component-tab.legends.light_primary_naphtha') }}',
            'domestic_naphtha': '{{ __('dynamic.content.component-tab.legends.domestic_naphtha') }}',
            'low_octane_blendstock': '{{ __('dynamic.content.component-tab.legends.low_octane_blendstock') }}',
            'high_octane_blendstock': '{{ __('dynamic.content.component-tab.legends.high_octane_blendstock') }}',
            'mtbe': '{{ __('dynamic.content.component-tab.legends.mtbe') }}',
            'aromatics': '{{ __('dynamic.content.component-tab.legends.aromatics') }}',
            'raffinate': '{{ __('dynamic.content.component-tab.legends.raffinate') }}',
            'ethanol': '{{ __('dynamic.content.component-tab.legends.ethanol') }}',
        };
        var _getComponentImageURL = (country_name, rel) => (rel ? rel : '/') + 'images/' + country_name + '/{{ __('dynamic.images.component_comparison') }}';
        var _getComponentsListURL = (country) => '{{ route(__('routes.components-list')) }}/' + country;
        var _getEmissionsByCountryURL = (country, emission, cComparing) => '{{ route('get-emissions-by-country') }}/' + country + (emission ? '/' + emission : '') + (cComparing ? '/c/' + cComparing : '');
        var _getGasolineComponentsByCountryURL = (country, gasoline, grade, cComparing) => '{{ route('get-components-by-country') }}/' + country + (gasoline ? '/' + gasoline : '') + (grade ? '/' + grade : '') + (cComparing ? '/c/' + cComparing : '');
        var _getCountryUrl = (id, cComparition) => '{{ route(__('routes.tools')) }}/' + _current_tab + '/' + id + (cComparition ? '/' + cComparition : '');
        var _getProfilePDFUrl = () => '{{ route(__('routes.profile-pdf')) }}';
        var _getComponentsFileUrl = () => '{{ route(__('routes.components-file')) }}';
        var _getImpactFileUrl = () => '{{ route(__('routes.emission-file')) }}';
        var _getPriceUpdateResultsURL = (country, gasolineRegular, gasolinePremium, normalButane, ethanol, emtbe, btxWeighted) => '{{ route(__('routes.price-update-results')) }}/' + country + (gasolineRegular ? '/' + gasolineRegular : '') + (gasolinePremium ? '/' + gasolinePremium : '') + (normalButane ? '/' + normalButane : '') + (ethanol ? '/' + ethanol : '') + (emtbe ? '/' + emtbe : '') + (btxWeighted ? '/' + btxWeighted : '');
    </script>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" integrity="sha512-O2fWHvFel3xjQSi9FyzKXWLTvnom+lOYR/AUEThL/fbP4hv1Lo5LCFCGuTXBRyKC4K4DJldg5kxptkgXAzUpvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/dynamic.js') }}"></script>
    <script src="{{ asset('js/component-chart.js') }}"></script>
    <script src="{{ asset('js/impact-graphs.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/json2csv"></script>

@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dynamic.css') }}">
@endpush

@section('content')
    <div class="site-content-contain z-10">
        <div id="content" class="site-content">
            <div id="primary" class="content-area mg-banded-secondary-lightest mg-noise">
                <main id="main" role="main" class="site-main">
                    <div class="mg-banded-primary-darkest text-white white-links antialiased">
                    </div>
                    <div class="back-blue text-center">
                        <h2 class="h1 uppercase text-2xl md:text-5xl container oswald"><a href="{{ route(__('routes.home')) }}" class="text-white">{{ __('dynamic.content.profiles') }}</a></h2>
                        <h3 class="text-white mt-0 pt-0 oswald">{{ __('dynamic.content.america') }}</h3>
                        <h3 class="text-white mt-0 pt-0 oswald">{{ __('dynamic.content.dynamic-tool') }}</h3>
                    </div>
                </main>
            </div>
        </div>
        <div class="off-blue pb-5">
            <div class="container">
                <p class="oswald text-center fs-4 text-white">{{ __('dynamic.content.select-country-text') }}</p>
                <div class="col-lg-6 col-md-8 col-sm-12 country-select">
                    <h4>{{ __('dynamic.content.select-country') }}</h4>
                    <select id="country-select" class="form-select" aria-label="Default select example">
                        @if (isset($country))
                            @foreach($countryList as $countryEl)
                                <option value="{{ $countryEl->id }}" @if($countryEl->id === $country->id) selected @endif>{{ __('countries.' . $countryEl->name) }}</option>
                            @endforeach
                        @else
                            <option value="-1" selected>{{ __('dynamic.content.select-country') }}</option>
                            @foreach($countryList as $countryEl)
                                <option value="{{ $countryEl->id }}">{{ __('countries.' . $countryEl->name) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @if (isset($country))
                    <div class="shadow">
                        <!---acordions-->
                        <div class="accordion d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <a href="#" class="accordion-button @if($tab == '1') show active @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="@if($tab == '1') true @else false @endif" aria-controls="panelsStayOpen-collapseOne">
                                        {{ __('dynamic.content.profile') }}
                                    </a>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse @if($tab == '1') show @endif" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        @include('component.tab-pane-profile')
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <a href="#" class="accordion-button @if($tab == '2') show active @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="@if($tab == '2') true @else false @endif" aria-controls="panelsStayOpen-collapseTwo">
                                        {{ __('dynamic.content.components') }}
                                    </a>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse @if($tab == '2') show @endif" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        @include('component.tab-pane-components', ['chart_id' => 'chart-accordion'])
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <a href="#" class="accordion-button @if($tab == '3') show active @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="@if($tab == '3') true @else false @endif" aria-controls="panelsStayOpen-collapseThree">
                                        {{ __('dynamic.content.impact') }}
                                    </a>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse @if($tab == '3') show @endif" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                        @include('component.tab-pane-impact', ['chart_id' => 'chart-accordion'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---tabs-->
                        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block">
                            <ul class="nav nav-tabs d-flex " id="myTab" role="tablist">
                                <li class="nav-item col-4" role="presentation">
                                    <span class="nav-link-3 @if($tab == '1') active @endif oswald" id="tab-1" data-bs-toggle="tab" data-bs-target="#tab1" type="span" role="tab" aria-controls="profile" aria-selected="{{ $tab == '1' ? 'true' : 'false'}}">
                                        {{ __('dynamic.content.profile') }}
                                    </span>
                                </li>
                                <li class="nav-item col-4" role="presentation">

                                <div id="content" class="site-content">
                                    <input type="hidden" class="form-control" id="user_locale_hidden" aria-label="user_locale_hidden" aria-describedby="user_locale_hidden" value="{{ app()->getLocale() }}">
                                                   
                                    <div class="modal fade" id="modalGasolineEthanolBlending" data-keyboard="false" tabindex="-1" aria-labelledby="modalGasolineEthanolBlendingLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> {{ __('dynamic.content.component-tab.modal-price-update-text') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ __('dynamic.content.component-tab.modal-price-update') }}</p>
                                                        
                                                    <form id="price-update-form" method="post" action="{{ route('price-update-get-results') }}" >
                                                                     

                                                        <div class="form-group row">
                                                            <span class="col-sm-8 col-input-group-text" id="basic-addon1">{{ __('dynamic.content.component-tab.modal-price-update-fuel-component') }}</span>
                                                            <span class="col-sm-4 col-input-group-text" id="basic-addon1">{{ __('dynamic.content.component-tab.modal-price-update-price') }}</span>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_gasoline_regular" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-regular') }}</label>                           
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control-sm" id="price_gasoline_regular" aria-label="price_gasoline_regular" aria-describedby="price_gasoline_regular" required="True">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_gasoline_premium" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-premium') }}</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="price_gasoline_premium" aria-label="price_gasoline_premium" aria-describedby="price_gasoline_premium" required="True">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_normal_butane" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-normal-butane') }}</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="price_normal_butane" aria-label="price_normal_butane" aria-describedby="price_normal_butane" required="True">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_ethanol" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-ethanol') }}</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="price_ethanol" aria-label="price_ethanol" aria-describedby="price_ethanol" required="True">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_mtbe" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-mtbe') }}</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="price_mtbe" aria-label="price_mtbe" aria-describedby="price_mtbe" required="True">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="price_btx_weighted" class="col-sm-8 col-form-label">{{ __('dynamic.content.component-tab.modal-price-update-btx-weighted') }}</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="price_btx_weighted" aria-label="price_btx_weighted" aria-describedby="price_btx_weighted" required="True">
                                                            </div>
                                                        </div>


                                                        
                                                        <div class="d-flex justify-content-center pt-4">
                                                            <button id="modal-price-update-continue" type="submit" class="btn btn-primary px-4 oswald">{{ __('dynamic.content.component-tab.modal-price-update-continue') }}</button>
                                                        </div>


                                                        
                                                    </form>

                                                

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="modalGasolineEthanolBlending_2" data-keyboard="false" tabindex="-1" aria-labelledby="modalGasolineEthanolBlendingLabel_2" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __('dynamic.content.component-tab.modal-price-update-report-text') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ __('dynamic.content.component-tab.modal-price-update') }}</p>



                                                    <div class="table-responsive">
                                                        <table class="table-bordered" border="1" cellpadding="0" cellspacing="0">
                                                            <thead >
                                                                <tr class="table-titles ">
                                                                    <th colspan="2" id="th_country_text" scope="col">{{ __('countries.' . $country->name) }} </th>
                                                                    <th colspan="6" style="text-align:center" id="th_gasoline_text" scope="col">{{ __('dynamic.content.component-tab.constant-octane-number') }}</th>
                                                                </tr>
                                                                <tr class="table-titles ">
                                                                    <th id="th_price_text" scope="col">{{ __('dynamic.content.component-tab.prices') }}</th>
                                                                    <th id="th_gasoline_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline') }}</th>
                                                                    <th id="th_gasoline_e0_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e0') }}</th>
                                                                    <th id="th_gasoline_e10_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e10') }}</th>
                                                                    <th id="th_gasoline_e15_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e15') }}</th>
                                                                    <th id="th_gasoline_e20_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e20') }}</th>
                                                                    <th id="th_gasoline_e25_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e25') }}</th>
                                                                    <th id="th_gasoline_e30_text" scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e30') }}</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody class="table-bordered" id="table-data-constant-octane">

                                                            </tbody>
                                                        </table>
                                                    </div>


                                                    
                                                    <div class="table-responsive">
                                                        <table class="table-bordered" border="1" cellpadding="0" cellspacing="0">
                                                            <thead >
                                                                <tr class="table-titles ">
                                                                    <th colspan="2" scope="col">{{ __('countries.' . $country->name) }} </th>
                                                                    <th colspan="6" style="text-align:center" id="th_gasoline_text" scope="col">{{ __('dynamic.content.component-tab.increased-octane-number') }}</th>
                                                                </tr>
                                                                <tr class="table-titles ">
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.prices') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e0') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e10') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e15') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e20') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e25') }}</th>
                                                                    <th scope="col">{{ __('dynamic.content.component-tab.modal-price-update-gasoline-e30') }}</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody class="table-bordered" id="table-data-increased-octane">

                                                            </tbody>
                                                        </table>
                                                    </div>




                                                </div>

                                                <div class="d-flex justify-content-between align-items-center w-100">
                                                    <p> </p>
                                                    <button class="btn btn-primary px-4 oswald" data-bs-target="#modalGasolineEthanolBlending" data-bs-toggle="modal">{{ __('dynamic.content.component-tab.modal-price-update-go-back') }}</button>
                                                    <button id="modal-price-update-download" type="submit" class="btn btn-primary px-4 oswald">{{ __('dynamic.content.profile-tab.download-button') }}</button>
                                                    <button class="btn btn-primary px-4 oswald" data-bs-dismiss="modal">{{ __('dynamic.content.component-tab.modal-price-update-close') }}</button>
                                                    </br>
                                                </div>

                                                {{-- <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" data-bs-target="#modalGasolineEthanolBlending" data-bs-toggle="modal">Regresar</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                    <span class="nav-link-3 @if($tab == '2') active @endif oswald" id="tab-2" data-bs-toggle="tab" data-bs-target="#tab2" type="span" role="tab" aria-controls="profile" aria-selected="{{ $tab == '2' ? 'true' : 'false'}}">
                                        {{ __('dynamic.content.components') }}
                                    </span>
                                </li>
                                <li class="nav-item col-4" role="presentation">
                                    <span class="nav-link-3 @if($tab == '3') active @endif oswald" id="tab-3" data-bs-toggle="tab" data-bs-target="#tab3" type="span" role="tab" aria-controls="profile" aria-selected="{{ $tab == '3' ? 'true' : 'false'}}">
                                        {{ __('dynamic.content.impact') }}
                                    </span>
                                </li>
                            </ul>
                            <!---tabs-->
                            <!---contenedor tabs-->
                            <div class="tab-content off-white" id="myTabContent">
                                <div class="tab-pane fade @if($tab == '1') show active @endif" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                    @include('component.tab-pane-profile')
                                </div>
                                <div class="tab-pane fade @if($tab == '2') show active @endif" id="tab2" role="tabpanel" aria-labelledby="tab-2">
                                    @include('component.tab-pane-components', ['chart_id' => 'chart-tab'])
                                </div>
                                <div class="tab-pane fade @if($tab == '3') show active @endif" id="tab3" role="tabpanel" aria-labelledby="tab-3">
                                    @include('component.tab-pane-impact', ['chart_id' => 'chart-tab'])
                                </div>
                            </div>
                            <!---contenedor tabs-->
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="content" class="site-content">
            <footer id="colophon" role="contentinfo" class="relative text-white site-footer mg-banded-primary antialiased uppercase text-base border-0 z-10 sm:text-left print-break-avoid">
                <div class="wrap xl:flex items-center">
                    <div class="flex-1 text-sm leading-normal lg:leading-loose">
                        <aside role="complementary" aria-label="Footer" class="widget-area">
                            <picture>
                                <source data-lazy-srcset="{{ asset('images/grains-symbol.svg') }}" srcset="{{ asset('images/grains-symbol.svg') }}" />
                                <img src="{{ asset('images/grains-symbol.png') }}" alt="flat graphic symbolizing a grain plant" data-lazy-src="{{ asset('images/grains-symbol.png') }}" data-ll-status="loading" class="mg-icon--larger md:float-left mt-1 md:mr-4 no-print lazyloading" />
                                <noscript>
                                    <img src="{{ asset('images/grains-symbol.png') }}" alt="flat graphic symbolizing a grain plant" class="mg-icon--larger md:float-left mt-1 md:mr-4 no-print" />
                                </noscript>
                            </picture>
                            <div class="site-copyright">{{ __('main.footer.site-name') }}</div>
                            <section id="custom_html-2" class="widget_text widget widget_custom_html">
                                <h2 class="widget-title">USGC Info</h2>
                                <div class="textwidget custom-html-widget">
                                    20 F Street NW, Suite 900, Washington, DC 20001 | TEL: <a href="tel:202.789.0789">202.789.0789</a> | FAX: <a href="tel:202.898.0522">202.898.0522</a>
                                    <p>
                                        <a href="https://grains.org/privacy/">{{ __('main.footer.privacy-policy') }}</a> | <a href="https://grains.org/cookies/">{{ __('main.footer.cookies-policy') }}</a> | <a href="https://grains.org/employment/">{{ __('main.footer.eeo-policy') }}</a> | <a href="https://www.usda.gov/non-discrimination-statement">{{ __('main.footer.non-discrimination-policy') }}</a>
                                    </p>
                                </div>
                            </section>
                        </aside>
                    </div>
                    <div class="xl:w-1/3 xl:flex xl:justify-end text-sm">
                        <nav role="navigation" aria-label="Social Links Menu" class="social-navigation mt-4 xl:mt-0">
                            <ul id="menu-social" class="social-links-menu mg-hover-menu social-icons">
                                <div class="menu-social-container">
                                    <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-88">
                                        <a href="https://www.facebook.com/usgrainscouncil">
                                            <svg class="icon-social icon"><use xlink:href="#icon-facebook"></use></svg>
                                            <span class="screen-reader-text">Facebook</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89">
                                        <a href="http://twitter.com/usgc">
                                            <svg class="icon-social icon"><use xlink:href="#icon-twitter"></use></svg>
                                            <span class="screen-reader-text">Twitter</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91">
                                        <a href="https://www.instagram.com/usgrains/">
                                            <svg class="icon-social icon"><use xlink:href="#icon-instagram"></use></svg>
                                            <span class="screen-reader-text">Instagram</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90">
                                        <a href="http://www.youtube.com/user/USGrainsCouncil">
                                            <svg class="icon-social icon"><use xlink:href="#icon-youtube"></use></svg>
                                            <span class="screen-reader-text">Youtube</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92">
                                        <a href="https://usgrains.photoshelter.com/galleries">
                                            <svg class="icon-social icon"><use xlink:href="#icon-photoshelter"></use></svg>
                                            <span class="screen-reader-text">Photoshelter</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-5106" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5106">
                                        <a href="https://soundcloud.com/usgc">
                                            <svg class="icon-social icon"><use xlink:href="#icon-soundcloud"></use></svg>
                                            <span class="screen-reader-text">Soundcloud</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
