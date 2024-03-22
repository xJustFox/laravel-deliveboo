@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Menù') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Menù') }}</div>
                <div class="card-body">
                    @foreach ($dishes as $dish)
                        <a href="{{ route('user.dishes.show', ['dish' => $dish->slug]) }}" class="btn  btn-warning"style="width: 100%;">
                    
                            <li>Nome piatto: {{$dish->name}}</li>
                            <li>Genere: {{$dish->genre->name}}</li>
                            <li>Descrizone: {{$dish->description}}</li>
                            <li>Prezzo: {{$dish->price}}$</li>
                            <li><br> <img class=" w-25" src="{{$dish->image}}" alt=""></li>
                            <hr>

                        
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection