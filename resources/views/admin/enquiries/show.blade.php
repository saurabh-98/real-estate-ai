@extends('layout.admin.app')

@section('title', 'Enquiry Details')

@section('content')

<div class="admin-content-wrapper">

    <!-- =====================================================
    | PAGE HEADER
    ====================================================== -->

    <div class="admin-page-header enquiry-header">

        <div>

            <h1>

                Enquiry Details

            </h1>

            <p>

                View and manage customer enquiry information

            </p>

        </div>

        <div class="header-action-group">

            <!-- BACK -->

            <a
                href="{{ route('admin.enquiries') }}"
                class="back-btn"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Back

            </a>

            <!-- DELETE -->

            <button
                class="delete-enquiry-btn"
                id="deleteEnquiryBtn"
                data-id="{{ $enquiry->id }}"
            >

                <i class="fa-solid fa-trash"></i>

                Delete

            </button>

        </div>

    </div>

    <!-- =====================================================
    | ENQUIRY CARD
    ====================================================== -->

    <div class="enquiry-details-card">

        <!-- =====================================================
        | TOP PROFILE
        ====================================================== -->

        <div class="enquiry-profile-section">

            <!-- AVATAR -->

            <div class="customer-profile-box">

                <div class="customer-avatar-large">

                    {{ strtoupper(substr($enquiry->name,0,1)) }}

                </div>

                <div>

                    <h2>

                        {{ $enquiry->name }}

                    </h2>

                    <span>

                        Customer Enquiry

                    </span>

                </div>

            </div>

            <!-- STATUS -->

            <div class="status-section">

                {!! $enquiry->status_badge !!}

            </div>

        </div>

        <!-- =====================================================
        | INFO GRID
        ====================================================== -->

        <div class="enquiry-info-grid">

            <!-- EMAIL -->

            <div class="info-box">

                <div class="info-icon">

                    <i class="fa-solid fa-envelope"></i>

                </div>

                <div>

                    <small>

                        Email Address

                    </small>

                    <h5>

                        {{ $enquiry->email }}

                    </h5>

                </div>

            </div>

            <!-- MOBILE -->

            <div class="info-box">

                <div class="info-icon">

                    <i class="fa-solid fa-phone"></i>

                </div>

                <div>

                    <small>

                        Mobile Number

                    </small>

                    <h5>

                        {{ $enquiry->mobile }}

                    </h5>

                </div>

            </div>

            <!-- DATE -->

            <div class="info-box">

                <div class="info-icon">

                    <i class="fa-solid fa-calendar-days"></i>

                </div>

                <div>

                    <small>

                        Enquiry Date

                    </small>

                    <h5>

                        {{ $enquiry->formatted_date }}

                    </h5>

                </div>

            </div>

            <!-- PROPERTY -->

            <div class="info-box">

                <div class="info-icon">

                    <i class="fa-solid fa-building"></i>

                </div>

                <div>

                    <small>

                        Property

                    </small>

                    <h5>

                        {{ $enquiry->property->title ?? 'Property Removed' }}

                    </h5>

                </div>

            </div>

        </div>

        <!-- =====================================================
        | MESSAGE
        ====================================================== -->

        <div class="message-card">

            <div class="message-header">

                <h4>

                    Customer Message

                </h4>

            </div>

            <div class="message-body">

                {{ $enquiry->message }}

            </div>

        </div>

        <!-- =====================================================
        | ACTIONS
        ====================================================== -->

        <div class="enquiry-action-bar">

            @if($enquiry->status != 'read')

                <button
                    class="action-btn mark-read-btn"
                    id="markReadBtn"
                >

                    <i class="fa-solid fa-check"></i>

                    Mark As Read

                </button>

            @endif

            @if($enquiry->status != 'replied')

                <button
                    class="action-btn reply-btn"
                    id="markReplyBtn"
                >

                    <i class="fa-solid fa-paper-plane"></i>

                    Mark As Replied

                </button>

            @endif

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    function updateStatus(status) {

        $.ajax({

            url:
                "{{ route('admin.enquiries.status', $enquiry->id) }}",

            type: "POST",

            data: {

                _token:
                    "{{ csrf_token() }}",

                status: status

            },

            success: function (response) {

                Swal.fire({

                    icon: 'success',

                    title: 'Updated',

                    text: response.message,

                    timer: 1600,

                    showConfirmButton: false

                });

                setTimeout(function () {

                    location.reload();

                }, 1600);

            },

            error: function () {

                Swal.fire({

                    icon: 'error',

                    title: 'Failed',

                    text: 'Something went wrong.'

                });

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | MARK READ
    |--------------------------------------------------------------------------
    */

    $('#markReadBtn').on('click', function () {

        updateStatus('read');

    });

    /*
    |--------------------------------------------------------------------------
    | MARK REPLIED
    |--------------------------------------------------------------------------
    */

    $('#markReplyBtn').on('click', function () {

        updateStatus('replied');

    });

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    $('#deleteEnquiryBtn').on('click', function () {

        Swal.fire({

            title: 'Delete Enquiry?',

            text: 'This action cannot be undone.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Yes, Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url:
                        "{{ route('admin.enquiries.destroy', $enquiry->id) }}",

                    type: 'DELETE',

                    data: {

                        _token:
                            "{{ csrf_token() }}"

                    },

                    success: function () {

                        Swal.fire({

                            icon: 'success',

                            title: 'Deleted',

                            text: 'Enquiry deleted successfully.',

                            timer: 1600,

                            showConfirmButton: false

                        });

                        setTimeout(function () {

                            window.location.href =
                                "{{ route('admin.enquiries') }}";

                        }, 1600);

                    }

                });

            }

        });

    });

});

</script>

@endsection