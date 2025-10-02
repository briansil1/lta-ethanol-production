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
            $table->string('code', 10);
            $table->timestamps();  
        });

        DB::table('regions')->insert([
            [ 'continent_id' => '1', 'name' => 'south-america', 'code' => 'SUDAM'],
            [ 'continent_id' => '1', 'name' => 'central-americ', 'code' => 'CENAM'],
            [ 'continent_id' => '1', 'name' => 'caribbean', 'code' => 'CARIB'],
            [ 'continent_id' => '1', 'name' => 'north-america', 'code' => 'NORAM'],
            [ 'continent_id' => '1', 'name' => 'latin-america', 'code' => 'LATAM'],
            [ 'continent_id' => '2', 'name' => 'europe', 'code' => 'EURO'],
            [ 'continent_id' => '2', 'name' => 'europa27', 'code' => 'EU27'],
            [ 'continent_id' => '2', 'name' => 'north-europe', 'code' => 'NORE'],
            [ 'continent_id' => '2', 'name' => 'west-europe', 'code' => 'WESE'],
            [ 'continent_id' => '2', 'name' => 'east-europe', 'code' => 'EASE'],
            [ 'continent_id' => '2', 'name' => 'central-europe', 'code' => 'CENE'],
            [ 'continent_id' => '2', 'name' => 'south-europe', 'code' => 'SOUE'],
            [ 'continent_id' => '2', 'name' => 'british-isles', 'code' => 'BRITI'],
            [ 'continent_id' => '3', 'name' => 'eastern-asia', 'code' => 'EASTAS'],
            [ 'continent_id' => '3', 'name' => 'southeast-asia', 'code' => 'SOUTAS'],
            [ 'continent_id' => '3', 'name' => 'africa', 'code' => 'AFR'],
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
