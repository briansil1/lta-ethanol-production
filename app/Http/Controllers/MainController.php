<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Emission;
use App\Models\Locale;
use App\Models\Profile;
use App\Models\Report;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Session;
use App\Models\Continent;

class MainController extends Controller
{
    public function home(Request $request, $token = false) {

        $continent_name = __('main.content.america');

        $locale = app()->getLocale();
        $base_l = explode('_', $locale)[0];
        $locale = Locale::where('code', $locale)->first();
        if (empty($locale)) {
            $locale = Locale::where('code', $base_l)->first();
        }
        $reports = $locale->reports()->where('active', 1)->orderBy('order', 'asc')->get();
        return view('home', [
            'reports' => $reports,
            'token' => $token,
            'continent_id' => 1,
            'continent_name' => $continent_name,
        ]); 
    }

    public function homeContinent($continent_id = null, $token = false) {

        switch ($continent_id) {
            case 1:
                $continent_name = __('main.content.america');
                break;
            case 2:
                $continent_name = __('main.content.europe');
                break;
            case 3:
                $continent_name = __('main.content.asia-africa');
                break;
            default:
                $continent_name = __('main.content.america');
        }

        $locale = app()->getLocale();
        $base_l = explode('_', $locale)[0];
        $locale = Locale::where('code', $locale)->first();
        if (empty($locale)) {
            $locale = Locale::where('code', $base_l)->first();
        }
        $reports = $locale->reports()->where('active', 1)->where('continent_id', $continent_id)->get();
        return view('home', [
            'reports' => $reports,
            'token' => $token,
            'continent_id' => $continent_id,
            'continent_name' => $continent_name,
        ]); 
    }

    public function tools(Request $request, $tab = '1', Country $country = null, Country $compareCountry = null) {
        if (!Auth::check()) {
            return redirect(route(__('routes.home')));
        }

        if (!session('continent_id')) {
            return redirect(route('logout-session'));
        }
       
        $continent_id = session('continent_id');
        $continent_text = session('continent_text');

        $locale = app()->getLocale();
        $base_l = explode('_', $locale)[0];
        $locale = Locale::where('code', $locale)->first();
        if (empty($locale)) {
            $locale = Locale::where('code', $base_l)->first();
        }

        // $country_profiles = Profile::select('country_id')->where('country_id', '<>', env('APP_EUROPE_ID'))->groupBy('country_id')->get();
        $country_profiles = Profile::join('countries', 'countries.id', '=', 'profiles.country_id')
            ->join('regions', 'regions.id', '=', 'countries.region_id')
            ->join('continents', 'continents.id', '=', 'regions.continent_id')
            ->where('continents.id', $continent_id)
            ->select('country_id')->where('country_id', '<>', env('APP_EUROPE_ID'))->groupBy('country_id')->orderBy('country_id', 'asc')->get();
        $c_ids = [];

        foreach ($country_profiles as $profile) {
            $c_ids[] = $profile->country_id;
        }
        $countries = Country::whereIn('id', $c_ids)->orderBy('name', 'asc')->get();

        if (empty($country)) {
            return view('dynamic', [
                'tab' => $tab,
                'continent_id' => $continent_id,
                'continent_text' => $continent_text,
                'countryList' => $countries
            ]);
        }

        $country_emissions = Emission::select('country_id')
            ->where('country_id', '<>', env('APP_EUROPE_ID'))
            ->where('country_id', '<>', env('APP_USA_ID'))
            ->groupBy('country_id')->get();
        $c_ids = [];
        foreach ($country_emissions as $cemissions) {
            $c_ids[] = $cemissions->country_id;
        }
        $countriesE = Country::whereIn('id', $c_ids)->get();

        $europeUnion = Country::find(env('APP_EUROPE_ID'));

        $profileData = $locale->profiles()->where('country_id', $country->id)->orderBy('order', 'asc')->get();
        $europeData = $locale->profiles()->where('country_id', env('APP_EUROPE_ID'))->orderBy('order', 'asc')->get();

        $compareProfile = null;
        $gasolineCompareTypes = null;
        $gasolineCompareGrades = null;
        if ($compareCountry) {
            $compareProfile = $locale->profiles()->where('country_id', $compareCountry->id)->orderBy('order', 'asc')->get();
            $gasolineCompareTypes = $compareCountry->gasolineComponents()->select('gasoline_type')->groupBy('gasoline_type')->get();
            $gasolineCompareGrades = $compareCountry->gasolineComponents()->select('quality_restriction')->groupBy('quality_restriction')->get();
        }

        $supplyText = $locale->dynamicToolsTexts()->where('country_id', $country->id)->where('key', 'gasoline_demand')->first();
        $ethanolText = $locale->dynamicToolsTexts()->where('country_id', $country->id)->where('key', 'ethanol_text')->first();

        $gasoline_types = $country->gasolineComponents()->select('gasoline_type')->groupBy('gasoline_type')->get();
        $gasoline_grades = $country->gasolineComponents()->select('quality_restriction')->groupBy('quality_restriction')->get();
 
        return view('dynamic', [
            'tab' => $tab,
            'country' => $country,
            'europeUnion' => $europeUnion,
            'profileData' => $profileData,
            'europeData' => $europeData,
            'countryList' => $countries,
            'countryEmissionsList' => $countriesE,
            'compareCountry' => $compareCountry,
            'compareProfileData' => $compareProfile,
            'supplyText' => $supplyText,
            'ethanolText' => $ethanolText,
            'gasolineTypes' => $gasoline_types,
            'gasolineGrades' => $gasoline_grades,
            'gasolineCompareTypes' => $gasolineCompareTypes,
            'gasolineCompareGrades' => $gasolineCompareGrades,
            'continent_id' => $continent_id
        ]);
    }

