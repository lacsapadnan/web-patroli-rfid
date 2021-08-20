<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'karyawan',
            'address' => 'jl. karyawan',
            'phone' => '87984064086',
            'uuid' => '84867464',
            'email' => 'karyawan@mail.com',
            'password' => Hash::make('karyawan123'),
            'role' => 'karyawan',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'address' => 'jl. admin',
            'phone' => '87984064086',
            'uuid' => '84867464',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
