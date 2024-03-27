@extends('layouts.app')

@section('body-class', 'homepage')

@section('content')

    <section id="homepage">
        <div class="container">
            <div class="row">

                {{-- Sezione benvenuto --}}
                <div class="col-12">
                    <div class="text-center text-white mt-5">
                        <img class="img-fluid" src="./img/Logo.png" alt="">
                        <h1 class="super-ocean mt-5 mb-3">Benvenuto su <span class="txt-orange title">Delive</span><span class="txt-gold title">Boo</span></h1>
                        <p>Qui puoi gestire, modificare e creare i tuoi ristornanti con il relativo menù. hai a disposizione una dashboard per controllare l'andamento del tuo ristorante e dei singoli piatti.</p>
                    </div>
                </div>

                {{-- Sezione esposizione dei grafici --}}
                <div class="col-6">
                    <div class="text-center text-white">
                        AAA
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-center text-white">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
