<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@eon.com.mx',
            'password' => Hash::make('admin123!'),
            'company' => 'Eon',
            'position' => 'Developer',
            'country_id' => 1,
            'phone' => 5521991027,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Tester',
            'email' => 'test@eon.com.mx',
            'password' => Hash::make('test123!'),
            'company' => 'Eon',
            'position' => 'Developer',
            'country_id' => 1,
            'phone' => 5521991027,
        ]);
    }
}
