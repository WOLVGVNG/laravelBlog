@extends('main')

@section('title', "| $post->title ")

@section('content')
  <div class="container mt-5"> 
      <div class="row">
        <div class="col-md-12">
          <h1>{{ $post->title }}</h1>
          <p class='mt-4 mb-5'>{{ $post->body }}</p>
        </div>
      </div>
      <div class='col-md-12 pl-0'>

        <h3 class='comments-title mb-5'>
          {{ Html::image('svg/comment.svg', 'alt text', ['style' => 'display: inline-block; width:40px;', 'class' => 'mr-3']) }} 
          {{ $post->comments()->count() }} Comments
        </h3>
      </div>

      @foreach($post->comments as $comment)
        <div class="row mb-4">
          @cannot('isAdmin')
            <div class="col-md-12">
              <h4 class='p-0 m-0'><strong>{{ $comment->user_name }}</strong></h4>
              <p class='date'>{{ date('j M Y', strtotime($comment->created_at)) }}</p>
              <p>{{ $comment->comment }}</p>
            </div>
          @endcannot

          @can('isAdmin')
            <div class="col-md-10">
              <h4 class='p-0 m-0'><strong>{{ $comment->user_name }}</strong></h4>
              <p class='date mb-2'>{{ date('j M Y', strtotime($comment->created_at)) }}</p>
              <p>{{ $comment->comment }}</p>
            </div>
            <div class="col-md-2">
            </div>
          @endcan
        </div>
      @endforeach

      <div class='row'>
          <div class="col-md-12">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'Post']) }}

              {{ Form::textarea('comment', null, ['class' => 'form-control mb-3']) }}

            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }}
          </div>
      </div>
  </div>
@endsection