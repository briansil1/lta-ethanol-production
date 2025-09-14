<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Emission;
use App\Models\LifeCycleGhg;
use Illuminate\Http\Request;

class GhgController extends Controller
{
    //
    public function getGhgByCountry(Country $country) {
        // if ($emission === 'btx') {
        //     $emission = 'benzene';
        // }
        $emissions_type = ['ghg', 'ghg_redvsbase', 'ghgredvstarget'];

        $red_iis = $country->lifeCycleGhg()->where('methodology', 'RED_II')->get();

        foreach ($red_iis as $red_ii) {
            if("ghg" == $red_ii->emission)
                $ghg_red_ii = $red_ii;
            if("ghg_redvsbase" == $red_ii->emission)
                $ghg_red_ii_redvsbase = $red_ii;
            if("ghgredvstarget" == $red_ii->emission)
                $ghg_red_ii_redvstarget = $red_ii;
        }
        
        $response = [
            'error' => false,
            'data' => [
                'ghg_redii' => $ghg_red_ii ? $ghg_red_ii->toArray() : [],
                'redvsbase_redii' => $ghg_red_ii_redvsbase ? $ghg_red_ii_redvsbase->toArray() : [],
                'redvstarget_redii' => $ghg_red_ii_redvstarget ? $ghg_red_ii_redvstarget->toArray() : [],
            ]
        ];



        $greets = $country->lifeCycleGhg()->where('methodology', 'GREET')->get();
        
        foreach ($greets as $greet) {
            if("ghg" == $greet->emission)
                $ghg_greet = $greet;
            if("ghg_redvsbase" == $greet->emission)
                $ghg_greet_redvsbase = $greet;
            if("ghgredvstarget" == $greet->emission)
                $ghg_greet_redvstarget = $greet;
        }

        $response['data']['ghg_greet'] = $ghg_greet ? $ghg_greet->toArray() : [];
        $response['data']['redvsbase_greet'] = $ghg_greet_redvsbase ? $ghg_greet_redvsbase->toArray() : [];
        $response['data']['redvstarget_greet'] = $ghg_greet_redvstarget ? $ghg_greet_redvstarget->toArray() : [];
    


        
        return response()->json($response);
    }
}