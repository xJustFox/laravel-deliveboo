<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index()
    {
        // Recupero i dati dell'utente loggato
        $user = Auth::user();

        // Filtro i ristoranti in base all'id dell'utente loggato
        $restaurant = Restaurant::where('user_id', $user->id)->get();

        // Recupero gli ordini del ristorante
        $orders = Order::where('restaurant_id', $restaurant[0]->id)->get();

        // Recupero i piatti del ristorante
        $dishes = Dish::where('restaurant_id', $restaurant[0]->id)->get();

        return view('user.statistics.index', compact('user', 'restaurant', 'orders', 'dishes'));
    }
}
