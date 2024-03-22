@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Restautants') }}
        </h2>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{ $restaurant->name }}</div>

                    <div class="card-body">
                        <ul>
                            <li>Nome Ristoratore: {{ $restaurant->user->name }}</li>
                            <li>Nome Ristorante: {{ $restaurant->name }}</li>
                            <li>Tipologia: {{ $restaurant->typologies[0]->name }}</li>
                            <li>Indirizzo Ristorante: {{ $restaurant->address }}</li>
                            <li>Partita IVA: {{ $restaurant->p_iva }}</li>
                            <li>Foto: <br> <img class=" w-100" src="{{ $restaurant->main_image }}" alt=""></li>
                            <li><a class="btn btn-sm btn-primary my-2 text-decoration-none"
                                    href="{{ route('user.dishes.index') }}">Menù</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

