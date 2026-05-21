@extends('layout.admin.app')

@section('title', 'Manage Enquiries')

@section('content')

<div class="admin-content-wrapper">

    <!-- =====================================================
    | PAGE HEADER
    ====================================================== -->

    <div class="admin-page-header">

        <div>

            <h1>

                Enquiry Management

            </h1>

            <p>

                Manage all customer property enquiries

            </p>

        </div>

        <div class="header-stat-card">

            <span>

                New Enquiries

            </span>

            <h3 id="newEnquiryCount">

                {{ $newCount }}

            </h3>

        </div>

    </div>

    <!-- =====================================================
    | CARD
    ====================================================== -->

    <div class="admin-table-card">

        <!-- TOP ACTIONS -->

        <div class="datatable-top-bar">

            <button
                class="bulk-delete-btn"
                id="bulkDeleteBtn"
            >

                <i class="fa-solid fa-trash"></i>

                Delete Selected

            </button>

            <button
                class="mark-read-btn"
                id="markAllReadBtn"
            >

                <i class="fa-solid fa-check"></i>

                Mark All Read

            </button>

        </div>

        <!-- TABLE -->

        <div class="table-responsive">

            <table
                class="table admin-custom-table"
                id="enquiryTable"
                width="100%"
            >

                <thead>

                    <tr>

                        <th width="40">

                            <input
                                type="checkbox"
                                id="selectAll"
                            >

                        </th>

                        <th>#</th>

                        <th>Customer</th>

                        <th>Property</th>

                        <th>Contact</th>

                        <th>Status</th>

                        <th>Date</th>

                        <th width="140">

                            Action

                        </th>

                    </tr>

                </thead>

            </table>

        </div>

    </div>

</div>

@endsection

@section('scripts')

<!-- DATATABLE -->

<link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css"
/>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- SWEET ALERT -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | DATATABLE
    |--------------------------------------------------------------------------
    */

    let table = $('#enquiryTable').DataTable({

        processing: true,

        serverSide: true,

        responsive: true,

        ajax: "{{ route('admin.enquiries') }}",

        columns: [

            {
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },

            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false
            },

            {
                data: 'customer',
                name: 'name'
            },

            {
                data: 'property',
                name: 'property.title'
            },

            {
                data: 'mobile',
                name: 'mobile'
            },

            {
                data: 'status',
                name: 'status'
            },

            {
                data: 'created_at',
                name: 'created_at'
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }

        ],

        order: [[6, 'desc']]

    });

    /*
    |--------------------------------------------------------------------------
    | SELECT ALL
    |--------------------------------------------------------------------------
    */

    $('#selectAll').on('click', function () {

        $('.row-checkbox').prop(

            'checked',

            $(this).is(':checked')

        );

    });

    /*
    |--------------------------------------------------------------------------
    | DELETE SINGLE
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.deleteEnquiryBtn', function () {

        let id =
            $(this).data('id');

        Swal.fire({

            title: 'Delete Enquiry?',

            text: 'This action cannot be undone.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            confirmButtonText: 'Yes, Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url:
                        '/admin/enquiries/' + id,

                    type: 'DELETE',

                    data: {

                        _token:
                            '{{ csrf_token() }}'

                    },

                    success: function () {

                        Swal.fire({

                            icon: 'success',

                            title: 'Deleted',

                            timer: 1500,

                            showConfirmButton: false

                        });

                        table.ajax.reload();

                    }

                });

            }

        });

    });

    /*
    |--------------------------------------------------------------------------
    | BULK DELETE
    |--------------------------------------------------------------------------
    */

    $('#bulkDeleteBtn').on('click', function () {

        let ids = [];

        $('.row-checkbox:checked').each(function () {

            ids.push($(this).val());

        });

        if (ids.length === 0) {

            Swal.fire({

                icon: 'warning',

                title: 'Select Enquiries First'

            });

            return;

        }

        Swal.fire({

            title: 'Delete Selected Enquiries?',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            confirmButtonText: 'Yes, Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url:
                        "{{ route('admin.enquiries.bulkDelete') }}",

                    type: 'POST',

                    data: {

                        _token:
                            '{{ csrf_token() }}',

                        ids: ids

                    },

                    success: function () {

                        Swal.fire({

                            icon: 'success',

                            title: 'Deleted Successfully',

                            timer: 1500,

                            showConfirmButton: false

                        });

                        table.ajax.reload();

                    }

                });

            }

        });

    });

    /*
    |--------------------------------------------------------------------------
    | MARK ALL READ
    |--------------------------------------------------------------------------
    */

    $('#markAllReadBtn').on('click', function () {

        $.ajax({

            url:
                "{{ route('admin.enquiries.markAllRead') }}",

            type: 'POST',

            data: {

                _token:
                    '{{ csrf_token() }}'

            },

            success: function () {

                Swal.fire({

                    icon: 'success',

                    title: 'All Enquiries Marked Read',

                    timer: 1500,

                    showConfirmButton: false

                });

                table.ajax.reload();

            }

        });

    });

});

</script>

@endsection