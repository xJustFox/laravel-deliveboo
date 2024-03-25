@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="fs-3 text-secondary text-white super-ocean my-4">
            {{ __('Profile') }}
        </h2>
        <div class="card p-4 mb-4 bg-blur shadow rounded-lg text-white">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card p-4 mb-4 bg-blur shadow rounded-lg text-white">


            @include('profile.partials.update-password-form')

        </div>

        <div class="card p-4 mb-4 bg-blur shadow rounded-lg text-white">


            @include('profile.partials.delete-user-form')

        </div>
    </div>
@endsection
