@extends('layout')

@section('content')
<center>
    <h3>Create new book</h3>
    <form action="{{ url('/books') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <br>
        <input placeholder="Release Date"
            name="release_date"
            type="text"
            onfocus="(this.type='date')">
        <br>
        <textarea name="description" cols="30" rows="10" placeholder="Description" required></textarea>
        <br>
        <input type="text" name="isbn" placeholder="ISBN" required>
        <br>
        <input type="text" name="format" placeholder="Format" required>
        <br>
        <input type="number" name="number_of_pages" placeholder="Number of Pages" required>
        <br>
        <select name="author" required>
            <option disabled selected>Select Author</option>
            @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->first_name.' '.$author->last_name}}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Submit</button>
    </form>
</center>
@endsection