
<?php 

    use App\Models\Category;

    $categories = Category::all();

    // dd($categories);
 ?>


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach($categories as $category)
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <div class="card text-center">

                <a class="card-text" href="{{ url("/product/category/view/{$category->id}")}}">
                    
                    <img width="100" height="150" class="card-img-top" src="images/{{$category->photo}}">

                    <div class="card-body">
                        <p class="card-text d-inline-block text-truncate" style=" font-size: :90%; max-width: 95%;">{{ $category->name}}</p>
                    </div>
                </a>
                 
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
