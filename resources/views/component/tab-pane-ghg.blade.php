<div class="row p-4">
    <p>
        {{ __('dynamic.content.ghg-tab.first-paragraph') }}
    </p>    
</div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.ghg-tab.circular-graph-title-greet') }}</h4>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.life_cycle_emmision')) }}" class="img-fluid" onerror="if (this.src != '/images/{{ __('dynamic.images.imports_default') }}') this.src = '/images/{{ __('dynamic.images.imports_default') }}';">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.ghg-tab.ipcc-graph-title-greet') }}</h4>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.ghg_fuels_per_year')) }}" class="img-fluid">
            </div>
        </div>
    </div>
    <br>
    <small>
        <i>{{ __('dynamic.content.ghg-tab.graph-source') }}</i>
    </small>
</div>



<div class="row p-4">
    <p>
        {{ __('dynamic.content.ghg-tab.second-paragraph') }}
    </p>
</div>

<div class="row p-4">
    <p>
        {{ __('dynamic.content.ghg-tab.third-paragraph') }}
    </p>
</div>

<div class="row p-2">
    <h3>{{ __('dynamic.content.impact-tab.comparative-section') }}</h3>
    <div class="col-md-6">
        <h4>{{ __('countries.' . $country->name) }}</h4>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-5 col-form-label">{{ __('dynamic.content.impact-tab.compare') }} <strong>{{ __('countries.' . $country->name) }}</strong> {{ __('dynamic.content.impact-tab.with') }}</label>
            <div class="col-sm-7">
                <select id="{{ isset($chart_id) ? $chart_id : 'chart' }}-country-compare-ghg" class="form-select" aria-label="Default select example">
                    <option value="-1">{{ __('dynamic.content.impact-tab.compare-select') }}</option>
                    @foreach($countryEmissionsList as $countryEl)
                        @if($countryEl->id !== $country->id)
                            <option value="{{ $countryEl->id }}" @if($tab == 4 && isset($compareCountry) && $compareCountry && $countryEl->id == $compareCountry->id) selected @endif>{{ __('countries.impact-select.' . $countryEl->name) }}</option>
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
<div class="row p-2 tab-chartghg-container">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-ghg-tab" role="tablist" aria-orientation="vertical">
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left active" id="v-ghg-redii-tab" data-bs-toggle="pill" data-bs-target="#v-ghg-redii" type="button" role="tab" aria-controls="v-ghg-home" aria-selected="true">
                <img src="{{ asset('images/icon-ghg.png') }}"> {{ __('dynamic.content.ghg-tab.ghg_redii') }}
            </a>
            <a href="#" style="margin-bottom: 5px; padding: 8px 5px;" class="off-white-2 btn oswald text-left" id="v-ghg-greet-tab" data-bs-toggle="pill" data-bs-target="#v-ghg-greet" type="button" role="tab" aria-controls="v-ghg-profile" aria-selected="false">
                <img src="{{ asset('images/icon-ghg.png') }}"> {{ __('dynamic.content.ghg-tab.ghg_greet') }}
            </a>
        </div>
        <div class="tab-content" id="v-ghg-tabContent">
            <div class="tab-pane fade tab-redii show active" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-ghg-redii" role="tabpanel" aria-labelledby="v-ghg-home-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-redii">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                {{-- <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div> --}}
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                            </div>
                        </div>
                        <div class="col-12 target">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 4 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 4 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-pane fade tab-greet" id="{{ isset($chart_id) ? $chart_id : 'chart' }}-ghg-greet" role="tabpanel" aria-labelledby="v-ghg-profile-tab">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 canvas-container">
                            <canvas id="{{ isset($chart_id) ? $chart_id : 'chart' }}-greet">
                                <p>{{ __('dynamic.content.impact-tab.graphics-fallback-text') }}</p>
                            </canvas>
                        </div>
                        <div class="col-12 vehicles-stop">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                {{-- <div class="col-12 text-center mb-2">{{ __('dynamic.content.impact-tab.vehicles-stop-circulating') }}</div> --}}
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                            </div>
                        </div>
                        <div class="col-12 target">
                            <div class="row m-0 pt-3 pb-1 px-0">
                                <div class="col-2 text-center e0"> xxx </div>
                                <div class="col-2 text-center e10"> xxx </div>
                                <div class="col-2 text-center e15"> xxx </div>
                                <div class="col-2 text-center e20"> xxx </div>
                                <div class="col-2 text-center e25"> xxx </div>
                                <div class="col-2 text-center e30"> xxx </div>
                                <div class="col-12 text-center mt-3 {{ ($tab == 4 && isset($compareCountry) && $compareCountry) ? '' : 'hidden' }}">
                                    <span class="impact-vehicles">{{ __('countries.' . $country->name) }}</span> | <span class="impact-vehicles-compare">{{ ($tab == 4 && isset($compareCountry) && $compareCountry) ? __('countries.impact-select.' . $compareCountry->name) : ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>