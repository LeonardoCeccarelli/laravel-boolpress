<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|email:rfc,dns,strict,spoof,filter|max:255",
            "message" => "required|max:5000",
        ]);

        $data = $request->all();

        Mail::to(env("MAIL_CONTACT_DESTINATION"))->send(new SendNewMail($data));
    }
}
