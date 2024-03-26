@extends('layouts.app')

@section('content')
    <div class="container" id="menu-page">
        <h2 class="fs-2 text-secondary my-4 text-white">
            <div class="d-flex justify-content-between">
                <div class="super-ocean">
                    {{ __('Menù') }}
                </div>
                <a class="btn add-dish" href="{{ route('user.dishes.create') }}">Aggiungi piatto</a>
            </div>
        </h2>
        @foreach ($genres as $genre)
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center super-ocean">
                            <h5>{{ $genre->name }}</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($dishes as $dish)
                                @if ($dish->genre->name == $genre->name)
                                    <div class="row align-items-center">
                                        <div class="col-12 pb-4 d-flex justify-content-between align-items-center">
                                            <div>
                                                @if ($dish->visible == 1)
                                                    <div class="badge text-bg-success">
                                                        Disponibile
                                                    </div>
                                                @else
                                                    <div class="badge text-bg-danger">
                                                        Non Disponibile
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <a class="btn"
                                                    href="{{ route('user.dishes.edit', ['dish' => $dish->slug]) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn delete-button" data-bs-toggle="modal"
                                                    data-bs-target="#modal_delete" data-path="dishes"
                                                    data-slug="{{ $dish->slug }}" data-name="{{ $dish->name }}">
                                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8 order-1 order-sm-0">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 row">
                                                    <div class="col-5 col-lg-12">
                                                        <div class="super-ocean fs-5">Nome piatto:</div> {{ $dish->name }}
                                                    </div>
                                                    <div class="col-3 col-lg-12">
                                                        <div class="super-ocean fs-5">Prezzo:</div> {{ $dish->price }}$
                                                    </div>
                                                    <div class="col-4 col-lg-12">
                                                        <div class="super-ocean fs-5">Genere:</div> {{ $dish->genre->name }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="super-ocean fs-5">Descrizone:</div> {{ $dish->description }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4 order-0 order-sm-1">
                                            <img src="{{ asset('/storage/' . $dish->image) }}" alt="{{ $dish->name }}"
                                                class="w-100">
                                        </div>
                                    </div>

                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('partials.modal_delete')
@endsection
