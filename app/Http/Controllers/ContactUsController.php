<?php

namespace App\Http\Controllers;

use App\Mail\contactUsMail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(["url" => env("SACT_URL")]);
        $emailReplacements = $request->all();
        Mail::to(env('ADMIN_EMAIL'))->send((new contactUsMail($emailReplacements))->subject('New contact'));
        return response(null, Response::HTTP_CREATED);
    }
}
