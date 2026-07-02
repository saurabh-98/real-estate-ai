<header class="employee-header">

    <div class="container-fluid">

        <div class="employee-header-wrapper">

            <!-- ==========================================
                LEFT
            =========================================== -->

            <div class="employee-header-left">

                <!-- Mobile Toggle -->

                <button
                    class="employee-sidebar-toggle"
                    id="employeeSidebarToggle">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <!-- Logo -->

                <a href="{{ route('employee.profile.show') }}"
                   class="employee-logo">

                    <div class="employee-logo-icon">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <div class="employee-logo-text">

                        <h4>

                            Employee Portal

                        </h4>

                        <small>

                            HR Management

                        </small>

                    </div>

                </a>

            </div>

            <!-- ==========================================
                CENTER
            =========================================== -->

            <div class="employee-header-center">

                <div class="employee-search">

                    <i class="fa-solid fa-search"></i>

                    <input
                        type="text"
                        placeholder="Search...">

                </div>

            </div>

            <!-- ==========================================
                RIGHT
            =========================================== -->

            <div class="employee-header-right">

                <!-- Notification -->

                <button
                    class="employee-header-icon">

                    <i class="fa-solid fa-bell"></i>

                    <span class="badge">

                        0

                    </span>

                </button>

                <!-- Profile Completion -->

                @php

                    $employee = auth()->user()->employee;

                    $percentage = 0;

                    if($employee){

                        $filled = collect([

                            $employee->full_name,
                            $employee->email,
                            $employee->phone_number,
                            $employee->date_of_birth,
                            $employee->gender,
                            $employee->address_line_1,
                            $employee->city,
                            $employee->state,
                            $employee->country

                        ])->filter()->count();

                        $percentage = round(($filled/9)*100);

                    }

                @endphp

                <div class="employee-progress">

                    <small>

                        Profile

                    </small>

                    <strong>

                        {{ $percentage }}%

                    </strong>

                </div>

                <!-- User -->

                <div class="employee-user">

                    <button
                        class="employee-user-btn"
                        id="employeeUserBtn">

                        <div class="employee-avatar">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </div>

                        <div class="employee-user-info">

                            <h6>

                                {{ auth()->user()->name }}

                            </h6>

                            <small>

                                Employee

                            </small>

                        </div>

                        <i class="fa-solid fa-angle-down"></i>

                    </button>

                    <!-- Dropdown -->

                    <div
                        class="employee-dropdown"
                        id="employeeDropdown">

                        <a href="{{ route('employee.profile.show') }}">

                            <i class="fa-solid fa-user"></i>

                            My Profile

                        </a>

                        <a href="{{ route('employee.profile.edit') }}">

                            <i class="fa-solid fa-pen"></i>

                            Edit Profile

                        </a>

                        <hr>

                        <form
                            method="POST"
                            action="{{ route('employee.logout') }}">

                            @csrf

                            <button
                                type="submit">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>

<script>

document.addEventListener('DOMContentLoaded',function(){

    const btn=document.getElementById('employeeUserBtn');

    const menu=document.getElementById('employeeDropdown');

    if(btn){

        btn.addEventListener('click',function(e){

            e.stopPropagation();

            menu.classList.toggle('show');

        });

    }

    document.addEventListener('click',function(){

        menu.classList.remove('show');

    });

});

</script>