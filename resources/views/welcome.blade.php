@extends('layout')

@section('content')
    <h4>List Author</h4>
    <table>
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Place of Birth</th>
            <th>Action</th>
        </tr>
        @foreach($authors as $key => $author)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$author->first_name}}</td>
            <td>{{$author->last_name}}</td>
            <td>{{date('d-m-Y', strtotime($author->birthday))}}</td>
            <td>{{$author->gender}}</td>
            <td>{{$author->place_of_birth}}</td>
            <td>
                <a href="{{url('authors/'.$author->id)}}">Show</a>
                <a href="{{url('authors/'.$author->id.'/delete')}}" onclick="return confirm('Are you sure want to delete?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection