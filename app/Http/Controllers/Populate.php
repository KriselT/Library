<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use App\books;
use App\authors;
use App\books_authors;

class Populate extends Controller
{
    function index()
    {
        $datas = Http::get('https://gist.githubusercontent.com/cristiberceanu/94c1539c9bd7cc0f2e3e6e12a26c1551/raw/771417ba472bf1e7c213b6684656be95898892d6/books-data-source.json')->json();

        foreach ($datas as $data) {

            // Populate books
            $bookId = Books::insertBooks($data);

            foreach($data['authors'] as $authorName){
                if(empty($authorName)){
                    continue;
                }

                // Populate authors
                $author = Authors::where('author',$authorName)->first();

                $authorId = $author->id ?? Authors::insertAuthors($authorName);

                //Populate books_authors
                books_authors::insertAuthorsBooks($authorId,$bookId);
            }
        }
        return view('populate');
    }
}
