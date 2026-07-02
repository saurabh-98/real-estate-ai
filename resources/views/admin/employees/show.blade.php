@extends('layout.admin.app')

@section('title','Employee Details')

@section('content')

<div class="container-fluid">

    <a
        href="{{ route('admin.employees.index') }}"
        class="btn btn-secondary mb-3">

        ← Back

    </a>

    <div class="card shadow-sm border-0">

        <div class="card-header">

            <h4>

                Employee Profile

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-3 text-center">

                    @if($employee->profile_photo)

                        <img
                            src="{{ asset('storage/'.$employee->profile_photo) }}"
                            class="img-fluid rounded-circle"
                            width="180">

                    @else

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($employee->full_name) }}&size=180"
                            class="rounded-circle">

                    @endif

                </div>

                <div class="col-md-9">

                    <table class="table table-bordered">

                        <tr>
                            <th width="220">Full Name</th>
                            <td>{{ $employee->full_name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $employee->email }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <td>{{ $employee->phone_number }}</td>
                        </tr>

                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ optional($employee->date_of_birth)->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>{{ $employee->gender }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>
                                {{ $employee->address_line_1 }}<br>
                                {{ $employee->address_line_2 }}
                            </td>
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

                    </table>

                </div>

            </div>

            <hr>

            <h4>

                Education Details

            </h4>

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>Certificate</th>

                        <th>Institute</th>

                        <th>Year</th>

                        <th>Document</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($employee->educations as $education)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $education->certificate_name }}</td>

                            <td>{{ $education->institute_name }}</td>

                            <td>{{ $education->year_of_completion }}</td>

                            <td>

                                @if($education->document_file)

                                    <a
                                        href="{{ asset('storage/'.$education->document_file) }}"
                                        target="_blank"
                                        class="btn btn-sm btn-success">

                                        View

                                    </a>

                                @else

                                    -

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center">

                                No Education Records

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection