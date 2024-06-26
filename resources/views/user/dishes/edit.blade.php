@extends('layouts.app')

@section('content')
    <div class="container mt-4" id="modify-dish">
        <div class="row justify-content-center">
            <div class="col-10 my-2">

                {{-- Card della form di creazione di un nuovo piatto --}}
                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header text-white text-center super-ocean">
                        <span class="arrow-rotate d-flex justify-content-start">
                            <a href="{{ route('user.dishes.index') }}"><i class="fa-solid fa-chevron-left"
                                    style="color: #DA643F;"></i></a>
                        </span>
                        <span>
                            Modifica piatto
                        </span>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="dish-form" class="row g-2" action="{{ route('user.dishes.update', $dish->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Sezione label per la modifica del nome --}}
                                    <div class="col-12 mb-2">
                                        <label for="name" class="form-label text-white">Nome: *</label>
                                        <input name="name" type="text" class="form-control form-control-sm my-form"
                                            id="name" placeholder="Inserisci il nome del piatto..."
                                            value="{{ $dish->name }}" maxlength="100" required>
                                        <span class="error-message text-danger" id="name-error"></span>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- Sezione label per la modifica del genere --}}
                                    <div class="col-12 mb-2">
                                        <label for="genre_id" class="form-label text-white">Genere: *</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="genre_id"
                                                id="genre_id" value="{{ $dish->genre_id }}" required>
                                                <option class="my-option" value="">Imposta il tipo di piatto...
                                                </option>
                                                @foreach ($genres as $genre)
                                                    <option class="my-option" value="{{ $genre->id }}"
                                                        @selected($genre->id == old('genre_id', $dish->name ? $dish->genre->id : ''))>{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="error-message text-danger" id="genre-error"></span>
                                        @error('genre_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per la modifica del prezzo --}}
                                    <div class="col-12 mb-2">
                                        <label for="price" class="form-label text-white">Prezzo: *</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text my-input-text">€</span>
                                            <input name="price" type="number"
                                                class="form-control form-control-sm my-form" id="price"
                                                aria-label="Amount (to the nearest euro)" step="any" value="{{ $dish->price }}"
                                                required>
                                        </div>
                                        <span class="error-message text-danger" id="price-error"></span>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per la modifica della disponibilità --}}
                                    <div class="col-12 mb-2">
                                        <label for="visible" class="form-label text-white">Disponibilità: *</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="visible"
                                                id="visible" required>
                                                <option class="my-option" value="0" @selected($dish->visible != 1 ? true : '')
                                                    @selected(true)>Non disponibile</option>
                                                <option class="my-option" value="1" @selected($dish->visible == 1 ? true : '')>
                                                    Disponibile</option>
                                            </select>
                                        </div>
                                        <span class="error-message text-danger" id="visible-error"></span>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per la modifica immagine --}}
                                    <div class="col-12 mb-2">
                                        <label for="image" class="form-label text-white">Immagine: </label>
                                        <div class="input-group custom-file-button">
                                            <label class="input-group-text p-0 px-2 my-form" for="image">Scegli file</label>
                                            <input type="file" name="image" id="image" class="form-control form-control-sm my-form">
                                        </div>

                                        <span class="error-message text-danger" id="image-error"></span>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per la modifica della descrizione --}}
                                    <div class="col-12 mb-2">
                                        <label for="description" class="form-label text-white">Descrizione: *</label>
                                        <textarea name="description" class="form-control form-control-sm my-form" placeholder="Aggiungi una descrizione..."
                                            id="description" style="height: 100px" maxlength="300" required>{{ $dish->description }}</textarea>
                                        <span class="error-message text-danger" id="description-error"></span>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Campi obbligatori --}}
                                    <div class="col-md-8 col-xs-12 d-flex align-items-end text-light py-2 ">
                                        <span class="fst-italic fw-light txt-orange req_fields">{{ __('Sono contrassegnati con * i campi obbligatori') }}
                                        </span>
                                    </div>

                                    {{-- Pulsante submit --}}
                                    <div class="text-center col-md-4 col-xs-12 d-flex justify-content-end py-2">
                                        <button type="submit" value="Submit"
                                            class="btn btn-sm btn-primary float-end">Aggiungi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
