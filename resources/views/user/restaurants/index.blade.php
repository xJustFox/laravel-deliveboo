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
                                <a class="btn btn-sm text-decoration-none" href="{{ route('user.dishes.index') }}">
                                    <div class="d-none d-md-block">
                                        Menù del Ristorante
                                    </div>
                                    <i class="fa-solid fa-utensils d-md-none"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column flex-md-row text-white">
                            <div class="col-12 col-md-6">
                                <div class="info-restaurant">
                                    <i class="fa-solid fa-utensils"></i>
                                    <span>{{ $restaurant->typologies[0]->name }}</span>
                                </div>

                                <div class="info-restaurant">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $restaurant->address }}</span>
                                </div class="">

                                <div class="info-restaurant">
                                    <i class="fa-regular fa-file-lines"></i>
                                    <span>{{ $restaurant->p_iva }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pt-4 pt-md-0 ">
                                @if (Str::contains($restaurant->main_image, 'https'))
                                    <img src="{{ $restaurant->main_image }}" alt="{{ $restaurant->name }}"
                                        class="img-fluid h-100 w-100">
                                @else
                                    <img src="{{ asset('/storage/' . $restaurant->main_image) }}" alt="{{ $restaurant->name }}"
                                        class="img-fluid h-100 w-100">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
