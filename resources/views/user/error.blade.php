@extends('layouts.app')

@section('content')
    <div class="container-lg" id="error-page">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="col-12 mb-4">
                    <img class="w-100" src="{{ Vite::asset('public/img/error-logo.png') }}" alt="">
                </div>
                <div class="col-12 text-center text-white mb-4">
                    <h1 class="super-ocean">Pagina non trovata</h1>
                    <p>Siamo spiacenti! La pagina che cerchi non è stata trovata in questo server. È stata probabilmente cancellata oppure ai inserito un indirizzo sbagliato. Ti preghiamo di controllare l'URL e riprovare</p>
                </div>
            </div>
        </div>
    </div>
@endsection
