<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index(){
        $genres = Genre::all();

        return response()->json([
            'succes' => true,
            'results' => $genres
        ]);
    }
}
