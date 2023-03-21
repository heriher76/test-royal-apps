@extends('layout')

@section('content')
    <h4>My Profile</h4>
    <table>
        <tr>
            <th>First Name</th>
            <td>{{$me->first_name}}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{$me->last_name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$me->email}}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{$me->gender}}</td>
        </tr>
        <tr>
            <th>Active</th>
            <td>{{$me->active}}</td>
        </tr>
        <tr>
            <th>Email Confirmed</th>
            <td>{{$me->email_confirmed}}</td>
        </tr>
    </table>
    <br>
    <a href="#" onclick="alert('{{session('token')}}');">Show Access Token</a>
@endsection