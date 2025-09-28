<x-bg.color style="reverse-{{ $style }}" {{ $attributes->merge(['class' => 'w-full shadow-xl rounded-lg align-middle']) }}>
    <div class="w-full text-black rounded-t-lg border-black">
        @isset($header)
        <x-card.element.header :style="$style">
            <x-bg.color style="{{ $style }}">

                {{ $header }}
                @isset($right_header)
                <x-slot:right_item> {{ $right_header }} </x-slot:right_item>
                @endisset
            </x-bg.color>
        </x-card.element.header>

        @endisset
    </div>
    <div class="w-full align-middle">
        {{ $slot }}
    </div>

    @isset($footer)
    <div {{ $footer->attributes->merge(['class' => 'p-4']) }}>
        {{ $footer }}
    </div>
    @endisset

</x-bg.color>