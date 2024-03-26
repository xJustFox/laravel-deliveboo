@extends('layouts.app')

@section('content')

    {{-- Pagina di registrazione --}}
    <div class="container mt-4" id="register-page">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card ">

                    {{-- Header form registrazione --}}
                    <div class="card-header text-white text-center super-ocean">{{ __('Register') }}</div>

                    {{-- Body form registrazione --}}
                    <div class="card-body">
                        <form class="row" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Sezione nome e cognome --}}
                            <div class="col-md-6 mb-2">
                                <label for="name" class="col-form-label text-white">{{ __('Nome e Cognome *') }}</label>
                                <input id="name" type="text"
                                    class="form-control form-control-sm my-form @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione email --}}
                            <div class="col-md-6 mb-2">
                                <label for="email" class="col-form-label text-white">{{ __('Indirizzo E-Mail *') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-sm my-form @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione password --}}
                            <div class="col-md-6 mb-2">
                                <label for="password" class="col-form-label text-white">{{ __('Password *') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-sm my-form @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione conferma password --}}
                            <div class="col-md-6 mb-2">
                                <label for="password-confirm"
                                    class="col-form-label text-white">{{ __('Conferma Password *') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm my-form"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            {{-- Restaurants  side --}}
                            {{-- Sezione nome ristorante --}}
                            <div class="col-md-6 mb-2">
                                <label for="restaurantName"
                                class="col-form-label text-white">{{ __('Nome Ristorante *') }}</label>
                                <input id="restaurantName" type="text"
                                class="form-control form-control-sm my-form @error('restaurantName') is-invalid @enderror"
                                name="restaurantName" value="{{ old('restaurantName') }}" required
                                autocomplete="restaurantName">
                                
                                @error('restaurantName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Sezione tipologia ristorante --}}
                            <div class="col-md-6 mb-2">
                                <label for="typology_id" class="col-form-label text-white">Tipologia Ristorante: *</label>
                                <div class="btn-group w-100" id="typology_id">
                                    <button class="form-control form-control-sm my-form d-flex justify-content-between align-items-center @error('typologies') is-invalid @enderror" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                      Scegli una tipologia...
                                      <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($typologies as $typology)
                                        <li class="p-2 d-flex">
                                            <input class="form-check-input" type="checkbox" name="typologies[]" value="{{ $typology->id }}" id="type-{{ $typology->id }}" @checked(is_array(old('typologies')) && in_array($typology->id, old('typologies')))>
                                            <label class="form-check-label" for="typologies[]">
                                                {{ $typology->name }}
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('typologies')
                                <span class=" text-danger fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Sezione indirizzo --}}
                            <div class="col-md-6 mb-2">
                                <label for="address" class="col-form-label text-white">{{ __('Indirizzo *') }}</label>
                                <input id="address" type="text"
                                    class="form-control form-control-sm my-form @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione p.iva --}}
                            <div class="col-md-6 mb-2">
                                <label for="p_iva" class="col-form-label text-white">{{ __('Partita IVA *') }}</label>
                                <input id="p_iva" type="text"
                                    class="form-control form-control-sm my-form @error('p_iva') is-invalid @enderror"
                                    name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">

                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione immagine di copertina --}}
                            <div class="col-md-12 mb-3">
                                <label for="main_image"
                                    class="col-form-label text-white">{{ __('Immagine di copertina *') }}</label>
                                <input id="main_image" type="text"
                                    class="form-control form-control-sm my-form @error('main_image') is-invalid @enderror"
                                    name="main_image" value="{{ old('main_image') }}" required autocomplete="main_image">

                                @error('main_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Campi obbligatori --}}
                            <div class="col-md-8 col-xs-12 d-flex align-items-end text-light py-2 ">
                                <span class="fst-italic fw-light text-decoration-underline req_fields">{{__('Sono contrassegnati con * i campi obbligatori')}}</span>
                            </div>

                            {{-- Pulsante registrazione --}}
                            <div class="col-md-4 col-xs-12 d-flex justify-content-end py-2 ">
                                <button type="submit" class="btn btn-sm">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
