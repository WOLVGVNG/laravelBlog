<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body>
    
    @include('partials._nav')

    <div class='wrapper'>
        @include('partials._messages')

        <!--{{ Auth::check() ? 'Logged In' : 'Logged Out'}}-->

        @yield('content')
        <br>
        @include('partials._footer')
    </div>

    @include('partials._javascript')

    @yield('scripts')

</body>
</html>
