<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRegionIdToCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('countries');

        Schema::create('countries', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('region_id');
            $table->string('name', 150);
            $table->string('code', 5);
            $table->timestamps();  
        });		

        DB::table('countries')->insert([
            ['region_id' => '1', 'name' => 'argentina', 'code' => 'ar'],
            ['region_id' => '1', 'name' => 'bolivia', 'code' => 'bl'],
            ['region_id' => '1', 'name' => 'chile', 'code' => 'cl'],
            ['region_id' => '1', 'name' => 'colombia', 'code' => 'co'],
            ['region_id' => '2', 'name' => 'costa-rica', 'code' => 'cr'],
            ['region_id' => '1', 'name' => 'ecuador', 'code' => 'ec'],
            ['region_id' => '2', 'name' => 'el-salvador', 'code' => 'es'],
            ['region_id' => '2', 'name' => 'guatemala', 'code' => 'gu'],
            ['region_id' => '2', 'name' => 'honduras', 'code' => 'ho'],
            ['region_id' => '3', 'name' => 'jamaica', 'code' => 'ja'],
            ['region_id' => '4', 'name' => 'mexico', 'code' => 'mx'],
            ['region_id' => '2', 'name' => 'nicaragua', 'code' => 'ni'],
            ['region_id' => '2', 'name' => 'panama', 'code' => 'pa'],
            ['region_id' => '1', 'name' => 'peru', 'code' => 'pe'],
            ['region_id' => '3', 'name' => 'dominican-republic', 'code' => 'rd'],
            ['region_id' => '1', 'name' => 'uruguay', 'code' => 'ur'],
            ['region_id' => '1', 'name' => 'reg-caribe', 'code' => 'rc'],
            ['region_id' => '1', 'name' => 'reg-centroamerica', 'code' => 'ca'],
            ['region_id' => '1', 'name' => 'reg-southamerica', 'code' => 'sa'],
            ['region_id' => '1', 'name' => 'reg-southamerica', 'code' => 'sa'],
            ['region_id' => '9', 'name' => 'full-report', 'code' => 'all'],
            ['region_id' => '1', 'name' => 'full-report', 'code' => 'all'],
            ['region_id' => '6', 'name' => 'european-union', 'code' => 'ue'],
            ['region_id' => '4', 'name' => 'united-states-america', 'code' => 'usa'],
            ['region_id' => '5', 'name' => 'latin-america', 'code' => 'la'],
            ['region_id' => '9', 'name' => 'SGS', 'code' => 'sgs']   
        ]);

    

        DB::table('countries')->where('id', '=', 17)->delete();
        DB::table('countries')->where('id', '=', 18)->delete();
        DB::table('countries')->where('id', '=', 19)->delete();
        DB::table('countries')->where('id', '=', 20)->delete();
        DB::table('countries')->where('id', '=', 22)->delete();


        DB::table('countries')->insert([
            ['region_id' => '6', 'name' => 'austria', 'code' => 'au'],
            ['region_id' => '6', 'name' => 'belgium', 'code' => 'be'],
            ['region_id' => '6', 'name' => 'bulgaria', 'code' => 'bu'],
            ['region_id' => '6', 'name' => 'croatia', 'code' => 'hr'],
            ['region_id' => '6', 'name' => 'republicofcyprus', 'code' => 'rc'],
            ['region_id' => '6', 'name' => 'czechrepublic', 'code' => 'cz'],
            ['region_id' => '6', 'name' => 'denmark', 'code' => 'da'],
            ['region_id' => '6', 'name' => 'estonia', 'code' => 'en'],
            ['region_id' => '6', 'name' => 'finland', 'code' => 'fi'],
            ['region_id' => '6', 'name' => 'france', 'code' => 'fr'],
            ['region_id' => '6', 'name' => 'germany', 'code' => 'gm'],
            ['region_id' => '6', 'name' => 'greece', 'code' => 'gr'],
            ['region_id' => '6', 'name' => 'Hungary', 'code' => 'hu'],
            ['region_id' => '6', 'name' => 'Ireland', 'code' => 'ei'],
            ['region_id' => '6', 'name' => 'Italy', 'code' => 'it'],
            ['region_id' => '6', 'name' => 'Latvia', 'code' => 'la'],
            ['region_id' => '6', 'name' => 'Lithuania', 'code' => 'lh'],
            ['region_id' => '6', 'name' => 'Luxembourg', 'code' => 'lu'],
            ['region_id' => '6', 'name' => 'Malta', 'code' => 'mt'],
            ['region_id' => '6', 'name' => 'Netherlands', 'code' => 'nl'],
            ['region_id' => '6', 'name' => 'Poland', 'code' => 'pl'],
            ['region_id' => '6', 'name' => 'Portugal', 'code' => 'po'],
            ['region_id' => '6', 'name' => 'Romania', 'code' => 'ro'],
            ['region_id' => '6', 'name' => 'Slovakia', 'code' => 'lo'],
            ['region_id' => '6', 'name' => 'Slovenia', 'code' => 'si'],
            ['region_id' => '6', 'name' => 'Spain', 'code' => 'sp'],
            ['region_id' => '6', 'name' => 'Sweden', 'code' => 'sw'],
            ['region_id' => '6', 'name' => 'UK', 'code' => 'uk'],
            ['region_id' => '7', 'name' => 'Vietnam', 'code' => 'vm'],
            ['region_id' => '7', 'name' => 'Malaysia', 'code' => 'my'],
            ['region_id' => '7', 'name' => 'Thailand', 'code' => 'th'],
            ['region_id' => '7', 'name' => 'Taiwan', 'code' => 'tw'],
            ['region_id' => '7', 'name' => 'Japan', 'code' => 'ja'],
            ['region_id' => '7', 'name' => 'South Korea', 'code' => 'ks'],
            ['region_id' => '8', 'name' => 'Nigeria', 'code' => 'ni']            
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
