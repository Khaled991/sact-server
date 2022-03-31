<?php

namespace App\Http\Controllers;

use App\Mail\newJoiningRequestMail;
use App\Models\Join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class JoinController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $file = $request->file("joining_file");
            $fileName = time() . '-' . $file->getClientOriginalName();
            $url = Storage::disk("public")->putFileAs("joining_file", $file, $fileName);

            $join = Join::create(
                [
                    "name" => $request->input("name"),
                    "phone" => $request->input("phone"),
                    "email" => $request->input("email"),
                    "address" => $request->input("job"),
                    "job" => $request->input("address"),
                    "join_us_as" => $request->input("joinUsAs"),
                    "joining_file" => $url,
                ]
            );
            $emailReplacements = array_merge($join->toArray(), [
                "url" => env("API_URL"),
                "jobFilePath" => env('STORAGE_URL') . '/' . $url,
            ]);
            Mail::to(env('SECOND_ADMIN_EMAIL'))->send((new newJoiningRequestMail($emailReplacements))->subject('New joining request'));

            return response($join, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            if (str_contains($th, "Duplicate")) return response(null, Response::HTTP_CONFLICT);
            return response($th, Response::HTTP_BAD_REQUEST);
        }
    }
}
