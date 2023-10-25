

@extends('layouts.app')
@section('content')


<div class="container">
    <div class="d-flex flex-row flex-wrap my-flex-container justify-content-center">

        <div class="col-md-6 ">
            <div class="card text-center">
                <div class="card-header">Product Photo</div>
                <div class="card-body">
                    <img src="{{ asset("images/$product->photo") }}" width="200px" height="150px">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">Details Information</div>
                <div class="card-body">
                     <div class="card-text">Name: {{ $product->name}}</div>
                     <div class="card-text">Price: {{ $product->price}}</div>
                     <div class="card-text">Qty: {{ $product->qty}}</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">

         <div class="col-md-12 text-center">
             <form method="get" enctype="multipart/form-data" action="{{ url("/product/addToCartQty/{$product->id}") }}">
                {{ csrf_field() }}
                 
                 <span>
                     Quantity :
                     <input type="number" name="pqty" value="1" min="1" max="{{ $product->qty }}">
                 </span>
                 <input type="submit" name="Add to Cart" class="btn btn-primary">
             </form>
         </div>
    </div>
</div>
@endsection
