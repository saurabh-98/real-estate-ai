@extends('layout.app')

@section('title', 'Real Estate AI')

@section('content')

<div class="realestate-home">

    <div class="container-fluid">

        <!-- =====================================================
        | HERO SECTION
        ====================================================== -->

        <section class="realestate-home-hero">

            <div class="realestate-home-overlay"></div>

            <div class="realestate-home-content">

                <!-- =====================================================
                | LEFT CONTENT
                ====================================================== -->

                <div class="realestate-home-left">

                    <!-- BADGE -->

                    <div class="realestate-badge">

                        <i class="fa-solid fa-building"></i>

                        Smart AI Property Platform

                    </div>

                    <!-- TITLE -->

                    <h1 class="realestate-home-title">

                        Discover Premium
                        Properties Across India

                    </h1>

                    <!-- DESCRIPTION -->

                    <p class="realestate-home-text">

                        Explore luxury villas, apartments,
                        houses and investment properties
                        with AI-powered smart property solutions.

                    </p>

                    <!-- =====================================================
                    | SEARCH BOX
                    ====================================================== -->

                    <form
                        action="{{ route('properties') }}"
                        method="GET"
                    >

                        <div class="realestate-home-search">

                            <i class="fa fa-search"></i>

                            <input
                                type="text"
                                name="search"
                                id="propertySearchInput"
                                autocomplete="off"
                                placeholder="Search property by city, type..."
                                value="{{ request('search') }}"
                            >

                            <button
                                type="submit"
                                id="propertySearchBtn">

                                <i class="fa fa-search"></i>

                                Search

                            </button>

                        </div>

                    </form>

                    <!-- =====================================================
                    | QUICK SEARCH
                    ====================================================== -->

                    <div class="realestate-quick-search">

                        <a href="{{ route('properties', ['search' => 'Delhi']) }}">

                            Delhi

                        </a>

                        <a href="{{ route('properties', ['search' => 'Mumbai']) }}">

                            Mumbai

                        </a>

                        <a href="{{ route('properties', ['search' => 'Bangalore']) }}">

                            Bangalore

                        </a>

                        <a href="{{ route('properties', ['search' => 'Chennai']) }}">

                            Chennai

                        </a>

                        <a href="{{ route('properties', ['search' => 'Hyderabad']) }}">

                            Hyderabad

                        </a>

                    </div>

                    <!-- =====================================================
                    | ACTION BUTTONS
                    ====================================================== -->

                    <div class="realestate-action-buttons">

                        <a
                            href="{{ route('properties') }}"
                            class="realestate-btn-primary"
                        >

                            <i class="fa fa-building"></i>

                            Explore Properties

                        </a>

                        <a
                            href="{{ route('properties') }}"
                            class="realestate-btn-secondary"
                        >

                            <i class="fa fa-star"></i>

                            Featured Listings

                        </a>

                    </div>

                    <!-- =====================================================
                    | LIVE STATS
                    ====================================================== -->

                    <div class="hero-live-stats">

                        <div class="hero-live-stat-box">

                            <h3>

                                {{ $totalProperties ?? 0 }}+

                            </h3>

                            <p>

                                Properties

                            </p>

                        </div>

                        <div class="hero-live-stat-box">

                            <h3>

                                {{ $featuredProperties ?? 0 }}+

                            </h3>

                            <p>

                                Featured

                            </p>

                        </div>

                        <div class="hero-live-stat-box">

                            <h3>

                                {{ $citiesCount ?? 0 }}+

                            </h3>

                            <p>

                                Cities

                            </p>

                        </div>

                    </div>

                </div>

                <!-- =====================================================
                | RIGHT CONTENT
                ====================================================== -->

                <div class="realestate-home-right">

                    @if($featuredProperty)

                        <div class="realestate-live-card">

                            <!-- TOP -->

                            <div class="realestate-live-top">

                                <div>

                                    <small>

                                        Featured Property

                                    </small>

                                    <h4>

                                        {{ $featuredProperty->title }}

                                    </h4>

                                </div>

                                @if($featuredProperty->featured_image)

                                    <img
                                        src="{{ asset('storage/properties/'.$featuredProperty->featured_image) }}"
                                        alt="{{ $featuredProperty->title }}"
                                    >

                                @else

                                    <img
                                        src="https://placehold.co/120x100"
                                        alt="Property Image"
                                    >

                                @endif

                            </div>

                            <!-- PRICE -->

                            <h1 class="realestate-live-price">

                                ₹{{ number_format($featuredProperty->price) }}

                            </h1>

                            <!-- LOCATION -->

                            <div class="realestate-live-location">

                                <i class="fa-solid fa-location-dot"></i>

                                {{ $featuredProperty->city }},
                                {{ $featuredProperty->state }}

                            </div>

                            <!-- DESCRIPTION -->

                            <p class="realestate-live-description">

                                {{ \Illuminate\Support\Str::limit($featuredProperty->description, 120) }}

                            </p>

                            <!-- =====================================================
                            | PROPERTY STATS
                            ====================================================== -->

                            <div class="realestate-live-stats">

                                <div class="realestate-live-stat">

                                    <i class="fa fa-bed"></i>

                                    <div>

                                        <span>

                                            Bedrooms

                                        </span>

                                        <strong>

                                            {{ $featuredProperty->bedrooms ?? 0 }}

                                        </strong>

                                    </div>

                                </div>

                                <div class="realestate-live-stat">

                                    <i class="fa fa-bath"></i>

                                    <div>

                                        <span>

                                            Bathrooms

                                        </span>

                                        <strong>

                                            {{ $featuredProperty->bathrooms ?? 0 }}

                                        </strong>

                                    </div>

                                </div>

                                <div class="realestate-live-stat">

                                    <i class="fa fa-ruler-combined"></i>

                                    <div>

                                        <span>

                                            Area

                                        </span>

                                        <strong>

                                            {{ $featuredProperty->area ?? 0 }} sqft

                                        </strong>

                                    </div>

                                </div>

                                <div class="realestate-live-stat">

                                    <i class="fa fa-car"></i>

                                    <div>

                                        <span>

                                            Parking

                                        </span>

                                        <strong>

                                            {{ $featuredProperty->garage ?? 0 }}

                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <!-- BUTTONS -->

                            <div class="realestate-property-actions">

                                <!-- VIEW DETAILS -->

                                <a
                                    href="{{ route('properties.show', $featuredProperty->slug) }}"
                                    class="realestate-property-btn"
                                >

                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                                    <span>

                                        View Details

                                    </span>

                                </a>

                                <!-- ENQUIRY BUTTON -->

                                <button
                                    type="button"
                                    class="realestate-enquiry-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#enquiryModal"
                                    data-property="{{ $featuredProperty->title }}"
                                >

                                    <i class="fa-solid fa-paper-plane"></i>

                                    <span>

                                        Send Enquiry

                                    </span>

                                </button>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </section>

        <!-- =====================================================
        | FEATURED PROPERTY SECTION
        ====================================================== -->

        <section class="realestate-home-section">

            <div class="realestate-section-title">

                <div>

                    <h2>

                        Featured Properties

                    </h2>

                    <p>

                        Explore our premium listings

                    </p>

                </div>

                <a
                    href="{{ route('properties') }}"
                    class="view-all-btn"
                >

                    View All

                </a>

            </div>

            <!-- PROPERTY GRID -->

            <div class="realestate-property-grid">

                @forelse($properties as $property)

                    <!-- PROPERTY CARD -->

                    <div class="realestate-property-card">

                        <!-- IMAGE -->

                        <div class="realestate-property-image">

                            @if($property->featured_image)

                                <img
                                    src="{{ asset('storage/properties/'.$property->featured_image) }}"
                                    alt="{{ $property->title }}"
                                >

                            @else

                                <img
                                    src="https://placehold.co/600x400"
                                    alt="Property"
                                >

                            @endif

                            <span class="property-badge">

                                {{ optional($property->propertyType)->name }}

                            </span>

                        </div>

                        <!-- CONTENT -->

                        <div class="realestate-property-content">

                            <h3>

                                {{ $property->title }}

                            </h3>

                            <p>

                                <i class="fa-solid fa-location-dot"></i>

                                {{ $property->city }},
                                {{ $property->state }}

                            </p>

                            <h2>

                                ₹{{ number_format($property->price) }}

                            </h2>

                            <!-- FEATURES -->

                            <div class="property-feature-list">

                                <span>

                                    <i class="fa fa-bed"></i>

                                    {{ $property->bedrooms ?? 0 }}

                                </span>

                                <span>

                                    <i class="fa fa-bath"></i>

                                    {{ $property->bathrooms ?? 0 }}

                                </span>

                                <span>

                                    <i class="fa fa-expand"></i>

                                    {{ $property->area ?? 0 }} sqft

                                </span>

                            </div>

                            <!-- ACTION BUTTONS -->

                            <div class="realestate-property-actions">

                                <!-- VIEW DETAILS -->

                                <a
                                    href="{{ route('properties.show', $property->slug) }}"
                                    class="realestate-property-btn"
                                >

                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                                    <span>

                                        View Details

                                    </span>

                                </a>

                                <!-- ENQUIRY BUTTON -->

                                <button
                                    type="button"
                                    class="realestate-enquiry-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#enquiryModal"
                                    data-property="{{ $property->title }}"
                                >

                                    <i class="fa-solid fa-paper-plane"></i>

                                    <span>

                                        Send Enquiry

                                    </span>

                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <!-- EMPTY -->

                    <div class="empty-property-box">

                        <i class="fa-solid fa-building-circle-xmark"></i>

                        <h3>

                            No Properties Found

                        </h3>

                        <p>

                            No featured properties available right now.

                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </div>

</div>

<!-- =========================================
ENQUIRY MODAL
========================================== -->

@include('frontend.partials.enquiry-modal')

<!-- =====================================================
| MODAL SCRIPT
====================================================== -->

<script>

    document.addEventListener("DOMContentLoaded", function () {

        const enquiryButtons =
            document.querySelectorAll(".realestate-enquiry-btn");

        enquiryButtons.forEach(button => {

            button.addEventListener("click", function () {

                const property =
                    this.getAttribute("data-property");

                document.getElementById(
                    "selectedProperty"
                ).value = property;

            });

        });

    });

</script>

@endsection