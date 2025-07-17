<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Emission;
use App\Models\Vehicles;

class EmissionController extends Controller
{
    public function getEmissionByCountry(Country $country, $emission = 'co', Country $compare = null) {
        // if ($emission === 'btx') {
        //     $emission = 'benzene';
        // }
        $emissions = $country->emissions()->where('emission', $emission)->first();
        $europe = Emission::where('emission', $emission)->where('country_id', env('APP_EUROPE_ID'))->first();
        $usa = Emission::where('emission', $emission)->where('country_id', env('APP_USA_ID'))->first();
        $vehicles_emissions = $country->vehicles()->where('emission', $emission)->first();
        $vehicles_europe = Vehicles::where('emission', $emission)->where('country_id', env('APP_EUROPE_ID'))->first();
        $vehicles_usa = Vehicles::where('emission', $emission)->where('country_id', env('APP_USA_ID'))->first();

        $response = [
            'error' => false,
            'data' => [
                'country' => $emissions ? $emissions->toArray() : [],
                'country_vehicles' => $vehicles_emissions ? $vehicles_emissions->toArray() : [],
                'europe' => $europe ? $europe->toArray() : [],
                'europe_vehicles' => $vehicles_europe ? $vehicles_europe->toArray() : [],
                'usa' => $usa ? $usa->toArray() : [],
                'usa_vehicles' => $vehicles_usa ? $vehicles_usa->toArray() : [],
            ]
        ];
        if ($compare) {
            $compareData = $compare->emissions()->where('emission', $emission)->first();
            $compare_vehicles = $compare->vehicles()->where('emission', $emission)->first();
            $response['data']['compare'] = $compareData ? $compareData->toArray() : [];
            $response['data']['compare_vehicles'] = $compare_vehicles ? $compare_vehicles->toArray() : [];
        }
        return response()->json($response);
    }

}
