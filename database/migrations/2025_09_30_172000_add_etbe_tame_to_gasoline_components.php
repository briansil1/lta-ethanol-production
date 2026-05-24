<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEtbeTameToGasolineComponents extends Migration
{
    public function up()
    {
        Schema::table('gasoline_components', function (Blueprint $table) {
            if (!Schema::hasColumn('gasoline_components', 'tame')) {
                $table->string('tame', 60)->after('raffinate')->nullable();
            }
            if (!Schema::hasColumn('gasoline_components', 'etbe')) {
                $table->string('etbe', 60)->after('raffinate')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('gasoline_components', function (Blueprint $table) {
            if (Schema::hasColumn('gasoline_components', 'etbe')) {
                $table->dropColumn('etbe');
            }
            if (Schema::hasColumn('gasoline_components', 'tame')) {
                $table->dropColumn('tame');
            }
        });
    }
}
