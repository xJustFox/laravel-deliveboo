<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Mc Donalds',
                'address' => 'Via Torino, 68, Milano',
                'p_iva' => '12345678901',
                'main_image' => 'https://www.frosinonetoday.it/~media/horizontal-hi/47175244901902/mcd_ristorante_esterno.jpg',
            ],
            [
                'user_id' => 2,
                'name' => 'Burger King',
                'address' => 'Via Pola, 9, Milano',
                'p_iva' => '23456789012',
                'main_image' => 'https://www.retailfood.it/wp-content/uploads/2020/05/img_6587.jpg',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Li',
                'address' => 'Via dell\'Unione, Piazza Giuseppe Missori, 7, Milano',
                'p_iva' => '34567890123',
                'main_image' => 'https://qul.imgix.net/2e84e7a2-6c92-4b23-9799-567f1a55f5d7/561480_sld.jpg',
            ],
            [
                'user_id' => 4,
                'name' => 'Pizzeria Gino Sorbillo',
                'address' => 'Largo Corsia dei Servi 11, Milano',
                'p_iva' => '45678901234',
                'main_image' => 'https://static.gamberorosso.it/2023/02/rosa-valtenesi-experience-casa-sorbillo-duomo-768x512.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'Pizza al trancio',
                'address' => 'Viale Famagosta, 10, Milano',
                'p_iva' => '56789012345',
                'main_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Pizzeria_in_Venice.jpg/1200px-Pizzeria_in_Venice.jpg',
            ],
            [
                'user_id' => 6,
                'name' => 'Ristorante Migasa',
                'address' => 'Via Bernardino Verro, 15, Milano',
                'p_iva' => '67890123456',
                'main_image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/35f3d77c-aa80-4f1e-8a50-3c6e706d594f/5b442240-9b56-4575-b32c-5802ecc833d8.jpg',
            ],
            [
                'user_id' => 7,
                'name' => 'Rock \'N Roll',
                'address' => 'Via Giuseppe Bruschetti, 11, Milano',
                'p_iva' => '78901234567',
                'main_image' => 'https://www.milanotoday.it/~media/horizontal-hi/19907585461873/viki-s-burger-milano-2.jpeg',
            ],
            [
                'user_id' => 8,
                'name' => 'Ristorante Piedra del Sol',
                'address' => 'Via Emilio Cornalia, 2, Milano',
                'p_iva' => '89012345678',
                'main_image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/1d39293d-cbd0-46ae-893a-b1637a52ecdb/b9c5071b-36db-4337-b855-13ba9bba49f3.jpg',
            ],
            [
                'user_id' => 9,
                'name' => 'Ristorante Maya',
                'address' => 'Via Ascanio Sforza, 41, Milano',
                'p_iva' => '90123456789',
                'main_image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/48b2b88e-232d-4c16-b4bd-2b72571ff10c/5f90402a-3cd4-4351-b485-f2f42bf54671.jpg',
            ],
            [
                'user_id' => 10,
                'name' => 'Ristorante Miao Chinese',
                'address' => 'Via Padova, 26, Milano',
                'p_iva' => '01234567890',
                'main_image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/6e35099d-c330-49ed-abbd-71d3bc03b557/8428bdfe-6c23-4949-8a05-7f7b3d55d0e1.jpg',
            ],
        ];

        foreach ($restaurants as $item) {

            $user_id = (int)$item['user_id'];

            Restaurant::create([
                'user_id' => $user_id,
                'name' => $item['name'],
                'slug' => Str::slug($item['name'] . '-'),
                'address' => $item['address'],
                'p_iva' => $item['p_iva'],
                'main_image' => $item['main_image'],
            ]);
        }
    }
}
