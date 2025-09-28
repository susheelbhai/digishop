<div class="cursor-pointer">
    @if ($type == 'button')
    <x-bg.color style="{{ $style }}" class="text-center rounded-full">


        <a class="btn btn-primary" {{ $attributes }}>
            <button type="{{ $type }}"
                class="w-full justify-center rounded-full px-4 py-2 text-sm font-semibold shadow-xs hover:bg-red-500 ">
                <x-text.h4 style="reverse-{{ $style }}">{{ $title }} {{ $slot }} </x-text.h4>
            </button>
    </x-bg.color>
    </a>
@endif

@if ($type == 'add')
    <div class="mb-3 ">
        <a class="btn btn-primary" {{ $attributes }}>
            <x-bg.color style="{{ $style }}"
                {{ $attributes->merge(['class' => 'text-center rounded-lg inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-semibold shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto']) }}>

                {{-- <i class="fa fa-plus"></i> --}}
                <span class="btn-icon-end">
                    <button type="{{ $type }}" class="">
                        <x-text.h4 style="reverse-{{ $style }}">{{ $title }}</x-text.h4>
                    </button>
                </span>
            </x-bg.color>
        </a>
    </div>
@endif

@if ($type == 'submit')
<div class="mb-3 ">
    <a class="btn btn-primary" {{ $attributes }}>
        <x-bg.color style="{{ $style }}"
            {{ $attributes->merge(['class' => 'text-center rounded-lg inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-semibold shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto']) }}>

            {{-- <i class="fa fa-plus"></i> --}}
            <span class="btn-icon-end">
                <button type="{{ $type }}" class="">
                    <x-text.h4 style="reverse-{{ $style }}">{{ $title }}</x-text.h4>
                </button>
            </span>
        </x-bg.color>
    </a>
</div>
@endif

</div>