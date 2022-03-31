<?php

namespace App\Http\Controllers;

use App\Mail\contactUsMail;
use App\Models\ContactUs;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->merge([
            "url" => env("API_URL"),
        ]);

        $emailReplacements = $request->all();
        Mail::to(env('ADMIN_EMAIL'))->send((new contactUsMail($emailReplacements))->subject('New contact'));
        // feedbackMail({ ...req.body, id })
        return response(null, Response::HTTP_CREATED);
    }
}
