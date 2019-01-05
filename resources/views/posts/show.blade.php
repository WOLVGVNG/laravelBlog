@extends('main')

@section('title', '| View Post')

@section('content')

  <div class='container-fluid'>

    <div class='mt-4 row'>

      <div class='col-xl-9'>
        <h1 class='mb-4'>{{ $post->title }}<h1>
        <p class='lead'>{{ $post->body }}</p>
      </div>
      
      <div class="col-xl-3 card border-0">
        <div class="card-header">
          <dl class="row">
            <dt class='col-12'>URL:</dt>
            <dd class='col-12'><a href='{{ route('blog.single',$post->slug) }}'>{{ url('blog/' . $post->slug) }}</a></dd>
          </dl>
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
              {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info btn-block mt-1')) !!}
            </div>
            <div class="col-sm-6">
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

             <!-- {! !</a>Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block mt-1')) !!}</a>-->

              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block mt-1']) !!}

              {!! Form::close() !!}
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              {!! Html::linkRoute('posts.index', '<< See All Posts', array($post->id), array('class' => 'btn btn-outline-secondary btn-block mt-4')) !!}
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class='row mx-auto mt-5 mb-2'>
        <h3 class='mx-auto'><small>{{ $post->comments()->count() }} Comments</small></h3>
    </div>
    @if($post->comments()->count() > 0)
      <div class='row d-flex justify-content-center '>
          <table class="d-table table table-responsive" style='font-size: 18px;'>

            <thead>
              <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Comment</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($post->comments as $comment)
                <tr>
                  <td>{{ $comment->user_name }}</td>
                  <td>{{ $comment->user_email }}</td>
                  <td>{{ $comment->comment }}</td>
                  <td>
                    <a href="{{ route('comments.delete', $comment->id) }}" class='btn btn-xs btn-danger'>Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endif
  </div>

@endsection