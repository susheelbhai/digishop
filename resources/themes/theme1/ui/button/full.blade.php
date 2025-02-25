<x-bg.color style="{{ $style }}" class="text-center rounded-full">
<button type="{{ $type }}"
    class="w-full justify-center rounded-full px-4 py-2 text-sm font-semibold shadow-xs hover:bg-red-500 ">
        <x-text.h4 style="reverse-{{ $style }}">{{ $title }} {{ $slot }} </x-text.h4>
    </button>
</x-bg.color>
