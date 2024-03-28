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
                        <p>Piatti ordinati: <br>
                        <div class="container mb-3">
                            <div class="row d-flex">
                                @foreach ($order->dishes as $dish)
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card h-100 p-2">
                                            <div class="row w-100 d-flex justify-content-between align-items-center">
                                                <div class="col-5 d-flex">
                                                    <div class="img-content">
                                                        @if ($dish->image != null)
                                                            @if (Str::contains($dish->image, 'https'))
                                                                <img src="{{ $dish->image }}" alt="{{ $dish->name }}"
                                                                    class="img-fluid">
                                                            @else
                                                                <img src="{{ asset('/storage/' . $dish->image) }}"
                                                                    alt="{{ $dish->name }}" class="img-fluid">
                                                            @endif
                                                        @else
                                                            <img class="img-fluid"
                                                                src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex flex-column justify-content-between">
                                                        <h5 class="card-title text-white">{{ $dish->name }}</h5>
                                                        <div class="text-white">
                                                            x{{ $dish->pivot->quantity }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <p>Prezzo: {{ $order->price }}$</p>
                        <p>Status: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
