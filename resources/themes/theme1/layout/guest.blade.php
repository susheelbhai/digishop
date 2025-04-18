<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <title> Authenticate {{ config('app.name') }} </title>
    @vite(['resources/css/app.css'])
    {{ $head ?? '' }}
</head>

<body class="bg-primary-light">


    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">

                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">



                            {{ $slot }}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (config('app.watermark') == 1)
    <script>
        var textWatermark = 'Testing';
        var body = document.getElementsByTagName('body')[0];
        var header = document.getElementsByTagName('nav')[0];
        var background =
            "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' height='48px' width='80px' >" +
            "<text transform='translate(20, 48) rotate(-30)' fill='rgba(255,128,128, 0.2)' font-size='20' >" +
            textWatermark + "</text></svg>\")";
        body.style.backgroundImage = background
        header.style.backgroundImage = background
    </script>
@endif

</body>

</html>
