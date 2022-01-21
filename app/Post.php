<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // protected $table = "posts";

    protected $fillable = [
        "title",
        "subtitle",
        "content",
        "user_id",
        "coverImg",
        "category_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public function tags()
    {
        return $this->belongsToMany("App\Tag");
    }
}
