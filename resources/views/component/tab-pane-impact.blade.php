<div class="row p-2">
    <div class="col-md-6">
        <p>
            {{ __('dynamic.content.impact-tab.model-reference') }} <span class="text-underline-blue"><a href="http://www.issrc.org/ive/" target="_blank">{{ __('dynamic.content.impact-tab.model-link-text') }}</a></span>
        </p>
        <p>
            {{ __('dynamic.content.impact-tab.model-rates') }}
        </p>
        <ul class="pl-5">
            <li>{{ __('dynamic.content.impact-tab.model-rates-p-1') }}</li>
            <li>{{ __('dynamic.content.impact-tab.model-rates-p-2') }}</li>
            <li>{{ __('dynamic.content.impact-tab.model-rates-p-3') }}</li>
            <li>{{ __('dynamic.content.impact-tab.model-rates-p-4') }}</li>
        </ul>
        <p>
            {{ __('dynamic.content.impact-tab.calculate-emissions') }}
        </p>
    </div>
    <div class="col-md-6 text-center">
        <img src="{{ asset('images/' . __('dynamic.images.tab-3-data')) }}" class="img-fluid mw-450">
    </div>
    <div class="col-12">
        <p>
            {{ __('dynamic.content.impact-tab.following-shows') }}
            <br><br>
            <small>
                <i>{{ __('dynamic.content.impact-tab.source') }}</i>
            </small>
        </p>
    </div>
</div>
<div class="row p-2">
    <h3>{{ __('dynamic.content.impact-tab.comparative-section') }}</h3>
    <div class="col-md-6">
        <h4>{{ __('countries.' . $country->name) }}</h4>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-5 col-form-label">{{ __('dynamic.content.impact-tab.compare') }} <strong>{{ __('countries.' . $country->name) }}</strong> {{ __('dynamic.content.impact-tab.with') }}</label>
            <div class="col-sm-7">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-compare-impact" class="form-select" aria-label="Default select example">
                    <option value="-1">{{ __('dynamic.content.impact-tab.compare-select') }}</option>
                    @foreach($countryEmissionsList as $countryEl)
                        @if($countryEl->id !== $country->id)
                            <option value="{{ $countryEl->id }}" @if($tab == 3 && isset($compareCountry) && $compareCountry && $countryEl->id == $compareCountry->id) selected @endif>{{ __('countries.impact-select.' . $countryEl->name) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6 align-self-end text-right">
        <button class="btn btn-primary download-impact mb-3">{{ __('dynamic.content.profile-tab.download-button') }}</button>
    </div>
    <div class="col-12 text-left">
        <p class="italic">
            {{ __('dynamic.content.impact-tab.instructions') }}
        </p>
    </div>
</div>
<div class="row p-2 tab-chart-container">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left active" id="v-pills-co2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-co2" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <img src="{{ asset('images/icon-co2.png') }}"> {{ __('dynamic.content.impact-tab.co2') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-pills-thc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-thc" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                <img src="{{ asset('images/icon-thc.png') }}"> {{ __('dynamic.content.impact-tab.thc') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-pills-co-tab" data-bs-toggle="pill" data-bs-target="#v-pills-co" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                <img src="{{ asset('images/icon-co.png') }}"> {{ __('dynamic.content.impact-tab.co') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-pills-pm-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pm" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                <img src="{{ asset('images/icon-pm.png') }}"> {{ __('dynamic.content.impact-tab.pm') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-pills-nox-tab" data-bs-toggle="pill" data-bs-target="#v-pills-nox" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                <img src="{{ asset('images/icon-nox.png') }}"> {{ __('dynamic.content.impact-tab.nox') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-pills-btx-tab" data-bs-toggle="pill" data-bs-target="#v-pills-btx" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                <img src="{{ asset('images/icon-btx.png') }}"> {{ __('dynamic.content.impact-tab.btx') }}
            </a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade tab-co2 show active" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-co2" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-co2">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tab-thc" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-thc" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-thc">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tab-co" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-co" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-co">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tab-pm" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-pm" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pm">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tab-nox" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-nox" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-nox">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade tab-btx" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-pills-btx" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-btx">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div>
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.impact-select.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 3 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-2 last-instructions">
    <div class="d-flex align-items-start text-justify mb-2">
        {{ __('dynamic.content.impact-tab.instructions-2') }}
    </div>
</div>
