<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGasolineComponentsGuatemala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
         DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'equivalent-gasoline-e0',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 88.0541406650125, 'bno_rvp' => 5.02983607264443, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e10',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 82.3651676260332, 'bno_rvp' => 5.35062239702153, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e15',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 80.2016804273673, 'bno_rvp' => 5.03905800736102, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e20',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 76.1591997501438, 'bno_rvp' => 5.33916678469839, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e25',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 71.051163659426, 'bno_rvp' => 5.4501755729333, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e30',
        'gasoline_type' => 'ordinary'])
            ->update(['bno_on' => 70.5714286285431, 'bno_rvp' => 5.41719638031321, 'Logistica' => 0.1]);




            
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'equivalent-gasoline-e0',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 91.9703584135059, 'bno_rvp' => 5.25353859419466, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e10',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 86.0518219206249, 'bno_rvp' => 5.5901155663705, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e15',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 83.7356554569761, 'bno_rvp' => 5.26109706035682, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e20',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 79.5276028133045, 'bno_rvp' => 5.57530983519401, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e25',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 74.00211168927, 'bno_rvp' => 5.67653618465169, 'Logistica' => 0.1]);
        DB::table('gasoline_components')->where(['country_id' => '8', 'quality_restriction' => 'constant-octane-number', 'blendstoks' => 'gasoline-e30',
        'gasoline_type' => 'Superior'])
            ->update(['bno_on' => 73.5208490833153, 'bno_rvp' => 5.63736001927635, 'Logistica' => 0.1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
