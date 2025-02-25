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
            <th>GST Percentage</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i)
            <tr>
                <td>{{ $i['id'] }}</td>
                <td>{{ $i['hsn_code'] }}</td>
                <td>{{ $i['sku'] }}</td>
                <td>{{ $i['name'] }}</td>
                <td>{{ $i['description'] }}</td>
                <td>{{ $i['mrp'] }}</td>
                <td>{{ $i['sale_price'] }}</td>
                <td>{{ $i['gst_percentage'] }}</td>
                <td>{{ $i['inventory_sum_quantity'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
