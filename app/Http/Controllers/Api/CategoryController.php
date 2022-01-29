<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    public function getAll()
    {
        $data = Category::all();

        return $data;
    }

    public function getSingle($id)
    {
        $data = Category::where("id", $id)
            ->with(["posts", "posts.category", "posts.user:id,name", "posts.tags"])
            ->first();

        if (!$data) {
            throw new NotFoundHttpException("Post non trovato");
        }

        return $data;
    }
}
