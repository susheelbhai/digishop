@livewire('business-owner.switch_business')
<x-layout.sidebar.li1 name="Home" href="{{ route('dashboard') }}" icon="fas fa-tv" />
<x-layout.sidebar.li1 name="Business Detail" href="{{ route('business.index') }}" icon="fa fa-city" />
<x-layout.sidebar.li2 name=" Setting" icon="fa fa-cog">
    <x-layout.sidebar.li21 name="Product Setting" href="{{ route('product.setting') }}" />
    <x-layout.sidebar.li21 name="Invoice Setting" href="{{ route('invoice.setting') }}" />
    <x-layout.sidebar.li21 name="Invoice Format" href="{{ route('invoice.format') }}" />
    <x-layout.sidebar.li21 name="Invoice Number" href="{{ route('invoice.invoice_number_format') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Customer" icon="fas fa-user">
    <x-layout.sidebar.li21 name="All Customer" href="{{ route('customer.index') }}" />
    <x-layout.sidebar.li21 name="Create Customer" href="{{ route('customer.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Employee" icon="fas fa-user">
    <x-layout.sidebar.li21 name="All Employee" href="{{ route('employee.index') }}" />
    <x-layout.sidebar.li21 name="Create Employee" href="{{ route('employee.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Warehouse" icon="fas fa-warehouse">
    <x-layout.sidebar.li21 name="All warehouse" href="{{ route('warehouse.index') }}" />
    <x-layout.sidebar.li21 name="Create warehouse" href="{{ route('warehouse.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Product" icon="fab fa-product-hunt">
    <x-layout.sidebar.li21 name="All Product" href="{{ route('product.index') }}" />
    <x-layout.sidebar.li21 name="Create Product" href="{{ route('product.create') }}" />
    <x-layout.sidebar.li21 name="Inventory" href="{{ route('inventory.index') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Order" icon="fas fa-shopping-cart">
    <x-layout.sidebar.li21 name="All Order" href="{{ route('order.index') }}" />
    <x-layout.sidebar.li21 name="Create Order" href="{{ route('order.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Download Reports" icon="fas fa-download">
    <x-layout.sidebar.li21 name="Product" href="{{ route('report.product') }}" />
    <x-layout.sidebar.li21 name="Inventory" href="{{ route('report.inventory') }}" />
    <x-layout.sidebar.li21 name="Order" href="{{ route('report.order') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li1 name="Transaction" href="{{ route('transaction.index') }}"
    icon="fa-solid fa-indian-rupee-sign" />
