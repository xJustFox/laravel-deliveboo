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
                                    <th>ID</th>
                                    <th id="col-email">Email</th>
                                    <th>Status</th>
                                    <th>Prezzo</th>
                                    <th>Strumenti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td id="col-email">{{ $order->email }}</td>
                                        <td>
                                            @if ($order->status == 1)
                                            <i class="fa-solid fa-square-xmark" style="color: red"></i>
                                            <span class="textStatus ms-1">Rifiutato</span> 
                                            @else
                                            <i class="fa-solid fa-square-check" style="color: rgb(0, 161, 0)"></i>
                                            <span class="textStatus ms-1">Accettato</span> 
                                            @endif
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
