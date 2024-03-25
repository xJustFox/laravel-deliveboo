<?php

namespace App\Http\Controllers\User;

use App\Models\Dish;
use App\Models\Restaurant;
Use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Genre;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth:: user();

        $restaurant = Restaurant::where('user_id',$user->id)->get();
        $restaurant_id = $restaurant[0]->id;
        $dishes = Dish::where('restaurant_id',$restaurant_id)->get();

        $genres = Genre::all();

        return view('user.dishes.index', compact('dishes', 'genres')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Recupero tutti i generi
        $genres = Genre::all();

        return view('user.dishes.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        // Recupero i dati inviati dalla form
        $form_data = $request->all();

        // recupero l'utente loggato 
        $user = Auth:: user();

        // recupero il ristorante dell'utente
        $restaurant = Restaurant::where('user_id',$user->id)->get();
        $restaurant_id = $restaurant[0]->id;

        // Creo una nuova istanza di dish per salvarla nel database
        $dish = new Dish();
        $dish->fill($form_data);
        $dish->slug = Str::slug($dish->name . '-');

        // assegno al resturant_id del piatto l'id del ristorante appartenente all'utente loggato
        $dish->restaurant_id = $restaurant_id;

        // Salvo dish nel database
        $dish->save();

        return redirect()->route('user.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('user.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // Recupero tutti i generi
        $genres = Genre::all();

        return view('user.dishes.edit', compact('dish', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        // Recupero i dati inviati dalla form
        $form_data = $request->all();

        // recupero l'utente loggato 
        $user = Auth:: user();

        // recupero il ristorante dell'utente
        $restaurant = Restaurant::where('user_id',$user->id)->get();
        $restaurant_id = $restaurant[0]->id;

        // Modifico l'istanza di dish per salvarla nel database
        $dish->slug = Str::slug($dish->name . '-');
        $dish->update($form_data);

        // assegno al resturant_id del piatto l'id del ristorante appartenente all'utente loggato
        $dish->restaurant_id = $restaurant_id;

        return redirect()->route('user.dishes.index', $dish->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        
        return redirect()->route('user.dishes.index');
    }
}
