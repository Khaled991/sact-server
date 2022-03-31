<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href='{{env("URL")}}/storage/sact.ico' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <style>
        body {
            font-family: Tajawal;
            min-height: 100vh;
            background-color: #F1F1F1;
            width: 100%;
            margin: 0;
            padding: 0;
            text-align: center;
            position: relative;
        }

        div.content-container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -45%);
        }

        form.wpwl-form,
        wpwl-form-card,
        wpwl-clearfix {
            text-align: start;
            width: 95vw;
            border-radius: 10px;
            background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),
            url("{{$url.'/storage/credit-card-backgrounds/'.rand(1, 25).'.jpeg'}}")
        }

        div.wpwl-label,
        wpwl-label-brand {
            font-size: 18px;
            color: #fff;
        }

        input.wpwl-control {
            height: 2.7em
        }

        iframe.wpwl-control,
        wpwl-control-iframe,
        wpwl-control-cardNumber {
            height: 2.7em
        }

        div.wpwl-label-brand {
            text-indent: -9999px;
            white-space: nowrap;
            overflow: hidden;
            background-image: url(https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png);
            background-size: cover;
            width: 54px;
            height: 44px
        }

        div.wpwl-brand-card {
            position: absolute;
            bottom: 5px;
            right: 0
        }

        div.wpwl-wrapper-brand {
            display: none
        }
    </style>
</head>

<body>
    <div class="content-container">
        4005550000000001 05/22 cvv2 123 (success)
        <div>
            <form action="/send-mail/account-confirmation" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form>
        </div>
    </div>
</body>
<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkout_id}}"></script>

</html>