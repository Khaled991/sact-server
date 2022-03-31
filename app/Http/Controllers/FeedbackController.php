<?php

namespace App\Http\Controllers;

use App\Mail\feedbackMail;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::where("accepted", true)->get([
            'id',
            'name',
            'your_enquiry',
        ]);
        return response($feedback, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        $feedback = Feedback::create($request->all());
        // $request->id->Feedback::insert([name: req.body.name,email: req.body.email,your_enquiry: req.body.yourEnquiry,])
        $emailReplacements = array_merge($feedback->toArray(), [
            "url" => env("API_URL"),
        ]);
        Mail::to(env('ADMIN_EMAIL'))->send((new feedbackMail($emailReplacements))->subject('New customer feedback'));
        // feedbackMail({ ...req.body, id })
        return response($feedback, Response::HTTP_CREATED);
        // return response("<html><body><script>alert('Created');</script></body></html>", Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request, $id)
    {
        try {
            $feedback = Feedback::find($id);
            if (!$feedback)
                return response("<html><body><script>alert('This feedback does not exist');</script></body></html>");

            if ($feedback["accepted"]) {
                return response("<html><body><script>alert('The feedback has already been accepted');</script></body></html>");
            }
            $feedback->update(["accepted" => true]);
            return response("<html><body><script>alert('Feedback accepted successfully');</script></body></html>", Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response("<html><body><script>alert('Something went wrong');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $feedback = Feedback::find($id);
            if (!$feedback)
                return response("<html><body><script>alert('The feedback has already been refused');</script></body></html>", Response::HTTP_NOT_ACCEPTABLE);
            if ($feedback["accepted"])
                return response("<html><body><script>alert('You can not remove an accepted feedback');</script></body></html>", Response::HTTP_NOT_ACCEPTABLE);
            if (!$feedback["accepted"]) Feedback::destroy($id);

            return response("<html><body><script>alert('The feedback refused successfully');</script></body></html>", Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response("<html><body><script>alert('Something went wrong');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }
}
