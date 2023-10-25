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
                <div class="card-header">Add New Item</div>
                <div class="card-body">
                    <form action="{{ url("/admin/item/add") }}" method="post" enctype="multipart/form-data">

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
                                <td><label class="form-control">Name:</label></td>
                                <td><input class="form-control" type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Photo:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
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
                <div class="card-header">Item List</div>
                <div class="card-body">
                    <table class="table table-default table-sm" >
                        <tr>
                            <th>Id</th>
                            <th>Category ID</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($items as $item)
                        <tr class="text-align-center">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                <img width="50px" height="50px" src="{{asset("images/$item->photo")}}">
                            </td>
                            <td>{{ $item->remark}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/item/delete/{$item->id}") }}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/item/update/{$item->id}") }}">Update</a>
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
