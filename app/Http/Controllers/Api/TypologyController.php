<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    public function index(){
        $typologies = Typology::all();

        return response()->json([
            'succes' => true,
            'results' => $typologies
        ]);
    }
}
