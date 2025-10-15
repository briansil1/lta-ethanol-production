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
        Schema::table('gasoline_components', function (Blueprint $table) {
            //
            $table->float('bno_on', 23, 20)->after('ron')->nullable();
            $table->float('bno_rvp', 23, 20)->after('bno_on')->nullable();
            $table->float('logistica', 23, 20)->after('bno_rvp')->nullable();
            $table->float('bno', 23, 20)->after('logistica')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gasoline_components', function (Blueprint $table) {
            //
            $table->dropColumn('bno_on');
            $table->dropColumn('bno_rvp');
            $table->dropColumn('logistica');
            $table->dropColumn('bno');
        });
    }
}
