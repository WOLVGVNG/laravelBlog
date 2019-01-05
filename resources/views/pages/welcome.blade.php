@extends('main')

@section('title', '| Home')

@section('content')
    <div class='container mx-auto mt-3'>
        <div class='row'>
            <div class="jumbotron col-md-12 text-center">
                <div class="container">
                    <h1 class="display-3 mb-4">Laravel Blog</h1>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/about') }}" role="button">Learn more about me! &raquo;</a></p>
                </div>                    
            </div>
        </div>

        <div class='row mt-4'>
            <div class='col-md-10 offset-md-1'>
                @foreach($posts as $post)

                <div class='post'>
                    <h4><b>{{ $post->title }}</b></h4>
                    <p> {{ substr($post->body,0 ,700) }}{{ strlen($post->body) > 700 ? "..." : ""}} </p>
                <a href='{{ url('blog/' . $post->slug) }}' class='btn btn-primary'>Read More</a>
                </div>
                <br><br>
                <hr>
                <br><br>

                @endforeach
            </div>           
        </div>
    </div>
@endsection