<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{ $head }}
    @vite(['resources/css/app.css'])
</head>

<body class="bg-primary-light">

    <div class="my-4">
        {{ $header_logo ?? '' }}

        @relativeInclude('header')
        @relativeInclude('sidebar')

        <div class="mt-4 p-4 sm:ml-64">
            @relativeInclude('header.alert')
            {{ $slot }}
            @relativeInclude('footer')
        </div>


    </div>

    @livewireScripts
    @vite(['resources/js/app.js'])


    @if (config('app.watermark') == 1)
        <script>
            var textWatermark = 'Testing';
            var body = document.getElementsByTagName('body')[0];
            var header = document.getElementsByClassName('header')[0];
            var dlabnav = document.getElementsByClassName('dlabnav')[0];
            var navHeader = document.getElementsByClassName('nav-header')[0];
            var background =
                "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' height='48px' width='80px' >" +
                "<text transform='translate(20, 48) rotate(-30)' fill='rgba(255,128,128, 0.2)' font-size='20' >" +
                textWatermark + "</text></svg>\")";
            body.style.backgroundImage = background
            header.style.backgroundImage = background
            dlabnav.style.backgroundImage = background
            navHeader.style.backgroundImage = background
        </script>
    @endif

</body>

</html>
