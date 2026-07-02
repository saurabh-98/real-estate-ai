@extends('layout.employee.employee')

@section('title', 'Edit Employee Profile')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-10 mx-auto">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-warning d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">

                        <i class="fas fa-user-edit me-2"></i>

                        Edit Employee Profile

                    </h4>

                    <a href="{{ route('employee.profile.show') }}"
                       class="btn btn-dark">

                        <i class="fas fa-arrow-left me-1"></i>

                        Back

                    </a>

                </div>

                <div class="card-body">

                    <form id="editProfileForm"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- ==========================================
                                Profile Photo
                            =========================================== -->

                            <div class="col-md-3 text-center">

                                @if($employee->profile_photo)

                                    <img id="photoPreview"
                                         src="{{ asset('storage/'.$employee->profile_photo) }}"
                                         class="img-thumbnail rounded-circle shadow"
                                         style="width:180px;height:180px;object-fit:cover;">

                                @else

                                    <img id="photoPreview"
                                         src="https://via.placeholder.com/180?text=Photo"
                                         class="img-thumbnail rounded-circle shadow"
                                         style="width:180px;height:180px;object-fit:cover;">

                                @endif

                                <div class="mt-3">

                                    <input type="file"
                                           name="profile_photo"
                                           id="profile_photo"
                                           class="form-control">

                                    <small class="text-danger error-profile_photo"></small>

                                </div>

                            </div>

                            <!-- ==========================================
                                Employee Information
                            =========================================== -->

                            <div class="col-md-9">

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Full Name

                                        </label>

                                        <input type="text"
                                               name="full_name"
                                               class="form-control"
                                               value="{{ $employee->full_name }}">

                                        <small class="text-danger error-full_name"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Email

                                        </label>

                                        <input type="email"
                                               name="email"
                                               class="form-control"
                                               value="{{ $employee->email }}"
                                               readonly>

                                        <small class="text-danger error-email"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Phone Number

                                        </label>

                                        <input type="text"
                                               name="phone_number"
                                               class="form-control"
                                               value="{{ $employee->phone_number }}">

                                        <small class="text-danger error-phone_number"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Date of Birth

                                        </label>

                                        <input type="date"
                                               name="date_of_birth"
                                               class="form-control"
                                               value="{{ $employee->date_of_birth }}">

                                        <small class="text-danger error-date_of_birth"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Gender

                                        </label>

                                        <select name="gender"
                                                class="form-select">

                                            <option value="male"
                                                {{ $employee->gender=='male'?'selected':'' }}>

                                                Male

                                            </option>

                                            <option value="female"
                                                {{ $employee->gender=='female'?'selected':'' }}>

                                                Female

                                            </option>

                                            <option value="other"
                                                {{ $employee->gender=='other'?'selected':'' }}>

                                                Other

                                            </option>

                                        </select>

                                        <small class="text-danger error-gender"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Address Line 1

                                        </label>

                                        <input type="text"
                                               name="address_line_1"
                                               class="form-control"
                                               value="{{ $employee->address_line_1 }}">

                                        <small class="text-danger error-address_line_1"></small>

                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">

                                            Address Line 2

                                        </label>

                                        <input type="text"
                                               name="address_line_2"
                                               class="form-control"
                                               value="{{ $employee->address_line_2 }}">

                                        <small class="text-danger error-address_line_2"></small>

                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">

                                            City

                                        </label>

                                        <input type="text"
                                               name="city"
                                               class="form-control"
                                               value="{{ $employee->city }}">

                                        <small class="text-danger error-city"></small>

                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">

                                            State

                                        </label>

                                        <input type="text"
                                               name="state"
                                               class="form-control"
                                               value="{{ $employee->state }}">

                                        <small class="text-danger error-state"></small>

                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">

                                            Pincode

                                        </label>

                                        <input type="text"
                                               name="pincode"
                                               class="form-control"
                                               value="{{ $employee->pincode }}">

                                        <small class="text-danger error-pincode"></small>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Country

                                        </label>

                                        <input type="text"
                                               name="country"
                                               class="form-control"
                                               value="{{ $employee->country }}">

                                        <small class="text-danger error-country"></small>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <hr>

                        <!-- ==========================================================
    EDUCATION DETAILS
=========================================================== -->

