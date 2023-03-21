<center>
    <h3>Login Page</h3>
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit">Login</button>
        @if (\Session::has('failed'))
            <br>
            <b>{!! \Session::get('failed') !!}</b>
        @endif
    </form>
</center>