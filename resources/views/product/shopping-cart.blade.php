

@extends('layouts.app')
@section('content')


<div class="container">

    @if(Session::has('cart'))
    <div class="d-flex flex-row flex-wrap my-flex-container justify-content-center">

        <div class="col-lg-12 col-md-12 col-xs-12 text-center">
            <h2>Items in Shopping Cart</h2>
            
            <table class="table table-hover mt-3">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th class="text-center" colspan="3">Qty</th>
                    <th>Amount</th>
                    <th>Status</th> 
                </tr>

                @foreach($products as $product)

                <?php  ?>
                <tr>
                    <td>{{$product['item']['id']}}</td>
                    <td>{{$product['item']['name']}}</td>
                    <td>{{number_format($product['item']['price'])}} MMK</td>
                    <td><a href="{{url("/product/subToCart/{$product['item']['id']}")}}" class="btn btn-outline-primary"> - </a></td>
                    <td>{{$product['qty']}}</td>
                    <td><a href="{{url("/product/addToCart/{$product['item']['id']}")}}" class="btn btn-outline-primary"> + </a></td>
                    <td>{{number_format($product['item']['price'] * $product['qty']) }} MMK</td>
                    <td><a href="{{url("/product/removeFromCart/{$product['item']['id']}")}}" class="btn btn-outline-danger">Remove</a></td>
                </tr>

                @endforeach

                <tr>
                    <td colspan="3">TOTAL</td>
                    <td colspan="3">{{$totalQty}}</td>
                    <td class="text-right ">
                            <b>{{ number_format($totalPrice) }} MMK</b>
                    </td>                       
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 text-center">
            <a href="{{url("/")}}" class="btn btn-outline-primary" style="width: 100%">Continue Shopping</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 text-center">
            <a href="{{url("/product/clearCart")}}" class="btn btn-outline-primary" style="width: 100%">Clear Cart</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 text-center">
            <a href="{{url("/order")}}" class="btn btn-outline-primary" style="width: 100%">Order</a>
        </div>
    </div>
    @else
    <div class=" row justify-content-center">
        
        <div class="col-lg-12 col-md-12 col-xs-12 text-center">
            <h2>No Items in Shopping Cart</h2>
            
        </div>
    </div>
    @endif
</div>

@endsection
