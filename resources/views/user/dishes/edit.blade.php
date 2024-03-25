@extends('layouts.app')

@section('content')

    
    <div class="container mt-4" id="modify-dish">
        <div class="row justify-content-center">
            <div class="col-10 my-2">

                {{-- Card della form di creazione di un nuovo piatto --}}
                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header text-white text-center super-ocean">
                        <span>
                            Modifica piatto
                        </span>
                        <span class="arrow-rotate">
                            <a  href="{{ route('user.dishes.index') }}"><i class="fa-solid fa-arrow-rotate-left" style="color: #DA643F;"></i></a>
                        </span>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form class="row g-2" action="{{ route('user.dishes.update', $dish->slug) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Sezione label per la modifica del nome --}}
                                    <div class="col-12 mb-2">
                                        <label for="name" class="form-label text-white">Nome:</label>
                                        <input name="name" type="text" class="form-control form-control-sm my-form"
                                            id="name" placeholder="Inserisci il nome del piatto..."
                                            value="{{ $dish->name }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    
                                    {{-- Sezione label per la modifica del genere--}}
                                    <div class="col-12 mb-2">
                                        <label for="genre_id" class="form-label text-white">Genere:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="genre_id" id="genre_id" value="{{ $dish->genre_id }}" required>
                                                <option class="my-option" value="">Imposta il tipo di piatto...</option>
                                                @foreach ($genres as $genre)
                                                    <option class="my-option" value="{{ $genre->id }}" @selected($genre->id == old('genre_id', $dish->name ? $dish->genre->id: ''))>{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('genre_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label per la modifica del prezzo --}}
                                    <div class="col-12 mb-2">
                                        <label for="price" class="form-label text-white">Prezzo:</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text my-input-text">€</span>
                                            <input name="price" type="number" class="form-control form-control-sm my-form"
                                            id="price" aria-label="Amount (to the nearest euro)"
                                            value="{{ $dish->price }}" required>
                                        </div>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    {{-- Sezione label per la modifica della disponibilità --}}
                                    <div class="col-12 mb-2">
                                        <label for="visible" class="form-label text-white">Disponibilità:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm my-select" name="visible" id="visible" required>
                                                <option class="my-option" value="" selected>Seleziona la disponibilità...</option>
                                                <option class="my-option" value="0" @selected($dish->visible != 1 ? true : '') @selected(true)>Non disponibile</option>
                                                <option class="my-option" value="1" @selected($dish->visible == 1 ? true : '')>Disponibile</option>
                                            </select>
                                        </div>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    {{-- Sezione label per la modifica immagine --}}
                                    <div class="col-12 mb-2">
                                        <label for="image" class="form-label text-white">Immagine:</label>
                                        <input type="text" name="image" id="image" class="form-control form-control-sm my-form" value="{{ $dish->image }}" required>
                                    </div>
                                    
                                    {{-- Sezione label per la modifica della descrizione --}}
                                    <div class="col-12 mb-2">
                                        <label for="description" class="form-label text-white">Descrizione:</label>
                                        <textarea name="description" class="form-control form-control-sm my-form" placeholder="Aggiungi una descrizione..." id="description" style="height: 100px" required>{{ $dish->description }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Pulsante submit --}}
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" value="Submit" class="btn btn-sm btn-primary float-end">Aggiungi</button>
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