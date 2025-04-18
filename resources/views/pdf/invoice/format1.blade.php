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
                            <h2> {{ $data['business_name'] }} </h2>
                            <address>
                                {{ $data['business_address'] }} <br>
                                {{ $data['business_city'] }} -
                                {{ $data['business_pin'] }}
                                {{ $data['business_state'] }}
                                {{ $data['businessState']['name'] }}
                            </address>
                            <table>
                                <tr>
                                    <th style="width: 40px">UIN </th>
                                    <td> : {{ $data['business_cin'] }}</td>
                                </tr>
                                @if ($data['invoiceSetting']['gstin'] == 1)
                                    <tr>
                                        <th>GSTIN </th>
                                        <td> :{{ $data['business_gstin'] }} </td>
                                    </tr>
                                @endif    
                                @if ($data['invoiceSetting']['pan'] == 1)
                                    <tr>
                                        <th>PAN </th>
                                        <td> : {{ substr($data['business_gstin'], 2, 10) }}</td>
                                    </tr>
                                @endif    
                            </table>
                        </td>
                        <td>
                            <table class="invoice_number">
                                <tr>
                                    <th>Invoice No.</th>
                                    <td>{{ $data['invoice_number'] }}</td>
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
                                            <h4>{{ $data['customer_name'] }}</h4>
                                            <address>
                                                {{ $data['customer_address'] }}, <br>
                                                {{ $data['customer_city'] }} -
                                                {{ $data['customer_pin'] }},
                                                {{ $data['customerState']['name'] }}
                                            </address>
                                            <table>
                                                <tr>
                                                    <th style="width: 50px">GSTIN/UIN </th>
                                                    <td> : {{ $data['customer_gstin'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State </th>
                                                    <td> :
                                                        {{ $data['customerState']['name'] . ', Code: ' . sprintf('%02d', $data['customerState']['id']) }}
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

            @php
                $total_price = 0;
                $blank_padding = '0px';
                switch (count($data['products'])) {
                    case 1:
                        $blank_padding = '320px';
                        break;
                    case 2:
                        $blank_padding = '280px';
                        break;
                    case 3:
                        $blank_padding = '200px';
                        break;
                    case 4:
                        $blank_padding = '140px';
                        break;
                    case 5:
                        $blank_padding = '80px';
                        break;
                    case 6:
                        $blank_padding = '10px';
                        break;

                    default:
                        $blank_padding = '0px';
                        break;
                }
            @endphp
            <div class="product_div">
                <table id="product_table">
                    <thead>
                        <tr>
                            <th>
                                Description of Services
                            </th>
                            <th>
                                HSN / SAC
                            </th>
                            <th>
                                Unit Price
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Taxable Value
                            </th>
                            @if ($data['business_state_id'] == $data['customer_state_id'])
                                <th>SGST Amount</th>
                                <th>CGST Amount</th>
                            @else
                                <th colspan="1"> IGST Amount </th>
                            @endif
                            <th> Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['products'] as $i)
                            @php
                                $total_price += $i['sale_price'] * $i['quantity'];
                                 
                            @endphp
                            <tr>
                                <td style="width:50%;">
                                    <h5>{{ $i['name'] }}</h5>
                                    {{ $i['description'] }}
                                </td>
                                <td> {{ $i['hsn_code'] }}</td>
                                <td>{{ App\Helpers\Helper::customMoneyFormat($i['taxable_amount']) }}</td>
                                <td>{{ $i['quantity'] }} {{ $i['unit'] }}</td>
                                <td>{{ App\Helpers\Helper::customMoneyFormat($i['taxable_amount'] * $i['quantity']) }}</td>
                                @if ($data['business_state_id'] == $data['customer_state_id'])
                                    <td class="amount">
                                        {{ $i['gst_percentage'] * 0.5 }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['quantity'] * $i['gst_amount']/2) }}
                                    </td>
                                    <td class="amount">
                                        {{ $i['gst_percentage'] * 0.5 }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['quantity'] * $i['gst_amount']/2) }}
                                    </td>
                                @else
                                    <td class="amount" colspan="1">
                                        {{ $i['gst_percentage'] }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['quantity'] * $i['gst_amount']) }}
                                    </td>
                                @endif
                                <td>
                                    {{ App\Helpers\Helper::customMoneyFormat($i['total_price']) }}
                                </td>
                            </tr>
                        @endforeach


                        <tr>
                            @if ($data['business_state_id'] == $data['customer_state_id'])
                                <td style="padding-top: {{ $blank_padding }};"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @else
                                <td style="padding-top: {{ $blank_padding }};"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>

                        <tr>
                            @if ($data['business_state_id'] == $data['customer_state_id'])
                                <td colspan="7" style="border: solid;">Total</td>
                            @else
                                <td colspan="6" style="border: solid;">Total</td>
                            @endif
                            <td class="amount" style="border: solid;">
                                {{ App\Helpers\Helper::customMoneyFormat($total_price) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="other_div">
                <table>
                    @if ($data['invoiceSetting']['amount_in_words'] == 1)

                        <tr class="amount_in_words" style="">
                            <td colspan="2">
                                <h4>Amount in words </h4>
                                <span>
                                    {{ App\Helpers\Helper::rupeesInWord($total_price) }}
                                </span>

                            </td>
                        </tr>
                    @endif
                    <tr style="border: solid">
                        <td style="width: 70%">
                            @if ($data['invoiceSetting']['bank_detail'] == 1)
                                <table id="bank_table">

                                    <tr>
                                        <td colspan="2">
                                            <h4>Bank Detail:</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Name of the Bank </td>
                                        <td> : {{ $data['bank_name'] }} </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"> Account Holder Name </td>
                                        <td> : {{ $data['bank_account_holder_name'] }} </td>
                                    </tr>
                                    <tr>
                                        <td> Account Number </td>
                                        <td> : {{ $data['bank_account_number'] }} </td>
                                    </tr>
                                    <tr>
                                        <td> IFSC Code </td>
                                        <td> : {{ $data['bank_ifsc'] }} </td>
                                    </tr>
                                    @if ($data['bank_swift'] != '')
                                    <tr>
                                        <td> Swift Code </td>
                                        <td> : {{ $data['bank_swift'] }} </td>
                                    </tr>
                                    @endif
                                </table>
                            @endif
                        </td>
                        @if ($data['invoiceSetting']['authorised_sign'] == 1 || $data['invoiceSetting']['authorised_stamp'] == 1)
                            <td style="border: solid">

                                <div class="authorised_sign">
                                    

                                    @if ($data['invoiceSetting']['authorised_sign'] == 1 && Storage::exists($data['authorised_sign'], 'local') && $data['authorised_sign'] != '')
                                        <img src="{{ asset('storage/'.$data['authorised_sign']) }}" width="126px"
                                            style="margin-top: 0">
                                            
                                    @endif
                                    
                                    <h5>For {{ $data['business_name'] }}</h5>
                                    <h5 style="margin-top: 0">Authorised signatory</h5>

                                </div>


                            </td>
                        @else
                            <td> </td>
                        @endif

                    </tr>
                </table>

            </div>

        </div>

    </div>

</body>

</html>