    public function setLocale(Request $request) {
        $request->validate([
            'new_locale' => ['required', Rule::in(['es', 'en', 'fr'])],
            'route' => 'required|string|min:4'
        ]);

        $request->session()->put('locale', $request->new_locale);
        redirect(route($request->route));
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function getPDFs(Request $request, Report $report)
    {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . $report->report_url))) {
            return response()->download(base_path('storage/app/pdfs/' . $report->report_url));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . $report->report_url);
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadProfile() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-pdf-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.profile-pdf-filename'));
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadProfileEurope() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-europe-pdf-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-europe-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.profile-europe-pdf-filename'));
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadProfileAsiaAfrica() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-asia-africa-pdf-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.profile-asia-africa-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.profile-asia-africa-pdf-filename'));
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadComponents() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename'));
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadComponentsEurope() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-europe-pdf-filename')))) { 
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-europe-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.component-europe-pdf-filename'));
        }
    }

    /**
     * @throws AuthenticationException
     * @throws FileNotFoundException
     */
    public function downloadComponentsAsiaAfrica() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename')))) { //component-asia-africa-pdf-filename
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.component-pdf-filename'));
        }
    }

    public function downloadEmission() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename'));
        }
    }

    public function downloadEmissionEurope() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-europe-filename')))) { 
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-europe-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.emission-europe-filename'));
        }
    }

    public function downloadEmissionAsiaAfrica() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename')))) { //emission-asia-africa-filename
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.emission-filename'));
        }
    }

    public function downloadGhg() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename')))) {
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename'));
        }
    }

    public function downloadGhgEurope() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-europe-filename')))) { 
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-europe-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-europe-filename'));
        }
    }

    public function downloadGhgAsiaAfrica() {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        if (file_exists(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename')))) { //ghg-asia-africa-filename
            return response()->download(base_path('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename')));
        } else {
            throw new FileNotFoundException('storage/app/pdfs/' . __('dynamic.pdf-files.ghg-filename'));
        }
    }

    

    public function toolsContinent($continent_id = null) {
        if (!Auth::check()) {
            return redirect(route(__('routes.home')));
        }

        if (!session('continent_id')) {
            return redirect(route('logout-session'));
        }
       
        Session::put('continent_id', $continent_id);

        $continent = Continent::find($continent_id);
        if(!empty($continent)){
            Session::put('continent_text', $continent->name);
            $continent_text = $continent->name;
        }

        $locale = app()->getLocale();
        $base_l = explode('_', $locale)[0];
        $locale = Locale::where('code', $locale)->first();
        if (empty($locale)) {
            $locale = Locale::where('code', $base_l)->first();
        }

        // $country_profiles = Profile::select('country_id')->where('country_id', '<>', env('APP_EUROPE_ID'))->groupBy('country_id')->get();
        $country_profiles = Profile::join('countries', 'countries.id', '=', 'profiles.country_id')
            ->join('regions', 'regions.id', '=', 'countries.region_id')
            ->join('continents', 'continents.id', '=', 'regions.continent_id')
            ->where('continents.id', $continent_id)
            ->select('country_id')->where('country_id', '<>', env('APP_EUROPE_ID'))->groupBy('country_id')->get();
        $c_ids = [];

        foreach ($country_profiles as $profile) {
            $c_ids[] = $profile->country_id;
        }
        $countries = Country::whereIn('id', $c_ids)->orderBy('name', 'asc')->get();

        if (empty($country)) {
            return view('dynamic', [
                'tab' => 1,
                'continent_id' => $continent_id,
                'continent_text' => $continent_text,
                'countryList' => $countries
            ]);
        }
    }
}
