@extends('main')

@section('title', '| All Posts')

@section('content')

  <div class='container-fluid mt-5'>

    <div class="row">
      <div class="col-xl-8 offset-xl-1">
        <h1>All Posts</h1>
      </div>
      <div class="col-xl-2">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">
          Create New Post
        </a>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 table-responsive">
        <table class='table'>

          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Created At</th>
            <th></th>
          </thead>

          <tbody>
            @foreach($posts as $post)

              <tr>
                <th>{{ $post->id }}</th>
                <td>{{ substr($post->title, 0, 150) }}{{ strlen($post->title) > 150 ? '...' : '' }}</td>
                <td>{{ date('j M Y, G:i', strtotime($post->created_at)) }}</td>
                <td>
                  <a href="{{ route('posts.show', $post->id) }}" class='btn btn-outline-secondary btn-sm mr-1 mb-1'>View</a>
                  <a href="{{ route('posts.edit', $post->id) }}" class='btn btn-outline-info btn-sm mb-1'>Edit</a>
                </td>
              </tr>
              
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    



    <div class="row">
        <hr class='col-10 mt-4'>
    </div>
  </div>

@endsection