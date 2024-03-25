@extends('layouts.app')

@section('content')
    <div class="container" id="menu-page">
        <h2 class="fs-2 text-secondary my-4 text-white">
            <div class="super-ocean">
                {{ __('Menù') }}
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-warning add-dish" href="{{ route('user.dishes.create') }}">Aggiungi piatto</a>
            </div>
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card dishes">
                    <div class="card-body">
                        @foreach ($dishes as $dish)
                            <div>Nome piatto: {{ $dish->name }}</div>
                            <div>Genere: {{ $dish->genre->name }}</div>
                            <div>Descrizone: {{ $dish->description }}</div>
                            <div>Prezzo: {{ $dish->price }}$</div>
                            <div><br> <img class=" w-25" src="{{ $dish->image }}" alt=""></div>
                            <div class="text-end">
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('user.dishes.show', ['dish' => $dish->slug]) }}">Dettaglio</a>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('user.dishes.edit', ['dish' => $dish->slug]) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <button class="btn btn-sm btn-warning delete-button" data-bs-toggle="modal"
                                    data-bs-target="#modal_delete" data-path="dishes" data-slug="{{ $dish->slug }}">
                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                </button>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
