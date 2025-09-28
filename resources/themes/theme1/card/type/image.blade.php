<x-bg.color style="reverse-{{ $style }}" {{ $attributes->merge(['class' => 'w-full shadow-xl rounded-lg align-middle']) }}>
    <div class="w-full text-black rounded-t-lg border-black">
        @isset($header)
        <x-card.element.header :style="$style">
            {{ $header }}
        </x-card.element.header>
            
        @endisset
    </div>
    <img class="card-img-top img-fluid" src="{{ $src }}" alt="Card image cap">
    <div class="w-full align-middle">
        {{ $slot }}
    </div>
</x-bg.color>
