<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    public function getAll()
    {
        $data = Post::with("category")
            ->with("user:id,name")
            ->with("tags")
            ->paginate(1);

        return $data;
    }

    public function getSingle($id)
    {
        $data = Post::where("id", $id)->first();

        if (!$data) {
            throw new HttpException("Post non trovato");
        }

        return $data;
    }
}
