@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
  <div class="container mt-5"> 
        <h1>Create new post</h1>
        <hr>

        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
          <div class='form-group'>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control mb-4', 'required' => '', 'maxlength' => 191)) }}
          </div>

          {{ Form::label('slug', 'Slug:') }}
          {{ Form::text('slug', null, array('class' => 'form-control mb-4', 'required' => '', 'minlength' => '5', 'maxlength' => '191')) }}

          {{ Form::label('body', 'Post Body:') }}
          {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

          {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block mt-4')) }}
        {!! Form::close() !!}
    </div>
@endsection



@section('scripts')

  {!! Html::style('js/parsley.min.js') !!}

@endsection