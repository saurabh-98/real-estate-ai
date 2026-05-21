@extends('layout.admin.app')

@section('title', 'Create Property')

@section('content')

<div class="property-page">

    <div class="container-fluid">

        <div class="property-page-header">

            <h2 class="property-page-title">

                <i class="fa-solid fa-building"></i>

                Create Property

            </h2>

        </div>

        <!-- AI DESCRIPTION GENERATOR -->

        <div class="ai-generator-card">

            <div class="ai-generator-header">

                <div>

                    <h5>

                        <i class="fa-solid fa-robot"></i>

                        AI Property Description Generator

                    </h5>

                    <p>

                        Generate professional property description automatically using AI

                    </p>

                </div>

                <button
                    type="button"
                    id="generateAIDescription"
                    class="ai-generate-btn"
                >

                    <i class="fa-solid fa-wand-magic-sparkles"></i>

                    Generate Description

                </button>

            </div>

            <div class="ai-loading">

                <i class="fa fa-spinner fa-spin"></i>

                AI is generating property description...

            </div>

        </div>

        <div class="card property-card">

            <div class="property-card-header">

                <h4>

                    <i class="fa-solid fa-plus"></i>

                    Add New Property

                </h4>

            </div>

            <div class="property-card-body">

                <form
                    id="propertyForm"
                    action="{{ route('admin.properties.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <div class="row">

                        <!-- TITLE -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Property Title

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-building property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="property-form-control"
                                        placeholder="Enter Property Title"
                                    >

                                </div>

                                <div class="property-error title_error"></div>

                            </div>

                        </div>

                        <!-- PROPERTY TYPE -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Property Type

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-layer-group property-input-icon"></i>

                                    <select
                                        name="property_type_id"
                                        id="property_type_id"
                                        class="property-form-control"
                                    >

                                        <option value="">
                                            Select Property Type
                                        </option>

                                        @foreach($propertyTypes as $type)

                                            <option value="{{ $type->id }}">

                                                {{ $type->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="property-error property_type_id_error"></div>

                            </div>

                        </div>

                        <!-- PRICE -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Price

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-indian-rupee-sign property-input-icon"></i>

                                    <input
                                        type="number"
                                        name="price"
                                        id="price"
                                        class="property-form-control"
                                        placeholder="Enter Price"
                                    >

                                </div>

                                <div class="property-error price_error"></div>

                            </div>

                        </div>

                        <!-- CITY -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    City

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-city property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="city"
                                        id="city"
                                        class="property-form-control"
                                        placeholder="Enter City"
                                    >

                                </div>

                                <div class="property-error city_error"></div>

                            </div>

                        </div>

                        <!-- STATE -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    State

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-map property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="state"
                                        id="state"
                                        class="property-form-control"
                                        placeholder="Enter State"
                                    >

                                </div>

                                <div class="property-error state_error"></div>

                            </div>

                        </div>

                        <!-- COUNTRY -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Country

                                    <span>*</span>

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-earth-asia property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        value="India"
                                        class="property-form-control"
                                        placeholder="Enter Country"
                                    >

                                </div>

                                <div class="property-error country_error"></div>

                            </div>

                        </div>

                        <!-- AREA -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Area (sqft)

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-expand property-input-icon"></i>

                                    <input
                                        type="number"
                                        name="area"
                                        id="area"
                                        class="property-form-control"
                                        placeholder="1200"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- ADDRESS -->

                        <div class="col-lg-12">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Address

                                    <span>*</span>

                                </label>

                                <textarea
                                    name="address"
                                    id="address"
                                    class="property-textarea"
                                    placeholder="Enter Full Address"
                                ></textarea>

                                <div class="property-error address_error"></div>

                            </div>

                        </div>

                        <!-- BEDROOMS -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Bedrooms

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-bed property-input-icon"></i>

                                    <input
                                        type="number"
                                        name="bedrooms"
                                        class="property-form-control"
                                        placeholder="Bedrooms"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- BATHROOMS -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Bathrooms

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-bath property-input-icon"></i>

                                    <input
                                        type="number"
                                        name="bathrooms"
                                        class="property-form-control"
                                        placeholder="Bathrooms"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- GARAGE -->

                        <div class="col-lg-4">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Garage

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-car property-input-icon"></i>

                                    <input
                                        type="number"
                                        name="garage"
                                        class="property-form-control"
                                        placeholder="Garage"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- STATUS -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Status

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-toggle-on property-input-icon"></i>

                                    <select
                                        name="status"
                                        class="property-form-control"
                                    >

                                        <option value="1">
                                            Active
                                        </option>

                                        <option value="0">
                                            Inactive
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- FEATURED -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Featured Property

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-star property-input-icon"></i>

                                    <select
                                        name="is_featured"
                                        class="property-form-control"
                                    >

                                        <option value="0">
                                            No
                                        </option>

                                        <option value="1">
                                            Yes
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- DESCRIPTION -->

                        <div class="col-lg-12">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Description

                                </label>

                                <textarea
                                    name="description"
                                    id="description"
                                    class="property-textarea"
                                    rows="7"
                                    placeholder="Enter Property Description"
                                ></textarea>

                            </div>

                        </div>

                        <!-- IMAGE -->

                        <div class="col-lg-12">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Featured Image

                                </label>

                                <label class="property-file-upload">

                                    <input
                                        type="file"
                                        name="featured_image"
                                        id="image"
                                        hidden
                                    >

                                    <i class="fa-solid fa-cloud-arrow-up"></i>

                                    <span>
                                        Click To Upload Image
                                    </span>

                                    <small>
                                        JPG, PNG, WEBP Allowed
                                    </small>

                                </label>

                                <div class="property-error image_error"></div>

                                <div class="property-image-preview">

                                    <img
                                        id="previewImage"
                                        src=""
                                        alt="Preview"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <div class="col-lg-12">

                            <div class="property-btn-group">

                                <button
                                    type="submit"
                                    id="submitBtn"
                                    class="property-btn property-btn-primary"
                                >

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Save Property

                                </button>

                                <a
                                    href="{{ route('admin.properties.index') }}"
                                    class="property-btn property-btn-secondary"
                                >

                                    <i class="fa-solid fa-arrow-left"></i>

                                    Back

                                </a>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

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
    | AI DESCRIPTION GENERATOR
    |--------------------------------------------------------------------------
    */

    $('#generateAIDescription').click(function () {

    let title = $('#title').val();

    let city = $('#city').val();

    let propertyType =
        $('#property_type_id option:selected').text();

    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    if (
        title == '' ||
        city == '' ||
        $('#property_type_id').val() == ''
    ) {

        Swal.fire({

            icon: 'warning',

            title: 'Required Fields Missing',

            text: 'Please enter title, city and property type first'

        });

        return false;

    }

    /*
    |--------------------------------------------------------------------------
    | LOADING STATE
    |--------------------------------------------------------------------------
    */

    $('.ai-loading').show();

    $('#generateAIDescription')

        .prop('disabled', true)

        .html(
            '<i class="fa fa-spinner fa-spin"></i> Generating...'
        );

    /*
    |--------------------------------------------------------------------------
    | AJAX REQUEST
    |--------------------------------------------------------------------------
    */

    $.ajax({

        url: "{{ route('admin.ai.description') }}",

        type: "POST",

        data: {

            _token: "{{ csrf_token() }}",

            title: title,

            city: city,

            property_type: propertyType

        },

        /*
        |--------------------------------------------------------------------------
        | SUCCESS RESPONSE
        |--------------------------------------------------------------------------
        */

        success: function (response) {

            $('.ai-loading').hide();

            $('#generateAIDescription')

                .prop('disabled', false)

                .html(
                    '<i class="fa-solid fa-wand-magic-sparkles"></i> Generate Description'
                );

            /*
            |--------------------------------------------------------------------------
            | SET DESCRIPTION
            |--------------------------------------------------------------------------
            */

            $('#description').val(response.description);

            /*
            |--------------------------------------------------------------------------
            | LIVE AI SUCCESS
            |--------------------------------------------------------------------------
            */

            if (response.ai_mode === 'live') {

                Swal.fire({

                    icon: 'success',

                    title: 'Live AI Generated',

                    text:
                        'Property description generated using OpenAI API'

                });

            }

            /*
            |--------------------------------------------------------------------------
            | DEMO AI SUCCESS
            |--------------------------------------------------------------------------
            */

            else {

                Swal.fire({

                    icon: 'info',

                    title: 'Demo AI Generated',

                    html: `

                        <div style="font-size:14px;line-height:24px;">

                            OpenAI API quota/billing is unavailable.<br><br>

                            Showing intelligent demo AI-generated content
                            for assessment/demo purposes.

                        </div>

                    `

                });

            }

        },

        /*
        |--------------------------------------------------------------------------
        | ERROR RESPONSE
        |--------------------------------------------------------------------------
        */

        error: function (xhr) {

            $('.ai-loading').hide();

            $('#generateAIDescription')

                .prop('disabled', false)

                .html(
                    '<i class="fa-solid fa-wand-magic-sparkles"></i> Generate Description'
                );

            /*
            |--------------------------------------------------------------------------
            | API ERROR MESSAGE
            |--------------------------------------------------------------------------
            */

            let errorMessage =
                xhr.responseJSON?.message
                || 'Failed to generate description';

            Swal.fire({

                icon: 'error',

                title: 'AI Generation Failed',

                text: errorMessage

            });

        }

    });

});

    /*
    |--------------------------------------------------------------------------
    | IMAGE PREVIEW
    |--------------------------------------------------------------------------
    */

    $('#image').change(function () {

        let file = this.files[0];

        $('.image_error').html('');

        if (file) {

            let allowedTypes = [

                'image/jpeg',
                'image/png',
                'image/webp'

            ];

            let fileType = file.type;

            let fileSize = file.size / 1024 / 1024;

            if (!allowedTypes.includes(fileType)) {

                $('.image_error').html(
                    'Only JPG, PNG and WEBP allowed'
                );

                return false;

            }

            if (fileSize > 2) {

                $('.image_error').html(
                    'Image size must be less than 2MB'
                );

                return false;

            }

            let reader = new FileReader();

            reader.onload = function (e) {

                $('#previewImage')
                    .attr('src', e.target.result)
                    .fadeIn();

            };

            reader.readAsDataURL(file);

        }

    });

    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    function validateField(field, errorClass, message) {

        let value = $(field).val().trim();

        if (value == '') {

            $(field).addClass('is-invalid');

            $(errorClass).html(message);

            return false;

        } else {

            $(field).removeClass('is-invalid');
            $(field).addClass('is-valid');

            $(errorClass).html('');

            return true;

        }

    }

    /*
    |--------------------------------------------------------------------------
    | AJAX FORM SUBMIT
    |--------------------------------------------------------------------------
    */

    $('#propertyForm').submit(function (e) {

        e.preventDefault();

        $('.property-error').html('');

        let isValid = true;

        if (!validateField(
            '#title',
            '.title_error',
            'Property title is required'
        )) {

            isValid = false;

        }

        if (!validateField(
            '#city',
            '.city_error',
            'City field is required'
        )) {

            isValid = false;

        }

        if (!validateField(
            '#state',
            '.state_error',
            'State field is required'
        )) {

            isValid = false;

        }

        if (!validateField(
            '#country',
            '.country_error',
            'Country field is required'
        )) {

            isValid = false;

        }

        if (!validateField(
            '#address',
            '.address_error',
            'Address field is required'
        )) {

            isValid = false;

        }

        if ($('#property_type_id').val() == '') {

            $('#property_type_id').addClass('is-invalid');

            $('.property_type_id_error').html(
                'Please select property type'
            );

            isValid = false;

        }

        let price = $('#price').val();

        if (price == '' || price <= 0) {

            $('#price').addClass('is-invalid');

            $('.price_error').html(
                'Enter valid property price'
            );

            isValid = false;

        }

        if (!isValid) {

            Swal.fire({

                icon: 'warning',

                title: 'Validation Error',

                text: 'Please fill all required fields properly'

            });

            return false;

        }

        let formData = new FormData(this);

        Swal.fire({

            title: 'Create Property?',

            text: 'Do you want to save this property?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonText: 'Yes Save',

            cancelButtonText: 'Cancel',

            confirmButtonColor: '#2563eb'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: $('#propertyForm').attr('action'),

                    type: 'POST',

                    data: formData,

                    processData: false,

                    contentType: false,

                    beforeSend: function () {

                        $('#submitBtn')
                            .html(
                                '<i class="fa fa-spinner fa-spin"></i> Saving...'
                            )
                            .prop('disabled', true);

                    },

                    success: function () {

                        Swal.fire({

                            icon: 'success',

                            title: 'Success',

                            text: 'Property Created Successfully',

                            timer: 2000,

                            showConfirmButton: true

                        });

                        $('#propertyForm')[0].reset();

                        $('#previewImage').hide();

                        $('.property-form-control')
                            .removeClass('is-valid');

                        $('#submitBtn')
                            .html(
                                '<i class="fa-solid fa-floppy-disk"></i> Save Property'
                            )
                            .prop('disabled', false);

                        setTimeout(function () {

                            window.location.href =
                                "{{ route('admin.properties.index') }}";

                        }, 2000);

                    },

                    error: function (xhr) {

                        $('#submitBtn')
                            .html(
                                '<i class="fa-solid fa-floppy-disk"></i> Save Property'
                            )
                            .prop('disabled', false);

                        if (xhr.status === 422) {

                            $.each(xhr.responseJSON.errors, function (key, value) {

                                $('.' + key + '_error')
                                    .html(value[0]);

                            });

                        } else {

                            Swal.fire({

                                icon: 'error',

                                title: 'Error',

                                text: 'Something went wrong'

                            });

                        }

                    }

                });

            }

        });

    });

});

</script>

@endsection