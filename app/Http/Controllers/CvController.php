<?php

namespace App\Http\Controllers;

use App\Mail\NewCvMail;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValue = $request->input("searchValue");

        $cvs = Cv::where("code", "like", "%" . $searchValue . "%")->where("accepted", true)->paginate(5)->getCollection();

        return response([
            "handshakeCode" => $request->input("handshakeCode"),
            "data" => $cvs,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $file = $request->file("personal_cv");
            $fileName = time() . '-' . $file->getClientOriginalName();
            $url = Storage::disk("public")->putFileAs("personal_cv", $file, $fileName);

            $cv = Cv::create(
                array_merge(
                    $request->all(),
                    [
                        "code" => Str::random(8),
                        "personal_cv" => $url,
                    ]
                )
            );

            $emailReplacements = array_merge($cv->toArray(), [
                "url" => env("API_URL"),
                "url" => env("API_URL"),
                "personalCvFile" => env('STORAGE_URL') . '/' . $url,
            ]);
            Mail::to(env('SECOND_ADMIN_EMAIL'))->send((new NewCvMail($emailReplacements))->subject('New CV request'));
            return response($cv, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            if (str_contains($th, "Duplicate")) return response(null, Response::HTTP_CONFLICT);
            return response($th, Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request, $id)
    {
        try {
            $cv = Cv::find($id);
            if (!$cv)
                return response("<html><body><script>alert('This user does not exist');</script></body></html>");

            if ($cv["accepted"]) {
                return response("<html><body><script>alert('The user has already been accepted');</script></body></html>");
            }
            $cv->update(["accepted" => true]);
            return response("<html><body><script>alert('User accepted successfully');</script></body></html>", Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response("<html><body><script>alert('Something went wrong');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cv = Cv::find($id);
            if (!$cv)
                return response("<html><body><script>alert('The user has already been refused');</script></body></html>", Response::HTTP_NOT_ACCEPTABLE);
            if ($cv["accepted"])
                return response("<html><body><script>alert('You can not remove an accepted user');</script></body></html>", Response::HTTP_NOT_ACCEPTABLE);
            if (!$cv["accepted"]) Cv::destroy($id);

            return response("<html><body><script>alert('The user Refused successfully');</script></body></html>", Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response("<html><body><script>alert('Something went wrong');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }
}
