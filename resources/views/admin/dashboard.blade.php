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

                Monitor employee records, profiles
                and workforce statistics.

            </p>

        </div>

        <div class="dashboard-header-btns">

            <a href="{{ route('admin.employees.index') }}"
               class="dashboard-btn primary-btn">

                <i class="fa-solid fa-users"></i>

                View All Employees

            </a>

        </div>

    </div>

    <!-- =====================================================
    | STATISTICS
    ====================================================== -->

    <div class="row g-4">

        <!-- TOTAL EMPLOYEES -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon blue">

                    <i class="fa-solid fa-users"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Total Employees

                    </h6>

                    <h2>

                        {{ $totalEmployees }}

                    </h2>

                    <p>

                        Registered employee profiles

                    </p>

                </div>

            </div>

        </div>

        <!-- COMPLETE PROFILES -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon green">

                    <i class="fa-solid fa-circle-check"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Complete Profiles

                    </h6>

                    <h2>

                        {{ $completeProfiles }}

                    </h2>

                    <p>

                        Profiles with education added

                    </p>

                </div>

            </div>

        </div>

        <!-- PENDING PROFILES -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon orange">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        Incomplete Profiles

                    </h6>

                    <h2>

                        {{ $incompleteProfiles }}

                    </h2>

                    <p>

                        Missing education / documents

                    </p>

                </div>

            </div>

        </div>

        <!-- NEW THIS MONTH -->

        <div class="col-xl-3 col-lg-6 col-md-6">

            <div class="dashboard-stat-card">

                <div class="dashboard-stat-icon purple">

                    <i class="fa-solid fa-user-plus"></i>

                </div>

                <div class="dashboard-stat-content">

                    <h6>

                        New This Month

                    </h6>

                    <h2>

                        {{ $newThisMonth }}

                    </h2>

                    <p>

                        Employees added recently

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================================
    | CONTENT SECTION
    ====================================================== -->

    <div class="row g-4 mt-1">

        <!-- RECENT EMPLOYEES -->

        <div class="col-xl-8">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h5>

                        Recent Employees

                    </h5>

                    <a href="{{ route('admin.employees.index') }}">

                        View All

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table dashboard-table">

                        <thead>

                            <tr>

                                <th>Photo</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>City</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentEmployees as $employee)

                                <tr>

                                    <td>

                                        @if($employee->profile_photo)

                                            <img
                                                src="{{ asset('storage/'.$employee->profile_photo) }}"
                                                width="45"
                                                height="45"
                                                style="
                                                    object-fit:cover;
                                                    border-radius:50%;
                                                "
                                            >

                                        @else

                                            <img
                                                src="https://placehold.co/45x45"
                                                width="45"
                                                height="45"
                                                style="
                                                    object-fit:cover;
                                                    border-radius:50%;
                                                "
                                            >

                                        @endif

                                    </td>

                                    <td>

                                        <strong>

                                            {{ $employee->full_name }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $employee->email }}

                                    </td>

                                    <td>

                                        {{ $employee->city }}

                                    </td>

                                    <td>

                                        @if($employee->educations_count > 0)

                                            <span class="status active">

                                                Complete

                                            </span>

                                        @else

                                            <span class="status pending">

                                                Incomplete

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        No employees found

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

                    <a href="{{ route('admin.employees.index') }}"
                       class="quick-action-btn">

                        <i class="fa-solid fa-users"></i>

                        Manage Employees

                    </a>

                    <a href="#"
                       class="quick-action-btn">

                        <i class="fa-solid fa-chart-pie"></i>

                        Dashboard Reports

                    </a>

                </div>

            </div>

            <!-- SYSTEM STATUS -->

            <div class="dashboard-card mt-4">

                <div class="dashboard-card-header">

                    <h5>

                        System Status

                    </h5>

                </div>

                <div class="ai-analytics-box">

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                Role-Based Access

                            </h6>

                            <p>

                                Admin / Employee separation

                            </p>

                        </div>

                        <span class="analytics-badge success">

                            Active

                        </span>

                    </div>

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                File Uploads

                            </h6>

                            <p>

                                Photos & document storage

                            </p>

                        </div>

                        <span class="analytics-badge primary">

                            Enabled

                        </span>

                    </div>

                    <div class="ai-analytics-item">

                        <div>

                            <h6>

                                Education Records

                            </h6>

                            <p>

                                One-to-many relationship

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