

@extends('layouts.app')
@section('content')


<div class="container">
    <div class="d-flex flex-row flex-wrap my-flex-container justify-content-center">

        @foreach($products as $product)
    <div class="my-flex-item p-1" style="width: 165px;">
    <div class="card text-center">

        <a class="card-text" href="{{ url("/product/detail/view/{$product->id}") }}" >

            <img width="100" height="150" class="card-img-top" src="{{ asset("/images/$product->photo") }}" >

            <div class="card-body">
                <p class="card-text d-inline-block text-truncate" style="font-size: 90%;max-width: 95%; color: red;">
                {{ $product->price }} MMK               
                <p class="card-text d-inline-block text-truncate" style="font-size: 90%;max-width: 95%;">
                {{ $product->name }}                   
                </p>
            </div>
                
        </a>

    </div>
    </div>
    @endforeach
    </div>
</div>
@endsection
