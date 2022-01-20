<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getAll()
    {
        $data = Post::with("category")->with("user")->get();

        return $data;
    }
}
