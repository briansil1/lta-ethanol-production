<div class="row p-2">
    <div class="col-md-6">
        <h3>{{ __('dynamic.content.profile-tab.profile-title') }}</h3>
        <p>
            {{ isset($supplyText) && !empty($supplyText) ? $supplyText->content : __('no-text') }}
        </p>
    </div>
    <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
        <img class="mw-160" src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.icon')) }}" alt="Mapa {{ __('countries.' . $country->name) }}">
        <h3>{{ __('countries.' . $country->name) }}</h3>
    </div>
</div>
<div class="row p-2">
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.profile-tab.production-title') }}</h4>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.production')) }}" class="img-fluid img-production" onerror="if (this.src != '/images/{{ __('dynamic.images.prod_default') }}') this.src = '/images/{{ __('dynamic.images.prod_default') }}';">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.profile-tab.gasoline-components-title') }}</h4>
                <p class="m-0 text-left">{{ __('dynamic.content.profile-tab.gasoline-components-text') }}</p>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.components')) }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="row p-2">
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.profile-tab.import-title') }}</h4>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.import')) }}" class="img-fluid" onerror="if (this.src != '/images/{{ __('dynamic.images.imports_default') }}') this.src = '/images/{{ __('dynamic.images.imports_default') }}';">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="mb-auto p-2 bd-highlight text-center w-100">
                <h4 class="m-0">{{ __('dynamic.content.profile-tab.demand-title') }}</h4>
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.demand')) }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="row p-2">
    <div class="col-12">
        <h4>{{ __('dynamic.content.profile-tab.ethanol-title') }}</h4>
        <p>
            {{ isset($ethanolText) && !empty($ethanolText) ? $ethanolText->content : __('no-text') }}
        </p>
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 off-white-2 border-radius-5 p-1 min-height-350">
            <div class="p-2 bd-highlight">
                <img src="{{ asset('images/' . $country->name . '/' . __('dynamic.images.ethanol')) }}" class="img-fluid" onerror="if (this.src != '/images/{{ __('dynamic.images.ethanol_default') }}') this.src = '/images/{{ __('dynamic.images.ethanol_default') }}';">
            </div>
        </div>
    </div>
</div>
<div class="row p-2">
    <div class="col-12">
        <h4>{{ __('dynamic.content.profile-tab.comparative-section') }}</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="#" class="col-sm-6 col-form-label">
                        {{ __('dynamic.content.profile-tab.compare') }} <strong>{{ __('countries.' . $country->name) }}</strong> {{ __('dynamic.content.profile-tab.with') }}
                    </label>
                    <div class="col-sm-6">
                        <select class="form-select country-compare" aria-label="Default select example">
                            <option selected>{{ __('dynamic.content.profile-tab.compare-select') }}</option>
                            @foreach($countryList as $countryEl)
                                @if($countryEl->id !== $country->id)
                                    <option value="{{ $countryEl->id }}" @if($tab == 1 && isset($compareCountry) && $compareCountry && $countryEl->id == $compareCountry->id) selected @endif>{{ __('countries.' . $countryEl->name) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary download-profile">{{ __('dynamic.content.profile-tab.download-button') }}</button>
            </div>
        </div>
        <div class="table-responsive">
            <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tbody>
                <tr  class="table-titles">
                    <td></td>
                    <td colspan="{{ count($profileData) }}">{{ __('countries.' . $country->name) }}</td>
                    @if($tab == 1 && $compareProfileData && count($compareProfileData) > 0)
                        <td colspan="{{ count($compareProfileData) }}">{{ __('countries.' . $compareCountry->name) }}</td>
                    @endif
                    <td colspan="{{ count($europeData) }}">{{ __('countries.' . $europeUnion->name) }}</td>
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-name', 'profileData' => $profileData, 'row' => 'name', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-implementation', 'profileData' => $profileData, 'row' => 'implementation_date', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-applicability', 'profileData' => $profileData, 'row' => 'applicability', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-selected-grade', 'profileData' => $profileData, 'row' => 'selected_grade', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-benzene-content', 'profileData' => $profileData, 'row' => 'benzene_content', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-aromatics', 'profileData' => $profileData, 'row' => 'aromatics', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-olefins', 'profileData' => $profileData, 'row' => 'olefins', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-leads', 'profileData' => $profileData, 'row' => 'lead_content', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-magnanese', 'profileData' => $profileData, 'row' => 'magnanese', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-ron', 'profileData' => $profileData, 'row' => 'ron', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-mon', 'profileData' => $profileData, 'row' => 'mon', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-aki', 'profileData' => $profileData, 'row' => 'aki', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-sulfur', 'profileData' => $profileData, 'row' => 'sulfur_content', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-oxygen', 'profileData' => $profileData, 'row' => 'oxygen_content', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-ethanol', 'profileData' => $profileData, 'row' => 'ethanol', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-pvr-summer', 'profileData' => $profileData, 'row' => 'rvp_summer', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-pvr-winter', 'profileData' => $profileData, 'row' => 'rvp_winter', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-pvr-transition', 'profileData' => $profileData, 'row' => 'rvp_winter', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-mtbe', 'profileData' => $profileData, 'row' => 'mtbe', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                <tr>
                    @include('component.table-row', ['rowName' => 'header-ether', 'profileData' => $profileData, 'row' => 'ethers', 'europeData' => $europeData, 'compareProfileData' => $compareProfileData])
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
