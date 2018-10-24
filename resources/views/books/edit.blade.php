@extends('layouts/app')
@section('content')


<div class="container"> 


        <form action="{{action('BookController@update', [$book->id])}}" method="post">
        
                @csrf
        
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Authors</label>
                  <input type="text" name="authors" value="{{ old('author', $book->authors) }}"class="form-control">
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="text" name="image" value="{{ old('image', $book->image) }} "class="form-control">
                </div>
                <div class="form-group">
                  <label>Publisher</label>
                  <select name="publisher_id">
                  
                    @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}" @if ($book->publisher_id == $publisher->id) selected @endif >
                    {{ $publisher->name }}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                  <label>Genre</label>
                  <select name="genre_id">
                  
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @if ($book->genre_id == $genre->id) selected @endif >
                    {{ $genre->name }}
                    </option>
                    @endforeach
                  </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
       


@endsection