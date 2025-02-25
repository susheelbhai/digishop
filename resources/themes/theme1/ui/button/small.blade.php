<x-bg.color style="{{ $style }}"
    {{ $attributes->merge(['class' => 'text-center rounded-lg inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-semibold shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto']) }}>
    <button type="{{ $type }}" class="">
        <x-text.h4 style="reverse-{{ $style }}">{{ $title }}</x-text.h4>
    </button>
</x-bg.color>
