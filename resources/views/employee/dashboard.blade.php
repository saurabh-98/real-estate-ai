@extends('layout.employee.employee')

@section('title','Employee Dashboard')

@section('content')

@php

    use Carbon\Carbon;

    $employee = auth()->user()->employee;

    $educationCount = $employee ? $employee->educations()->count() : 0;

    $documentCount = $employee
        ? $employee->educations()->whereNotNull('document_file')->count()
        : 0;

    $completion = 0;

    if($employee){

        $fields = collect([

            $employee->full_name,
            $employee->email,
            $employee->phone_number,
            $employee->date_of_birth,
            $employee->gender,
            $employee->address_line_1,
            $employee->address_line_2,
            $employee->city,
            $employee->state,
            $employee->pincode,
            $employee->country,
            $employee->profile_photo,

        ]);

        $filled = $fields->filter()->count();

        if($educationCount > 0){

            $filled++;

        }

        $completion = round(($filled / 13) * 100);

    }

@endphp

<div class="container-fluid">

    <!-- ==========================================
        PAGE HEADER
    =========================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Welcome,

                {{ $employee?->full_name ?? auth()->user()->name }}

            </h2>

            <p class="text-muted mb-0">

                Employee Dashboard

            </p>

        </div>

        @if($employee)

            <a href="{{ route('employee.profile.edit') }}"
               class="btn btn-primary">

                <i class="fas fa-user-edit me-2"></i>

                Edit Profile

            </a>

        @else

            <a href="{{ route('employee.profile.create') }}"
               class="btn btn-success">

                <i class="fas fa-user-plus me-2"></i>

                Create Profile

            </a>

        @endif

    </div>

    <!-- ==========================================
        DASHBOARD CARDS
    =========================================== -->

    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card shadow-sm">

                <div class="dashboard-icon bg-primary">

                    <i class="fas fa-user-check"></i>

                </div>

                <div>

                    <small class="text-muted">

                        Profile Completion

                    </small>

                    <h3 class="mb-0">

                        {{ $completion }}%

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card shadow-sm">

                <div class="dashboard-icon bg-success">

                    <i class="fas fa-graduation-cap"></i>

                </div>

                <div>

                    <small class="text-muted">

                        Education Records

                    </small>

                    <h3 class="mb-0">

                        {{ $educationCount }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card shadow-sm">

                <div class="dashboard-icon bg-warning">

                    <i class="fas fa-folder-open"></i>

                </div>

                <div>

                    <small class="text-muted">

                        Documents Uploaded

                    </small>

                    <h3 class="mb-0">

                        {{ $documentCount }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card shadow-sm">

                <div class="dashboard-icon bg-info">

                    <i class="fas fa-circle-check"></i>

                </div>

                <div>

                    <small class="text-muted">

                        Account Status

                    </small>

                    <h3 class="mb-0 text-success">

                        Active

                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- ==========================================
        PROFILE INFORMATION STARTS HERE
    =========================================== -->

    <div class="row">

    <!-- =======================================================
        PROFILE INFORMATION
    ======================================================== -->

    <div class="col-lg-8">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white d-flex justify-content-between align-items-center">

                <h5 class="mb-0">

                    <i class="fas fa-user me-2 text-primary"></i>

                    Employee Information

                </h5>

                @if($employee)

                    <span class="badge bg-success">

                        Profile Created

                    </span>

                @else

                    <span class="badge bg-danger">

                        Profile Pending

                    </span>

                @endif

            </div>

            <div class="card-body">

                @if($employee)

                <div class="row">

                    <div class="col-md-3 text-center mb-4">

                        @if($employee->profile_photo)

                            <img
                                src="{{ asset('storage/'.$employee->profile_photo) }}"
                                class="img-fluid rounded-circle shadow border"
                                style="width:180px;height:180px;object-fit:cover;">

                        @else

                            <img
                                src="https://via.placeholder.com/180x180?text=Photo"
                                class="img-fluid rounded-circle shadow border">

                        @endif

                    </div>

                    <div class="col-md-9">

                        <div class="row gy-3">

                            <div class="col-md-6">

                                <strong>Full Name</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->full_name }}

                                </p>

                            </div>

                            <div class="col-md-6">

                                <strong>Email Address</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->email }}

                                </p>

                            </div>

                            <div class="col-md-6">

                                <strong>Phone Number</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->phone_number }}

                                </p>

                            </div>

                            <div class="col-md-6">

                                <strong>Date of Birth</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->date_of_birth ? Carbon::parse($employee->date_of_birth)->format('d M Y') : '-' }}

                                </p>

                            </div>

                            <div class="col-md-6">

                                <strong>Gender</strong>

                                <p class="text-muted mb-0">

                                    {{ ucfirst($employee->gender) }}

                                </p>

                            </div>

                            <div class="col-md-6">

                                <strong>Pincode</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->pincode }}

                                </p>

                            </div>

                            <div class="col-md-12">

                                <strong>Address Line 1</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->address_line_1 }}

                                </p>

                            </div>

                            @if($employee->address_line_2)

                            <div class="col-md-12">

                                <strong>Address Line 2</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->address_line_2 }}

                                </p>

                            </div>

                            @endif

                            <div class="col-md-4">

                                <strong>City</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->city }}

                                </p>

                            </div>

                            <div class="col-md-4">

                                <strong>State</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->state }}

                                </p>

                            </div>

                            <div class="col-md-4">

                                <strong>Country</strong>

                                <p class="text-muted mb-0">

                                    {{ $employee->country }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                @else

                <div class="text-center py-5">

                    <i class="fas fa-user-plus fa-4x text-primary mb-4"></i>

                    <h3>

                        Welcome Employee

                    </h3>

                    <p class="text-muted">

                        Your employee profile has not been created yet.

                    </p>

                    <a href="{{ route('employee.profile.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-user-plus me-2"></i>

                        Create Profile

                    </a>

                </div>

                @endif

            </div>

        </div>
    </div>

        <!-- =======================================================
        RIGHT SIDEBAR
    ======================================================== -->

    <div class="col-lg-4">

        <!-- Quick Actions -->

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="fas fa-bolt text-warning me-2"></i>

                    Quick Actions

                </h5>

            </div>

            <div class="card-body d-grid gap-3">

                @if($employee)

                    <a href="{{ route('employee.profile.show') }}"
                       class="btn btn-outline-primary">

                        <i class="fas fa-eye me-2"></i>

                        View Profile

                    </a>

                    <a href="{{ route('employee.profile.edit') }}"
                       class="btn btn-outline-success">

                        <i class="fas fa-user-edit me-2"></i>

                        Edit Profile

                    </a>

                @else

                    <a href="{{ route('employee.profile.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-user-plus me-2"></i>

                        Create Profile

                    </a>

                @endif

            </div>

        </div>

        <!-- Profile Completion -->

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="fas fa-chart-line text-success me-2"></i>

                    Profile Completion

                </h5>

            </div>

            <div class="card-body">

                <div class="progress mb-3" style="height:12px;">

                    <div class="progress-bar bg-success"
                         role="progressbar"
                         style="width: {{ $completion }}%;">

                    </div>

                </div>

                <div class="d-flex justify-content-between">

                    <span>Completed</span>

                    <strong>{{ $completion }}%</strong>

                </div>

            </div>

        </div>

        <!-- Education Summary -->

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="fas fa-graduation-cap text-primary me-2"></i>

                    Education Summary

                </h5>

            </div>

            <div class="card-body">

                @if($employee && $employee->educations->count())

                    <div class="list-group list-group-flush">

                        @foreach($employee->educations->take(5) as $education)

                            <div class="list-group-item px-0">

                                <strong>

                                    {{ $education->certificate_name }}

                                </strong>

                                <br>

                                <small class="text-muted">

                                    {{ $education->institute_name }}

                                </small>

                                <br>

                                <span class="badge bg-info mt-1">

                                    {{ $education->year_of_completion }}

                                </span>

                                @if($education->document_file)

                                    <a href="{{ asset('storage/'.$education->document_file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary float-end">

                                        <i class="fas fa-file"></i>

                                    </a>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="text-center py-4">

                        <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>

                        <p class="text-muted mb-0">

                            No education records found.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection