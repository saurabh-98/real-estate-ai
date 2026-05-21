@extends('layout.admin.app')

@section('title', 'Properties')

@section('content')

<div class="property-index-page">

    <div class="container-fluid">

        <!-- HEADER -->

        <div class="property-index-header">

            <div>

                <h2 class="property-index-title">

                    <i class="fa-solid fa-building"></i>

                    Properties Management

                </h2>

                <p class="property-index-subtitle">

                    Manage all your real-estate properties

                </p>

            </div>

            <a
                href="{{ route('admin.properties.create') }}"
                class="property-add-btn"
            >

                <i class="fa-solid fa-plus"></i>

                Add Property

            </a>

        </div>

        <!-- CARD -->

        <div class="property-table-card">

            <div class="table-responsive">

                <table
                    id="propertyTable"
                    class="table property-table align-middle"
                >

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Image</th>

                            <th>Title</th>

                            <th>Type</th>

                            <th>Price</th>

                            <th>City</th>

                            <th>Status</th>

                            <th>Featured</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')


<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | DATATABLE
    |--------------------------------------------------------------------------
    */

    $('#propertyTable').DataTable({

        processing: true,

        serverSide: false,

        ajax: {

            url: "{{ route('admin.properties.index') }}",

            dataSrc: 'properties'

        },

        columns: [

            {
                data: 'id'
            },

           {
                data: 'featured_image',

                render: function (data) {

                    if (data) {

                        return `
                            <img
                                src="/storage/properties/${data}"
                                class="property-table-image"
                                alt="Property Image"
                            >
                        `;

                    }

                    return `
                        <div class="property-no-image">

                            <i class="fa-solid fa-image"></i>

                        </div>
                    `;
                }
            },

            {
                data: 'title'
            },

            {
                data: 'property_type.name',

                defaultContent: 'N/A'
            },

            {
                data: 'price',

                render: function (data) {

                    return `₹${Number(data).toLocaleString()}`;

                }
            },

            {
                data: 'city'
            },

            {
                data: 'status',

                render: function (data) {

                    if (data == 1) {

                        return `
                            <span class="property-badge active">
                                Active
                            </span>
                        `;

                    } else {

                        return `
                            <span class="property-badge inactive">
                                Inactive
                            </span>
                        `;

                    }

                }
            },

            {
                data: 'is_featured',

                render: function (data) {

                    if (data == 1) {

                        return `
                            <span class="property-featured yes">
                                Yes
                            </span>
                        `;

                    } else {

                        return `
                            <span class="property-featured no">
                                No
                            </span>
                        `;

                    }

                }
            },

            {
                data: 'id',

                render: function (data) {

                    return `

                        <div class="property-action-group">

                            <a
                                href="/admin/properties/${data}/edit"
                                class="property-action-btn edit"
                            >

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <button
                                type="button"
                                class="property-action-btn delete deleteProperty"
                                data-id="${data}"
                            >

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </div>

                    `;

                }
            },

        ]

    });

    /*
    |--------------------------------------------------------------------------
    | DELETE PROPERTY
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.deleteProperty', function () {

        let id = $(this).attr('data-id');

        console.log(id);

        Swal.fire({

            title: 'Delete Property?',

            text: 'This action cannot be undone',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc2626',

            cancelButtonColor: '#6b7280',

            confirmButtonText: 'Yes Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: '/admin/properties/' + id,

                    type: 'POST',

                    data: {

                        _method: 'DELETE',

                        _token: '{{ csrf_token() }}'

                    },

                    success: function (response) {

                        Swal.fire({

                            icon: 'success',

                            title: 'Deleted',

                            text: response.message,

                            timer: 2000,

                            showConfirmButton: true

                        });

                        $('#propertyTable')
                            .DataTable()
                            .ajax
                            .reload();

                    },

                    error: function (xhr) {

                        console.log(xhr);

                        Swal.fire({

                            icon: 'error',

                            title: 'Error',

                            text: 'Delete failed'

                        });

                    }

                });

            }

        });

    });

});

</script>

@endsection