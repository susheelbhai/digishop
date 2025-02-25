<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tax Invoice</title>
    <style>
        @page {
            margin: 0;
            size: A4;
        }

        * {
            font-family: Arial, Helvetica, sans-serif
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 18px;
            text-align: center;
            text-decoration: underline;
        }

        h2 {
            font-size: 24px;
            padding: 0px;
        }

        h3 {
            font-size: 20px;
            margin: 2px 0;
            padding: 0;
        }

        h4 {
            font-size: 14px;
            margin: 4px 0;
            padding: 0;
        }

        h5 {
            font-size: 12px;
            margin: 4px 0;
        }

        address {
            padding: 4px 0px;
            margin: 0px;
            font-style: normal;
            /* font-weight: bold; */
        }

        .customer_address address {
            margin: 4px 0;
        }

        .container {
            font-size: 12px;
            width: 694px;
            margin: auto
        }

        .text-center {
            text-align: center;
        }

        .border-solid {
            border: solid;
        }

        .row {
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-12 {
            width: 100%
        }

        .text-bold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        #product_table {
            width: 100%;
            /* margin: .2% */
            vertical-align: top;
        }

        #product_table th {
            padding: 12px;
        }

        #product_table thead tr th {
            background-color: rgb(254, 238, 209);
            border: solid;
            border-top: none;
        }

        #product_table tbody tr td {
            vertical-align: top;
            border: solid;
            border-top: none;
            border-bottom: none;
            padding: 6px 12px;
        }

        #bank_table {
            margin: 20px 0 20px 12px;
        }

        .company_div td {
            vertical-align: top;
        }

        .company_address,
        .customer_address {
            padding: 4px;
        }

        .invoice_number {
            padding: 14px 0;
        }

        th {
            text-align: left
        }

        .authorised_sign {
            display: block;
            text-align: right;
            padding-right: 12px
        }

        .declearation {
            font-size: 12px;
            margin: 24px 0 12px 0;
        }

        .amount_in_words td {
            font-size: 12px;
            padding: 24px 0 12px 12px;
        }

        .amount {
            text-align: right;
        }

        .amount_in_words {
            border-left: solid;
            border-right: solid
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1> Tax Invoice </h1>
        <h5 class="text-bold text-right">
            @if ($copy == 'original')
                Original for Recipient
            @else
                Duplicate for Supplier
            @endif
        </h5>

        <div class="main_div">
            <table class="company_div border-solid">
                <tbody>
                    <tr>
                        <td width="66%" style="padding: 12px">
                            <h2> {{ config('invoice.name') }} </h2>
                            <address>
                                {{ config('invoice.address') }} <br>
                                {{ config('invoice.city') }} -
                                {{ config('invoice.pin') }}
                                {{ config('invoice.state_name') ?? '' }}
                            </address>
                            <table>
                                <tr>
                                    <th style="width: 40px">CIN </th>
                                    <td> : {{ config('invoice.cin') }}</td>
                                </tr>
                                @if (1 == 1)
                                    <tr>
                                        <th>GSTIN </th>
                                        <td> :{{ config('invoice.gstin') }} </td>
                                    </tr>
                                @endif    
                                @if (1 == 1)
                                    <tr>
                                        <th>PAN </th>
                                        <td> : {{ substr(config('invoice.gstin'), 2, 10) }}</td>
                                    </tr>
                                @endif    
                            </table>
                        </td>
                        <td>
                            <table class="invoice_number">
                                <tr>
                                    <th>Invoice No.</th>
                                    <td>{{ $data['id'] }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice Date</th>
                                    <td>{{ App\Helpers\Helper::customDate($data['invoice_date']) }}</td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="border-solid" colspan="2">
                            <table class="company_address">
                                <tr>
                                    <td style="width: 60%">
                                        <div class="customer_address">
                                            <h3>Invoice To</h3>
                                            <h4>{{ $business_data['name'] }}</h4>
                                            <address>
                                                {{ $business_data['address'] }}, <br>
                                                {{ $business_data['city'] }} -
                                                {{ $business_data['pin'] }},
                                                {{ $business_data['state']['name'] ?? ''}}
                                            </address>
                                            <table>
                                                <tr>
                                                    <th style="width: 50px">GSTIN/UIN </th>
                                                    <td> : {{ $business_data['gst_number'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State </th>
                                                    <td> :
                                                        {{ $business_data['state']['name'] ?? '' . ', Code: ' . sprintf('%02d', $business_data['state']['id'] ?? '') }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>

                                </tr>

                            </table>
                        </td>

                    </tr>
                </tbody>
            </table>

            <div class="product_div">
                <table id="product_table">
                    <thead>
                        <tr>
                            <th>
                                Description of Services
                            </th>
                            <th>
                                HSN Code
                            </th>
                            
                            <th> Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h4> {{ config('invoice.product_name') }}</h4>
                                {{ config('invoice.product_description') }}
                            </td>
                            <td>
                                {{ config('invoice.product_hsn_code') }}
                            </td>
                            <td class="text-right">{{ Helper::customMoneyFormat($data['amount']/(1+.01*$data['gst_percentage']))  }}</td>
                        </tr>
                        @if ($data['business_state_id'] == $data['customer_state_id'])
                            <tr>
                                <td>SGST Amount</td>
                                <td></td>
                                <td class="text-right">{{ Helper::customMoneyFormat(($data['amount'] - $data['amount']/(1+.01*$data['gst_percentage']))/2) }}</td>
                            </tr>
                            <tr>
                                <td>CGST Amount</td>
                                <td></td>
                                <td class="text-right">{{ Helper::customMoneyFormat(($data['amount'] - $data['amount']/(1+.01*$data['gst_percentage']))/2)  }}</td>
                            </tr>
                            
                        @else
                           <tr>
                            <th colspan="1"> IGST Amount </th>
                           </tr>
                        @endif
                        <tr style="border: solid">
                            <td colspan="2">Total</td>
                            <td class="text-right">{{ Helper::customMoneyFormat($data['amount']) }}</td>
                        </tr>
                    </tbody>
                       
                </table>
            </div>
            <div class="other_div">
                <table>
                    <tr class="amount_in_words" style="">
                        <td colspan="2">
                            <h4>Amount in words </h4>
                            <span>
                                {{ App\Helpers\Helper::rupeesInWord($data['amount']) }}
                            </span>

                        </td>
                    </tr>
                    <tr style="border: solid">
                        <td style="width: 70%">
                            
                        </td>
                        <td style="border: solid">

                            <div class="authorised_sign">
                                <h5>For {{ config('invoice.name') }}</h5>



                                <h5 style="margin-top: 0">Authorised signatory</h5>

                            </div>


                        </td>

                    </tr>
                </table>

            </div>
            <h6>This is computer generated invoice, hence no signature is required.</h6>
        </div>

    </div>

</body>

</html>
