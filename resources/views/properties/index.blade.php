@extends('layout.app')

@section('title', 'Properties')

@section('content')

<section class="property-page py-5">

    <div class="container-fluid">

        <!-- =========================================
        PAGE HEADER
        ========================================== -->

        <div class="property-page-header text-center mb-5">

            <span class="property-page-subtitle">

                Premium Real Estate Collection

            </span>

            <h1>

                Explore Properties

            </h1>

            <p>

                Find premium villas, apartments,
                houses and investment properties
                across top cities.

            </p>

        </div>

        <!-- =========================================
        FILTER FORM
        ========================================== -->

        <div class="property-filter-wrapper mb-5">

            <form
                action="{{ route('properties') }}"
                method="GET"
            >

                <div class="row g-3 align-items-end">

                    <!-- SEARCH CITY -->

                    <div class="col-xl-3 col-lg-6">

                        <label class="form-label">

                            Search City

                        </label>

                        <input
                            type="text"
                            name="city"
                            class="form-control"
                            placeholder="Search by city"
                            value="{{ request('city') }}"
                        >

                    </div>

                    <!-- PROPERTY TYPE -->

                    <div class="col-xl-3 col-lg-6">

                        <label class="form-label">

                            Property Type

                        </label>

                        <select
                            name="type"
                            class="form-select"
                        >

                            <option value="">

                                All Property Types

                            </option>

                            @foreach($types as $type)

                            <option
                                value="{{ $type->id }}"
                                {{ request('type') == $type->id ? 'selected' : '' }}
                            >

                                {{ $type->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- MIN PRICE -->

                    <div class="col-xl-2 col-lg-6">

                        <label class="form-label">

                            Min Price

                        </label>

                        <input
                            type="number"
                            name="min_price"
                            class="form-control"
                            placeholder="₹ Min"
                            value="{{ request('min_price') }}"
                        >

                    </div>

                    <!-- MAX PRICE -->

                    <div class="col-xl-2 col-lg-6">

                        <label class="form-label">

                            Max Price

                        </label>

                        <input
                            type="number"
                            name="max_price"
                            class="form-control"
                            placeholder="₹ Max"
                            value="{{ request('max_price') }}"
                        >

                    </div>

                    <!-- SEARCH BUTTON -->

                    <div class="col-xl-2 col-lg-12">

                        <button
                            type="submit"
                            class="btn btn-primary w-100 property-search-btn"
                        >

                            <i class="fa-solid fa-magnifying-glass"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <!-- =========================================
        PROPERTY GRID
        ========================================== -->

        <div class="row g-4">

            @forelse($properties as $property)

            <div class="col-xl-4 col-lg-6">

                <div class="realestate-property-card">

                    <!-- =========================================
                    PROPERTY IMAGE
                    ========================================== -->

                    <div class="realestate-property-image">

                        @if($property->featured_image)

                        <img
                            src="{{ asset('storage/properties/'.$property->featured_image) }}"
                            alt="{{ $property->title }}"
                        >

                        @else

                        <img
                            src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1200"
                            alt="{{ $property->title }}"
                        >

                        @endif

                        <!-- BADGE -->

                        <span class="property-badge">

                            {{ $property->propertyType->name ?? 'Property' }}

                        </span>

                    </div>

                    <!-- =========================================
                    PROPERTY CONTENT
                    ========================================== -->

                    <div class="realestate-property-content">

                        <!-- TITLE -->

                        <h3>

                            {{ $property->title }}

                        </h3>

                        <!-- LOCATION -->

                        <p class="property-location">

                            <i class="fa-solid fa-location-dot"></i>

                            {{ $property->city }},
                            {{ $property->state }}

                        </p>

                        <!-- PRICE -->

                        <h2>

                            ₹{{ number_format($property->price) }}

                        </h2>

                        <!-- PROPERTY FEATURES -->

                        <div class="property-features">

                            <!-- BEDROOMS -->

                            <span>

                                <i class="fa-solid fa-bed"></i>

                                {{ $property->bedrooms ?? 0 }}
                                Beds

                            </span>

                            <!-- BATHROOMS -->

                            <span>

                                <i class="fa-solid fa-bath"></i>

                                {{ $property->bathrooms ?? 0 }}
                                Baths

                            </span>

                            <!-- AREA -->

                            <span>

                                <i class="fa-solid fa-ruler-combined"></i>

                                {{ $property->area ?? 0 }}
                                sqft

                            </span>

                        </div>

                        <!-- BUTTON -->

                        <a
                            href="{{ route('properties.show', $property->slug) }}"
                            class="realestate-property-btn"
                        >

                            View Details

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <!-- =========================================
            NO PROPERTY FOUND
            ========================================== -->

            <div class="col-12">

                <div class="no-property-found text-center">

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png"
                        alt="No Property"
                        width="120"
                    >

                    <h4 class="mt-4">

                        No Properties Found

                    </h4>

                    <p>

                        Try changing filters or search criteria.

                    </p>

                    <a
                        href="{{ route('properties') }}"
                        class="btn btn-primary mt-3"
                    >

                        Reset Filters

                    </a>

                </div>

            </div>

            @endforelse

        </div>

        <!-- =========================================
        PAGINATION
        ========================================== -->

        @if($properties->count() > 0)

        <div class="property-pagination mt-5">

            {{ $properties->withQueryString()->links() }}

        </div>

        @endif

    </div>

</section>

@endsection