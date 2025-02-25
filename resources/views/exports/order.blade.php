<table>
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Invoice Number</th>
            <th>Invoice Date</th>
            <th>Total Product</th>
            <th>Taxable Amount</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>IGST</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i)
            @foreach ($i['products'] as $product)
                @php
                    $i['total_taxable_amount'] += $product['total_taxable_amount'];
                    $i['total_gst_amount'] += $product['total_gst_amount'];
                    $i['total_price'] += $product['total_price'];
                    $i['quantity'] += $product['quantity'];
                @endphp
            @endforeach
            <tr>
                <td>{{ $i['id'] }}</td>
                <td>{{ $i['invoice_number'] }}</td>
                <td>{{ $i['invoice_date'] }}</td>
                <td>{{ $i['quantity'] }}</td>
                <td>{{ $i['total_taxable_amount'] }}</td>
                @if ($i['business_state_id'] == $i['customer_state_id'])
                    <td>{{ $i['total_gst_amount'] / 2 }}</td>
                    <td>{{ $i['total_gst_amount'] / 2 }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td>{{ $i['total_gst_amount'] }}</td>
                @endif
                <td>{{ $i['total_price'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
