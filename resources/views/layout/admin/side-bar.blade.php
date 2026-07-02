<div class="admin-sidebar"
     id="adminSidebar">

    <!-- =====================================================
    | SIDEBAR TOP
    ====================================================== -->

    <div class="admin-sidebar-top">

        <!-- LOGO -->

        <a href="{{ route('admin.dashboard') }}"
           class="admin-logo">

            <div class="admin-logo-icon">

                <i class="fa-solid fa-users"></i>

            </div>

            <div class="admin-logo-text">

                <h4>

                    Employee Manager

                </h4>

                <p>

                    Admin Panel

                </p>

            </div>

        </a>

        <!-- CLOSE BUTTON MOBILE -->

        <button
            type="button"
            class="admin-sidebar-close"
            id="adminSidebarClose">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    <!-- =====================================================
    | SIDEBAR MENU
    ====================================================== -->

    <div class="admin-sidebar-menu">

        <span class="admin-menu-label">

            MAIN MENU

        </span>

        <ul>

            <!-- DASHBOARD -->

            <li>

                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <div class="menu-icon">

                        <i class="fa-solid fa-table-columns"></i>

                    </div>

                    <span>

                        Dashboard

                    </span>

                </a>

            </li>

            <!-- EMPLOYEES -->

            <li>

                <a href="{{ route('admin.employees.index') }}"
                   class="{{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">

                    <div class="menu-icon">

                        <i class="fa-solid fa-id-badge"></i>

                    </div>

                    <span>

                        Employees

                    </span>

                    <small class="danger">

                        {{ \App\Models\Employee::count() }}

                    </small>

                </a>

            </li>

        </ul>

    </div>

    <!-- =====================================================
    | SIDEBAR BOTTOM
    ====================================================== -->

    <div class="admin-sidebar-bottom">

        <div class="admin-sidebar-card">

            <div class="sidebar-card-icon">

                <i class="fa-solid fa-chart-line"></i>

            </div>

            <h5>

                Stay Organized

            </h5>

            <p>

                Manage your workforce records in one place.

            </p>

        </div>

    </div>

</div>

<!-- =====================================================
| MOBILE OVERLAY
===================================================== -->

<div class="admin-sidebar-overlay"
     id="adminSidebarOverlay"></div>