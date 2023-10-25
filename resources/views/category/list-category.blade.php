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
                <div class="card-header">Add New Category</div>
                <div class="card-body">
                    <form action="{{ url("/admin/category/add") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
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
                <div class="card-header">Category List</div>
                <div class="card-body">
                    <table class="table table-default table-sm" >
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($categories as $category)
                        <tr class="text-align-center">
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>
                                <img width="50px" height="50px" src="{{asset("images/$category->photo")}}">
                            </td>
                            <td>{{ $category->remark}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/category/delete/{$category->id}") }}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/category/update/{$category->id}") }}">Update</a>
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
