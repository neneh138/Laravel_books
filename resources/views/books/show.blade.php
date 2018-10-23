@extends('layouts/app')
@section('content')


<div class="book">
        <a href="{{ route('book.show',    [$book->id])}}" class="btn"><img src="{{$book->image}}" alt="title"/></a>

  

        <h2>{{$book->title}}</h2> <br>
        <h3>{{$book->authors}}</h3>


       {{--  <a href="{{ route('home', 'HomeController@index')}}" class="btn">Back</a> --}}




   
     </div>




@endsection