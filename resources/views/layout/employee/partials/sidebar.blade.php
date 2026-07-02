<aside class="employee-sidebar" id="employeeSidebar">

    @php

        $employee = auth()->user()->employee;

        $user = auth()->user();

        $completion = 0;

        if ($employee) {

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

            $filled = $fields->filter(function ($value) {
                return !empty($value);
            })->count();

            if ($employee->educations()->count() > 0) {
                $filled++;
            }

            $completion = round(($filled / 13) * 100);

        }

    @endphp

    <!-- =====================================================
        SIDEBAR HEADER
    ====================================================== -->

    <div class="employee-sidebar-header">

        <div class="employee-sidebar-profile">

            <div class="employee-sidebar-avatar">

                @if($employee && $employee->profile_photo)

                    <img src="{{ asset('storage/'.$employee->profile_photo) }}"
                         alt="Profile">

                @else

                    {{ strtoupper(substr($employee->full_name ?? $user->name,0,1)) }}

                @endif

            </div>

            <div class="employee-sidebar-user">

                <h5>

                    {{ $employee->full_name ?? $user->name }}

                </h5>

                <span>

                    Employee

                </span>

            </div>

        </div>

    </div>

    <!-- =====================================================
        SIDEBAR MENU
    ====================================================== -->

    <div class="employee-sidebar-menu">

        <span class="menu-title">

            MAIN MENU

        </span>

        <ul>

            <!-- Dashboard -->

            <li>

                <a href="{{ route('employee.dashboard') }}"
                   class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-gauge-high"></i>

                    <span>

                        Dashboard

                    </span>

                </a>

            </li>

            @if($employee)

                <!-- My Profile -->

                <li>

                    <a href="{{ route('employee.profile.show') }}"
                       class="{{ request()->routeIs('employee.profile.show') ? 'active' : '' }}">

                        <i class="fa-solid fa-user"></i>

                        <span>

                            My Profile

                        </span>

                    </a>

                </li>

                <!-- Edit Profile -->

                <li>

                    <a href="{{ route('employee.profile.edit') }}"
                       class="{{ request()->routeIs('employee.profile.edit') ? 'active' : '' }}">

                        <i class="fa-solid fa-user-pen"></i>

                        <span>

                            Edit Profile

                        </span>

                    </a>

                </li>

            @else

                <!-- Create Profile -->

                <li>

                    <a href="{{ route('employee.profile.create') }}"
                       class="{{ request()->routeIs('employee.profile.create') ? 'active' : '' }}">

                        <i class="fa-solid fa-user-plus"></i>

                        <span>

                            Create Profile

                        </span>

                    </a>

                </li>

            @endif

            @if($employee)

                <!-- Education -->

                <li>

                    <a href="{{ route('employee.profile.edit') }}#educationWrapper">

                        <i class="fa-solid fa-graduation-cap"></i>

                        <span>

                            Education

                        </span>

                    </a>

                </li>

                <!-- Documents -->

                <li>

                    <a href="{{ route('employee.profile.show') }}">

                        <i class="fa-solid fa-folder-open"></i>

                        <span>

                            Documents

                        </span>

                    </a>

                </li>

            @endif

        </ul>

    </div>

    <!-- =====================================================
        PROFILE COMPLETION
    ====================================================== -->

    <div class="employee-sidebar-footer">

        <div class="profile-progress-card">

            <div class="progress-icon">

                <i class="fa-solid fa-chart-line"></i>

            </div>

            <h6>

                Profile Completion

            </h6>

            <div class="progress mt-3">

                <div class="progress-bar bg-success"
                     role="progressbar"
                     style="width: {{ $completion }}%;"
                     aria-valuenow="{{ $completion }}"
                     aria-valuemin="0"
                     aria-valuemax="100">

                </div>

            </div>

            <div class="text-center mt-2">

                <strong>

                    {{ $completion }}%

                </strong>

            </div>

        </div>

        <form method="POST"
              action="{{ route('employee.logout') }}">

            @csrf

            <button type="submit"
                    class="employee-logout-btn">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </div>

</aside>

<!-- =====================================================
    MOBILE OVERLAY
===================================================== -->

<div class="employee-sidebar-overlay"
     id="employeeSidebarOverlay">
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('employeeSidebar');

    const toggle = document.getElementById('employeeSidebarToggle');

    const overlay = document.getElementById('employeeSidebarOverlay');

    if (toggle) {

        toggle.addEventListener('click', function () {

            sidebar.classList.add('show');

            overlay.classList.add('show');

        });

    }

    if (overlay) {

        overlay.addEventListener('click', function () {

            sidebar.classList.remove('show');

            overlay.classList.remove('show');

        });

    }

});
</script>