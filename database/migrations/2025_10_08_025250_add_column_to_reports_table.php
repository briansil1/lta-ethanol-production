<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            if (!Schema::hasColumn('reports', 'continent_id')) {
                $table->integer('continent_id')->after('id')->default(1);
            }
        });
        
        DB::table('reports')->insert([
            ['continent_id' => '2', 'country_id' => '27', 'locale_id' => '2', 'report_url' => 'AUSTRIA_ENG.pdf', 'order' => '2', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '28', 'locale_id' => '2', 'report_url' => 'BELGIUM_ENG.pdf', 'order' => '3', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '29', 'locale_id' => '2', 'report_url' => 'BULGARIA_ENG.pdf', 'order' => '4', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '30', 'locale_id' => '2', 'report_url' => 'CROATIA_ENG.pdf', 'order' => '5', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '31', 'locale_id' => '2', 'report_url' => 'CYPRUS_ENG.pdf', 'order' => '6', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '32', 'locale_id' => '2', 'report_url' => 'CZECHIA_ENG.pdf', 'order' => '7', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '33', 'locale_id' => '2', 'report_url' => 'DENMARK_ENG.pdf', 'order' => '8', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '34', 'locale_id' => '2', 'report_url' => 'ESTONIA_ENG.pdf', 'order' => '9', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '35', 'locale_id' => '2', 'report_url' => 'FINLAND_ENG.pdf', 'order' => '10', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '36', 'locale_id' => '2', 'report_url' => 'FRANCE_ENG.pdf', 'order' => '11', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '37', 'locale_id' => '2', 'report_url' => 'GERMANY_ENG.pdf', 'order' => '12', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '38', 'locale_id' => '2', 'report_url' => 'GREECE_ENG.pdf', 'order' => '13', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '39', 'locale_id' => '2', 'report_url' => 'HUNGARY_ENG.pdf', 'order' => '14', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '40', 'locale_id' => '2', 'report_url' => 'IRELAND_ENG.pdf', 'order' => '15', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '41', 'locale_id' => '2', 'report_url' => 'ITALY_ENG.pdf', 'order' => '16', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '42', 'locale_id' => '2', 'report_url' => 'LATVIA_ENG.pdf', 'order' => '17', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '43', 'locale_id' => '2', 'report_url' => 'LITHUANIA_ENG.pdf', 'order' => '18', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '44', 'locale_id' => '2', 'report_url' => 'LUXEMBOURG_ENG.pdf', 'order' => '19', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '45', 'locale_id' => '2', 'report_url' => 'MALTA ENG.pdf', 'order' => '20', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '46', 'locale_id' => '2', 'report_url' => 'NETHERLANDS_ENG.pdf', 'order' => '21', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '47', 'locale_id' => '2', 'report_url' => 'POLAND_ENG.pdf', 'order' => '22', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '48', 'locale_id' => '2', 'report_url' => 'PORTUGAL_ENG.pdf', 'order' => '23', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '49', 'locale_id' => '2', 'report_url' => 'ROMANIA_ENG.pdf', 'order' => '24', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '50', 'locale_id' => '2', 'report_url' => 'SLOVAKIA_ENG.pdf', 'order' => '25', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '51', 'locale_id' => '2', 'report_url' => 'SLOVENIA_ENG.pdf', 'order' => '26', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '52', 'locale_id' => '2', 'report_url' => 'SPAIN_ENG.pdf', 'order' => '27', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '53', 'locale_id' => '2', 'report_url' => 'SWEDEN_ENG.pdf', 'order' => '28', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '54', 'locale_id' => '2', 'report_url' => 'UNITED_KINGDOM_ENG.pdf', 'order' => '29', 'active' => '1'],
            ['continent_id' => '2', 'country_id' => '62', 'locale_id' => '2', 'report_url' => 'EUROPE_ENG.pdf', 'order' => '1', 'active' => '1'],
        ]);

        DB::table('reports')->where(['country_id' => '21'])->update(['continent_id' => '1', 'report_url' => 'LATAM_ENG.pdf', 'order' => '1']);
        DB::table('reports')->where(['country_id' => '21'])->update(['continent_id' => '1', 'report_url' => 'LATAM_ESP.pdf', 'order' => '1']);


        //Eliminar SGS Complete report 
        DB::table('reports')->where('country_id', '=', 26)->delete();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::table('reports')->where('country_id', '=', 21)->where('id', '>', 30)->delete(); //Esto es para eliminar el full report de LATAM
        DB::table('reports')->where('country_id', '>', 26)->delete();
    }
}
