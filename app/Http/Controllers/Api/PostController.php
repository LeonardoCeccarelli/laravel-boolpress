<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
// use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $data = Post::where("id", $id)
            ->with("category")
            ->with("user:id,name")
            ->with("tags")
            ->first();

        if (!$data) {
            throw new NotFoundHttpException("Post non trovato");
        }

        return $data;
    }
}
