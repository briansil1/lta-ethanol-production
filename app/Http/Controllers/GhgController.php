<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Emission;
use App\Models\LifeCycleGhg;
use Illuminate\Http\Request;

class GhgController extends Controller
{
    //
    public function getGhgByCountry(Country $country, $methodology = 'co', Country $compare = null) {
        // if ($emission === 'btx') {
        //     $emission = 'benzene';
        // }
        $emissions_type = ['ghg', 'ghg_redvsbase', 'ghgredvstarget'];
        if($methodology === 'redii')
            $methodology = 'RED_II';
        if($methodology === 'greet')
            $methodology = 'GREET';

        $emissions = $country->lifeCycleGhg()->where('methodology', $methodology)->get();

        foreach ($emissions as $emission) {
            if("ghg" == $emission->emission)
                $emission_ghg = $emission;
            if("ghg_redvsbase" == $emission->emission)
                $emission_ghg_redvsbase = $emission;
            if("ghgredvstarget" == $emission->emission)
                $emission_ghg_redvstarget = $emission;
        }
        
        $response = [
            'error' => false,
            'data' => [
                'ghg_emission' => $emission_ghg ? $emission_ghg->toArray() : [],
                'redvsbase_emission' => $emission_ghg_redvsbase ? $emission_ghg_redvsbase->toArray() : [],
                'redvstarget_emission' => $emission_ghg_redvstarget ? $emission_ghg_redvstarget->toArray() : [],
            ]
        ];
        if ($compare) {
            $compare_emissions = $compare->lifeCycleGhg()->where('methodology', $methodology)->get();
            
            foreach ($compare_emissions as $compare_emission) {
                if("ghg" == $compare_emission->emission)
                    $compare_emission_ghg = $compare_emission;
                if("ghg_redvsbase" == $compare_emission->emission)
                    $compare_emission_ghg_redvsbase = $compare_emission;
                if("ghgredvstarget" == $compare_emission->emission)
                    $compare_emission_ghg_redvstarget = $compare_emission;
            }

            $response['data']['compare_emission_ghg'] = $compare_emission_ghg ? $compare_emission_ghg->toArray() : [];
            $response['data']['compare_emission_ghg_redvsbase'] = $compare_emission_ghg_redvsbase ? $compare_emission_ghg_redvsbase->toArray() : [];
            $response['data']['compare_emission_ghg_redvstarget'] = $compare_emission_ghg_redvstarget ? $compare_emission_ghg_redvstarget->toArray() : [];
        }
        return response()->json($response);
    }
}
