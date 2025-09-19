<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('regions');

        Schema::create('regions', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('continent_id');
            $table->string('name', 150);
            $table->string('code', 5);
            $table->timestamps();  
        });

        DB::table('regions')->insert([
            [ 'continent_id' => '1', 'name' => 'south-america', 'code' => 'SUDAM'],
            [ 'continent_id' => '1', 'name' => 'central-americ', 'code' => 'CENAM'],
            [ 'continent_id' => '1', 'name' => 'caribbean', 'code' => 'CARIB'],
            [ 'continent_id' => '1', 'name' => 'north-america', 'code' => 'NORAM'],
            [ 'continent_id' => '1', 'name' => 'latin-america', 'code' => 'LATAM'],
            [ 'continent_id' => '2', 'name' => 'europe', 'code' => 'EURO'],
            [ 'continent_id' => '3', 'name' => 'asia', 'code' => 'ASIA'],
            [ 'continent_id' => '3', 'name' => 'africa', 'code' => 'AFRI'],
            [ 'continent_id' => '4', 'name' => 'general', 'code' => 'GEN'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
