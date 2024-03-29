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
                <div class="card-header">Edit Artist</div>
                <div class="card-body overflow-hidden">
                    <form action="{{ url("/admin/artist/update/$artist->id") }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <table class="table table-sm" >
                            <tr>
                                <td><label class="form-control">Name:</label></td>
                                <td><input class="form-control" type="text" name="name" value="{{$artist->name}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Position:</label></td>
                                <td><input class="form-control" type="text" name="position" value="{{$artist->position}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">OldPhoto:</label></td>
                                <td>
                                     <img width="50px" height="50px" src="{{asset("images/$artist->photo")}}">
                                </td>
                            </tr>

                            <tr>
                                <td><label class="form-control">NewPhoto:</label></td>
                                <td><input class="form-control" type="file" name="photo"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Fb-link:</label></td>
                                <td><input class="form-control" type="text" name="fb_link" value="{{$artist->fb_link}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Viber-link:</label></td>
                                <td><input class="form-control" type="text" name="viber_link" value="{{$artist->viber_link}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Phone:</label></td>
                                <td><input class="form-control" type="text" name="phone" value="{{$artist->phone}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Status:</label></td>
                                <td><input class="form-control" type="text" name="status" value="{{$artist->status}}"></td>
                            </tr>
                            <tr>
                                <td><label class="form-control">Remark:</label></td>
                                <td><input class="form-control" type="text" name="remark" value="{{$artist->remark}}"></td>
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
