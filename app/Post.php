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
        return $this->belongsTo("App/User", "user_id");
    }

    public function categories()
    {
        return $this->hasMany("App/Category");
    }
}
