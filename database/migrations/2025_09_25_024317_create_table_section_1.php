<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSection1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('global_section_1');

        Schema::create('global_section_1', function (Blueprint $table) {
          $table->collation = 'utf8mb4_unicode_ci';
          $table->id();
          $table->integer('region_id');
          $table->string('tipo', 1);
          $table->string('country_id', 5);
          $table->float('gasoline_demand_lt', 15, 4)->nullable();
          $table->float('gasoline_demand_gl', 15, 4)->nullable();
          $table->string('gasoline_growth_porc', 5)->nullable();
          $table->float('e0', 8, 2)->nullable();
          $table->float('gasoline_prod_lt', 15, 4)->nullable();
          $table->float('gasoline_prod_gl', 15, 4)->nullable();
          $table->float('gasoline_import_lt', 15, 4)->nullable();
          $table->float('gasoline_import_gl', 15, 4)->nullable();
          $table->float('ethanol_demand_lt', 15, 4)->nullable();
          $table->float('ethanol_demand_gl', 15, 4)->nullable();
          $table->float('ethanol_prod_lt', 15, 4)->nullable();
          $table->float('ethanol_prod_gl', 15, 4)->nullable();
          $table->float('e0_lt', 15, 4)->nullable();
          $table->float('e10_lt', 15, 4)->nullable();
          $table->float('e15_lt', 15, 4)->nullable();
          $table->float('e20_lt', 15, 4)->nullable();
          $table->float('e25_lt', 15, 4)->nullable();
          $table->float('e30_lt', 15, 4)->nullable();
          $table->float('e0_gl', 15, 4)->nullable();
          $table->float('e10_gl', 15, 4)->nullable();
          $table->float('e15_gl', 15, 4)->nullable();
          $table->float('e20_gl', 15, 4)->nullable();
          $table->float('e25_gl', 15, 4)->nullable();
          $table->float('e30_gl', 15, 4)->nullable();
          $table->float('ron', 20, 14)->nullable();
          $table->float('vehicle_fleet', 15, 10)->nullable();
          $table->timestamps();  
        });

        DB::table('volume_quality')->insert([

//textos de inserción
        ]);





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_section_1');
    }
}
