<div class="row p-4">
    <p>
        {{ __('dynamic.content.component-tab.first-paragraph') }}
    </p>
    <div class="off-white-2 border-radius-5 p-1">
        <img src="{{ asset('images/' . __('dynamic.images.component_blending')) }}" class="img-fluid">
    </div>
</div>
<div class="row p-4">
    <div class="col-md-4">
        <img src="{{ asset('images/'  . __('dynamic.images.component_benefits')) }}" class="img-fluid">
    </div>
    <div class="col-md-8">
        <p>
            {{ __('dynamic.content.component-tab.benefits-1') }}
        </p>
        @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US')
            <p>
                {{ __('dynamic.content.component-tab.benefits-5') }}
            </p>
        @endif
        <p>
            {{ __('dynamic.content.component-tab.benefits-2') }}
        </p>
        <ul class="pl-5">
            <li>{{ __('dynamic.content.component-tab.benefits-list-element-1') }}</li>
            <li>{{ __('dynamic.content.component-tab.benefits-list-element-2') }}</li>
            <li>{{ __('dynamic.content.component-tab.benefits-list-element-3') }}</li>
            <li>{{ __('dynamic.content.component-tab.benefits-list-element-4') }}</li>
        </ul>
        <p>
            {{ __('dynamic.content.component-tab.benefits-3') }}
        </p>
    </div>
