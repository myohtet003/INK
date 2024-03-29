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
                <div class="card-header">Edit Artwork</div>
                <div class="card-body">
                    <form action="{{ url("/admin/artwork/update/$artwork->id") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Artist:</label></td>
                                <td>
                                    <select name="artist_id" class="form-control">
                                        @foreach($artists as $artist)
                                        //if function is for logical 
                                        <option value="{{$artist->id}}" @if($artist->id == $artwork->artist_id) selected @endif>
                                            {{$artist->name}}
                                        </option>
                                        @endforeach;
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Title:</label></td>
                                <td><input class="form-control" type="text" name="title" value="{{$artwork->title}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">OldPhoto:</label></td>
                                <td>
                                     <img width="50px" height="50px" src="{{asset("images/$artwork->photo")}}">
                                </td>
                            </tr>

                            <tr>
                                <td><label class="form-control">NewPhoto:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Remark:</label></td>
                                <td><input class="form-control" type="text" name="remark" value="{{$artwork->remark}}"></td>
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
