<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Argentina',
            'code' => 'ar',
            'url' => 'ARGENTINA_ESP.pdf',
            'locale' => 'es',
            'order' => 2
        ]);
        DB::table('countries')->insert([
            'name' => 'Bolivia',
            'code' => 'bl',
            'url' => 'BOLIVIA_ESP.pdf',
            'locale' => 'es',
            'order' => 3
        ]);
        DB::table('countries')->insert([
            'name' => 'Chile',
            'code' => 'cl',
            'url' => 'CHILE_ESP.pdf',
            'locale' => 'es',
            'order' => 4
        ]);
        DB::table('countries')->insert([
            'name' => 'Colombia',
            'code' => 'co',
            'url' => 'COLOMBIA_ESP.pdf',
            'locale' => 'es',
            'order' => 5
        ]);
        DB::table('countries')->insert([
            'name' => 'Costa Rica',
            'code' => 'cr',
            'url' => 'COSTA RICA_ESP.pdf',
            'locale' => 'es',
            'order' => 6
        ]);
        DB::table('countries')->insert([
            'name' => 'Ecuador',
            'code' => 'ec',
            'url' => 'ECUADOR_ESP.pdf',
            'locale' => 'es',
            'order' => 7
        ]);
        DB::table('countries')->insert([
            'name' => 'El Salvador',
            'code' => 'es',
            'url' => 'EL SALVADOR_ESP.pdf',
            'locale' => 'es',
            'order' => 8
        ]);
        DB::table('countries')->insert([
            'name' => 'Guatemala',
            'code' => 'gu',
            'url' => 'GUATEMALA_ESP.pdf',
            'locale' => 'es',
            'order' => 9
        ]);
        DB::table('countries')->insert([
            'name' => 'Honduras',
            'code' => 'ho',
            'url' => 'HONDURAS_ESP.pdf',
            'locale' => 'es',
            'order' => 10
        ]);
        DB::table('countries')->insert([
            'name' => 'Jamaica',
            'code' => 'ja',
            'url' => 'JAMAICA_ESP.pdf',
            'locale' => 'es',
            'order' => 11
        ]);
        DB::table('countries')->insert([
            'name' => 'México',
            'code' => 'mx',
            'url' => 'MEXICO_ESP.pdf',
            'locale' => 'es',
            'order' => 12
        ]);
        DB::table('countries')->insert([
            'name' => 'Nicaragua',
            'code' => 'ni',
            'url' => 'NICARAGUA_ESP.pdf',
            'locale' => 'es',
            'order' => 13
        ]);
        DB::table('countries')->insert([
            'name' => 'Panamá',
            'code' => 'pa',
            'url' => 'PANAMA_ESP.pdf',
            'locale' => 'es',
            'order' => 14
        ]);
        DB::table('countries')->insert([
            'name' => 'Perú',
            'code' => 'pe',
            'url' => 'PERU_ESP.pdf',
            'locale' => 'es',
            'order' => 15
        ]);
        DB::table('countries')->insert([
            'name' => 'República Dominicana',
            'code' => 'rd',
            'url' => 'REPUBLICA DOMINICANA_ESP.pdf',
            'locale' => 'es',
            'order' => 16
        ]);
        DB::table('countries')->insert([
            'name' => 'Uruguay',
            'code' => 'ur',
            'url' => 'URUGUAY_ESP.pdf',
            'locale' => 'es',
            'order' => 17
        ]);
        DB::table('countries')->insert([
            'name' => 'Región Caribe',
            'code' => 'rc',
            'url' => 'Reg- CARIBE_ESP.pdf',
            'locale' => 'es',
            'order' => 18
        ]);
        DB::table('countries')->insert([
            'name' => 'Región Centroamérica',
            'code' => 'ca',
            'url' => 'Reg- CENTROAMERICA_ESP.pdf',
            'locale' => 'es',
            'order' => 19
        ]);
        DB::table('countries')->insert([
            'name' => 'Región Suramérica',
            'code' => 'sa',
            'url' => 'Reg- SURAMERICA_ESP.pdf',
            'locale' => 'es',
            'order' => 20
        ]);
        DB::table('countries')->insert([
            'name' => 'Reporte Completo',
            'code' => 'all',
            'url' => 'LATAM_ESP.pdf',
            'locale' => 'es',
            'order' => 1
        ]);
        DB::table('countries')->insert([
            'name' => 'Full Report',
            'code' => 'all',
            'url' => 'LATAM_ENG.pdf',
            'locale' => 'en',
            'order' => 1
        ]);
    }
}
