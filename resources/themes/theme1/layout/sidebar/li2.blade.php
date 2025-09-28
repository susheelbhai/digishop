
@php
    // parent is active if any child link has data-active
    $childActive = str_contains($slot, 'data-active="true"');
@endphp

<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group
            {{ $childActive
                ? 'text-blue-600 dark:text-blue-400 font-semibold'
                : 'text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400' }}"
        aria-controls="dropdown-example-{{ Str::slug($name) }}"
        data-collapse-toggle="dropdown-example-{{ Str::slug($name) }}">
        
        <span class="shrink-0 w-5 h-5 transition duration-75
            {{ $childActive ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400' }}">
            <i class="{{ $icon }}"></i>
        </span>

        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $name }}</span>
        <svg class="w-3 h-3 transition-transform {{ $childActive ? 'rotate-90' : '' }}" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

    <ul id="dropdown-example-{{ Str::slug($name) }}"
        class="py-2 space-y-2 {{ $childActive ? 'block' : 'hidden' }}">
        {{ $slot }}
    </ul>
</li>
