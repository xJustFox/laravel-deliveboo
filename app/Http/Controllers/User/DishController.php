<?php

namespace App\Http\Controllers\User;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $restaurant = Restaurant::where('user_id', $user->id)->get();
        $restaurant_id = $restaurant[0]->id;
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();

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
        $user = Auth::user();

        // recupero il ristorante dell'utente
        $restaurant = Restaurant::where('user_id', $user->id)->get();
        $restaurant_id = $restaurant[0]->id;

        // Creo una nuova istanza di dish per salvarla nel database
        $dish = new Dish();

        // Assegno l'immagine 
        if ($request->hasFile('image')) {
            $img = Storage::disk('public')->put('dish_images', $form_data['image']);
            $form_data['image'] = $img;
        }

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
        // 
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

        // Trova il piatto nel database con il determinato slug
        $dish = Dish::where('slug', $dish->slug)->first();

        // Controlla se il piatto esiste nel database
        if (!$dish) {
            // Se il piatto non esiste, restituisci un errore o reindirizza l'utente
            return redirect()->route('user.error');
        }

        // recupero l'utente loggato 
        $user = Auth::user();

        // recupero il ristorante dell'utente
        $restaurant = Restaurant::where('user_id', $user->id)->get();
        $restaurant_id = $restaurant[0]->id;

        // Verifica se l'utente autenticato è il proprietario del piatto
        if ($dish->restaurant_id !== $restaurant_id) {
            // Se l'utente non è il proprietario del piatto, restituisci un errore o reindirizza l'utente
            return redirect()->route('user.error');
        }

        // Se l'utente è autorizzato, mostra il form di modifica del piatto
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

        if ($request->hasFile('image')) {
            if ($dish->image != null) {
                Storage::disk('public')->delete($dish->image);
            }

            $img = Storage::disk('public')->put('dish_images', $form_data['image']);
            $form_data['image'] = $img;
        }

        // recupero l'utente loggato 
        $user = Auth::user();

        // recupero il ristorante dell'utente
        $restaurant = Restaurant::where('user_id', $user->id)->get();
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
