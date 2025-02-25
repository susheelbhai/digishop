<div class="row">

    @if ($addUrl != '#')
        <x-form.element.button1 :href="$addUrl" title="Add New" type="add" div="4" />
    @endif

    <div class="my-4">
        <x-card.type.standard class="relative overflow-x-auto">
            <x-slot name="header">
                {{ $title }}
            </x-slot>
            <x-slot name="search_box">
                {{ $status ?? '' }}
            </x-slot>
            <div class="relative overflow-x-auto">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    {{ $slot }}
                </table>
            </div>

        </x-card.type.standard>

    </div>

</div>