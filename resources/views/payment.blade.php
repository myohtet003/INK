
<?php 

    use App\Models\Category;

    $categories = Category::all();

    // dd($categories);
 ?>


@extends('layouts.app')

@section('content')

<form method="post" enctype="multipart/form-data">
    {{csrf_field() }}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3">
            <table class="table table-hover table-sm" style="font-size:80%">
                <tr>
                    <td style="border:1px solid blue; padding:3px; background: lightblue;">
                        Your Order ID:
                        <input type="text" name="order_id" value="{{ $order_id }}" readonly style="text-align: center;">
                    </td>
                    <td style="border:1px solid blue; padding:3px; background: lightblue;">
                        Your Payment Amount:
                        <input type="hidden" name="payment_amount" value="{{ ($payment_amount) }}" readonly style="text-align: center;">

                        <input type="text" name="" value="{{ $payment_amount}}" readonly style="text-align: center;">
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                
                <div class="card text-center" style="font-size: 12px;">
                    <img class="card-img-top" alt="Card image cap" src="{{ asset("kpay.jpg")}}">

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Phone Number</b></td>
                                <td>
                                    <input type="text" name="phone" value="" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Transaction Last [ 4 ] Digits</b></td>
                                <td>
                                    <input type="text" name="transaction" value="" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Paid" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
@endsection
