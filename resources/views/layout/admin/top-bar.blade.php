<div class="admin-topbar">

    <!-- =====================================================
    | LEFT SECTION
    ====================================================== -->

    <div class="admin-topbar-left">

        <!-- MOBILE MENU -->

        <button
            type="button"
            class="admin-mobile-toggle"
            id="adminMobileToggle">

            <i class="fa-solid fa-bars"></i>

        </button>

        <!-- PAGE TITLE -->

        <div class="admin-page-title">

            <h4>

                <i class="fa-solid fa-chart-line"></i>

                Admin Dashboard

            </h4>

            <p>

                Welcome back,
                {{ auth()->user()->name }}

            </p>

        </div>

    </div>

    <!-- =====================================================
    | RIGHT SECTION
    ====================================================== -->

    <div class="admin-topbar-right">

        <!-- SEARCH -->

        <div class="admin-search-box d-none d-lg-flex">

            <i class="fa-solid fa-search"></i>

            <input
                type="text"
                placeholder="Search employees..."
            >

        </div>

      

        <!-- USER PROFILE -->

        <div class="admin-user-profile dropdown">

            <button
                class="admin-user-btn dropdown-toggle"
                data-bs-toggle="dropdown">

                <div class="admin-user-image">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="admin-user-info d-none d-md-block">

                    <h6>

                        {{ auth()->user()->name }}

                    </h6>

                    <small>

                        Administrator

                    </small>

                </div>

            </button>

            <!-- DROPDOWN -->

            <ul class="dropdown-menu dropdown-menu-end">

               
                <li>

                    <hr class="dropdown-divider">

                </li>

                <li>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="dropdown-item text-danger">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</div>