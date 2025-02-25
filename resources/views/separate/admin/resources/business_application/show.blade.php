<x-layout.admin.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Application Detail | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <x-table.type.responsive title="Business Application Detail">
                <x-slot name="status">
                    @if ($data['approved_at'] != null)
                        <x-ui.badge-light title="Approved" type="success" size="xl" />
                    @elseif($data['rejected_at'] != null)
                        <x-ui.badge-light title="Rejected" type="danger" size="xl" />
                    @else
                        <x-ui.badge-light title="Pending for approval" type="warning" size="xl" />
                    @endif
                </x-slot>
                <x-table.element.tbody>
                    <x-resources.business-application.show-business-data :data="$data" />
                    <x-resources.business-application.show-owner-data :data="$data" />
                    <x-resources.business-application.show-bank-data :data="$data" />
                    
                    @if ($data['approved_at'] == null && $data['rejected_at'] == null)
                        <x-table.element.tr>
                            <x-table.element.td colspan="2">
                                <div class="row">
                                    <div class="col-4 py-3">
                                        <a href="{{ route('admin.business_application.edit', $data['id']) }}"
                                            type="button" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                            <span class="btn-icon-end"> Edit Detail </span>
                                        </a>
                                    </div>
                                    <div class="col-4 py-3">
                                        <a onclick="approveButton({{ $data['id'] }})" type="button"
                                            class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                            <span class="btn-icon-end"> Approve Business </span>
                                        </a>
                                    </div>
                                    <div class="col-4 py-3">
                                        <button onclick="rejectButton({{ $data['id'] }})" type="button"
                                            class="btn btn-danger">
                                            <i class="fa fa-xmark"></i>
                                            <span class="btn-icon-end"> Reject Business </span>
                                        </button>
                                    </div>
                                </div>
                            </x-table.element.td>
                        </x-table.element.tr>
                    @endif

                </x-table.element.tbody>

            </x-table.type.responsive>

        </div>
    </section>


    <script>
        function approveButton(params) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.business_application.approve', $data['id']) }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(result) {
                            console.log(result);
                            Swal.fire({
                                title: result.title,
                                text: result.message,
                                icon: result.class
                            }).then(function(params) {
                                location.reload()
                            });
                        },
                        error: function(params) {
                            Swal.fire({
                                title: "Oops!",
                                text: "Something went wrong.",
                                icon: "error"
                            }).then(function(params) {
                                location.reload()
                            });
                        }
                    });

                }
            });
        }

        function rejectButton(params) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, reject it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.business_application.reject', $data['id']) }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(result) {
                            console.log(result);
                            Swal.fire({
                                title: result.title,
                                text: result.message,
                                icon: result.class
                            }).then(function(params) {
                                location.reload()
                            });
                        },
                        error: function(params) {
                            Swal.fire({
                                title: "Oops!",
                                text: "Something went wrong.",
                                icon: "error"
                            }).then(function(params) {
                                location.reload()
                            });
                        }
                    });

                }
            });
        }
    </script>

</x-layout.admin.app>
