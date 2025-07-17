<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCountriesTable extends Migration
{
    public function up()
    {
        DB::table('countries')->where('id', '=', 17)->delete();
        DB::table('countries')->where('id', '=', 18)->delete();
        DB::table('countries')->where('id', '=', 19)->delete();
    }
}
