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
        DB::table('users')->insert([
            'nama_lengkap' => 'mimin',
            'no_telp' => '0895636980792',
            'is_admin' => 1,
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'wanaa',
            'no_telp' => '0895636980792',
            'is_admin' => 1,
            'role' => 'staff',
            'email' => 'wana@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'nawa',
            'no_telp' => '0895636980792',
            'is_admin' => 0,
            'email' => 'nawa@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
