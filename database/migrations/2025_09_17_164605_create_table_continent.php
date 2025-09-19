<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContinent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('continents');

        Schema::create('continents', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('name', 150);
            $table->string('code', 5);
            $table->timestamps();  
        });

        DB::table('continents')->insert([
            [ 'name' => 'Latin-america', 'code' => 'LATAM'],
            [ 'name' => 'Europe', 'code' => 'EURO'],
            [ 'name' => 'Asia-Africa', 'code' => 'AS-AF'],
            [ 'name' => 'General', 'code' => 'GEN'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('continents');
    }
}
