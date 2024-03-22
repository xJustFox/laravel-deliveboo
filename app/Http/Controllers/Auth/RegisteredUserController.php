<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Typology;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology::all();
        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // valido i dati inviati dall'utente
            'restaurantName' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'max:11'],
            'main_image' => ['required', 'string'],
            'typology_id' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // recupero l'id dell'user che si è appena registrato e lo assegno a $user_id
        $user_id = User::where('email', $user->email)->get();
        $user_id = $user_id[0]->id;
        
        // creo il record del ristorante dell'utente appena registrato
        $restaurant = Restaurant::create([
            'user_id' => $user_id,
            'name' => $request->restaurantName,
            'slug' => Str::slug($request->restaurantName),
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'main_image' => $request->main_image,
        ]);
        $restaurant->save();
        
        
        if ($request->has('typology_id')) {
            $restaurant->typologies()->attach($request->typology_id);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
