<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            "Italiano",
            "Francese",
            "Asiatico",
            "Messicano",
            "Sushi",
            "Steakhouse",
            "Pesce",
            "Vegano",
            "Etnico",
            "Fast Food",
            "Gourmet",
            "Fusion",
            "Barbecue",
            "Tapas",
        ];

        foreach ($array as $item) {
            $typology = new Typology();

            $typology->name = $item;
            $typology->slug = Str::slug($item . '-');

            $typology->save();
        }
    }
}
