<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsiaReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Example: Check if a country with a specific id already exists
        if (!DB::table('countries')->where('id', 62)->exists()) {
             DB::table('countries')->insert([
            ['region_id' => '15', 'name' => 'full-report', 'code' => 'ge'],
            ]);
        }

        if (!DB::table('countries')->where('id', 63)->exists()) {
             DB::table('countries')->insert([
            ['region_id' => '6', 'name' => 'full-report', 'code' => 'gee'],
            ]);
        }


        DB::table('reports')->insert([
            ['country_id' => '59', 'locale_id' => '2', 'report_url' => 'JAPAN_ENG.pdf', 'continent_id' => '3', 'order' => '2', 'active' => '1'],
            ['country_id' => '56', 'locale_id' => '2', 'report_url' => 'MALAYSIA_ENG.pdf', 'continent_id' => '3', 'order' => '3', 'active' => '1'],
            ['country_id' => '61', 'locale_id' => '2', 'report_url' => 'NIGERIA_ENG.pdf', 'continent_id' => '3', 'order' => '4', 'active' => '1'],
            ['country_id' => '60', 'locale_id' => '2', 'report_url' => 'SOUTH_KOREA_ENG.pdf', 'continent_id' => '3', 'order' => '5', 'active' => '1'],
            ['country_id' => '58', 'locale_id' => '2', 'report_url' => 'TAIWAN_ENG.pdf', 'continent_id' => '3', 'order' => '6', 'active' => '1'],
            ['country_id' => '57', 'locale_id' => '2', 'report_url' => 'THAILAND_ENG.pdf', 'continent_id' => '3', 'order' => '7', 'active' => '1'],
            ['country_id' => '55', 'locale_id' => '2', 'report_url' => 'VIETNAM_ENG.pdf', 'continent_id' => '3', 'order' => '8', 'active' => '1'],
            ['country_id' => '62', 'locale_id' => '2', 'report_url' => 'ASIA_AFRICA_ENG.pdf', 'continent_id' => '3', 'order' => '1', 'active' => '1'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('reports')->where('country_id', '>', 54)->delete();
    }
}
