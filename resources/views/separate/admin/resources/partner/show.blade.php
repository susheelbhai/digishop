<x-layout.admin.app>
    <x-slot name="head">
        <title> View Partner | {{ config('app.name') }}</title>
    </x-slot>

    <x-table.type.responsive title="View partner Detail">

        <x-table.element.tbody>
            <x-table.element.tr>
                <x-table.element.th data="Name"/>
                <x-table.element.td :data="$data->name"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Email"/>
                <x-table.element.td :data="$data->email"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Phone"/>
                <x-table.element.td :data="$data->phone"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Designation"/>
                <x-table.element.td :data="$data->designation"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Gender"/>
                <x-table.element.td :data="$data['gender']->name"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Theme"/>
                <x-table.element.td :data="$data['theme']->name"/>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Color 1"/>
                <x-table.element.td>
                    <div style="display: inline-block; width:132px; height:32px; background:{{ $data->color1 }}"></div>
                </x-table.element.td>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Color 2"/>
                <x-table.element.td>
                    <div style="display: inline-block; width:132px; height:32px; background:{{ $data->color2 }}"></div>
                </x-table.element.td>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Color 3"/>
                <x-table.element.td>
                    <div style="display: inline-block; width:132px; height:32px; background:{{ $data->color3 }}"></div>
                </x-table.element.td>
            </x-table.element.tr>
            <x-table.element.tr>
                <x-table.element.th data="Image"/>
                <x-table.element.td>
                    <img src="{{ asset($data['profile_pic']) }}" width="60px">
                </x-table.element.td>
            </x-table.element.tr>
                
            <x-table.element.tr>
                <x-table.element.td colspan="2">
                    <div class="col-12 py-3">
                        <a href="{{ route('admin.partner.edit', $data['id']) }}" type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            <span class="btn-icon-end"> Edit Detail </span>
                        </a>
                    </div>
                </x-table.element.td>
            </x-table.element.tr>

        </x-table.element.tbody>

    </x-table.type.responsive>

</x-layout.admin.app>
