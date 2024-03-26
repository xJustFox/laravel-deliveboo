@extends('layouts.app')

@section('content')
    <div class="container-lg pt-4" id="order_page">
        <div class="row">
            <div class="col-12">
                <div class="card text-white">
                    <div class="card-header super-ocean text-center">
                        <h2>Ordine numero: {{ $order->id }}</h2>
                    </div>
                    <div class="card-body my-2 fs-5">
                        <p>Nome acquirente: {{ $order->name }}</p>
                        <p>Indirizzo Email: {{ $order->email }}</p>
                        <p>Indirizzo di consegna: {{ $order->delivery_address }}</p>
                        <p>Numero di telefono: {{ $order->phone_num }}</p>
                        <p>Piatti ordinati: </p>
                        <p>Quantità: </p>
                        <p>Prezzo: {{ $order->price }}$</p>
                        <p>Status: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
