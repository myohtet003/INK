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
                <div class="card-header">Add New Product</div>
                <div class="card-body">
                    <form action="{{ url("/admin/product/add") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Category:</label></td>
                                <td>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">
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
                                        <option value="{{$item->id}}">
                                            {{$item->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Name:</label></td>
                                <td><input class="form-control" type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Photo:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Price:</label></td>
                                <td><input class="form-control" type="number" name="price"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Qty:</label></td>
                                <td><input class="form-control" type="number" name="qty"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Remark:</label></td>
                                <td><input class="form-control" type="text" name="remark"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary btn-sm" type="submit" value="Add">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    <table class="table table-default table-sm" >
                        <tr>
                            <th>Id</th>
                            <th>Category ID</th>
                            <th>Item ID</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($products as $product)
                        <tr class="text-align-center">
                            <td>{{ $product->id}}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->item->name }}</td>
                            <td>{{ $product->name}}</td>
                            <td>
                                <img width="50px" height="50px" src="{{asset("images/$product->photo")}}">
                            </td>
                            <td>{{ $product->price}}</td>
                            <td>{{ $product->qty}}</td>
                            <td>{{ $product->remark}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" onclick="confirm('Are you sure to delete..?')" href="{{ url("/admin/product/delete/{$product->id}") }}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/product/update/{$product->id}") }}">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
