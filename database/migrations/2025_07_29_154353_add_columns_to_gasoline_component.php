<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToGasolineComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gasoline_component', function (Blueprint $table) {
            //
            $table->float('bno_on', 8, 2)->after('ron')->nullable();
            $table->float('bno_rvp', 8, 2)->after('ron')->nullable();
            $table->float('logistica', 8, 2)->after('ron')->nullable();
            $table->float('bno', 8, 2)->after('ron')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gasoline_component', function (Blueprint $table) {
            //
            $table->dropColumn('bno_on');
            $table->dropColumn('bno_rvp');
            $table->dropColumn('logistica');
            $table->dropColumn('bno');
        });
    }
}
