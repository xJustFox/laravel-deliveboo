<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DishOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $customMessage = [
            'restaurant_id.required' => 'Il campo ID del ristorante è obbligatorio.',
            'restaurant_id.exists' => 'Il ristorante selezionato non esiste nel sistema.',

            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome deve essere una stringa.',
            'name.max' => 'Il campo nome non può superare i 100 caratteri.',

            'email.required' => 'Il campo email è obbligatorio.',
            'email.email' => 'Il campo email deve essere un indirizzo email valido.',
            'email.unique' => 'L\'indirizzo email inserito è già stato utilizzato per un altro ordine.',
            'email.max' => 'Il campo email non può superare i 150 caratteri.',

            'delivery_address.required' => 'Il campo indirizzo di consegna è obbligatorio.',
            'delivery_address.string' => 'Il campo indirizzo di consegna deve essere una stringa.',
            'delivery_address.max' => 'Il campo indirizzo di consegna non può superare i 150 caratteri.',

            'phone_num.required' => 'Il campo numero di telefono è obbligatorio.',
            'phone_num.string' => 'Il campo numero di telefono deve essere una stringa.',
            'phone_num.max' => 'Il campo numero di telefono non può superare i 30 caratteri.',

            'price.required' => 'Il campo prezzo è obbligatorio.',
        ];
        
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:100',
            'status' => 'integer',
            'email' => 'required|email|unique:orders,email|max:150',
            'delivery_address' => 'required|string|max:150',
            'phone_num' => 'required|string|max:30',
            'price' => 'required',
        ], $customMessage);
        
        // Inserimento dell'ordine
        $order = new Order();
        $order->restaurant_id = $request->input('restaurant_id');
        $order->name = $request->input('name');
        $order->slug = Str::slug($request->input('name') . '-');
        $order->status = $request->input('status', 0); // Se lo status non è fornito, assume il valore di default 0
        $order->email = $request->input('email');
        $order->delivery_address = $request->input('delivery_address');
        $order->phone_num = $request->input('phone_num');
        $order->price = $request->input('price');
        $order->save();

        // Inserimento dei dettagli degli ordini relativi ai piatti
        foreach ($request->input('dishes') as $dishData) {
            $dishOrder = new DishOrder();
            $dishOrder->dish_id = $dishData['dish_id'];
            $dishOrder->order_id = $order->id;
            $dishOrder->quantity = $dishData['quantity'];
            $dishOrder->save();
        }

        return response()->json(['message' => 'Ordine inserito con successo'], 201);
    }
}
