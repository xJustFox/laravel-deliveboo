@extends('layouts.app')

@section('content')
    <div class="container" id="dashboard">
        <div class="row justify-content-center">
            <div class="col">

                <div class="e-card playing">
                    <div class="image"></div>

                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>


                    <div class="infotop">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="super-ocean fs-3 d-flex justify-content-center align-items-center flex-column">
                                <img class="w-img-100" src="{{ Vite::asset('public/img/logo-white.png') }}" alt="">
                                <div class="">
                                    {{ __('Benvenuto in DeliveBoo!') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
