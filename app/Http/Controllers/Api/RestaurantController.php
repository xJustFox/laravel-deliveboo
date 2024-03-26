<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::select('id', 'user_id', 'name', 'slug', 'address', 'main_image', 'created_at', 'updated_at')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'email');
                },
                'dishes' => function ($query) {
                    $query->select('id', 'genre_id', 'restaurant_id', 'name', 'slug', 'description', 'price', 'visible', 'image', 'created_at', 'updated_at')
                        ->with('genre:id,name'); // Carica il genere associato ai piatti
                }, 'typologies'
            ])->get();

        return response()->json([
            'succes' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::select('id', 'user_id', 'name', 'slug', 'address', 'main_image', 'created_at', 'updated_at')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'email');
                },
                'dishes' => function ($query) {
                    $query->select('id', 'genre_id', 'restaurant_id', 'name', 'slug', 'description', 'price', 'visible', 'image', 'created_at', 'updated_at')
                        ->with('genre:id,name'); // Carica il genere associato ai piatti
                }, 'typologies'
            ])->where('slug', $slug)->get();

        return response()->json([
            'succes' => true,
            'results' => $restaurant
        ]);
    }

    public function typology_restaurants($slug)
    {
        $restaurants = Restaurant::select('restaurants.id', 'restaurants.user_id', 'restaurants.name', 'restaurants.slug', 'restaurants.address', 'restaurants.main_image', 'restaurants.created_at', 'restaurants.updated_at', 'typologies.slug as typologySlug')
            ->leftJoin('restaurant_typology', 'restaurants.id', '=', 'restaurant_typology.restaurant_id')
            ->leftJoin('typologies', 'typologies.id', '=', 'restaurant_typology.typology_id')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'email');
                },
                'dishes' => function ($query) {
                    $query->select('id', 'genre_id', 'restaurant_id', 'name', 'slug', 'description', 'price', 'visible', 'image', 'created_at', 'updated_at')
                        ->with('genre:id,name'); // Carica il genere associato ai piatti
                }
            ])
            ->where('typologies.slug', $slug)
            ->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
