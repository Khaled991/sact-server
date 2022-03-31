<?php

namespace App\Http\Controllers;

use App\Mail\invoiceMail;
use App\Mail\sendProjectInfoMail;
use App\Models\TranslationOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TranslationOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendConfirmationMailIPaySuccess(Request $request)
    {
        $translationOrder = TranslationOrder::where('checkout_id', $request->input('id'))->first();
        // Log::info($translationOrder->from_language);
        // Log::info($translationOrder->to_language);
        $languagePagePrice = PaymentController::calculateUnitPrice(
            $translationOrder->from_language,
            $translationOrder->to_language,
            $translationOrder->selected_request,
        );
        $totalWithoutVat = PaymentController::calculateTotalPrice(intval($translationOrder->number_of_page), intval($languagePagePrice));
        $totalWithVat = PaymentController::totalAndVatPrice($totalWithoutVat);

        $decodedResourcePath = urldecode($request->input('resourcePath'));
        Log::info("decodedResourcePath");
        Log::info($decodedResourcePath);

        $response = Http::withOptions(['verify' => false])->withToken(PaymentController::$token)
            // ->asForm()->get('https://test.oppwa.com' . $request->input('resourcePath') . '?entityId=' . PaymentController::$entityId);
            ->asForm()->get('https://test.oppwa.com' . $decodedResourcePath . '?entityId=' . PaymentController::$entityId);
        Log::info("response");
        Log::info($response);


        $code = $response['result']['code'];
        Log::info($response['result']);

        // 'https://test.oppwa.com/v1/checkouts/14ADD46EE83DDFEAC9C42C93A95CC390.uat01-vm-tx03/payment'

        Log::info($code);
        if (in_array($code, array('000.000.000', '000.100.110')) || str_starts_with($code, '000.400.')) {

            $replacements = array_merge($translationOrder->toArray(), [
                "url" => env("API_URL"),
                "translationFilePath" => env('STORAGE_URL') . '/app/public/' . $translationOrder->project_file,
                "total_price" => $totalWithVat,
                "id" => str_pad($translationOrder->id, 5, "0", STR_PAD_LEFT),
            ]);

            Mail::to(env('ADMIN_EMAIL'))->send((new sendProjectInfoMail($replacements))
                    ->subject('Payment completed successfully and project file and information included inside')
            );

            return response(
                view('paymentSuccesCode')
                    ->with([
                        'checkout_id' => $request->input('id'),
                        "url" => env("SACT_URL"),
                    ]),
                Response::HTTP_OK
            );
            // Success = 000.100.110
        } else {
            return response("<html><body><script>alert('The credit/debit information is not valid.');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }


    public function store(Request $request)
    {
        $file = $request->file("project_file");
        $fileName = time() . '-' . $file->getClientOriginalName();
        $url = Storage::disk("public")->putFileAs("project_file", $file, $fileName);

        $languagePagePrice = PaymentController::calculateUnitPrice(
            $request->input("selectedFromLanguage"),
            $request->input("selectedToLanguage"),
            $request->input("selectedRequest"),
        );
        $totalWithoutVat = PaymentController::calculateTotalPrice($request->input("numberOfPage"), $languagePagePrice);
        $totalWithVat = PaymentController::totalAndVatPrice($totalWithoutVat);

        $checkoutId = PaymentController::getCheckoutId($totalWithVat);

        $translationOrder = TranslationOrder::create(
            [
                "name" => $request->input("name"),
                "phone" => $request->input("phone"),
                "email" => $request->input("email"),
                "number_of_page" => $request->input("numberOfPage"),
                "message" => $request->input("message"),
                "from_language" => $request->input("selectedFromLanguage"),
                "to_language" => $request->input("selectedToLanguage"),
                "selected_request" => $request->input("selectedRequest"),
                "page_price" => $languagePagePrice,
                "invoice_date" => date("Y/m/d"),
                "checkout_id" => $checkoutId,
                "project_file" => $url,
            ]
        );

        $language = '';

        if ($this->isArabic($request->input("selectedFromLanguage")) && $this->isArabic($request->input("selectedToLanguage")))
            $language =  $request->input("selectedFromLanguage") . ' إلي ' . $request->input("selectedToLanguage");
        else
            $language =  $request->input("selectedFromLanguage") . ' To ' . $request->input("selectedToLanguage");

        Log::info($language);

        $replacements = array_merge($translationOrder->toArray(), [
            "url" => env("API_URL"),
            "button_url" => env('URL') . "/checkout-redirect/" . $checkoutId,
            "vat" => PaymentController::calculateVat($totalWithoutVat),
            "total_price" => $totalWithVat,
            "checkout_id" => $checkoutId,
            "id" => str_pad($translationOrder->id, 5, "0", STR_PAD_LEFT),
            "languages" => $language
        ]);
        Mail::to($request->email)->send((new invoiceMail($replacements))->subject('Confirmation your Invoice and Pay'));

        return response(["checkoutId" => $checkoutId], Response::HTTP_CREATED);
    }

    private function isArabic(string $string)
    {
        $nonWordPattern = '/\W/';
        return preg_match_all($nonWordPattern, $string);
    }

    public function generateNextInvoiceId(Request $request)
    {
        try {
            $nextId = TranslationOrder::max("id") + 1;
            $nextIdPadded = str_pad($nextId, 5, "0", STR_PAD_LEFT);
            return ["invoiceId" => $nextIdPadded];
        } catch (\Throwable $th) {
            return response("<html><body><script>alert('Something went wrong');</script></body></html>", Response::HTTP_BAD_REQUEST);
        }
    }
}
