<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Order;
use Faker\Factory as Faker;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Ottenere tutti gli ID dei piatti e degli ordini
        $dishIds = Dish::pluck('id')->toArray();
        $orderIds = Order::pluck('id')->toArray();

        // Creare relazioni casuali tra piatti e ordini
        for ($i = 0; $i < 20; $i++) { // Esempio: 20 relazioni casuali
            $dish = Dish::find($faker->randomElement($dishIds));
            $order = Order::find($faker->randomElement($orderIds));
            
            // Utilizza il metodo attach per collegare il piatto all'ordine
            $order->dishes()->attach($dish, ['quantity' => $faker->numberBetween(1, 5)]);
        }
    }
}
