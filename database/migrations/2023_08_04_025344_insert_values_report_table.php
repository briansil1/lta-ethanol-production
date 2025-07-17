<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertValuesReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('countries')->insert([
            ['id' => '26', 'name' => 'SGS', 'code' => 'sgs'],
        ]);   

        DB::table('reports')->insert([
            ['country_id' => '26', 'locale_id' => '2', 'report_url' => 'SGS INSPIRE Project on ethanol blending in Latin America_ENG.pdf', 'order' => '18', 'active' => '1'],
            ['country_id' => '26', 'locale_id' => '4', 'report_url' => 'SGS INSPIRE Latinoamérica Mezcla de etanol en la gasolina_ESP.pdf', 'order' => '18', 'active' => '1'],
        ]);   
    }
}
