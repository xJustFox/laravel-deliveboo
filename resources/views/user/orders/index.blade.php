@extends('layouts.app')

@section('content')
    <div class="container-lg pt-4" id="order_page">
        <div class="row">
            <div class="col-12">
                <div class="card text-white">
                    <div class="card-header super-ocean">
                        <h2 class="">
                            {{ __('Ordini') }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-transparent display" id="orders-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Indirizzo</th>
                                    <th>Telefono</th>
                                    <th>Prezzo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->phone_num }}</td>
                                        <td>{{ $order->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
