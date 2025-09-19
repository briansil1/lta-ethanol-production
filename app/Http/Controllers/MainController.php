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

class MainController extends Controller
{
    public function home(Request $request, $token = false) {
        $locale = app()->getLocale();
        $base_l = explode('_', $locale)[0];
        $locale = Locale::where('code', $locale)->first();
        if (empty($locale)) {
            $locale = Locale::where('code', $base_l)->first();
        }
        $reports = $locale->reports()->where('active', 1)->orderBy('order', 'asc')->get();
        return view('home', [
            'reports' => $reports,
            'token' => $token
        ]); 
    }

    public function tools(Request $request, $tab = '1', Country $country = null, Country $compareCountry = null) {
        if (!Auth::check()) {
            return redirect(route(__('routes.home')));
        }

        // if (!session('continent_iddsd')) {
        //     return redirect(route(__('routes.home')));
        // }

        // if (!session('continent_iddsd')) {
        //     return redirect(route(__('routes.home')));
        // }
       
        $continent_id = session('continent_id');

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
        $countries = Country::whereIn('id', $c_ids)->get();

        if (empty($country)) {
            return view('dynamic', [
                'tab' => $tab,
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
            'gasolineCompareGrades' => $gasolineCompareGrades
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
}
