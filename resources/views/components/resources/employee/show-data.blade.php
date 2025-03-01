<x-table.element.tr>
    <x-table.element.th data="Login ID" />
    <x-table.element.td :data="$data2['login_id']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Designation" />
    <x-table.element.td :data="$data2['designation']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee Name" />
    <x-table.element.td :data="$data2['name']" />
</x-table.element.tr>

<x-table.element.tr>
    <x-table.element.th data="Employee Email" />
    <x-table.element.td :data="$data2['email']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee Phone" />
    <x-table.element.td :data="$data2['phone']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee Address" />
    <x-table.element.td :data="$data2['address']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee City" />
    <x-table.element.td :data="$data2['city']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee Pin" />
    <x-table.element.td :data="$data2['pin']" />
</x-table.element.tr>
<x-table.element.tr>
    <x-table.element.th data="Employee State" />
    <x-table.element.td :data="$data2['state']['name'] ?? ''" />
</x-table.element.tr>