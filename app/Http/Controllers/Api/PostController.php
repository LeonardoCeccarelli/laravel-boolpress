<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
// use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function getAll(Request $request)
    {

        $category = $request->category;

        $data = Post::with(
            [
                "category",
                "user:id,name",
                "tags"
            ]
        )->orderBy("created_at", "DESC")->paginate(2);

        if (Category::find($category)) {
            $data = Post::where("category_id", $category)
                ->with(
                    [
                        "category",
                        "user:id,name",
                        "tags"
                    ]
                )->orderBy("created_at", "DESC")->paginate(2);
        }

        return $data;
    }

    public function getFiltered(Request $request)
    {
        $category = $request->category;

        $data = Post::with(
            [
                "category",
                "user:id,name",
                "tags"
            ]
        )->orderBy("created_at", "DESC")->paginate(2);

        if (Category::find($category)) {
            $data = Post::where("category_id", $category)
                ->with(
                    [
                        "category",
                        "user:id,name",
                        "tags"
                    ]
                )->orderBy("created_at", "DESC")->paginate(2);
        }

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
