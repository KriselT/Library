<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books_authors extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'book_authors';

    public $timestamps = false;

    public static function insertAuthorsBooks($authorId, $bookId)
    {
        $books_authors = new books_authors;
        $books_authors->author_id = $authorId;
        $books_authors->book_id = $bookId;
        $books_authors->save();
    }
}
