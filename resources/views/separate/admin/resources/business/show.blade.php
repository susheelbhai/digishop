<x-layout.admin.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Business Detail | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <x-table.type.responsive title="Business Detail">

                <x-table.element.tbody>
                    <x-resources.business.show-business-data :data="$data" />
                    <x-resources.business-application.show-bank-data :data="$data" />
                    <tr>
                        <td colspan="2" class="text-center">
                            <a class="" href="{{ route('admin.business.edit', $data->id) }}">Edit Details</a>
                        </td>
                    </tr>
                </x-table.element.tbody>

            </x-table.type.responsive>
            
        </div>
    </section>
</x-layout.admin.app>
