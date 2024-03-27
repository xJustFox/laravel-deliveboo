@extends('layouts.app')

@section('content')
    <div class="container mt-4" id="add-dish">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 my-2">

                {{-- Card della form di creazione di un nuovo piatto --}}
                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header text-white text-center super-ocean">
                        <span class="arrow-rotate d-flex justify-content-start">
                            <a href="{{ route('user.dishes.index') }}"><i class="fa-solid fa-chevron-left"
                                    style="color: #DA643F;"></i></a>
                        </span>
                        <span>
                            Aggiungi un nuovo piatto
                        </span>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form class="row g-2" action="{{ route('user.dishes.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- Sezione label per inserimento del nome --}}
                                    <div class="col-12 mb-2">
                                        <label for="name" class="form-label text-white">Nome: *</label>
                                        <input name="name" type="text" class="form-control form-control-sm my-form"
                                            id="name" placeholder="Inserisci il nome del piatto..."
                                            value="{{ old('name') }}" maxlength="100" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- Sezione label per inserimento del genere --}}
                                    <div class="col-12 mb-2">
                                        <label for="genre_id" class="form-label text-white">Genere: *</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="genre_id"
                                                id="genre_id" required>
                                                <option class="my-option" value="">Imposta il tipo di piatto...
                                                </option>
                                                @foreach ($genres as $genre)
                                                    <option class="my-option" value="{{ $genre->id }}"
                                                        @selected(old('genre_id') == $genre->id)>{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('genre_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento del prezzo --}}
                                    <div class="col-12 mb-2">
                                        <label for="price" class="form-label text-white">Prezzo: *</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text my-input-text">€</span>
                                            <input name="price" type="number"
                                                class="form-control form-control-sm my-form" id="price"
                                                aria-label="Amount (to the nearest euro)" value="{{ old('price') }}"
                                                required>
                                        </div>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento della disponibilità --}}
                                    <div class="col-12 mb-2">
                                        <label for="visible" class="form-label text-white">Disponibilità: *</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="visible"
                                                id="visible" required>
                                                <option class="my-option" value="" selected>Seleziona la
                                                    disponibilità...</option>
                                                <option class="my-option" value="1" @selected(old('visible') == '1')>
                                                    Disponibile</option>
                                                <option class="my-option" value="0" @selected(old('visible') == '0')>Non
                                                    disponibile</option>
                                            </select>
                                        </div>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento immagine --}}
                                    <div class="col-12 mb-2">
                                        <label for="image" class="form-label text-white">Immagine: *</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-sm my-form" value="{{ old('image') }}">
                                    </div>

                                    {{-- Sezione label per inserimento della descrizione --}}
                                    <div class="col-12 mb-2">
                                        <label for="description" class="form-label text-white">Descrizione: *</label>
                                        <textarea name="description" class="form-control form-control-sm my-form" placeholder="Aggiungi una descrizione..."
                                            id="description" style="height: 100px" maxlength="300" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Campi obbligatori --}}
                                    <div class="col-md-8 col-xs-12 d-flex align-items-end text-light py-2 ">
                                        <span
                                            class="fst-italic fw-light text-decoration-underline req_fields">{{ __('Sono contrassegnati con * i campi obbligatori') }}</span>
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
