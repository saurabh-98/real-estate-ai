@extends('layout.admin.app')

@section('title', 'Edit Property')

<style>

.ai-generator-card {

    background: linear-gradient(135deg, #2563eb, #1d4ed8);

    padding: 20px;

    border-radius: 16px;

    margin-bottom: 25px;

    color: #fff;

    box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);

}

.ai-generator-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    flex-wrap: wrap;

}

.ai-generator-header h5 {

    margin: 0;

    font-size: 20px;

    font-weight: 700;

}

.ai-generator-header p {

    margin: 5px 0 0;

    opacity: 0.9;

    font-size: 14px;

}

.ai-generate-btn {

    border: none;

    background: #fff;

    color: #2563eb;

    padding: 12px 20px;

    border-radius: 12px;

    font-weight: 600;

    transition: 0.3s ease;

}

.ai-generate-btn:hover {

    transform: translateY(-2px);

}

.ai-loading {

    display: none;

    margin-top: 10px;

    font-size: 14px;

}

.property-image-preview img {

    max-width: 250px;

    border-radius: 12px;

    margin-top: 15px;

    border: 3px solid #e5e7eb;

}

</style>


@section('content')

<div class="property-page">

    <div class="container-fluid">

        <!-- PAGE HEADER -->

        <div class="property-page-header">

            <h2 class="property-page-title">

                <i class="fa-solid fa-pen-to-square"></i>

                Edit Property

            </h2>

        </div>

        <!-- AI GENERATOR -->

        <div class="ai-generator-card">

            <div class="ai-generator-header">

                <div>

                    <h5>

                        <i class="fa-solid fa-robot"></i>

                        AI Property Description Generator

                    </h5>

                    <p>

                        Generate professional AI property description instantly

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

                Generating AI property description...

            </div>

        </div>

        <!-- CARD -->

        <div class="card property-card">

            <div class="property-card-header">

                <h4>

                    <i class="fa-solid fa-building"></i>

                    Update Property Details

                </h4>

            </div>

            <div class="property-card-body">

                <form
                    id="propertyEditForm"
                    enctype="multipart/form-data"
                >

                    @csrf

                    @method('PUT')

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
                                        value="{{ $property->title }}"
                                    >

                                </div>

                                <div class="property-error title_error"></div>

                            </div>

                        </div>

                        <!-- TYPE -->

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
                                            Select Type
                                        </option>

                                        @foreach($propertyTypes as $type)

                                            <option
                                                value="{{ $type->id }}"
                                                {{ $property->property_type_id == $type->id ? 'selected' : '' }}
                                            >

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
                                        value="{{ $property->price }}"
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
                                        value="{{ $property->city }}"
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

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-map property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="state"
                                        class="property-form-control"
                                        value="{{ $property->state }}"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- COUNTRY -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Country

                                </label>

                                <div class="property-input-group">

                                    <i class="fa-solid fa-earth-asia property-input-icon"></i>

                                    <input
                                        type="text"
                                        name="country"
                                        class="property-form-control"
                                        value="{{ $property->country }}"
                                    >

                                </div>

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
                                        class="property-form-control"
                                        value="{{ $property->area }}"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- ADDRESS -->

                        <div class="col-lg-12">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Address

                                </label>

                                <textarea
                                    name="address"
                                    class="property-textarea"
                                >{{ $property->address }}</textarea>

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
                                        value="{{ $property->bedrooms }}"
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
                                        value="{{ $property->bathrooms }}"
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
                                        value="{{ $property->garage }}"
                                    >

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
                                >{{ $property->description }}</textarea>

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
                                        Upload New Image
                                    </span>

                                </label>

                                <div class="property-image-preview">

                                    @if($property->featured_image)

                                        <img
                                            id="previewImage"
                                            src="{{ asset('storage/properties/'.$property->featured_image) }}"
                                        >

                                    @else

                                        <img
                                            id="previewImage"
                                            style="display:none;"
                                        >

                                    @endif

                                </div>

                            </div>

                        </div>

                        <!-- STATUS -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Status

                                </label>

                                <select
                                    name="status"
                                    class="property-form-control"
                                >

                                    <option
                                        value="1"
                                        {{ $property->status == 1 ? 'selected' : '' }}
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="0"
                                        {{ $property->status == 0 ? 'selected' : '' }}
                                    >
                                        Inactive
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- FEATURED -->

                        <div class="col-lg-6">

                            <div class="property-form-group">

                                <label class="property-form-label">

                                    Featured

                                </label>

                                <select
                                    name="is_featured"
                                    class="property-form-control"
                                >

                                    <option
                                        value="1"
                                        {{ $property->is_featured == 1 ? 'selected' : '' }}
                                    >
                                        Yes
                                    </option>

                                    <option
                                        value="0"
                                        {{ $property->is_featured == 0 ? 'selected' : '' }}
                                    >
                                        No
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <div class="col-lg-12">

                            <div class="property-btn-group">

                                <button
                                    type="submit"
                                    id="updateBtn"
                                    class="property-btn property-btn-primary"
                                >

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Update Property

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

        $('.ai-loading').show();

        $('#generateAIDescription')

            .prop('disabled', true)

            .html(
                '<i class="fa fa-spinner fa-spin"></i> Generating...'
            );

        $.ajax({

            url: "{{ route('admin.ai.description') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                title: title,

                city: city,

                property_type: propertyType

            },

            success: function (response) {

                $('.ai-loading').hide();

                $('#generateAIDescription')

                    .prop('disabled', false)

                    .html(
                        '<i class="fa-solid fa-wand-magic-sparkles"></i> Generate Description'
                    );

                $('#description').val(response.description);

                if (response.ai_mode === 'live') {

                    Swal.fire({

                        icon: 'success',

                        title: 'Live AI Generated',

                        text:
                            'Property description generated using OpenAI API'

                    });

                } else {

                    Swal.fire({

                        icon: 'info',

                        title: 'Demo AI Generated',

                        html: `

                            <div style="font-size:14px;line-height:24px;">

                                OpenAI API quota/billing unavailable.<br><br>

                                Showing intelligent demo AI-generated content.

                            </div>

                        `

                    });

                }

            },

            error: function (xhr) {

                $('.ai-loading').hide();

                $('#generateAIDescription')

                    .prop('disabled', false)

                    .html(
                        '<i class="fa-solid fa-wand-magic-sparkles"></i> Generate Description'
                    );

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

        let reader = new FileReader();

        reader.onload = function (e) {

            $('#previewImage')
                .attr('src', e.target.result)
                .show();

        };

        reader.readAsDataURL(this.files[0]);

    });

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROPERTY
    |--------------------------------------------------------------------------
    */

    $('#propertyEditForm').submit(function (e) {

        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({

            title: 'Update Property?',

            text: 'Do you want to update this property?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#2563eb',

            confirmButtonText: 'Yes Update'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ route('admin.properties.update', $property->id) }}",

                    type: 'POST',

                    data: formData,

                    processData: false,

                    contentType: false,

                    beforeSend: function () {

                        $('#updateBtn')
                            .html(
                                '<i class="fa fa-spinner fa-spin"></i> Updating...'
                            )
                            .prop('disabled', true);

                    },

                    success: function (response) {

                        Swal.fire({

                            icon: 'success',

                            title: 'Success',

                            text: response.message,

                            timer: 2000,

                            showConfirmButton: true

                        });

                        $('#updateBtn')
                            .html(
                                '<i class="fa-solid fa-floppy-disk"></i> Update Property'
                            )
                            .prop('disabled', false);

                        setTimeout(function () {

                            window.location.href =
                                "{{ route('admin.properties.index') }}";

                        }, 2000);

                    },

                    error: function (xhr) {

                        $('#updateBtn')
                            .html(
                                '<i class="fa-solid fa-floppy-disk"></i> Update Property'
                            )
                            .prop('disabled', false);

                        if (xhr.status === 422) {

                            $.each(xhr.responseJSON.errors, function (key, value) {

                                $('.' + key + '_error')
                                    .html(value[0]);

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