<div class="card border shadow-sm mb-4">

    <div class="card-header bg-light d-flex justify-content-between align-items-center">

        <h5 class="mb-0">

            <i class="fas fa-graduation-cap me-2"></i>

            Education Details

        </h5>

        <button type="button"
                class="btn btn-primary btn-sm"
                id="addEducation">

            <i class="fas fa-plus"></i>

            Add More

        </button>

    </div>

    <div class="card-body">

        <div id="educationWrapper">

            @forelse($employee->educations as $education)

                <div class="education-item border rounded p-3 mb-3">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Certificate Name

                            </label>

                            <input type="text"
                                   name="certificate_name[]"
                                   class="form-control"
                                   value="{{ $education->certificate_name }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Institute Name

                            </label>

                            <input type="text"
                                   name="institute_name[]"
                                   class="form-control"
                                   value="{{ $education->institute_name }}">

                        </div>

                        <div class="col-md-2 mb-3">

                            <label class="form-label">

                                Year

                            </label>

                            <input type="number"
                                   name="year_of_completion[]"
                                   class="form-control"
                                   value="{{ $education->year_of_completion }}">

                        </div>

                        <div class="col-md-2 mb-3">

                            <label class="form-label">

                                Certificate

                            </label>

                            <input type="file"
                                   name="document_file[]"
                                   class="form-control">

                        </div>

                        <div class="col-md-10">

                            @if($education->document_file)

                                <a href="{{ asset('storage/'.$education->document_file) }}"
                                   target="_blank"
                                   class="btn btn-success btn-sm">

                                    <i class="fas fa-file"></i>

                                    View Certificate

                                </a>

                            @else

                                <span class="badge bg-secondary">

                                    No Certificate

                                </span>

                            @endif

                        </div>

                        <div class="col-md-2 text-end">

                            <button type="button"
                                    class="btn btn-danger removeEducation">

                                <i class="fas fa-trash"></i>

                            </button>

                        </div>

                    </div>

                </div>

            @empty

                <div class="education-item border rounded p-3 mb-3">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Certificate Name

                            </label>

                            <input type="text"
                                   name="certificate_name[]"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Institute Name

                            </label>

                            <input type="text"
                                   name="institute_name[]"
                                   class="form-control">

                        </div>

                        <div class="col-md-2 mb-3">

                            <label class="form-label">

                                Year

                            </label>

                            <input type="number"
                                   name="year_of_completion[]"
                                   class="form-control">

                        </div>

                        <div class="col-md-2 mb-3">

                            <label class="form-label">

                                Certificate

                            </label>

                            <input type="file"
                                   name="document_file[]"
                                   class="form-control">

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

<!-- ==========================================================
    TEMPLATE
=========================================================== -->

<template id="educationTemplate">

    <div class="education-item border rounded p-3 mb-3">

        <div class="row">

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Certificate Name

                </label>

                <input type="text"
                       name="certificate_name[]"
                       class="form-control">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Institute Name

                </label>

                <input type="text"
                       name="institute_name[]"
                       class="form-control">

            </div>

            <div class="col-md-2 mb-3">

                <label class="form-label">

                    Year

                </label>

                <input type="number"
                       name="year_of_completion[]"
                       class="form-control">

            </div>

            <div class="col-md-2 mb-3">

                <label class="form-label">

                    Certificate

                </label>

                <input type="file"
                       name="document_file[]"
                       class="form-control">

            </div>

            <div class="col-12 text-end">

                <button type="button"
                        class="btn btn-danger removeEducation">

                    <i class="fas fa-trash"></i>

                </button>

            </div>

        </div>

    </div>

</template>

<div class="text-end mt-4">

    <button type="submit"
            id="updateBtn"
            class="btn btn-success">

        <i class="fas fa-save"></i>

        Update Profile

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

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Preview Profile Photo
    |--------------------------------------------------------------------------
    */

    $('#profile_photo').change(function () {

        if (this.files.length > 0) {

            let reader = new FileReader();

            reader.onload = function (e) {

                $('#photoPreview').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        }

    });

    /*
    |--------------------------------------------------------------------------
    | Add Education Row
    |--------------------------------------------------------------------------
    */

    $('#addEducation').click(function () {

        $('#educationWrapper').append($('#educationTemplate').html());

    });

    /*
    |--------------------------------------------------------------------------
    | Remove Education Row
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.removeEducation', function () {

        if ($('.education-item').length > 1) {

            $(this).closest('.education-item').remove();

        } else {

            Swal.fire({

                icon: 'warning',

                title: 'Warning',

                text: 'At least one education record is required.'

            });

        }

    });

    /*
    |--------------------------------------------------------------------------
    | Update Employee Profile
    |--------------------------------------------------------------------------
    */

    $('#editProfileForm').submit(function (e) {

        e.preventDefault();

        $('.text-danger').html('');

        Swal.fire({

            title: 'Update Profile?',

            text: 'Are you sure you want to update your profile?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#198754',

            cancelButtonColor: '#dc3545',

            confirmButtonText: 'Yes, Update'

        }).then((result) => {

            if (!result.isConfirmed) {

                return;

            }

            let formData = new FormData(document.getElementById('editProfileForm'));

            $.ajax({

                url: "{{ route('employee.profile.update') }}",

                type: "POST",

                data: formData,

                processData: false,

                contentType: false,

                cache: false,

                beforeSend: function () {

                    $('#updateBtn')
                        .prop('disabled', true)
                        .html('<i class="fa fa-spinner fa-spin"></i> Updating...');

                },

                success: function (response) {

                    Swal.fire({

                        icon: 'success',

                        title: 'Success',

                        text: response.message

                    }).then(function () {

                        window.location.href = response.redirect;

                    });

                },

                error: function (xhr) {

                    if (xhr.status === 422) {

                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {

                            key = key.replace(/\./g, '\\.');

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

                    $('#updateBtn')
                        .prop('disabled', false)
                        .html('<i class="fas fa-save"></i> Update Profile');

                }

            });

        });

    });

});

</script>

@endpush