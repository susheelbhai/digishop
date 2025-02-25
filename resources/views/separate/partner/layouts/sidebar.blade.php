<x-layout.sidebar.li1 icon="ri-dashboard-line" :href="route('partner.dashboard')" name="Dashboard" />
<x-layout.sidebar.li2 name="Business Application" icon="fa-solid fa-file-alt" >
    <x-layout.sidebar.li21 name="All Application" href="{{ route('partner.business_application.index') }}"/>
    <x-layout.sidebar.li21 name="Create Application" href="{{ route('partner.business_application.create') }}"/>
</x-layout.sidebar.li2>

<x-layout.sidebar.li1 name="Approved Business" href="{{ route('partner.business.index') }}" icon="fa-solid fa-city" />