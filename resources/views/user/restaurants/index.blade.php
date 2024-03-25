@extends('layouts.app')

@section('content')
    <div class="container-lg pt-4" id="restaurants-page">
        <div class="row">
            @foreach ($restaurants as $restaurant)
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-white super-ocean d-flex justify-content-between align-items-center">
                        {{ $restaurant->name }} 
                        <div class="d-flex align-items-center flex-column flex-md-row">
                            <div class="pe-2">
                                <a class="btn btn-sm text-decoration-none" href="{{ route('user.dishes.index') }}">Menù del Ristorante</a>
                            </div>
                            <div>
                                {{-- Alla creazione dell'user.restaurant.edit de-commentare qua sotto ed eliminare l'alto tag --}}
                                {{-- <a class="btn btn-sm text-decoration-none" href="{{ route('user.dishes.edit') }}"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                <a class="btn btn-sm text-decoration-none" href="{{ route('user.restaurant.index') }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column flex-md-row text-white">
                        <div class="col-12 col-md-6">
                            <div class="info-restaurant">
                                <i class="fa-solid fa-utensils"></i>
                                @foreach ($restaurant->typologies as $typology)
                                <span>{{ $typology->name }}</span>
                                @endforeach
                            </div>
    
                            <div class="info-restaurant">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $restaurant->address }}</span>  
                            </div class="" >
    
                            <div class="info-restaurant">
                                <i class="fa-regular fa-file-lines"></i>
                                <span>{{ $restaurant->p_iva }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-4 pt-md-0 ">
                            <img class="" src="{{ $restaurant->main_image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

