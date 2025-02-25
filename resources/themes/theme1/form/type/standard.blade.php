<div class="grid grid-cols-1 lg:grid-cols-{{ $div }}">

    <div class="w-full bg-white shadow-xl rounded-lg dark:bg-gray-800 dark:border-white">
        <div
            class="flex justify-between text-sm font-medium text-center text-gray-500 border-b border-black rounded-t-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <h5 class="inline-block p-4 text-blue-600 rounded-ss-lg dark:bg-gray-800  dark:text-blue-500">
                <span class="text-xl font-medium text-gray-900 dark:text-white">{{ $title }}</span>

            </h5>
            @isset($right_header)
                <div>
                    {{ $right_header }}
                </div>
            @endisset
        </div>
        <form class="p-4 h-full" method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data">
            @csrf

            {{ $slot }}

            @if ($action != '#')
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $submitName }}</button>
            @endif

        </form>
    </div>
</div>
