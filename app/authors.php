<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class authors extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'authors';

    public $timestamps = false;

    public static function insertAuthors($authorName)
    {
        $author = new authors();
        $author->author = $authorName;
        $author->save();
        return $author->id;
    }
}