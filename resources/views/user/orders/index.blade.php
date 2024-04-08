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
                                    <th>Data</th>
                                    <th id="col-email">Email</th>
                                    <th>Status</th>
                                    <th>Prezzo</th>
                                    <th>Strumenti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at->toDateString() }}</td>
                                        <td id="col-email">{{ $order->email }}</td>
                                        <td>
                                            <span class="textStatus ms-1 badge" style="background-color: rgb(0, 161, 0)">Accettato</span>
                                        </td>
                                        <td>{{ $order->price }} €</td>
                                        <td>
                                            <a class="btn btn-sm text-decoration-none"
                                                href="{{ route('user.orders.show', $order->id) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
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
