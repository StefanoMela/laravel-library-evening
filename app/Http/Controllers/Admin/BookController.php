<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Evening Laravel Books';        
        $books = Book::orderby('id','desc')->paginate(15); // paginazione con ordine discdente in base all' ID
        return view("admin.books.index", compact("title","books"));
    }    

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $book = new Book();
        $book->fill($data);
        $book->save();


        return redirect()
        ->route('admin.books.show', $book)
        ->with('message_type', 'success')
        ->with('message', 'Libro creato con successo');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     ** @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     ** @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     *@param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     ** @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        return redirect()
        ->route('admin.books.show', $book)
        ->with('message_type', 'success')
        ->with('message', 'Libro creato con successo');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book $book
    //  * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        
            $book->delete();
            return redirect()
            ->route('admin.books.index')
            ->with('message_type', 'danger')
            ->with('message', 'Libro eliminato con successo');
        
    }
}