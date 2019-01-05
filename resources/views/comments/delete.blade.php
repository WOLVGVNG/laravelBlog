@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')

<div class="container mt-5">
  <div class="col-md-10 offset-md-1">
    <h1 class='mb-3 mx-auto'>DELETE THIS COMMENT?</h1>
    <p>
      <strong>Name: </strong>{{ $comment->user_name }}<br><br>
      <strong>Email: </strong>{{ $comment->user_email }}<br><br>
       <strong>Comment: </strong>{{ $comment->comment }}<br>
    </p>

    {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
      {{ Form::submit('YES, DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
    {{ Form::close() }}
  </div>
</div>

@endsection