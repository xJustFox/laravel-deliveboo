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
                            <div class="d-flex">
                                @foreach ($order->dishes as $dish)
                                <div class="card" style="width: 18rem;">
                                    <div class="row w-100 align-items-center">
                                        <div class="col-5">
                                            @if ($dish->image != null)
                                                @if (Str::contains($dish->image, 'https'))
                                                    <img src="{{ $dish->image }}" alt="{{ $dish->name }}"
                                                        class="img-fluid h-100 w-100">
                                                @else
                                                    <img src="{{ asset('/storage/' . $dish->image) }}"
                                                        alt="{{ $dish->name }}" class="img-fluid h-100 w-100">
                                                @endif
                                            @else
                                                <img class="img-fluid h-100 w-100"
                                                    src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div class="col-7">
                                          <h5 class="card-title text-white">{{$dish->name}}</h5>
                                          <div class="text-end text-white">
                                            x{{$dish->pivot->quantity}}
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </p>
                        <p>Quantità: </p>
                        <p>Prezzo: {{ $order->price }}€</p>
                        <p>Status: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
