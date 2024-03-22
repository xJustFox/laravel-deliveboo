@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-12 text-center p-5">
               <h1 class="text-center">{{$dish->name}}</h1>     
          </div>
          <div class="col-8">
               {{$dish->description}}
               <div class="col-12 p-3">
                    <img class=" w-50" src="{{$dish->image}}" alt="">
               </div>
          </div>
          <div class="col-3 p-4">
               <div class="bg-warning rounded  p-3 m-3">
                    <div>{{$dish->name}}</div>
                    <div>{{$dish->genre->name}}</div>
                    <div>{{$dish->price}}$</div>
               </div>
          </div>
     </div>
</div>
@endsection