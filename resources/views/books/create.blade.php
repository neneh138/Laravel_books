@extends('layouts/app')
@section('content')


<div class="container"> 


<form action="{{action('BookController@store')}}" method="post">

        @csrf

        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label>Authors</label>
          <input type="text" name="authors" class="form-control">
        </div>
        <div class="form-group">
          <label>Image</label>
          <input type="text" name="image" class="form-control">
        </div>
        <div class="form-group">
          <label>Publisher</label>
          <select name="publisher_id">

            @foreach ($publishers as $publisher)
            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach            
          </select>
        </div>
        <div class="form-group">
          <label>Genres</label>
          <select name="genre_id">
           
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection