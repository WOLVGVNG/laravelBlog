@extends('main')

@section('title', '| Edit Super User')

@section('content')

  <div class='container-fluid mt-4'>

    {!! Form::model($user, ['route' => ['superusers.update', $user->id], 'method' => 'put']) !!}
    <div class='row'>

      <div class='col-xl-9 mb-5'>
        <h4>{{ Form::label('name', 'Name:', ['class' => 'font-weight-bold'])}}</h4>
        {{ Form::text('name', null, ['class' => 'form-control form-control-lg']) }}

        <h4>{{ Form::label('email', 'E-mail:', ['class' => 'font-weight-bold mt-4'])}}</h4>
        {{ Form::email('email', null, ['class' => 'form-control form-control-lg']) }}

        <h4>{{ Form::label('password', 'Password:', ['class' => 'font-weight-bold mt-4'])}}</h4>
        {{ Form::password('password', null, ['class' => 'form-controlform-control-lg']) }}
      </div>
      
      <div class="col-xl-3 card border-0">
        <div class="card-header">
          <dl class="row">
            <dt class='col-lg-5'>Created At:</dt>
            <dd class='col-lg-7'>
              @if(date('j-M-Y', strtotime($user->created_at)) == date('j-M-Y'))
                {{ date('j M Y, G:i', strtotime($user->created_at)) }}
              @else
                {{ date('j M Y', strtotime($user->created_at)) }}
              @endif
            </dd>
          </dl>
          @if(date('j M Y, G:i', strtotime($user->created_at))!=date('j M Y, G:i', strtotime($user->updated_at)))
            <dl class="row">
              <dt class='col-lg-5'>Last Updated:</dt>
              <dd class='col-lg-7'>
                @if(date('j-M-Y', strtotime($user->updated_at)) == date('j-M-Y'))
                  {{ date('j M Y, G:i', strtotime($user->updated_at)) }}
                @else
                  {{ date('j M Y', strtotime($user->updated_at)) }}
                @endif
              </dd>
            </dl>
          @endif

          <hr>

          <div class="row">
            <div class="col-sm-6">
              {!! Html::linkRoute('superusers.index', 'Cancel', array($user->id), array('class' => 'btn btn-danger btn-block mt-1')) !!}
            </div>
            <div class="col-sm-6">
              {{ Form::submit('Save', ['class' => 'btn btn-success btn-block mt-1'])}}
            </div>
          </div>
        </div>
      </div>
    </div>

    {!! Form::close() !!}

  </div>

@endsection