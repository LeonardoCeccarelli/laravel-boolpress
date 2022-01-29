<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        // $user = Auth::user()->id;

        // if (!$user)
        //     return null;


        return dd($request->user("api"));
    }
}
