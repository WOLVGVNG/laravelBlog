@extends('main')

@section('title', '| All Super Users')

@section('content')

  <div class='container mt-5'>

    <div class="row">
      <div class="col-xl-8 offset-xl-1">
        <h1>Super Users</h1>
      </div>
      <div class="col-xl-2">
        <a href="{{ route('superusers.create') }}" class="btn btn-lg btn-block btn-primary">
          Create New Super User
        </a>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 table-responsive">
        <table class='table'>

          <thead>
            <th>#</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Created At</th>
            <th>Type</th>
            <th></th>
          </thead>

          <tbody>
            @foreach($users as $user)

              <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('j M Y, G:i', strtotime($user->created_at)) }}</td>
                <td>{{ $user->user_type }}</td>
                <td>
                  <!--<a href="{{ route('superusers.edit', $user->id) }}" class='btn btn-outline-info btn-sm mr-1 mb-1 w-100'>Edit</a>-->
                  {!! Form::open(['route' => ['superusers.destroy', $user->id], 'method' => 'DELETE']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm mr-1 mb-1 w-100']) !!}

                  {!! Form::close() !!}
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