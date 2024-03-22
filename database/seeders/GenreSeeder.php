<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = array(
            'Antipasto',
            'Primo',
            'Secondo',
            'Contorno',
            'Dolce',
            'Bevanda',
        );

        foreach ($genres as $key => $name) {
            Genre::create([
                'name' => $name,
            ]);
        }
    }
}
