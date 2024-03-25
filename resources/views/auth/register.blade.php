@extends('layouts.app')

@section('content')
    <div class="container mt-4" id="register-page">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card ">
                    <div class="card-header text-white text-center super-ocean">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form class="row" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col-md-6 mb-2">
                                <label for="name" class="col-form-label text-white">{{ __('Nome e Cognome') }}</label>
                                <input id="name" type="text"
                                    class="form-control form-control-sm my-form @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="email" class="col-form-label text-white">{{ __('Indirizzo E-Mail') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-sm my-form @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="password" class="col-form-label text-white">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-sm my-form @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="password-confirm"
                                    class="col-form-label text-white">{{ __('Conferma Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm my-form"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            {{-- restaurants  side --}}

                            <div class="col-md-6 mb-2">
                                <label for="restaurantName"
                                class="col-form-label text-white">{{ __('Nome Ristorante') }}</label>
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


                            <div class="col-md-6 mb-2">
                                <label for="typology_id" class="col-form-label text-white">Tipologia Ristorante:</label>
                                <div class="btn-group w-100" id="typology_id">
                                    <button class="form-control form-control-sm my-form d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
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
                                        @endforeach
                                    </ul>
                                </div>
                                @error('typology_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror 
                                    {{-- <select name="typology_id" class="form-select form-select-sm my-select @error('typology_id') is-invalid border-danger @enderror" id="typology_id">
                                        <option class="my-option" value="{{ old('typology_id') }}" selected></option>
                                        @foreach ($typologies as $typology)
                                        <option class="my-option" value="{{ $typology->id }}">{{ $typology->name }}</option>
                                        @endforeach
                                        
                                    </select> --}}
                            </div>


                            {{-- <div class="col-md-6 mb-2">
                                <label for="typology_id" class="col-form-label text-white">Tipologia Ristorante:</label>
                                <select name="typology_id" class="form-select form-select-sm my-select @error('typology_id') is-invalid border-danger @enderror" id="typology_id">
                                    <option class="my-option" value="{{ old('typology_id') }}" selected>Schegli una tipologia...</option>
                                    @foreach ($typologies as $typology)
                                        <option class="my-option" value="{{ $typology->id }}">{{ $typology->name }}</option>
                                    @endforeach

                                </select>
                                @error('typology_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="col-md-6 mb-2">
                                <label for="address" class="col-form-label text-white">{{ __('Indirizzo') }}</label>
                                <input id="address" type="text"
                                    class="form-control form-control-sm my-form @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="p_iva" class="col-form-label text-white">{{ __('Partita IVA') }}</label>
                                <input id="p_iva" type="text"
                                    class="form-control form-control-sm my-form @error('p_iva') is-invalid @enderror"
                                    name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">

                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="main_image"
                                    class="col-form-label text-white">{{ __('Immagine di copertina') }}</label>
                                <input id="main_image" type="text"
                                    class="form-control form-control-sm my-form @error('main_image') is-invalid @enderror"
                                    name="main_image" value="{{ old('main_image') }}" required autocomplete="main_image">

                                @error('main_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12 d-flex justify-content-end">
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
