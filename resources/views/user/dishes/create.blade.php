@extends('layouts.app')

@section('content')

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 my-2">

                {{-- Card della form di creazione di un nuovo piatto --}}
                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header">
                        <div class="col-12">
                            <h2 class="fs-4 my-2">
                                Aggiungi un nuovo piatto
                            </h2>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form class="row g-2" action="" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- Sezione label del nome --}}
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nome:</label>
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            id="name" placeholder="Inserisci il nome del piatto..."
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento della descrizione --}}
                                    <div class="col-12">
                                        <label for="description" class="form-label">Descrizione:</label>
                                        <div class="form-floating">
                                            <textarea name="description" class="form-control form-control-sm" placeholder="Leave a comment here"
                                                id="description" style="height: 100px" required>{{ old('description') }}</textarea>
                                            <label for="description" class="text-secondary">Aggiungi una descrizione...</label>
                                        </div>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento del genere--}}
                                    <div class="col-12">
                                        <label for="genre" class="form-label">Genere:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm text-secondary" name="genre" id="genre" required>
                                                <option selected>Imposta il tipo di piatto...</option>
                                                @foreach ($genres as $genre)
                                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('genre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento del prezzo --}}
                                    <div class="col-12">
                                        <label for="price" class="form-label">Prezzo:</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text">€</span>
                                            <input name="price" type="number" class="form-control form-control-sm"
                                                id="price" aria-label="Amount (to the nearest euro)"
                                                value="{{ old('price') }}" required>
                                        </div>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento della disponibilità --}}
                                    <div class="col-12">
                                        <label for="visible" class="form-label">Disponibilità:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm text-secondary" name="visible" id="visible" required>
                                                <option selected>Seleziona la disponibilità...</option>
                                                <option value="1">Disponibile</option>
                                                <option value="0">Non disponibile</option>
                                            </select>
                                        </div>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per inserimento immagine --}}
                                    <div class="col-12">
                                        <label for="image" class="form-label">Immagine:</label>
                                        <input type="text" name="image" id="image" class="form-control form-select-sm" required>
                                    </div>

                                    {{-- Pulsante submit --}}
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-sm btn-primary float-end">Aggiungi</button>
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