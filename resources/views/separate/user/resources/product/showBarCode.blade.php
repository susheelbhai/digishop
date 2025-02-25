<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bar Code</title>
    <style>
        .main_div {
            border: solid;
            border-radius: 12px;
            width: 240px;
            height: 120px;
            padding: 12px
        }

        .bar_code {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="main_div">
        {{ $data['name'] }}
        <div class="bar_code">
            @php
                if ($data['sku'] <1000) {
                    $code = 'C39';
                } else {
                    $code = 'C128';
                }

            @endphp

            <img src="data:image/png;base64,{!! Milon\Barcode\Facades\DNS1DFacade::getBarcodeJPG($data['sku'], $code, 400, 4000) !!} " alt="barcode" width="200px" height="40px" />
            <br>
            {{ $data['sku'] }}
        </div>
        <div class="price_div">
            MRP : {{ Helper::customCurrencyFormat($data['mrp']) }}
        </div>

    </div>
    {{-- <button onclick="window.print()">Print this page</button> --}}

</body>

</html>
