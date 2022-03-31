<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TranslationOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('pay/(:any)/', function ($x) {
//     return $x;
//     // view('URI', 'viewName')
// });
// 'paymentForm'
// );
Route::get('checkout-redirect/{checkout_id}', [PaymentController::class, "paymentForm"]);
Route::get('send-mail/account-confirmation', [TranslationOrderController::class, "sendConfirmationMailIPaySuccess"]);
