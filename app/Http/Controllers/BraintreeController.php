<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Dish;
use App\Models\Restaurant;

class BraintreeController extends Controller
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function generateClientToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['clientToken' => $clientToken]);
    }

    public function processPayment(Request $request)
    {
        $nonce = $request->input('paymentMethodNonce');

        $cart = $request->input('cart');

        // modifiche del carrello
        $amount = 0;

        foreach ($cart as $item) {
            $id = $item['id'];
            $restaurant_id = $item['restaurant_id'];
            $quantity = $item['quantity'];
            $dish_price = Dish::where('restaurant_id', $restaurant_id)->where('id', $id)->value('price');
            if ($dish_price) {
                $amount += (float) $dish_price * $quantity;
            }
        }

        $amount = number_format($amount, 2);

        var_dump($amount);

        // Effettua la transazione
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Controlla se la transazione è stata accettata
        if ($result->success) {
            // La transazione è stata accettata, procedi con il successo
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            // La transazione è stata rifiutata, gestisci di conseguenza
            $errorMessage = $result->message;
            return response()->json(['success' => false, 'message' => $errorMessage]);
        }
    }
}
