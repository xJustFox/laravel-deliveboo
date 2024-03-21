@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Restautants') }}
    </h2>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{$restaurant->name}}</div>

                <div class="card-body">
                    <ul>
                        <li>Nome Ristoratore: {{$user->name}}</li>
                        <li>Nome Ristorante: {{$restaurant->name}}</li>
                        <li>Indirizzo Ristorante: {{$restaurant->addres}}</li>
                        <li>Partita IVA: {{$restaurant->p_iva}}</li>
                        <li>Foto: <br> <img class=" w-25" src="{{$restaurant->main_image}}" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection