@extends('layout.app')

@section('title','Employee Management System')

@section('content')

<section class="employee-home-hero">

    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <!-- ===========================================
                LEFT CONTENT
            ============================================ -->

            <div class="col-lg-6">

                <div class="hero-content">

                    <span class="hero-badge">

                        <i class="fa-solid fa-users"></i>

                        Employee Management System

                    </span>

                    <h1>

                        Smart Employee

                        <span>

                            Management

                        </span>

                        Portal

                    </h1>

                    <p>

                        Digitally manage employee profiles,
                        education records, document uploads,
                        and administrative operations from one
                        secure platform.

                    </p>

                    <div class="hero-buttons">

                        <a
                            href="{{ route('employee.login') }}"
                            class="btn btn-primary btn-lg">

                            <i class="fa-solid fa-user"></i>

                            Employee Login

                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-primary btn-lg">

                            <i class="fa-solid fa-user-shield"></i>

                            Admin Login

                        </a>

                    </div>

                    <div class="hero-highlights">

                        <div>

                            <i class="fa-solid fa-circle-check"></i>

                            Secure Authentication

                        </div>

                        <div>

                            <i class="fa-solid fa-circle-check"></i>

                            Role Based Access

                        </div>

                        <div>

                            <i class="fa-solid fa-circle-check"></i>

                            Responsive Dashboard

                        </div>

                    </div>

                </div>

            </div>

            <!-- ===========================================
                RIGHT CONTENT
            ============================================ -->

            <div class="col-lg-6">

                <div class="hero-card">

                    <div class="hero-card-header">

                        <h4>

                            Organization Overview

                        </h4>

                    </div>

                    <div class="row g-4">

                        <div class="col-6">

                            <div class="hero-stat">

                                <div class="icon bg-primary">

                                    <i class="fa-solid fa-users"></i>

                                </div>

                                <h3>

                                    {{ $totalEmployees }}

                                </h3>

                                <span>

                                    Employees

                                </span>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="hero-stat">

                                <div class="icon bg-success">

                                    <i class="fa-solid fa-user-check"></i>

                                </div>

                                <h3>

                                    {{ $registeredUsers }}

                                </h3>

                                <span>

                                    Registered

                                </span>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="hero-stat">

                                <div class="icon bg-info">

                                    <i class="fa-solid fa-address-card"></i>

                                </div>

                                <h3>

                                    {{ $completedProfiles }}

                                </h3>

                                <span>

                                    Completed Profiles

                                </span>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="hero-stat">

                                <div class="icon bg-warning">

                                    <i class="fa-solid fa-user-clock"></i>

                                </div>

                                <h3>

                                    {{ $pendingProfiles }}

                                </h3>

                                <span>

                                    Pending

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===========================================
    FEATURES SECTION
=========================================== -->

<section class="employee-features py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2>

                Everything You Need To Manage Employees

            </h2>

            <p>

                Modern tools for HR and employee management.

            </p>

        </div>

        <div class="row g-4">

            @foreach($features as $feature)

                <div class="col-lg-3 col-md-6">

                    <div class="feature-card">

                        <div class="feature-icon">

                            <i class="fa-solid {{ $feature['icon'] }}"></i>

                        </div>

                        <h4>

                            {{ $feature['title'] }}

                        </h4>

                        <p>

                            {{ $feature['description'] }}

                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- ===========================================================
    HOW IT WORKS
=========================================================== -->

<section class="employee-workflow py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span>

                Workflow

            </span>

            <h2>

                Simple Employee Management Process

            </h2>

            <p>

                Complete your profile in just a few easy steps.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="workflow-card">

                    <div class="workflow-number">

                        01

                    </div>

                    <div class="workflow-icon">

                        <i class="fa-solid fa-user-plus"></i>

                    </div>

                    <h4>

                        Login

                    </h4>

                    <p>

                        Login securely using your employee credentials.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="workflow-card">

                    <div class="workflow-number">

                        02

                    </div>

                    <div class="workflow-icon">

                        <i class="fa-solid fa-id-card"></i>

                    </div>

                    <h4>

                        Complete Profile

                    </h4>

                    <p>

                        Fill your personal and contact information.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="workflow-card">

                    <div class="workflow-number">

                        03

                    </div>

                    <div class="workflow-icon">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>

                    <h4>

                        Add Education

                    </h4>

                    <p>

                        Upload qualifications and supporting documents.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="workflow-card">

                    <div class="workflow-number">

                        04

                    </div>

                    <div class="workflow-icon">

                        <i class="fa-solid fa-circle-check"></i>

                    </div>

                    <h4>

                        Verification

                    </h4>

                    <p>

                        HR reviews and approves your employee profile.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===========================================================
    LATEST EMPLOYEES
=========================================================== -->

<section class="latest-employees py-5">

    <div class="container">

        <div class="section-heading mb-5">

            <div>

                <span>

                    Team Members

                </span>

                <h2>

                    Recently Added Employees

                </h2>

            </div>

        </div>

        <div class="row g-4">

            @forelse($latestEmployees as $employee)

                <div class="col-lg-4 col-md-6">

                    <div class="employee-card">

                        <div class="employee-card-top">

                            @if($employee->profile_photo)

                                <img
                                    src="{{ asset('storage/'.$employee->profile_photo) }}"
                                    alt="{{ $employee->full_name }}">

                            @else

                                <div class="employee-avatar">

                                    {{ strtoupper(substr($employee->full_name,0,1)) }}

                                </div>

                            @endif

                        </div>

                        <div class="employee-card-body">

                            <h4>

                                {{ $employee->full_name }}

                            </h4>

                            <p>

                                {{ $employee->email }}

                            </p>

                            <div class="employee-meta">

                                <span>

                                    <i class="fa-solid fa-location-dot"></i>

                                    {{ $employee->city }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No employees available.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ===========================================================
    WHY CHOOSE US
=========================================================== -->

<section class="employee-advantages py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span>

                Benefits

            </span>

            <h2>

                Why Choose Our Employee Portal?

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="advantage-box">

                    <i class="fa-solid fa-shield-halved"></i>

                    <h5>

                        Secure

                    </h5>

                    <p>

                        Enterprise-grade authentication and authorization.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="advantage-box">

                    <i class="fa-solid fa-mobile-screen-button"></i>

                    <h5>

                        Responsive

                    </h5>

                    <p>

                        Works perfectly on mobile, tablet and desktop.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="advantage-box">

                    <i class="fa-solid fa-gauge-high"></i>

                    <h5>

                        Fast

                    </h5>

                    <p>

                        Optimized Laravel application with high performance.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="advantage-box">

                    <i class="fa-solid fa-users-gear"></i>

                    <h5>

                        HR Friendly

                    </h5>

                    <p>

                        Simplifies employee and document management.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===========================================================
    CTA
=========================================================== -->

<section class="employee-cta">

    <div class="container">

        <div class="cta-box">

            <h2>

                Ready to Join Our Employee Portal?

            </h2>

            <p>

                Access your employee dashboard and manage your profile securely.

            </p>

            <div class="mt-4">

                <a
                    href="{{ route('employee.login') }}"
                    class="btn btn-light btn-lg">

                    <i class="fa-solid fa-user"></i>

                    Employee Login

                </a>

                <a
                    href="{{ route('login') }}"
                    class="btn btn-outline-light btn-lg ms-3">

                    <i class="fa-solid fa-user-shield"></i>

                    Admin Login

                </a>

            </div>

        </div>

    </div>

</section>

@endsection