@extends('layouts.app')

@section('content')
    <div class="container" id="dashboard">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">

                <div class="e-card playing">
                    <div class="image"></div>

                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>


                    <div class="infotop">
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
