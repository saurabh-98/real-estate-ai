@extends('layout.admin.app')

@section('title', 'Dashboard')

@section('content')

<div class="admin-dashboard-wrapper">

    <!-- =====================================================
    | PAGE HEADER
    ====================================================== -->

    <div class="admin-dashboard-header">

        <div>

            <h2>

                Welcome Back 👋

            </h2>

            <p>

                Monitor your properties, enquiries,
                listings and real-estate analytics.

            </p>

        </div>

        <div class="dashboard-header-btns">

            <a href="{{ route('admin.properties.create') }}"
               class="dashboard-btn primary-btn">

                <i class="fa-solid fa-plus"></i>

                Add Property

            </a>

            <a href="#"
               class="dashboard-btn secondary-btn">

                <i class="fa-solid fa-chart-line"></i>

                Analytics

            </a>

        </div>

    </div>

    <!-- =====================================================
    | STATISTICS
    ====================================================== -->

    <div class="row g-4">

        <!-- TOTAL PROPERTIES -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon blue">

                    <i class="fa-solid fa-building"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Total Properties

                    </h6>

                    <h2>

                        {{ $totalProperties }}

                    </h2>

                    <p>

                        Total uploaded properties

                    </p>

                </div>

            </div>

        </div>

        <!-- TOTAL ENQUIRIES -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon purple">

                    <i class="fa-solid fa-envelope"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Enquiries

                    </h6>

                    <h2>

                        {{ $totalEnquiries }}

                    </h2>

                    <p>

                        Customer property enquiries

                    </p>

                </div>

            </div>

        </div>

        <!-- FEATURED -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon green">

                    <i class="fa-solid fa-star"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Featured Listings

                    </h6>

                    <h2>

                        {{ $featuredProperties }}

                    </h2>

                    <p>

                        Premium active listings

                    </p>

                </div>

            </div>

        </div>

        <!-- ACTIVE -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon orange">

                    <i class="fa-solid fa-circle-check"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Active Properties

                    </h6>

                    <h2>

                        {{ $activeProperties }}

                    </h2>

                    <p>

                        Currently live properties

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================================
    | CONTENT SECTION
    ====================================================== -->

    <div class="row g-4 mt-1">

        <!-- RECENT PROPERTIES -->

        <div class="col-xl-8">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h5>

                        Recent Properties

                    </h5>

                    <a href="{{ route('admin.properties.index') }}">

                        View All

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table dashboard-table">

                        <thead>

                            <tr>

                                <th>Image</th>

                                <th>Property</th>

                                <th>Location</th>

                                <th>Price</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentProperties as $property)

                                <tr>

                                    <td>

                                        @if($property->featured_image)

                                            <img
                                                src="{{ asset('storage/properties/'.$property->featured_image) }}"
                                                width="70"
                                                height="55"
                                                style="
                                                    object-fit:cover;
                                                    border-radius:10px;
                                                "
                                            >

                                        @else

                                            <img
                                                src="https://placehold.co/70x55"
                                                width="70"
                                                height="55"
                                                style="
                                                    object-fit:cover;
                                                    border-radius:10px;
                                                "
                                            >

                                        @endif

                                    </td>

                                    <td>

                                        <strong>

                                            {{ $property->title }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $property->city }}

                                    </td>

                                    <td>

                                        ₹{{ number_format($property->price) }}

                                    </td>

                                    <td>

                                        @if($property->status == 1)

                                            <span class="status active">

                                                Active

                                            </span>

                                        @else

                                            <span class="status pending">

                                                Inactive

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        No properties found

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- QUICK ACTIONS -->

        <div class="col-xl-4">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h5>

                        Quick Actions

                    </h5>

                </div>

                <div class="quick-actions">

                    <a href="{{ route('admin.properties.create') }}"
                       class="quick-action-btn">

                        <i class="fa-solid fa-plus"></i>

                        Add New Property

                    </a>

                    <a href="{{ route('admin.properties.index') }}"
                       class="quick-action-btn">

                        <i class="fa-solid fa-building"></i>

                        Manage Properties

                    </a>

                    <a href="{{route('admin.enquiries')}}"
                       class="quick-action-btn">

                        <i class="fa-solid fa-envelope"></i>

                        View Enquiries

                    </a>

                    <a href="#"
                       class="quick-action-btn">

                        <i class="fa-solid fa-chart-pie"></i>

                        Dashboard Reports

                    </a>

                </div>

            </div>

            <!-- AI ANALYTICS -->

            <div class="dashboard-card mt-4">

                <div class="dashboard-card-header">

                    <h5>

                        AI Analytics

                    </h5>

                </div>

                <div class="ai-analytics-box">

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                AI Descriptions

                            </h6>

                            <p>

                                Generated content support

                            </p>

                        </div>

                        <span class="analytics-badge success">

                            Active

                        </span>

                    </div>

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                AJAX Workflow

                            </h6>

                            <p>

                                Smart async operations

                            </p>

                        </div>

                        <span class="analytics-badge primary">

                            Enabled

                        </span>

                    </div>

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                Property Listings

                            </h6>

                            <p>

                                Public frontend ready

                            </p>

                        </div>

                        <span class="analytics-badge warning">

                            Live

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection