<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres=Genre::all();

        $title = 'Evening Laravel Books';        
        $books = Book::orderby('id','desc')->paginate(15); // paginazione con ordine discdente in base all' ID
        
        return view("admin.books.index", compact("title","books","genres"));
    }    

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $tags = Tag::orderBy('label')->get();
        return view('admin.books.create', compact('genres', 'tags'));
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
        
        if(Arr::exists($data, "tags")) $book->tags()->attach($data["tags"]);

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
        $genres = Genre::all();
        $tags = Tag::orderBy('label')->get();
        $book_tag = $book->tags->pluck('id')->toArray();
        return view('admin.books.edit', compact('book','genres', 'tags','book_tag'));
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

        if(Arr::exists($data, "tags"))
            $book->tags()->sync($data["tags"]);
        else
            $book->tags()->detach();

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