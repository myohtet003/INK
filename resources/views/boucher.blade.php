@extends('layouts.app')
@section('content')

<div class="container">
<div class="row justify-content-center">

    <div class="col-12">
        
        <div class="clearfix">
            <span class="float-start">
                Name: <b> {{ auth()->user()->name }}</b>
            </span>
            <span class="float-end">
                OrderID: <b>{{ $order->id }}</b>
            </span>
        </div>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty</th>            
                    <th>Amount</th>     
                </tr>
            </thead>

            <tbody>

                @foreach($orderitems as $orderitem)
                <tr>
                    <td>{{ $orderitem->product_id }} </td>              
                    <td>{{ $orderitem->name }} </td>
                    <td>{{ $orderitem->price }} </td>           
                    <td>{{ $orderitem->qty }} </td> 
                    <td>{{ $orderitem->amount }} </td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3">TOTAL</td>
                    <td>{{ $order->totalQty }}</td>
                    <td>{{ $order->totalPrice }}</td>
                </tr>

            </tbody>
        </table>

        <div class="text-center">            
            <a href="{{ url("/payment?order_id=$order->id") }}" class="btn btn-primary btn-sm">
                Payment
            </a>            
        </div>


    </div>

</div> 
</div>

@endsection