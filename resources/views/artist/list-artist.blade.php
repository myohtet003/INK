@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Add New Artist</div>
                    <div class="card-body">
                        <form action="{{ url('/admin/artist/add') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Name:</label></td>
                                    <td><input class="form-control" type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Positon:</label></td>
                                    <td><input class="form-control" type="text" name="position"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Photo:</label></td>
                                    <td><input class="form-control" type="file" name="photo"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Facebook-link:</label></td>
                                    <td><input class="form-control" type="text" name="fb_link"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Viber-link:</label></td>
                                    <td><input class="form-control" type="text" name="viber_link"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Phone:</label></td>
                                    <td><input class="form-control" type="text" name="phone"></td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">Status:</label></td>
                                    <td><input class="form-control" type="text" name="status"></td>
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
            <div class="col-md-9">
                <div class="card w-100">
                    <div class="card-header">Artist List</div>
                        <div class="card-body overflow-auto">
                            <table class="table w-auto table-sm">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Photo</th>
                                    <th>Fb-link</th>
                                    <th>Viber-link</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>

                                @foreach ($artists as $artist)
                                    <tr class="text-align-center">
                                        <td>{{ $artist->id }}</td>
                                        <td>{{ $artist->name }}</td>
                                        <td>{{ $artist->position }}</td>
                                        <td>
                                            <img width="50px" height="50px" src="{{ asset("images/$artist->photo") }}">
                                        </td>
                                        <td>{{ $artist->fb_link }}</td>
                                        <td>{{ $artist->viber_link }}</td>
                                        <td>{{ $artist->phone }}</td>
                                        <td>{{ $artist->status }}</td>
                                        <td>{{ $artist->remark }}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url("/admin/artist/delete/{$artist->id}") }}">Delete</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ url("/admin/artist/update/{$artist->id}") }}">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
