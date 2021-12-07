<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\books;
use App\authors;
use App\books_authors;

class ListAuthors extends Controller
{
    function index()
    {
        $results = DB::select(DB::raw("SELECT authors.author, COUNT(*) AS 'number_of_books' FROM book_authors JOIN authors ON authors.id = book_authors.author_id GROUP BY authors.author ORDER BY number_of_books DESC LIMIT 3"));
        return view('listAuthors', ['results' => $results]);
    }
}
