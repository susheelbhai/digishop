<x-layout.header.logo href="{{ route('dashboard') }}" :darkLogo="Session::get('current_business_logo')" :name="Session::get('current_business')['name']" />

