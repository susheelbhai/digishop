<div class="row">

    <style>
        .form-search {
            background: #fff;
            border: 0.0625rem solid #d2d2d2;
            padding: 0.3125rem 1.25rem;
            color: #6e6e6e;
            height: 2.8rem;
            border-radius: 1rem;
        }
    </style>
    @if ($addUrl != '#')
        <x-form.element.button1 :href="$addUrl" title="Add New" type="add" div="4" />
    @endif

    <div class="my-4">
        <x-card.type.standard class="relative overflow-x-auto">
            <x-slot name="header">
                {{ $title }}
            </x-slot>
            <x-slot name="right_header">
                {{ $status ?? '' }}
                @if ($inputName != '')
                    <input type="text" wire:model.live="{{ $inputName }}" class="form-search grow-3"
                        placeholder="Search">
                @endif
            </x-slot>
            <div class="relative overflow-x-auto">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    {{ $slot }}
                </table>
            </div>

            <x-slot name="footer" >
                {{ $data2->links() }}

            </x-slot>
        </x-card.type.standard>

    </div>

</div>