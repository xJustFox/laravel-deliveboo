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
            "Ristorante italiano",
            "Ristorante francese",
            "Ristorante asiatico",
            "Ristorante messicano",
            "Ristorante di sushi",
            "Steakhouse",
            "Ristorante di pesce",
            "Ristorante vegano/vegetariano",
            "Ristorante etnico",
            "Fast food",
            "Ristorante gourmet",
            "Ristorante fusion",
            "Ristorante di barbecue",
            "Ristorante di tapas",
        ];

        foreach ($array as $item) {
            $typology = new Typology();

            $typology->name = $item;

            $typology->save();
        }
    }
}
