<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Payment for reservation #{{$payments->reservationNumber}} - WinTravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&subset=latin,cyrillic-ext'
        rel='stylesheet' type='text/css'>

    <link href="https://www.wintravelbg.com/css/main.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://www.wintravelbg.com/css/print.css?v=1.0" media="print" rel="stylesheet" type="text/css">
    <link href="https://www.wintravelbg.com/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="https://www.wintravelbg.com/css/fancybox/jquery.fancybox.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="stylesheet" media="only screen and (min-width: 960px) and (max-width: 1180px)"
        href="https://www.wintravelbg.com/css/main-940.css" />
    <link rel="stylesheet" media="only screen and (min-width: 0px) and (max-width: 959px)"
        href="https://www.wintravelbg.com/css/main-mobile.css" />


    <!-- Scripts -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <!--[if lt IE 9]><script type="text/javascript" src="/js/html5.js"></script><![endif]-->
</head>

<body class="empty-layout">
    <div class="header payment">
        <a href="https://www.wintravelbg.com" class="back-btn">&laquo; Back to website</a>
        <a href="/" class="logo"></a>
        {{-- <div class="h-langs">
            <a href="/en/payment/159/08c9e85ac7f827b81a040eeae884889b4a199630" class="active">en</a>
            <a href="/bg/payment/159/08c9e85ac7f827b81a040eeae884889b4a199630" class="">bg</a>
        </div> --}}
    </div>
    {{-- {{$payments->id}} --}}
    <h1 class="payment-page-head">Payment for reservation #{{$payments->reservationNumber}}</h1>
    <div class="payment-main">
        <div class="services-box">
            <h2>Description of Services</h2>
            <div class="rows-wrapper">
                <div class="row">
                    <div class="label">Hotel Name:</div>
                    <div class="value">{{$payments->hotel}}</div>
                </div>
                <div class="row">
                    <div class="label">Date of Reservation:</div>
                    <div class="value">{{$payments->reservationDate}}</div>
                </div>
                <div class="row">
                    <div class="label">Reservation Number:</div>
                    <div class="value">{{$payments->reservationNumber}}</div>
                </div>
                <div class="row">
                    <div class="label">Customer Name:</div>
                    <div class="value">{{$payments->passengerName}}</div>
                </div>
                <div class="row">
                    <div class="label">Check in Date:</div>
                    <div class="value">{{$payments->checkInDate}}</div>
                </div>
                <div class="row">
                    <div class="label">Check out Date:</div>
                    <div class="value">{{$payments->checkOutDate}}</div>
                </div>
                <div class="row">
                    <div class="label">Length of Stay:</div>
                    <div class="value">{{$payments->lengthOfStay}}</div>
                </div>
                <div class="row">
                    <div class="label">Note:</div>
                    <div class="value">{{$payments->note}}</div>
                </div>
            </div>
        </div>
        <div class="payment-box">
            <h2>Payment</h2>
            <div class="row">
                <div class="label">Payment:</div>
                <div class="value">{{$payments->amount}} EUR</div>
            </div>
            <div class="row">
                <div class="label">2 % CC Charge:</div>
                <div class="value">{{number_format($payments->amount * 0.02, 2, ".", "")}} EUR</div>
            </div>
            <div class="row total">
                <div class="label">Total:</div>
                <div class="value">{{number_format($payments->amount + $payments->amount * 0.02, 2, ".", "")}} EUR</div>
            </div>
            <div class="row">
                <div class="label">Total /BGN/:
                </div>
                <div class="value">{{number_format(1.95583 * $payments->amount + $payments->amount * 0.02, 2, ".", "")}} BGN</div>
            </div>
            <div class="hint">* 1 EUR =
                1.95583 BGN</div>
            <div class="terms-button-wrapper">
                <div class="terms">
                    <input type="checkbox" id="terms"><label for="terms">I agree with</label>
                    <a href="https://wintravelbg.com/en/page/terms-and-conditions" target="_blank">terms of use</a>
                    <div class="help-inline">Field is required.</div>
                </div>
                <a href="{{$payments->id}}/request"
                    class="btn payment-btn">Proceed to payment</a>
            </div>
        </div>
    </div>
    <div class="f-signature-wrapper">
        <div class="signature">
            <span class="copyright f-left">
                Copyright. All rights reserved. </span>
            <span class="developer f-right">
                Technical maintenance By <a class="rizn" href="https://studioweb.bg" target="blank_">SW</a>
            </span>
        </div>
    </div>
</body>

</html>
