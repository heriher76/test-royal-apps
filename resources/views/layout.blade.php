<center>
    <b>Welcome, {{ session('first_name').' '.session('last_name') }} ! </b>
    <br>
    <a href="{{ url('/') }}">Home</a>
    <br>
    <a href="{{ url('/profile') }}">Profile</a>
    <br>
    <a href="{{ url('logout') }}" onclick="return confirm('Are you sure want to logout?')">Logout? Click Here</a>

    @if (\Session::has('failed'))
        <br>
        <b style="color:red;">{!! \Session::get('failed') !!}</b>
    @endif

    @if (\Session::has('success'))
        <br>
        <b style="color:green;">{!! \Session::get('success') !!}</b>
    @endif

    <hr>
    @yield('content')
</center>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>