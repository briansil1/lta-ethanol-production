<?php

namespace App\Http\Controllers;

use App\Models\Country;

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
}
