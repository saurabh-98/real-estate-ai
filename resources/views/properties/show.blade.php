@extends('layout.app')

@section('title', $property->title)

@section('content')

<section class="property-details-page py-5">

    <div class="container-fluid">

        <!-- =========================================
        BREADCRUMB
        ========================================== -->

        <div class="property-breadcrumb mb-4">

            <a href="{{ route('home') }}">

                Home

            </a>

            <span>

                /

            </span>

            <a href="{{ route('properties') }}">

                Properties

            </a>

            <span>

                /

            </span>

            <span>

                {{ $property->title }}

            </span>

        </div>

        <!-- =========================================
        PROPERTY DETAILS
        ========================================== -->

        <div class="row g-5 align-items-start">

            <!-- =========================================
            PROPERTY IMAGE
            ========================================== -->

            <div class="col-lg-7">

                <div class="property-details-image position-relative overflow-hidden rounded-4">

                    @if($property->featured_image)

                    <img
                        src="{{ asset('storage/properties/'.$property->featured_image) }}"
                        alt="{{ $property->title }}"
                        class="img-fluid w-100"
                    >

                    @else

                    <img
                        src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1200"
                        alt="{{ $property->title }}"
                        class="img-fluid w-100"
                    >

                    @endif

                    <!-- BADGE -->

                    <span class="property-badge">

                        {{ $property->propertyType->name ?? 'Property' }}

                    </span>

                </div>

            </div>

            <!-- =========================================
            PROPERTY CONTENT
            ========================================== -->

            <div class="col-lg-5">

                <div class="property-details-content">

                    <!-- TYPE -->

                    <span class="property-type-badge">

                        {{ $property->propertyType->name ?? 'Property' }}

                    </span>

                    <!-- TITLE -->

                    <h1 class="property-title mt-3">

                        {{ $property->title }}

                    </h1>

                    <!-- PRICE -->

                    <h2 class="property-price">

                        ₹{{ number_format($property->price) }}

                    </h2>

                    <!-- LOCATION -->

                    <p class="property-location">

                        <i class="fa-solid fa-location-dot"></i>

                        {{ $property->city }},
                        {{ $property->state }},
                        {{ $property->country }}

                    </p>

                    <!-- ADDRESS -->

                    @if($property->address)

                    <p class="property-address">

                        {{ $property->address }}

                    </p>

                    @endif

                    <!-- PROPERTY INFO -->

                    <div class="property-details-info">

                        <!-- BEDROOM -->

                        <div class="property-info-card">

                            <div class="property-info-icon">

                                <i class="fa-solid fa-bed"></i>

                            </div>

                            <div>

                                <strong>

                                    Bedrooms

                                </strong>

                                <span>

                                    {{ $property->bedrooms ?? 'N/A' }}

                                </span>

                            </div>

                        </div>

                        <!-- BATHROOM -->

                        <div class="property-info-card">

                            <div class="property-info-icon">

                                <i class="fa-solid fa-bath"></i>

                            </div>

                            <div>

                                <strong>

                                    Bathrooms

                                </strong>

                                <span>

                                    {{ $property->bathrooms ?? 'N/A' }}

                                </span>

                            </div>

                        </div>

                        <!-- GARAGE -->

                        <div class="property-info-card">

                            <div class="property-info-icon">

                                <i class="fa-solid fa-car"></i>

                            </div>

                            <div>

                                <strong>

                                    Garage

                                </strong>

                                <span>

                                    {{ $property->garage ?? 'N/A' }}

                                </span>

                            </div>

                        </div>

                        <!-- AREA -->

                        <div class="property-info-card">

                            <div class="property-info-icon">

                                <i class="fa-solid fa-ruler-combined"></i>

                            </div>

                            <div>

                                <strong>

                                    Area

                                </strong>

                                <span>

                                    {{ $property->area ?? 'N/A' }}
                                    sqft

                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- FEATURED -->

                    @if($property->is_featured == 1)

                    <div class="featured-property-badge">

                        <i class="fa-solid fa-star"></i>

                        Featured Property

                    </div>

                    @endif

                    <!-- STATUS -->

                    <div class="property-status mt-3">

                        <strong>

                            Status:

                        </strong>

                        <span class="badge bg-success">

                            {{ ucfirst($property->status) }}

                        </span>

                    </div>

                    <!-- DESCRIPTION -->

                    <div class="property-description mt-4">

                        <h4>

                            Description

                        </h4>

                        @if($property->description)

                        {!! $property->description !!}

                        @else

                        <p>

                            No description available.

                        </p>

                        @endif

                    </div>

                    <!-- ENQUIRY BUTTON -->

                    <button
                        class="btn btn-primary btn-lg w-100 mt-4"
                        data-bs-toggle="modal"
                        data-bs-target="#enquiryModal"
                    >

                        <i class="fa-solid fa-paper-plane"></i>

                        Send Enquiry

                    </button>

                </div>

            </div>

        </div>

        <!-- =========================================
        RELATED PROPERTIES
        ========================================== -->

        @if($relatedProperties->count() > 0)

        <div class="related-properties-section mt-5">

            <div class="section-title mb-4">

                <h2>

                    Related Properties

                </h2>

            </div>

            <div class="row g-4">

                @foreach($relatedProperties as $related)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="realestate-property-card">

                        <!-- IMAGE -->

                        <div class="realestate-property-image">

                            @if($related->featured_image)

                            <img
                                src="{{ asset('storage/properties/'.$property->featured_image) }}"
                                alt="{{ $related->title }}"
                            >

                            @else

                            <img
                                src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1200"
                                alt="{{ $related->title }}"
                            >

                            @endif

                            <!-- BADGE -->

                            <span class="property-badge">

                                {{ $related->propertyType->name ?? 'Property' }}

                            </span>

                        </div>

                        <!-- CONTENT -->

                        <div class="realestate-property-content">

                            <h3>

                                {{ $related->title }}

                            </h3>

                            <p>

                                <i class="fa-solid fa-location-dot"></i>

                                {{ $related->city }},
                                {{ $related->state }}

                            </p>

                            <h2>

                                ₹{{ number_format($related->price) }}

                            </h2>

                            <!-- FEATURES -->

                            <div class="property-features">

                                <span>

                                    <i class="fa-solid fa-bed"></i>

                                    {{ $related->bedrooms ?? 0 }}

                                </span>

                                <span>

                                    <i class="fa-solid fa-bath"></i>

                                    {{ $related->bathrooms ?? 0 }}

                                </span>

                                <span>

                                    <i class="fa-solid fa-ruler-combined"></i>

                                    {{ $related->area ?? 0 }}
                                    sqft

                                </span>

                            </div>

                            <!-- BUTTON -->

                            <a
                                href="{{ route('properties.show', $related->slug) }}"
                                class="realestate-property-btn"
                            >

                                View Details

                            </a>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif

    </div>

</section>

<!-- =========================================
ENQUIRY MODAL
========================================== -->

@include('frontend.partials.enquiry-modal')

@endsection

