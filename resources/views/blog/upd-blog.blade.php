@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Blog</div>
                <div class="card-body">
                    <form action="{{ url("/admin/blog/update/$blog->id") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Artist:</label></td>
                                <td>
                                    <select name="artist_id" class="form-control">
                                        @foreach($artists as $artist)
                                        //if function is for logical 
                                        <option value="{{$artist->id}}" @if($artist->id == $blog->artist_id) selected @endif>
                                            {{$artist->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Title:</label></td>
                                <td><input class="form-control" type="text" name="title" value="{{$blog->title}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">OldPhoto:</label></td>
                                <td>
                                     <img width="50px" height="50px" src="{{asset("images/$blog->photo")}}">
                                </td>
                            </tr>

                            <tr>
                                <td><label class="form-control">NewPhoto:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Description:</label></td>
                                <td>
                                    <textarea class="form-control"
                                    style="height: 7rem"
                                    type="text" name="description" 
                                    value="">{{$blog->description}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Remark:</label></td>
                                <td><input class="form-control" type="text" name="remark" value="{{$blog->remark}}"></td>
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
