@php
    switch ($type) {
        case 'primary':
            $bg_class = 'white';
            $text_class = 'black';
            break;

        case 'success':
            $bg_class = 'green-600';
            $text_class = 'green-600';
            break;

        case 'warning':
            $bg_class = 'amber-400';
            $text_class = 'amber-400';
            break;

        case 'danger':
            $bg_class = 'red-800';
            $text_class = 'red-800';
            break;

        default:
            $bg_class = 'white';
            $text_class = 'black';
            break;
    }
@endphp

<div class=" shadow-xl rounded-lg bg-white align-middle">
    <div class="w-full bg-{!! $bg_class !!} text-{{ $text_class }}">
        @isset($header)
            <div
                class=" bg-{!! $bg_class !!} flex flex-wrap text-sm font-medium text-center text-{{ $text_class }} border-b border-{{ $text_class }} rounded-t-lg ">
                <div class="me-2 ">
                    {{ $header }}

                </div>
            </div>
        @endisset
    </div>
    <div class="w-full align-middle  bg-white">
        {{ $slot }}
    </div>
</div>
