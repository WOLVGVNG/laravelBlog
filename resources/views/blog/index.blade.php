@extends('main')

@section('title', '| Blog')

@section('content')

  <div class="container mt-5"> 
    <div class='row'>
      <div class="col-md-8 offset-md-2 text-center mb-5">
        <h1>Blog</h1>
      </div>
    </div>

    @foreach($posts as $post)
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2>{{ $post->title }}</h2>
          <h5>Published: 
            @if(date('j-M-Y', strtotime($post->created_at)) == date('j-M-Y'))
              {{ date('j M Y, G:i', strtotime($post->created_at)) }}
            @else
              {{ date('M j, Y', strtotime($post->created_at)) }}
            @endif
          </h5>

          <p>{{ substr($post->body, 0, 191) }}{{ strlen($post->body) > 191 ? '...' : '' }}</p>

          <a href='{{ route('blog.single', $post->slug) }}' class='btn btn-primary'>Read More</a>

          <br><hr><br>
        </div>
      </div>
    @endforeach


    <div class='row mt-4'>
      <div class="mx-auto">
        {!! $posts->links() !!}
      </div>
    </div>


  </div>

@endsection