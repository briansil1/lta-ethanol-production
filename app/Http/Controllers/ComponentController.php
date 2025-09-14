<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ComponentController extends Controller {

    public $components = [
        'catalytic_gasoline' => '#006680',
        'reformate' => '#762157',
        'isomerate' => '#ffa400',
        'alkylate' => '#d18316',
        'isobutane' => '#3d7dca',
        'normal_butane' => '#003e6a',
        'isopentane' => '#7F7362',
        
        'coker_naphtha' => '#694230',
        'heavy_naphtha' => '#aa2d2a',
        'light_primary_naphtha' => '#5b6770',
        'domestic_naphtha' => '#003e6a',
        'high_octane_blendstock' => '#5b6770',
        'mtbe' => '#f6cf3f',
        'aromatics' => '#522d6d',
        'raffinate' => '#694230',
        'normal_pentane' => '#B43286',
        'hydrocracked_gasoline' => '#F9EDB9',
        'low_octane_blendstock' => '#003e6a',
        'ethanol' => '#6ba53a',
    ];

    public function getComponentsByCountry(Country $country, $gasoline = 'co', $grade = 1, Country $compare = null) {
        $components = $country->gasolineComponents()->where('gasoline_type', $gasoline)->where('quality_restriction', $grade)->get();
        $componentBlendstoks = [];
        foreach ($components as $component) {
            $current_components = [];
            foreach ($this->components as $componentIndex => $color) {
                if ($component->{$componentIndex}) {
                    $current_components[] = [
                        'index' => $componentIndex,
                        'color' => $color,
                        'value' => intval($component->{$componentIndex})/100,
                    ];
                }
            }
            $componentBlendstoks[$component->blendstoks] = [
                'component' => $component,
                'values' => $current_components
            ];
        }
        $response = [
            'error' => false,
            'data' => [
                'component' => $componentBlendstoks,
            ]
        ];
        if ($compare) {
            $compareData = $compare->gasolineComponents()->where('gasoline_type', $gasoline)->where('quality_restriction', $grade)->get();
            $cComponentBlendstoks = [];
            foreach ($compareData as $cComponent) {
                $cComponentBlendstoks[$cComponent->blendstoks] = $cComponent;
            }
            $response['data']['compare'] = $cComponentBlendstoks;
        }
        return response()->json($response);
    }

    public function getComponentsList(Country $country) {
        $resultG = [[
            'gasoline_type' => 0,
            'gasoline_option_name' => __('dynamic.content.component-tab.select-select-gasoline')
        ]];
        $resultQ = [[
            'quality_restriction' => 0,
            'quality_option_name' => __('dynamic.content.component-tab.select-select-quality')
        ]];
        foreach ($country->gasolineComponents()->select('gasoline_type')->groupBy('gasoline_type')->get() as $gasolineC) {
            $resultG[] = [
                'gasoline_type' => $gasolineC->gasoline_type,
                'gasoline_option_name' => __('dynamic.content.component-tab.' . $gasolineC->gasoline_type)
            ];
        }
        foreach ($country->gasolineComponents()->select('quality_restriction')->groupBy('quality_restriction')->get() as $gasolineC) {
            $resultQ[] = [
                'quality_restriction' => $gasolineC->quality_restriction,
                'quality_option_name' => __('dynamic.content.component-tab.' . $gasolineC->quality_restriction)
            ];
        }
        return response()->json([
            'error' => false,
            'data' => [
                'country' => $country,
                'gasoline' => $resultG,
                'quality' => $resultQ
            ],
        ]);
    }



    public function getPriceUpdateResults(Country $country, $gasoline_regular = 1, $gasoline_premium = 1, $normal_butane = 1, $ethanol = 1, $emtbe = 1, $btx_weighted = 1) {

        //Step 2
        $octane_difference = 93-87;
        $octane_adjust = ($gasoline_premium - $gasoline_regular) / $octane_difference;
        $var = pow(9,1.25);
        $rvp_adjust = ($gasoline_regular - $normal_butane + (5 * $octane_adjust)) / (pow(9,1.25) - pow(51.7,1.25) );

        //Step 3
        $quality_restrictions = $country->gasolineComponents()->select('quality_restriction')->distinct()
                    ->pluck('quality_restriction'); 
        foreach ($quality_restrictions as $quality_restriction){
            $gasoline_types = $country->gasolineComponents()->where('quality_restriction', $quality_restriction)->distinct()
                    ->pluck('gasoline_type'); 
            foreach ($gasoline_types as $gasoline_type) {
                $blendstoks_constant_octane_rows = [];
                //Spec.- aromatics fields responds to the name BTX
                $blendstoks_constant_octane = $country->gasolineComponents()->select('id', 'blendstoks', 'bno_on', 'bno_rvp', 'logistica', 'price', 'mtbe', 'aromatics', 'ethanol')
                ->where('gasoline_type', $gasoline_type)->where('quality_restriction', $quality_restriction)->get();

                foreach ($blendstoks_constant_octane as $blendstok_constant_octane) {
                    //Step 4
                    $bno =  ( $gasoline_regular + ($blendstok_constant_octane->bno_on - 92) * $octane_adjust ) + ((pow($blendstok_constant_octane->bno_rvp,1.25) - pow(9,1.25)) * $rvp_adjust );
                    $db_mtbe = $blendstok_constant_octane->mtbe == 'NULL' ? 0 : str_replace('%','', $blendstok_constant_octane->mtbe);
                    $db_mtbe = $db_mtbe == 0 ? 0 : $db_mtbe / 100;
                    $db_btx = $blendstok_constant_octane->aromatics == 'NULL' ? 0 : str_replace('%','', $blendstok_constant_octane->aromatics);
                    $db_btx = $db_btx == 0 ? 0 : $db_btx / 100;
                    $db_ethanol = $blendstok_constant_octane->ethanol == 'NULL' ? 0 : str_replace('%','', $blendstok_constant_octane->ethanol);
                    $db_ethanol = $db_ethanol == 0 ? 0 : $db_ethanol / 100;
                    $blendstoks_constant_octane_rows[str_replace('-', '_', $blendstok_constant_octane->blendstoks)] = [
                        'price' => $blendstok_constant_octane->price,
                        'bno_on' => $blendstok_constant_octane->bno_on,
                        'bno_rvp' => $blendstok_constant_octane->bno_rvp,
                        'logistica' => $blendstok_constant_octane->logistica,
                        'bno' => $bno, //BNO
                        'estimate_price' => round( (((1-$db_mtbe - $db_btx - $db_ethanol) * $bno ) + $db_mtbe * $emtbe + $db_btx * $btx_weighted + $db_ethanol * $ethanol + $blendstok_constant_octane->logistica),2)
                    ];
                }

                // $locale = App::currentLocale();

                // $json_language = __('dynamic.content.component-tab');  // $dic[$gasoline_type];
                // $var_gasoline = $json_language[$gasoline_type];

                $var_gasoline = __('dynamic.content.component-tab.' . $gasoline_type);

                $gasoline_type_rows[$var_gasoline] = [
                        'blendstok_constant' => $blendstoks_constant_octane_rows
                    ];
            }
            
            $gasoline_quality_rows[str_replace('-', '_', $quality_restriction)] = [
                    'gasoline_type_rows' => $gasoline_type_rows
                ];
        }

        $response = [
            'error' => false,
            'data' => [
                'gasoline_quality_rows' => $gasoline_quality_rows,
                'hola' => $rvp_adjust
            ]
        ];
        return response()->json($response);
 
    }
}
