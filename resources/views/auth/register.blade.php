@extends('layouts.app')

@section('content')

    {{-- Pagina di registrazione --}}
    <div class="container mt-4" id="register-page">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card ">

                    {{-- Header form registrazione --}}
                    <div class="card-header text-white text-center super-ocean">{{ __('Registrati') }}</div>

                    {{-- Body form registrazione --}}
                    <div class="card-body">
                        <form class="row" id="registration-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Sezione nome e cognome --}}
                            <div class="col-md-6 mb-2">
                                <label for="name" class="col-form-label text-white">{{ __('Nome e Cognome *') }}</label>
                                <input id="name" type="text"
                                    class="form-control form-control-sm my-form @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <span class="text-danger" id="name-error"></span>
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

                                <span class="text-danger" id="email-error"></span>
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

                                <span class="text-danger" id="password-error"></span>
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
                                    class="form-control form-control-sm my-form @error('restaurantName') is-invalid @enderror" minlength="3" maxlength="100"
                                    name="restaurantName" value="{{ old('restaurantName') }}" required
                                    autocomplete="restaurantName">

                                <span class="text-danger" id="restaurantName-error"></span>
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

                                <span class="text-danger" id="typologies-error"></span>
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
                                    class="form-control form-control-sm my-form @error('address') is-invalid @enderror" minlength="4" maxlength="20"
                                    name="address" value="{{ old('address') }}" required autocomplete="address">

                                <span class="text-danger" id="address-error"></span>
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
                                    class="form-control form-control-sm my-form @error('p_iva') is-invalid @enderror" minlength="11" maxlength="11"
                                    name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">

                                <span class="text-danger" id="p_iva-error"></span>
                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Sezione immagine di copertina --}}
                            <div class="col-md-12 mb-3">
                                <label for="main_image" class="col-form-label text-white">{{ __('Immagine di copertina *') }}</label>
                                
                                <div class="input-group custom-file-button">
                                    <label class="input-group-text p-0 px-2 my-form" for="main_image">Scegli file</label>
                                    <input type="file" name="main_image" id="main_image" class="form-control form-control-sm my-form" required>
                                </div>

                                <span class="text-danger" id="main_image-error"></span>
                                @error('main_image')
                                    <span class="text-danger fs-6" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Campi obbligatori --}}
                            <div class="col-md-8 col-xs-12 d-flex align-items-end text-light py-2 ">
                                <span class="fst-italic fw-light txt-orange req_fields">{{__('Sono contrassegnati con * i campi obbligatori')}}</span>
                            </div>

                            {{-- Pulsante registrazione --}}
                            <div class="col-md-4 col-xs-12 d-flex justify-content-end py-2 ">
                                <button type="submit" class="btn btn-sm">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
