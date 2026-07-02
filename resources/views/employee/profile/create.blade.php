@extends('layout.employee.employee')

@section('title', 'Create Employee Profile')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-10 mx-auto">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        <i class="fas fa-user-plus me-2"></i>
                        Employee Profile
                    </h4>

                </div>

                <div class="card-body">

                    <form id="employeeProfileForm"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- Nav Tabs -->

                        <ul class="nav nav-tabs mb-4"
                            id="profileTabs"
                            role="tablist">

                            <li class="nav-item">

                                <button class="nav-link active"
                                        id="basic-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#basic"
                                        type="button">

                                    <i class="fas fa-user"></i>

                                    Basic Information

                                </button>

                            </li>

                            <li class="nav-item">

                                <button class="nav-link"
                                        id="education-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#education"
                                        type="button">

                                    <i class="fas fa-graduation-cap"></i>

                                    Education & Documents

                                </button>

                            </li>

                        </ul>

                        <!-- Tabs -->

                        <div class="tab-content">

                            <!-- Basic -->

                            <div class="tab-pane fade show active"
                                 id="basic">

                                @include('employee.profile._basic')

                            </div>

                            <!-- Education -->

                            <div class="tab-pane fade"
                                 id="education">

                                @include('employee.profile._education')

                            </div>

                        </div>

                        <hr>

                        <div class="text-end">

                            <button type="button"
                                    class="btn btn-secondary me-2"
                                    id="previousTab"
                                    style="display:none;">

                                <i class="fas fa-arrow-left"></i>

                                Previous

                            </button>

                            <button type="button"
                                    class="btn btn-primary"
                                    id="nextTab">

                                Next

                                <i class="fas fa-arrow-right"></i>

                            </button>

                            <button type="submit"
                                    class="btn btn-success"
                                    id="saveProfile"
                                    style="display:none;">

                                <i class="fas fa-save"></i>

                                Save Profile

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

$('#profile_photo').change(function(){

    let reader = new FileReader();

    reader.onload = function(e){

        $('#photoPreview').attr('src', e.target.result);

    }

    reader.readAsDataURL(this.files[0]);

});

</script>

<script>

$(function(){

    let currentTab = 0;

    const tabs = $('.nav-link');

    function showTab(index){

        tabs.eq(index).tab('show');

        if(index==0){

            $('#previousTab').hide();

            $('#nextTab').show();

            $('#saveProfile').hide();

        }else{

            $('#previousTab').show();

            $('#nextTab').hide();

            $('#saveProfile').show();

        }

    }

    $('#nextTab').click(function(){

        currentTab=1;

        showTab(currentTab);

    });

    $('#previousTab').click(function(){

        currentTab=0;

        showTab(currentTab);

    });

});

</script>

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Preview Profile Photo
    |--------------------------------------------------------------------------
    */

    $('#profile_photo').change(function () {

        let reader = new FileReader();

        reader.onload = function (e) {

            $('#photoPreview').attr('src', e.target.result);

        }

        reader.readAsDataURL(this.files[0]);

    });

    /*
    |--------------------------------------------------------------------------
    | Submit Employee Profile
    |--------------------------------------------------------------------------
    */

    $('#employeeProfileForm').submit(function (e) {

        e.preventDefault();

        $('.text-danger').html('');

        Swal.fire({

            title: 'Create Profile?',

            text: 'Are you sure you want to save this profile?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#3085d6',

            cancelButtonColor: '#d33',

            confirmButtonText: 'Yes, Save'

        }).then((result) => {

            if (!result.isConfirmed) {

                return;

            }

            let formData = new FormData(document.getElementById('employeeProfileForm'));

            $.ajax({

                url: "{{ route('employee.profile.store') }}",

                type: "POST",

                data: formData,

                processData: false,

                contentType: false,

                beforeSend: function () {

                    $('#saveProfile')
                        .prop('disabled', true)
                        .html('<i class="fa fa-spinner fa-spin"></i> Saving...');

                },

                success: function (response) {

                    Swal.fire({

                        icon: 'success',

                        title: 'Success',

                        text: response.message,

                        confirmButtonColor: '#198754'

                    }).then(function () {

                        window.location.href = response.redirect;

                    });

                },

                error: function (xhr) {

                    $('#saveProfile')
                        .prop('disabled', false)
                        .html('<i class="fas fa-save"></i> Save Profile');

                    if (xhr.status == 422) {

                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {

                            $('.error-' + key).html(value[0]);

                        });

                    } else {

                        Swal.fire({

                            icon: 'error',

                            title: 'Error',

                            text: xhr.responseJSON?.message ?? 'Something went wrong.'

                        });

                    }

                },

                complete: function () {

                    $('#saveProfile')
                        .prop('disabled', false)
                        .html('<i class="fas fa-save"></i> Save Profile');

                }

            });

        });

    });

});
</script>

<script>

$(function(){

    $('#addEducation').click(function(){

        let template = $('#educationTemplate').html();

        $('#educationWrapper').append(template);

    });

    $(document).on('click','.removeEducation',function(){

        if($('.education-item').length>1){

            $(this).closest('.education-item').remove();

        }else{

            Swal.fire({

                icon:'warning',

                title:'Warning',

                text:'At least one education record is required.'

            });

        }

    });

});

</script>


@endpush


