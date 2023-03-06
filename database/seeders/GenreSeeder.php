<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Action',
            'Adventure',
            'Role-playing',
            'Simulation',
            'Sports',
            'Idle'
        ]);

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'genre' => $genre
            ]);
        }
    }
}
