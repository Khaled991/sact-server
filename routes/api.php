<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\TranslationOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cv', [CvController::class, "index"]);
Route::post('cv', [CvController::class, "store"]);
Route::get('cv-accept/{id}', [CvController::class, "accept"]);
Route::get('cv-refuse/{id}', [CvController::class, "destroy"]);

Route::get('feedback', [FeedbackController::class, "index"]);
Route::post('feedback', [FeedbackController::class, "store"]);
Route::get('feedback-accept/{id}', [FeedbackController::class, "accept"]);
Route::get('feedback-refuse/{id}', [FeedbackController::class, "destroy"]);

Route::post('contact-us', [ContactUsController::class, "store"]);

Route::post('recent_join_user_data', [JoinController::class, "store"]);
Route::post('invoice', [TranslationOrderController::class, "store"]);
Route::get('generate-next-invoice-id', [TranslationOrderController::class, "generateNextInvoiceId"]);
