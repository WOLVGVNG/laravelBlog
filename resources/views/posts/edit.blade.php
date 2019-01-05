@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

  <div class='container-fluid mt-4'>

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
    <div class='row'>

      <div class='col-xl-9 mb-5'>
        <h4>{{ Form::label('title', 'Title:', ['class' => 'font-weight-bold'])}}</h4>
        {{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}

        <h4>{{ Form::label('slug', 'URL:', ['class' => 'font-weight-bold mt-4'])}}</h4>
        {{ Form::text('slug', null, ['class' => 'form-control form-control-lg']) }}

        <h4>{{ Form::label('body', 'Body:', ['class' => 'font-weight-bold mt-4'])}}</h4>
        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '19']) }}
      </div>
      
      <div class="col-xl-3 card border-0">
        <div class="card-header">
          <dl class="row">
            <dt class='col-lg-5'>Created At:</dt>
            <dd class='col-lg-7'>
              @if(date('j-M-Y', strtotime($post->created_at)) == date('j-M-Y'))
                {{ date('j M Y, G:i', strtotime($post->created_at)) }}
              @else
                {{ date('j M Y', strtotime($post->created_at)) }}
              @endif
            </dd>
          </dl>
          @if(date('j M Y, G:i', strtotime($post->created_at))!=date('j M Y, G:i', strtotime($post->updated_at)))
            <dl class="row">
              <dt class='col-lg-5'>Last Updated:</dt>
              <dd class='col-lg-7'>
                @if(date('j-M-Y', strtotime($post->updated_at)) == date('j-M-Y'))
                  {{ date('j M Y, G:i', strtotime($post->updated_at)) }}
                @else
                  {{ date('j M Y', strtotime($post->updated_at)) }}
                @endif
              </dd>
            </dl>
          @endif

          <hr>

          <div class="row">
            <div class="col-sm-6">
              {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block mt-1')) !!}
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