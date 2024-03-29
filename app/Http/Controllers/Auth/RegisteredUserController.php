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
use Illuminate\Support\Facades\Storage;

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
        $customMessages = [
            'name.required' => 'Il campo Nome e Cognome è obbligatorio.',
            'name.string' => 'Il campo Nome e Cognome deve essere una stringa.',
            'name.max' => 'Il campo Nome e Cognome non può superare 255 caratteri.',
        
            'email.required' => 'Il campo Indirizzo E-Mail è obbligatorio.',
            'email.string' => 'Il campo Indirizzo E-Mail deve essere una stringa.',
            'email.email' => 'Il campo Indirizzo E-Mail deve essere un indirizzo email valido.',
            'email.max' => 'Il campo Indirizzo E-Mail non può superare 255 caratteri.',
            'email.unique' => 'Questa E-Mail è già stata utilizzata.',
            
            'password.required' => 'Il campo Password è obbligatorio.',
            'password.confirmed' => 'La conferma della password non corrisponde.',
            'password' => 'La Password deve avere almeno 8 caratteri, includere almeno una lettera maiuscola, una lettera minuscola e un numero.',
            
            // Validazione dei dati inviati dall'utente
            'restaurantName.required' => 'Il campo Nome Ristorante è obbligatorio.',
            'restaurantName.string' => 'Il campo Nome Ristorante deve essere una stringa.',
            'restaurantName.max' => 'Il campo Nome Ristorante non può superare 100 caratteri.',
            
            'address.required' => 'Il campo Indirizzo è obbligatorio.',
            'address.string' => 'Il campo Indirizzo deve essere una stringa.',
            'address.max' => 'Il campo Indirizzo non può superare 100 caratteri.',
            
            'p_iva.required' => 'Il campo Partita IVA è obbligatorio.',
            'p_iva.string' => 'Il campo Partita IVA deve essere una stringa.',
            'p_iva.max' => 'Il campo Partita IVA non può superare 11 caratteri.',
            
            'main_image.required' => 'Il campo Immagine di Copertina è obbligatorio.',
            'main_image.image' => 'Il file caricato deve essere un\'immagine.',
            'main_image.mimes' => 'Il file deve essere un\'immagine di tipo: jpeg, png, jpg o gif.',
            'main_image.max' => 'La dimensione massima dell\'immagine consentita è 2048 KB.',
            
            'typologies.required' => 'Il campo Tipologia Ristorante è obbligatorio.'
        ];
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        
            // valido i dati inviati dall'utente
            'restaurantName' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'max:11'],
            'main_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'typologies' => ['required']
        ], $customMessages);
        

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

        $form_data = $request->only(['restaurantName', 'address', 'p_iva', 'main_image']);

        $restaurant = new Restaurant();
        
        if ($request->hasFile('main_image')) {
            $image = Storage::disk('public')->put('restaurant_images', $form_data['main_image']);
            $form_data['main_image'] = $image;
        }

        $restaurant->fill($form_data);
        $restaurant->name = $form_data['restaurantName'];
        $restaurant->slug = Str::slug($restaurant->name . '-');
        $restaurant->user_id = $user_id;

        $restaurant->save();
        
        // assegno le tipologie del ristorante
        if ($request->has('typologies')) {
            $restaurant->typologies()->attach($request->typologies);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
