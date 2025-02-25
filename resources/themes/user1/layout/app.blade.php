<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
	{{ $head }}

</head>

<body>

    <main class="main-page homepage">
        {{-- @include('user.layouts.top_header') --}}
        @relativeInclude('header')
        {{ $slot }}
        {{-- @include('user.layouts.footer') --}}
    </main>

</body>


</html>