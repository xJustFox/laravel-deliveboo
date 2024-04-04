<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Creare 10 ordini casuali
        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'restaurant_id' => 1,
                'name' => $faker->name,
                'slug' => $faker->slug,
                'status' => $faker->boolean(),
                'email' => $faker->unique()->safeEmail,
                'delivery_address' => $faker->address,
                'phone_num' => $faker->phoneNumber,
                'price' => $faker->randomFloat(2, 10, 100),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
