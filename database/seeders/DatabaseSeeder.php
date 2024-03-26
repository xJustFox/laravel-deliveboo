<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            TypologySeeder::class,
            RestaurantTypologySeeder::class,
            GenreSeeder::class,
            DishSeeder::class,

            // momentanei
            OrderSeeder::class,
            DishOrderSeeder::class,
        ]);
    }
}
