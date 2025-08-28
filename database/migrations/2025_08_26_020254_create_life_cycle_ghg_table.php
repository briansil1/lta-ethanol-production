<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeCycleGhgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('life_cycle_ghgs');

        Schema::create('life_cycle_ghgs', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('country_id');
            $table->string('region', 150);
            $table->string('methodology', 150);
            $table->string('emission', 150);
            $table->float('e0', 8, 2)->nullable();
            $table->float('e10', 8, 2)->nullable();
            $table->float('e15', 8, 2)->nullable();
            $table->float('e20', 8, 2)->nullable();
            $table->float('e25', 8, 2)->nullable();
            $table->float('e30', 8, 2)->nullable();
            $table->timestamps();  
        });

        DB::table('life_cycle_ghgs')->insert([
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghg', 'e0' => '210.20', 'e10' => '195.44', 'e15' => '192.62', 'e20' => '190.04', 'e25' => '187.68', 'e30' => '184.78'],
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghg_redvsbase', 'e0' => '0.0', 'e10' => '-7.02', 'e15' => '-8.36', 'e20' => '-9.59', 'e25' => '-10.71', 'e30' => '-12.09'],
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghgredvstarget', 'e0' => '0.0', 'e10' => '7.99', 'e15' => '10.24', 'e20' => '12.37', 'e25' => '14.39', 'e30' => '16.56'],
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghg', 'e0' => '252.25', 'e10' => '234.52', 'e15' => '231.15', 'e20' => '228.05', 'e25' => '225.22', 'e30' => '221.73'],
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghg_redvsbase', 'e0' => '0.0', 'e10' => '-7.02', 'e15' => '-8.36', 'e20' => '-9.59', 'e25' => '-10.71', 'e30' => '-12.09'],
            ['country_id' => '1', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghgredvstarget', 'e0' => '0.0', 'e10' => '7.99', 'e15' => '10.24', 'e20' => '12.37', 'e25' => '14.39', 'e30' => '16.56'],
            
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghg', 'e0' => '218.526551236832', 'e10' => '196.673896113149', 'e15' => '199.861652179316', 'e20' => '198.123663690211', 'e25' => '196.036165441638', 'e30' => '195.353244318477'],
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghg_redvsbase', 'e0' => '0.0', 'e10' => '-10', 'e15' => '-8.5', 'e20' => '-9.3', 'e25' => '-10.3', 'e30' => '-10.6'],
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'RED_II', 'emission' => 'ghgredvstarget', 'e0' => '0.0', 'e10' => '8', 'e15' => '10.2', 'e20' => '12.4', 'e25' => '14.4', 'e30' => '16.6'],
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghg', 'e0' => '262.2', 'e10' => '236', 'e15' => '239.8', 'e20' => '237.7', 'e25' => '235.2', 'e30' => '234.4'],
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghg_redvsbase', 'e0' => '0.0', 'e10' => '-10', 'e15' => '-8.5', 'e20' => '-9.3', 'e25' => '-10.3', 'e30' => '-10.6'],
            ['country_id' => '3', 'region' => 'south-america', 'methodology' => 'GREET', 'emission' => 'ghgredvstarget', 'e0' => '0.0', 'e10' => '7', 'e15' => '9', 'e20' => '12', 'e25' => '14', 'e30' => '16.0'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_cycle_ghgs');
    }
}
