
@php
    $isActive = url()->current() === url($href);
@endphp

<li>
    <a href="{{ $href }}"
       class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group
            {{ $isActive
                ? 'text-blue-600 dark:text-blue-400 font-semibold'
                : 'text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400' }}"
       @if($isActive) data-active="true" @endif>
        {{ $name }}
    </a>
</li>
