<x-layout.business-owner.app>
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
                            <x-form.element.button1 title="Edit Details" href="{{ route('business.edit', $data->id) }}" />
                        </td>
                    </tr>
                </x-table.element.tbody>

            </x-table.type.responsive>
            
        </div>
    </section>
</x-layout.business-owner.app>
