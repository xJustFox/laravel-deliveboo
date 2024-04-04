<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index()
    {
        // recupero i dati dell'utente loggato
        $user = Auth::user();

        // filtro i ristoranti in base all'id dell'utente loggato
        $restaurants = Restaurant::where('user_id', $user->id)->get();

        return view('user.statistics.index', compact('user', 'restaurants'));
    }
}
