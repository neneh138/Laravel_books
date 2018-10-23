@extends('layouts/app')
@section('content')

        <div class="container"> 
            <h1>Books</h1>
        
        <div id="books">

         @foreach($books as $book)
         <div class="book">
                <a href="{{ route('book.show',    [$book->id])}}" class="btn"> <img src="{{$book->image}}" alt="title"/></a>

                <a href="{{ route('book.show',    [$book->id])}}" class="btn"> <h2>{{$book->title}}</h2>     </a> <br>
                <a href="{{ route('book.show',    [$book->id])}}" class="btn"> <h3>{{$book->authors}}</h3>   </a> <br>

           


                <h3>{{ $book->genre->name }}</h3>


                <a href="{{ route('books.edit',    [$book->id])}}" class="btn">Edit</a>
                <a href="{{ route('books.delete',  [$book->id])}}" class="btn">Delete</a>



                       
         </div>

         @endforeach;
           
                



        </div>

        </div>
@endsection