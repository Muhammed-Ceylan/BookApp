<?php

namespace App\Http\Controllers\front\book;

use App\Http\Controllers\Controller;
use App\Models\Books;

class IndexController extends Controller
{
    public function index($self_link)
    {
        $book_count = Books::where('self_link', $self_link)->count();
        if ($book_count != 0) {
            $book = Books::where('self_link', $self_link)->get();
            return view('front.book.index', ['data' => $book]);
        } else {
            return redirect('/');
        }
    }
}
