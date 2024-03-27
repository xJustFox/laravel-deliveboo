<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($slug)
    {
        $dishes = Dish::whereHas('restaurant', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();

        return response()->json([
            'succes' => true,
            'results' => $dishes
        ]);
    }
}
