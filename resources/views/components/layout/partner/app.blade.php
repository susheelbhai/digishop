<x-layout.app>
    <x-slot name='head'>
        <link rel="icon" href="{{ asset('images/logo/'.config('app.favicon', 'dummy.png')) }}">
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('themes/ck_editor/js/vendors.min.js') }}"></script>
        <script src="{{ asset('themes/ck_editor/vendor_components/ckeditor/ckeditor.js') }}"></script>
        {{ $head }}
    </x-slot>

    <x-slot name='header_logo'>
        @include('partner.layouts.header_logo')
    </x-slot>

    <x-slot name='header_profile_box'>
        @include('partner.layouts.header_profile_box')
    </x-slot>

    <x-slot name='header_profile_li'>
        @include('partner.layouts.header_profile_li')
    </x-slot>

    <form id="logout_form" action="{{ route('partner.logout') }}" method="post">
        @csrf
    </form>

    <x-slot name='sidebar'>
        @include('partner.layouts.sidebar')
    </x-slot>

    {{ $slot }}
    
    <script>
        function logoutSubmit() {
            document.getElementById('logout_form').submit();
        }
    </script>

      
    
</x-layout.app>
