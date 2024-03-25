@extends('layouts.app')

@section('content')
    <div class="container" id="order_page">
        <h2 class="my-4 fs-4 text-secondary">
            {{ __('Orders') }}
        </h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-white super-ocean">
                        <h2 class="">
                            {{ __('Ordini') }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
