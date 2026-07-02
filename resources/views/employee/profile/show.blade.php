@extends('layout.employee.employee')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid mt-4">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                <i class="fas fa-user-circle me-2"></i>

                My Profile

            </h4>

            <a href="{{ route('employee.profile.edit') }}"
               class="btn btn-light">

                <i class="fas fa-edit me-1"></i>

                Edit Profile

            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <!-- Profile Photo -->

                <div class="col-md-3 text-center mb-4">

                    @if($employee->profile_photo)

                        <img src="{{ asset('storage/'.$employee->profile_photo) }}"
                             class="img-fluid rounded-circle border shadow"
                             style="width:180px;height:180px;object-fit:cover;">

                    @else

                        <img src="https://via.placeholder.com/180"
                             class="img-fluid rounded-circle border shadow">

                    @endif

                </div>

                <!-- Profile Details -->

                <div class="col-md-9">

                    <table class="table table-bordered table-striped">

                        <tr>

                            <th width="30%">Full Name</th>

                            <td>{{ $employee->full_name }}</td>

                        </tr>

                        <tr>

                            <th>Email</th>

                            <td>{{ $employee->email }}</td>

                        </tr>

                        <tr>

                            <th>Phone Number</th>

                            <td>{{ $employee->phone_number }}</td>

                        </tr>

                        <tr>

                            <th>Date of Birth</th>

                            <td>{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d M Y') }}</td>

                        </tr>

                        <tr>

                            <th>Gender</th>

                            <td>{{ ucfirst($employee->gender) }}</td>

                        </tr>

                        <tr>

                            <th>Address Line 1</th>

                            <td>{{ $employee->address_line_1 }}</td>

                        </tr>

                        <tr>

                            <th>Address Line 2</th>

                            <td>{{ $employee->address_line_2 ?: '-' }}</td>

                        </tr>

                        <tr>

                            <th>City</th>

                            <td>{{ $employee->city }}</td>

                        </tr>

                        <tr>

                            <th>State</th>

                            <td>{{ $employee->state }}</td>

                        </tr>

                        <tr>

                            <th>Pincode</th>

                            <td>{{ $employee->pincode }}</td>

                        </tr>

                        <tr>

                            <th>Country</th>

                            <td>{{ $employee->country }}</td>

                        </tr>

                        <tr>

                            <th>Created At</th>

                            <td>{{ $employee->created_at->format('d M Y h:i A') }}</td>

                        </tr>

                    </table>

                </div>

            </div>

            <!-- Education -->

            @if($employee->educations->count())

                <hr>

                <h4 class="mb-3">

                    <i class="fas fa-graduation-cap me-2"></i>

                    Educational Qualifications

                </h4>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary">

                            <tr>

                                <th>#</th>

                                <th>Certificate Name</th>

                                <th>Institute Name</th>

                                <th>Year of Completion</th>

                                <th>Certificate</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($employee->educations as $education)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $education->certificate_name }}</td>

                                    <td>{{ $education->institute_name }}</td>

                                    <td>{{ $education->year_of_completion }}</td>

                                    <td>

                                        @if($education->document_file)

                                            <a href="{{ asset('storage/'.$education->document_file) }}"
                                               target="_blank"
                                               class="btn btn-success btn-sm">

                                                <i class="fas fa-file"></i>

                                                View

                                            </a>

                                        @else

                                            <span class="badge bg-secondary">

                                                No File

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <hr>

                <div class="alert alert-warning">

                    <i class="fas fa-exclamation-circle me-2"></i>

                    No education records found.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection