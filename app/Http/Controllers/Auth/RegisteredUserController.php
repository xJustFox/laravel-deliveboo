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
            'password' => 'La Password deve avere almeno :min caratteri, includere almeno una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale.',
            
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
            
            'typology_id.required' => 'Il campo Tipologia Ristorante è obbligatorio.'
        ];
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        
            // valido i dati inviati dall'utente
            'restaurantName' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'max:11'],
            'main_image' => ['required'],
            'typology_id' => ['required']
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
