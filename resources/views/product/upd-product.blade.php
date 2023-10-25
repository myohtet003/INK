@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Edit Product</div>
                <div class="card-body">
                    <form action="{{ url("/admin/product/update/$product->id") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Category:</label></td>
                                <td>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                        //if function is for logical 
                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                                            {{$category->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Item:</label></td>
                                <td>
                                    <select name="item_id" class="form-control">
                                        @foreach($items as $item)
                                        //if function is for logical 
                                        <option value="{{$item->id}}" @if($item->id == $product->item_id) selected @endif>
                                            {{$item->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Name:</label></td>
                                <td><input class="form-control" type="text" name="name" value="{{$product->name}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">OldPhoto:</label></td>
                                <td>
                                     <img width="50px" height="50px" src="{{asset("images/$product->photo")}}">
                                </td>
                            </tr>

                            <tr>
                                <td><label class="form-control">NewPhoto:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                             <tr>
                                <td><label class="form-control">Price:</label></td>
                                <td><input class="form-control" type="number" name="price" value="{{$product->price}}"></td>
                            </tr>
                             <tr>
                                <td><label class="form-control">Qty:</label></td>
                                <td><input class="form-control" type="number" name="qty" value="{{$product->qty}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Remark:</label></td>
                                <td><input class="form-control" type="text" name="remark" value="{{$item->remark}}"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary btn-sm" type="submit" value="Update">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
