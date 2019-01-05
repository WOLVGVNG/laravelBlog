@extends('main')

@section('title', '| Contact')

@section('content')
    <div class='mt-5 container'>
        <div class='row'>
            <div class="col-md-12">
                <h1 class="display-3">Contact Me!</h1>
                <hr>     
                <form action='{{ url('contact') }}' method='POST'>
                    {{ csrf_field() }}
                    <div class='form-group'>
                        <label name='email'>Email</label>
                        <input type='email' id='email' name='email' class='form-control'>
                    </div>     
                    
                    <div class='form-group'>
                        <label name='subject'>Subject</label>
                        <input type='text' id='subject' name='subject' class='form-control'>
                    </div>  
                    
                    <div class='form-group'>
                        <label name='message'>Message: </label>
                        <textarea id='message' name='message' class='form-control' placeholder='Type your message here...' rows='10'></textarea>
                    </div>
                
                    <button class='btn btn-success'>Send message</button>
                </form>
            </div>
        </div>
    </div>
@endsection