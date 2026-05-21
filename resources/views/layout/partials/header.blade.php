<header
    class="advanced-realestate-header"
    id="advancedHeader">

    <!-- =====================================================
    | TOP BLUR EFFECT
    ====================================================== -->

    <div class="advanced-header-glow glow-left"></div>

    <div class="advanced-header-glow glow-right"></div>

    <div class="container-fluid">

        <div class="advanced-header-wrapper">

            <!-- =====================================================
            | LOGO SECTION
            ====================================================== -->

            <div class="advanced-header-left">

                <a
                    href="{{ url('/') }}"
                    class="advanced-logo text-decoration-none">

                    <!-- ICON -->

                    <div class="advanced-logo-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <!-- TEXT -->

                    <div class="advanced-logo-text">

                        <h2>

                            RealEstate AI

                        </h2>

                        <span>

                            Smart Property Ecosystem

                        </span>

                    </div>

                </a>

            </div>

            <!-- =====================================================
            | NAVIGATION
            ====================================================== -->

            <div class="advanced-header-center">

                <nav class="advanced-navbar">

                    <a
                        href="{{ url('/') }}"
                        class="{{ request()->is('/') ? 'active' : '' }}">

                        <i class="fa-solid fa-house"></i>

                        <span>

                            Home

                        </span>

                    </a>

                    <a
                        href="{{ route('properties') }}"
                        class="{{ request()->is('properties') ? 'active' : '' }}">

                        <i class="fa-solid fa-building"></i>

                        <span>

                            Properties

                        </span>

                    </a>

                    <a href="#featured-properties">

                        <i class="fa-solid fa-star"></i>

                        <span>

                            Featured

                        </span>

                    </a>


                </nav>

            </div>

            <!-- =====================================================
            | RIGHT SECTION
            ====================================================== -->

            <div class="advanced-header-right">

                <!-- =====================================================
                | LIVE PROPERTY COUNT
                ====================================================== -->

                <div class="advanced-live-box d-none d-xl-flex">

                    <div class="advanced-live-icon">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                    <div class="advanced-live-content">

                        <small>

                            Live Listings

                        </small>

                        <h5>

                            {{ $totalProperties ?? '120+' }}

                        </h5>

                    </div>

                </div>

                <!-- =====================================================
                | FEATURED COUNT
                ====================================================== -->

                <div class="advanced-live-box d-none d-lg-flex">

                    <div class="advanced-live-icon">

                        <i class="fa-solid fa-crown"></i>

                    </div>

                    <div class="advanced-live-content">

                        <small>

                            Featured

                        </small>

                        <h5>

                            {{ $featuredProperties ?? '25+' }}

                        </h5>

                    </div>

                </div>

                <!-- =====================================================
                | SEARCH BUTTON
                ====================================================== -->

                <button
                    class="advanced-search-btn"
                    id="openSearchModal">

                    <i class="fa-solid fa-magnifying-glass"></i>

                </button>

                <!-- =====================================================
                | AUTH
                ====================================================== -->

                @auth

                    <div class="advanced-user-box">

                        <div class="advanced-user-avatar">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div class="advanced-user-info">

                            <h6>

                                {{ auth()->user()->name }}

                            </h6>

                            <span>

                                Logged In

                            </span>

                        </div>

                    </div>

                    <!-- LOGOUT -->

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="advanced-logout-btn">

                            <i class="fa-solid fa-right-from-bracket"></i>

                        </button>

                    </form>

                @else

                    <!-- LOGIN -->

                    <a
                        href="{{ route('login') }}"
                        class="advanced-login-btn">

                        <i class="fa-solid fa-user"></i>

                        <span>

                            Login

                        </span>

                    </a>

                   
                @endauth

                <!-- =====================================================
                | MOBILE MENU BTN
                ====================================================== -->

                <button
                    class="advanced-mobile-btn"
                    id="advancedMobileBtn">

                    <i class="fa-solid fa-bars-staggered"></i>

                </button>

            </div>

        </div>

    </div>

    <!-- =====================================================
    | SEARCH MODAL
    ====================================================== -->

    <div
        class="advanced-search-modal"
        id="advancedSearchModal">

        <div class="advanced-search-box">

            <button
                class="advanced-search-close"
                id="closeSearchModal">

                <i class="fa-solid fa-xmark"></i>

            </button>

            <h3>

                Search Premium Properties

            </h3>

            <form
                action="{{ route('properties') }}"
                method="GET">

                <div class="advanced-search-input">

                    <i class="fa-solid fa-search"></i>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search by city, property type..."
                    >

                </div>

               <button
                    type="submit"
                    class="advanced-search-submit">

                    Search Properties

                </button>

            </form>

        </div>

    </div>

    <!-- =====================================================
    | MOBILE MENU
    ====================================================== -->

    <div
        class="advanced-mobile-menu"
        id="advancedMobileMenu">

        <div class="advanced-mobile-header">

            <h4>

                RealEstate AI

            </h4>

            <button id="closeAdvancedMenu" class="mobile-menu-close">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>

        <div class="advanced-mobile-links">

            <a href="{{ url('/') }}">

                <i class="fa-solid fa-house"></i>

                Home

            </a>

            <a href="{{ route('properties') }}">

                <i class="fa-solid fa-building"></i>

                Properties

            </a>

            <a href="#featured-properties">

                <i class="fa-solid fa-star"></i>

                Featured

            </a>



            @guest

                <a href="{{ route('login') }}">

                    <i class="fa-solid fa-user"></i>

                    Login

                </a>

                

            @endguest

        </div>

    </div>

</header>

