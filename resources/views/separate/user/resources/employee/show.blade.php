<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Employee Detail | {{ config('app.name') }}</title>
    </x-slot>

    <x-table.type.responsive title="Employee Detail">
                
        <x-table.element.tbody>
            <x-resources.employee.show-data :data="$data" />
            
            <x-table.element.tr>
                <x-table.element.td colspan="2">
                    <div class="col-12 py-3">
                        <a href="{{ route('employee.edit', $data['id']) }}"
                            type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            <span class="btn-icon-end"> Edit Detail </span>
                        </a>
                    </div>
                </x-table.element.td>
            </x-table.element.tr>

        </x-table.element.tbody>

    </x-table.type.responsive>

</x-layout.business-owner.app>
