@extends('layout')

@section('content')
    <h4>Profile Author</h4>
    <table>
        <tr>
            <th>First Name</th>
            <td>{{$author->first_name}}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{$author->last_name}}</td>
        </tr>
        <tr>
            <th>Birthday</th>
            <td>{{date('d-m-Y', strtotime($author->birthday))}}</td>
        </tr>
        <tr>
            <th>Biography</th>
            <td>{{$author->biography}}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{$author->gender}}</td>
        </tr>
        <tr>
            <th>Place of Birth</th>
            <td>{{$author->place_of_birth}}</td>
        </tr>
    </table>
    <br>
    <h4>List Book</h4>
    <a href="{{ url('books/create') }}">Add new book</a>
    <br><br>
    <table>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Release Date</th>
            <th>Description</th>
            <th>ISBN</th>
            <th>Format</th>
            <th>Number of Pages</th>
            <th>Action</th>
        </tr>
        @foreach($author->books as $key => $book)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$book->title}}</td>
            <td>{{date('d-m-Y', strtotime($book->release_date))}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->format}}</td>
            <td>{{$book->number_of_pages}}</td>
            <td>
                <a href="{{url('books/'.$book->id.'/delete')}}" onclick="return confirm('Are you sure want to delete?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection