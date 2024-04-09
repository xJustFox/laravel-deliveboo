<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Typology;

class RestaurantTypologySeeder extends Seeder
{
    public function run()
    {
        // Recupera tutti i ristoranti e le tipologie
        $restaurantTypologies = [
            ['restaurant_id' => 1, 'typology_id' => 10], // Mc Donalds -> Fast food
            ['restaurant_id' => 2, 'typology_id' => 10], // Burger King -> Fast food
            ['restaurant_id' => 3, 'typology_id' => 5],  // Sushi Li -> Ristorante di sushi
            ['restaurant_id' => 3, 'typology_id' => 7],
            ['restaurant_id' => 4, 'typology_id' => 1],  // Pizzeria Gino Sorbillo -> Ristorante italiano
            ['restaurant_id' => 4, 'typology_id' => 11],
            ['restaurant_id' => 5, 'typology_id' => 1],  // Pizza al trancio -> Ristorante italiano
            ['restaurant_id' => 6, 'typology_id' => 7],  // Ristorante Migasa -> Ristorante di pesce
            ['restaurant_id' => 6, 'typology_id' => 12],
            ['restaurant_id' => 7, 'typology_id' => 6],  // Rock 'N Roll -> Ristorante di barbecue
            ['restaurant_id' => 7, 'typology_id' => 13],
            ['restaurant_id' => 8, 'typology_id' => 10], // Ristorante Piedra del Sol -> Fast food
            ['restaurant_id' => 9, 'typology_id' => 9],  // Ristorante Maya -> Ristorante etnico
            ['restaurant_id' => 10, 'typology_id' => 12],// Ristorante Miao Chinese -> Ristorante fusion
            ['restaurant_id' => 10, 'typology_id' => 9],
        ];

        foreach ($restaurantTypologies as $rt) {
            $restaurant = Restaurant::find($rt['restaurant_id']);
            $typology = Typology::find($rt['typology_id']);

            if ($restaurant && $typology) {
                $restaurant->typologies()->attach($typology);
            }
        }
    }
}

