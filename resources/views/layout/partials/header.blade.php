<header class="employee-header" id="employeeHeader">

    <div class="header-glow glow-left"></div>
    <div class="header-glow glow-right"></div>

    @php

        $employeeCount = \App\Models\Employee::count();

        $registeredEmployees = \App\Models\User::where('role','employee')->count();

    @endphp

    <div class="container-fluid">

        <div class="employee-header-wrapper">

            <!-- =======================================
                 LOGO
            ======================================== -->

            <div class="employee-header-left">

                <a href="{{ route('home') }}" class="employee-logo">

                    <div class="employee-logo-icon">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <div class="employee-logo-text">

                        <h3>Employee Manager</h3>

                        <span>Human Resource System</span>

                    </div>

                </a>

            </div>

            <!-- =======================================
                 NAVIGATION
            ======================================== -->

            <div class="employee-header-center">

                <nav class="employee-navbar">

                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'active' : '' }}">

                        <i class="fa-solid fa-house"></i>

                        Home

                    </a>

                    <a href="#features">

                        <i class="fa-solid fa-layer-group"></i>

                        Features

                    </a>

                    <a href="#workflow">

                        <i class="fa-solid fa-diagram-project"></i>

                        Workflow

                    </a>

                    <a href="#contact">

                        <i class="fa-solid fa-envelope"></i>

                        Contact

                    </a>

                </nav>

            </div>

            <!-- =======================================
                 RIGHT SIDE
            ======================================== -->

            <div class="employee-header-right">


                <a href="{{ route('login') }}"
                   class="employee-login-btn admin">

                    <i class="fa-solid fa-user-shield"></i>

                    Admin Login

                </a>

                <!-- Employee Login -->

                <a href="{{ route('employee.login') }}"
                   class="employee-login-btn employee">

                    <i class="fa-solid fa-user"></i>

                    Employee Login

                </a>

                <!-- Mobile -->

                <button
                    class="employee-mobile-btn"
                    id="mobileMenuBtn">

                    <i class="fa-solid fa-bars"></i>

                </button>

            </div>

        </div>

    </div>

    
    
</header>