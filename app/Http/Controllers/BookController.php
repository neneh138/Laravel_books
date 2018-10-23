<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function __contruct() {
        $this->middleware('auth')->only('create','store');

    }
    public function index()
    {
        //

        $books = Books::limit(100)->get();  

        return view('books/index', [
               'books' => $books
        ]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view ('books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    
        $book = Books::create($request->all());

        return redirect (action ('BookController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      
        
        $book = Books::findorFail($id);

        return view('books/show',(compact('book')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //actual values of book attributes in inputs as default values
        $book = Books::findorFail($id);
 
        return view('books/edit')->with(compact('book'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Books::findorFail($id);
        $book->update($request->all());

        return redirect (action ('BookController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $book = Books::findorFail($id);
        $book->delete();

        return redirect (action ('BookController@index'));


    }
}
