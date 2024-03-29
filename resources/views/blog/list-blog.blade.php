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
                <div class="card-header">Add New Blog</div>
                <div class="card-body">
                    <form action="{{ url("/admin/blog/add") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Artist:</label></td>
                                <td>
                                    <select name="artist_id" class="form-control">
                                        @foreach($artists as $artist)
                                        <option value="{{$artist->id}}">
                                            {{$artist->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Title:</label></td>
                                <td><input class="form-control" type="text" name="title"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Photo:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Description:</label></td>
                                <td><textarea style="height: 7rem" class="form-control" type="text" name="description"></textarea></td>
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
                <div class="card-header">Blog List</div>
                <div class="card-body overflow-auto">
                    <table class="table table-default table-sm" >
                        <tr>
                            <th>Id</th>
                            <th>Arist ID</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($blogs as $blog)
                        <tr class="text-align-center">
                            <td>{{ $blog->id}}</td>
                            <td>{{ $blog->artist->name }}</td>
                            <td>{{ $blog->title}}</td>
                            <td>
                                <img width="50px" height="50px" src="{{asset("images/$blog->photo")}}">
                            </td>
                            <td>{{$blog->description}}</td>
                            <td>{{ $blog->remark}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/blog/delete/{$blog->id}") }}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/blog/update/{$blog->id}") }}">Update</a>
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
