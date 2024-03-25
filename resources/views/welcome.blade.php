@extends('layouts.app')

@section('body-class', 'homepage')

@section('content')
    <div class="p-3 pb-lg-5 mb-4 rounded-3">
        <div class="container-fluid px-3 py-5">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold super-ocean text-white">
                        Mangia con passione, comodamente a casa:
                        la tua felicità in ogni piatto
                    </h1>

                    <p class="col-lg-5 pt-2 text-lightgray">
                        Gusti autentici, comodamente a portata di click. Vivere bene non è mai stato così facile!
                    </p>
                </div>
                <div class="col-lg-5 d-flex justify-content-center aling-items-center">
                    <img class="w-lg-50 w-100" src="./img/hamburger-jumbotron.png" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
