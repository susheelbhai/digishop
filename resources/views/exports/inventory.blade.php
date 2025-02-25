<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>HSN Code</th>
            <th>SKU</th>
            <th>Name</th>
            <th>Description</th>
            <th>MRP</th>
            <th>Sale Price</th>
            <th>Purchase Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i)
            <tr>
                <td>{{ $i['product']['id'] }}</td>
                <td>{{ $i['product']['hsn_code'] }}</td>
                <td>{{ $i['product']['sku'] }}</td>
                <td>{{ $i['product']['name'] }}</td>
                <td>{{ $i['product']['description'] }}</td>
                <td>{{ $i['product']['mrp'] }}</td>
                <td>{{ $i['sale_price'] }}</td>
                <td>{{ $i['purchase_price'] }}</td>
                <td>{{ $i['quantity'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
