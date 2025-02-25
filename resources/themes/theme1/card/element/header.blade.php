<x-bg.color style="{{ $style }}" class="border-b border-black  rounded-t-lg">
    <div class="w-full text-sm font-medium ">
        <x-text.color style="reverse-{{ $style }}"
            class="block p-4 text-reverse-{{ $style }} rounded-ss-lg ">
            <div class="flex justify-between">
                <h5 class="inline-block  rounded-ss-lg dark:bg-gray-800 ">
                    <span class="text-xl font-medium ">{{ $slot }}</span>
                </h5>
                <div class="inline-block ">
                    {{ $right_item ?? '' }}
                </div>
            </div>

        </x-text.color>
    </div>
</x-bg.color>
