<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('admins')->insert([
            'name' => 'karyawan',
            'role' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'wanaa',
            'no_telp' => '0895636980792',
            'email' => 'wana@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'nawa',
            'no_telp' => '0895636980792',
            'email' => 'nawa@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
