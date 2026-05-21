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

                <i class="fa-solid fa-building"></i>

            </div>

            <div class="admin-logo-text">

                <h4>

                    Real Estate AI

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

            <!-- PROPERTIES -->

            <li>

                <a href="{{ route('admin.properties.index') }}"
                   class="{{ request()->routeIs('admin.properties.*') ? 'active' : '' }}">

                    <div class="menu-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <span>

                        Properties

                    </span>

                    <small class="danger">

                        {{ \App\Models\Property::count() }}

                    </small>

                </a>

            </li>

            <!-- ADD PROPERTY -->

            <li>

                <a href="{{ route('admin.properties.create') }}">

                    <div class="menu-icon">

                        <i class="fa-solid fa-plus"></i>

                    </div>

                    <span>

                        Add Property

                    </span>

                </a>

            </li>

            <!-- ENQUIRIES -->

            <li>

                <a href="{{route('admin.enquiries')}}">

                    <div class="menu-icon">

                        <i class="fa-solid fa-envelope"></i>

                    </div>

                    <span>

                        Enquiries

                    </span>

                    <small class="danger">

                         {{ \App\Models\Enquiry::count() }}
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

                Grow Faster

            </h5>

            <p>

                Manage your properties with modern AI tools.

            </p>

        </div>

    </div>

</div>

<!-- =====================================================
| MOBILE OVERLAY
===================================================== -->

<div class="admin-sidebar-overlay"
     id="adminSidebarOverlay"></div>