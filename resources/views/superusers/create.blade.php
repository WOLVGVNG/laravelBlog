@extends('main')

@section('title', '| Create New Super User')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
  <div class="container mt-5"> 
        <h1>Create New Super User</h1>
        <hr>

        {!! Form::open(['route' => 'superusers.store', 'data-parsley-validate' => '']) !!}
          <div class='form-group'>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class' => 'form-control mb-4', 'required' => '', 'maxlength' => 191)) }}
          
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::email('email', null, array('class' => 'form-control mb-4', 'required' => '', 'email' => '', 'maxlength' => '191')) }}

              <div class='row'>
                <div class='col-12 ml-0'>
                  {{ Form::label('password', 'Password:') }}
                </div>
              </div>
              <div class='row'>
                <div class='col-12 ml-0'>
                  {{ Form::password('password', null, ['id' => 'password', 'class' => "form-control $errors->has('password') ? ' is-invalid' : ''", 'required' => '', 'minlength' => '6', 'maxlength' => '191']) }}
                </div>
              </div> 

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif

              <div class='w-100 py-0'></div>

              <div class='row'>
                <div class='col-12 ml-0'>
                  {{ Form::label('password-confirm', 'Confirm Password:', ['class' => 'mt-4']) }}
                </div>
              </div>
              <div class='row'>
                <div class='col-12 ml-0'>
                 {{ Form::password('password_confirmation', null, ['id' => 'password-confirm', 'class' => 'form-control $errors->has("password") ? " is-invalid" : ""', 'required' => '', 'minlength' => '6', 'maxlength' => '191']) }}
                </div>
              </div>

              <div class='w-100 py-3'></div>
                      
              {{ Form::radio('user_type', 'admin', false, ['my-4', 'id' => 'admin']) }}
              {{ Form::label('admin', 'Administrator') }}
              <br>
              {{ Form::radio('user_type', 'author', true, ['class' => '', 'id' => 'author']) }}
              {{ Form::label('author', 'Author') }}
            </div>

            {{ Form::submit('Create User', array('class' => 'btn btn-primary btn-lg btn-block mt-4')) }}
          </div>
        {!! Form::close() !!}
    </div>
@endsection



@section('scripts')

  {!! Html::style('js/parsley.min.js') !!}

@endsection