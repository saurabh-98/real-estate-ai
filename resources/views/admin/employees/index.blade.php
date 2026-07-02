@extends('layout.admin.app')

@section('title', 'Employees')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Employee Management
            </h3>

            <p class="text-muted mb-0">
                View and manage employee profiles.
            </p>

        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <form method="GET">

                <div class="row">

                    <div class="col-md-5">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search by Name, Email or City..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">
                                All Profiles
                            </option>

                            <option value="complete"
                                {{ request('status')=='complete'?'selected':'' }}>
                                Complete
                            </option>

                            <option value="incomplete"
                                {{ request('status')=='incomplete'?'selected':'' }}>
                                Incomplete
                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button
                            class="btn btn-primary w-100">

                            Search

                        </button>

                    </div>

                    <div class="col-md-2">

                        <a href="{{ route('admin.employees.index') }}"
                           class="btn btn-secondary w-100">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th>#</th>

                    <th>Photo</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>City</th>

                    <th>Education</th>

                    <th>Status</th>

                    <th width="120">
                        Action
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($employees as $employee)

                    <tr>

                        <td>
                            {{ $loop->iteration + ($employees->firstItem() - 1) }}
                        </td>

                        <td>

                            @if($employee->profile_photo)

                                <img
                                    src="{{ asset('storage/'.$employee->profile_photo) }}"
                                    width="50"
                                    height="50"
                                    class="rounded-circle">

                            @else

                                <div
                                    class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                    style="width:50px;height:50px;">

                                    {{ strtoupper(substr($employee->full_name,0,1)) }}

                                </div>

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

                            {{ $employee->phone_number }}

                        </td>

                        <td>

                            {{ $employee->city }}

                        </td>

                        <td>

                            {{ $employee->educations_count }}

                        </td>

                        <td>

                            @if($employee->educations_count)

                                <span class="badge bg-success">

                                    Complete

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Incomplete

                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.employees.show',$employee) }}"
                                class="btn btn-primary btn-sm">

                                <i class="fa fa-eye"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9"
                            class="text-center py-5">

                            No Employees Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white">

            {{ $employees->links() }}

        </div>

    </div>

</div>

@endsection