<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertValuesReportsTable extends Migration
{
    public function up()
    {
        DB::table('reports')->where('id', '=', 17)->delete();
        DB::table('reports')->where('id', '=', 18)->delete();
        DB::table('reports')->where('id', '=', 19)->delete();

        DB::table('reports')->insert([
            ['country_id' => '1', 'locale_id' => '2', 'report_url' => 'ARGENTINA_ENG.pdf', 'order' => '2', 'active' => '1'],
            ['country_id' => '2', 'locale_id' => '2', 'report_url' => 'BOLIVIA_ENG.pdf', 'order' => '3', 'active' => '1'],
            ['country_id' => '3', 'locale_id' => '2', 'report_url' => 'CHILE_ENG.pdf', 'order' => '4', 'active' => '1'],
            ['country_id' => '4', 'locale_id' => '2', 'report_url' => 'COLOMBIA_ENG.pdf', 'order' => '5', 'active' => '1'],
            ['country_id' => '5', 'locale_id' => '2', 'report_url' => 'COSTA RICA_ENG.pdf', 'order' => '6', 'active' => '1'],
            ['country_id' => '6', 'locale_id' => '2', 'report_url' => 'ECUADOR_ENG.pdf', 'order' => '7', 'active' => '1'],
            ['country_id' => '7', 'locale_id' => '2', 'report_url' => 'EL SALVADOR_ENG.pdf', 'order' => '8', 'active' => '1'],
            ['country_id' => '8', 'locale_id' => '2', 'report_url' => 'GUATEMALA_ENG.pdf', 'order' => '9', 'active' => '1'],
            ['country_id' => '9', 'locale_id' => '2', 'report_url' => 'HONDURAS_ENG.pdf', 'order' => '10', 'active' => '1'],
            ['country_id' => '10', 'locale_id' => '2', 'report_url' => 'JAMAICA_ENG.pdf', 'order' => '11', 'active' => '1'],
            ['country_id' => '11', 'locale_id' => '2', 'report_url' => 'MEXICO_ENG.pdf', 'order' => '12', 'active' => '1'],
            ['country_id' => '12', 'locale_id' => '2', 'report_url' => 'NICARAGUA_ENG.pdf', 'order' => '13', 'active' => '1'],
            ['country_id' => '13', 'locale_id' => '2', 'report_url' => 'PANAMA_ENG.pdf', 'order' => '14', 'active' => '1'],
            ['country_id' => '14', 'locale_id' => '2', 'report_url' => 'PERU_ENG.pdf', 'order' => '15', 'active' => '1'],
            ['country_id' => '15', 'locale_id' => '2', 'report_url' => 'DOMINICAN_REPUBLIC_ENG.pdf', 'order' => '16', 'active' => '1'],
            ['country_id' => '16', 'locale_id' => '2', 'report_url' => 'URUGUAY_ENG.pdf', 'order' => '17', 'active' => '1'],            
        ]);        
    }
}
