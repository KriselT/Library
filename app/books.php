<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class books extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'books';

    public $timestamps = false;

    public static function insertBooks($data)
    {
        $book = new books;
        $book->title = $data['title'] ?? null;
        $book->isbn = $data['isbn'] ?? null;
        $book->page_count = $data['pageCount'] ?? null;
        if(isset($data['publishedDate'])){
            $book->published_date = date('Y-m-d', strtotime($data['publishedDate']['$date']));
        }
        else{
            $book->published_date = null;
        }
        
        $book->thumbnail_url = $data['thumbnailUrl'] ?? null;
        $book->short_description = $data['shortDescription'] ?? null;
        $book->long_description = $data['longDescription'] ?? null;
        $book->status = $data['status'] ?? null;
        $book->categories = json_encode($data['categories']) ?? null;
        $book->save();
        return $book->id;
    }
}
