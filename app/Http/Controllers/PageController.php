<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
  public function index()
  {
    $title = "Books Homepage";
    return view ('home', compact('title'));
  }

  public function welcome()
  {
    $title = 'Homepage';
    $books = Book::orderBy('id', 'asc')->limit(4)->get();
    return view ('welcome', compact('title', 'books'));
  }
}