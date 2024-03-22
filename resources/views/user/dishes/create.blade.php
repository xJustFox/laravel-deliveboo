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
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label della descrizione --}}
                                    <div class="col-12">
                                        <label for="description" class="form-label">Descrizione:</label>
                                        <div class="form-floating">
                                            <textarea name="description" class="form-control form-control-sm" placeholder="Leave a comment here"
                                                id="description" style="height: 100px">{{ old('description') }}</textarea>
                                            <label for="description" class="text-secondary">Aggiungi una descrizione...</label>
                                        </div>
                                    </div>

                                    {{-- Sezione label genere--}}
                                    <div class="col-12">
                                        <label for="visible" class="form-label">Genere:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm" name="visible" id="visible">
                                                <option selected>Imposta il tipo di piatto...</option>
                                                <option value="1">Antipasto</option>
                                                <option value="2">Primo</option>
                                                <option value="3">Secondo</option>
                                                <option value="4">Contorno</option>
                                                <option value="5">Dolce</option>
                                                <option value="6">Bevanda</option>
                                            </select>
                                        </div>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label del prezzo --}}
                                    <div class="col-12">
                                        <label for="price" class="form-label">Prezzo:</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text">€</span>
                                            <input name="price" type="number" class="form-control form-control-sm"
                                                id="price" aria-label="Amount (to the nearest euro)"
                                                value="{{ old('price') }}">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Sezione label della disponibilità --}}
                                    <div class="col-12">
                                        <label for="visible" class="form-label">Disponibilità:</label>
                                        <div class="input-group">
                                            <select class="form-select form-select-sm" name="visible" id="visible">
                                                <option selected>Seleziona la disponibilità...</option>
                                                <option value="1">Disponibile</option>
                                                <option value="0">Non disponibile</option>
                                            </select>
                                        </div>
                                        @error('visible')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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