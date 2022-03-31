<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{
    public static $entityId = "8a8294186316c36b01633accfd3966b2";
    public static $token = "OGE4Mjk0MTg2MzE2YzM2YjAxNjMzYWNjYmEyZDY2YWV8anhtRnpOSjZhOQ==";
    // public static $entityId = "8acda4c863d501f80163d5423fa004cc";
    // public static $token = "OGFjZGE0Yzg2M2Q1MDFmODAxNjNkNTQxZWM0ZTA0YmZ8VGgyYWVSbTZ3cQ==";

    public static function getCheckoutId(float $totalWithVat): string
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken(PaymentController::$token)->asForm()
            ->post('https://test.oppwa.com/v1/checkouts', [
                "entityId" => PaymentController::$entityId,
                "amount" => $totalWithVat,
                "currency" => 'SAR',
                "paymentType" => 'DB',
            ]);

        return $response['id'];
    }

    public static function calculateTotalPrice(int $numberOfPage, int $unitPrice): int
    {
        return $numberOfPage * $unitPrice;
    }

    public static function calculateUnitPrice(string $selectedFromLanguage, string $selectedToLanguage, string $selectedRequest): int
    {
        if (
            (($selectedFromLanguage == 'English' || $selectedFromLanguage == 'إنجليزي') && ($selectedToLanguage == 'Arabic' || $selectedToLanguage == 'عربى')) ||
            (($selectedFromLanguage == 'Arabic' || $selectedFromLanguage == 'عربى') && ($selectedToLanguage == 'English' || $selectedToLanguage == 'إنجليزي'))
        ) {
            if ($selectedRequest == 'مستعجل' || $selectedRequest == 'Urgent') return 100;
            else return 80;
        } else {
            return 140;
        }
    }

    public static function calculateVat(int $totalPrice): float
    {
        return $totalPrice * 0.15;
    }

    public static function totalAndVatPrice(int $totalPrice): float
    {
        return PaymentController::calculateVat($totalPrice) + $totalPrice;
    }

    public function paymentForm($checkout_id)
    {
        return view('paymentForm')->with(
            [
                'checkout_id' => $checkout_id,
                "url" => env("APP_URL"),
            ]
        );
    }
}