</div>
<div class="row p-2">
    <h3 class="mb-2">{{ __('dynamic.content.component-tab.comparative-section') }}</h3>
    <div class="col-12 text-justify">
        {{ __('dynamic.content.component-tab.instructions-1') }}
    </div>
    <div class="col-12 mt-2 mb-2 text-justify">
        {{ __('dynamic.content.component-tab.instructions-2') }}
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-6 @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) m-auto @endif">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.component_comparison')) }}" alt="Components Chart" class="img-fluid">
            </div>
            <div class="col-6 compare-image compare-country @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) hidden @endif">
                <img src="{{ asset('images/' . ($tab == 2 && isset($compareCountry) && $compareCountry ? $compareCountry->name : '--country-name--') . '/' . __('dynamic.images.component_comparison')) }}" alt="Components Chart" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-12 mb-3 mt-2 text-justify">
        {{ __('dynamic.content.component-tab.instructions-3') }}
    </div>
    <div class="col-md-6">
        <h4 class="mh4-custom">{{ __('countries.' . $country->name) }}</h4>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 col-form-label">1. {{ __('dynamic.content.component-tab.select-gasoline') }}</label>
            <div class="col-sm-8">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-gasoline" class="form-select" aria-label="Default select example">
                    <option value="0">{{ __('dynamic.content.component-tab.select-select-gasoline') }}</option>
                    @foreach($gasolineTypes as $i => $gasolineType)
                        <option value="{{ $gasolineType->gasoline_type }}">{{ __('dynamic.content.component-tab.' . $gasolineType->gasoline_type) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 col-form-label">2. {{ __('dynamic.content.component-tab.select-quality') }}</label>
            <div class="col-sm-8">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-quality" class="form-select" aria-label="Default select example">
                    <option value="0">{{ __('dynamic.content.component-tab.select-select-quality') }}</option>
                    @foreach($gasolineGrades as $i => $gasolineGrade)
                        <option value="{{ $gasolineGrade->quality_restriction }}">{{ __('dynamic.content.component-tab.' . $gasolineGrade->quality_restriction) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-2 row">
            <label for="country-compare-gaoline" class="col-sm-5 col-form-label">
                3. {{ __('dynamic.content.component-tab.compare') }} <strong>{{ __('countries.' . $country->name) }}</strong> {{ __('dynamic.content.component-tab.with') }}
            </label>
            <div class="col-sm-7">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-compare-component" class="form-select country-compare-gasoline" aria-label="Default select example">
                    <option value="0" selected>{{ __('dynamic.content.component-tab.compare-select') }}</option>
                    @foreach($countryList as $countryEl)
                        <option value="{{ $countryEl->id }}" @if($tab == 2 && isset($compareCountry) && $compareCountry && $countryEl->id == $compareCountry->id) selected @endif>{{ __('countries.impact-select.' . $countryEl->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="country-compare-gasoline" class="col-sm-5 col-form-label">4. {{ __('dynamic.content.component-tab.select-gasoline') }}</label>
            <div class="col-sm-7">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-compare-gasoline" class="form-select" aria-label="Default select example">
                    <option value="0">{{ __('dynamic.content.component-tab.compare-select-gasoline') }}</option>
                    @if ($tab == 2 && $gasolineCompareTypes)
                        @foreach($gasolineCompareTypes as $i => $gasolineType)
                            <option value="{{ $gasolineType->gasoline_type }}">{{ __('dynamic.content.component-tab.' . $gasolineType->gasoline_type) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="country-compare-quality" class="col-sm-5 col-form-label">5. {{ __('dynamic.content.component-tab.select-quality') }}</label>
            <div class="col-sm-7">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-compare-quality" class="form-select" aria-label="Default select example">
                    <option value="0">{{ __('dynamic.content.component-tab.compare-select-quality') }}</option>
                    @if($tab == 2 && $gasolineCompareGrades)
                        @foreach($gasolineCompareGrades as $i => $gasolineGrade)
                            <option value="{{ $gasolineGrade->quality_restriction }}">{{ __('dynamic.content.component-tab.' . $gasolineGrade->quality_restriction) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 text-right">
        <button id="{{ isset($chart_id) ? $chart_id : 'chart' }}-clean-selects" class="btn btn-primary px-4">{{ __('dynamic.content.component-tab.clean') }}</button>
    </div>
    <div class="col-12 mt-3 text-justify">
        {{ __('dynamic.content.component-tab.instructions-4') }}
    </div>
</div>
<div class="row p-2">
    <div class="col-12">
        <div class="off-white-2 border-radius-5 p-1 mb-3">
            <div class="row">
                <div class="col-12 mt-1 mb-2 pl-5 text-center font-bold">
                    {{ __('dynamic.content.component-tab.prices') }}
                </div>
                <div class="{{ ($tab == 2 && isset($compareCountry) && $compareCountry) ? 'col-6' : 'col-12'}} single-country pl-4 mb-2" id="extra_price_data">
                    <div class="row pl-5">
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e0-price-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e10-price-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e15-price-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e20-price-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e25-price-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e30-price-data"> - </div>
                    </div>
                </div>
                <div class="col-6 pl-5 pr-2 mb-0 compare-country @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) hidden @endif" id="extra_price_data_compare">
                    <div class="row pl-4">
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e0-price-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e10-price-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e15-price-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e20-price-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e25-price-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e30-price-data-compare"> - </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-{{ ($tab == 2 && isset($compareCountry) && $compareCountry) ? '6' : '12'}} single-country">
                    <canvas height="200" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-components">
                        <p>{{ __('dynamic.content.component-tab.chart-fallback-text') }}</p>
                    </canvas>
                </div>
                <div class="col-6 compare-country @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) hidden @endif">
                    <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-components-compare">
                        <p>{{ __('dynamic.content.component-tab.chart-fallback-text') }}</p>
                    </canvas>
                </div>
                <div class="col-{{ ($tab == 2 && isset($compareCountry) && $compareCountry) ? '6' : '12'}} single-country pl-4 mt-4" id="extra_data">
                    <div class="row pl-5">
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e0-ron-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e10-ron-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e15-ron-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e20-ron-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e25-ron-data"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e30-ron-data"> - </div>
                    </div>
                </div>
                <div class="col-6 ml-6 mt-4 compare-country @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) hidden @endif" id="extra_data_compare">
                    <div class="row pl-5">
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e0-ron-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e10-ron-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e15-ron-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e20-ron-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e25-ron-data-compare"> - </div>
                        <div class="col-2 text-center bold" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-e30-ron-data-compare"> - </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-{{ ($tab == 2 && isset($compareCountry) && $compareCountry) ? '6' : '12'}} single-country mt-2 mb-2 text-center font-bold">
                    RON - {{ __('countries.' . $country->name) }} - <span class="restriction-text"></span>
                </div>
                <div class="col-6 mt-2 mb-2 text-center font-bold compare-country ccname @if(!($tab == 2 && isset($compareCountry) && $compareCountry)) hidden @endif">
                    RON - {{ $tab == 2 && isset($compareCountry) && $compareCountry ? __('countries.' . $compareCountry->name) : '' }} - <span class="restriction-text-compare"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-justify">
        {{ __('dynamic.content.component-tab.instructions-5') }}
    </div>
    <div class="col-12 mb-3 mt-2 text-center">
        <button id="{{ isset($chart_id) ? $chart_id : 'chart' }}-download-component-db" class="btn btn-primary px-4 py-1">{{ __('dynamic.content.profile-tab.download-button') }}</button>
    </div>
    <p>
        {{ __('dynamic.content.component-tab.benefits-4') }}
        <br><br>
        <small>
            <i>{{ __('dynamic.content.component-tab.components-notes') }}</i>
        </small>
    </p>
</div>
