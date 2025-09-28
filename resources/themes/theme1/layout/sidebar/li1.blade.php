
@php
    $isActive = url()->current() === url($href);
@endphp

<li>
    <a href="{{ $href }}"
       class="flex items-center p-2 rounded-lg group
            {{ $isActive
                ? 'text-blue-600 dark:text-blue-400 font-semibold'
                : 'text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400' }}"
       @if($isActive) data-active="true" @endif>
        
        <span class="w-5 h-5 transition duration-75
            {{ $isActive ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400' }}">
            <i class="{{ $icon }}"></i>
        </span>

        <span class="ms-3">{{ $name }}</span>
    </a>
</li>
