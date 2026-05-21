<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ======================================================
    | META TAGS
    ======================================================= -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- ======================================================
    | CSRF TOKEN
    ======================================================= -->

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <!-- ======================================================
    | BASE URL
    ======================================================= -->

    <meta
        name="base-url"
        content="{{ url('/') }}"
    >

    <!-- ======================================================
    | PAGE TITLE
    ======================================================= -->

    <title>

        @yield('title', 'Real Estate AI')

    </title>

    <!-- ======================================================
    | SEO META
    ======================================================= -->

    <meta
        name="description"
        content="@yield(
            'meta_description',
            'Premium Real Estate Listing Platform with AI Integration'
        )"
    >

    <meta
        name="keywords"
        content="@yield(
            'meta_keywords',
            'real estate, property, villa, apartment, AI property listing'
        )"
    >

    <!-- ======================================================
    | GOOGLE FONT
    ======================================================= -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- ======================================================
    | BOOTSTRAP CSS
    ======================================================= -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- ======================================================
    | FONT AWESOME
    ======================================================= -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <!-- ======================================================
    | AOS CSS
    ======================================================= -->

    <link
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet"
    >

    <!-- ======================================================
    | GLOBAL CSS
    ======================================================= -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/header.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/footer.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/home.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/property.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/property-details.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/enquiry-modal.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/responsive.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/auth.css') }}"
    >

    @stack('styles')

</head>

<body>

<!-- ======================================================
| PAGE LOADER
====================================================== -->

<div
    class="page-loader"
    id="pageLoader"
>

    <div class="loader-spinner"></div>

</div>

<!-- ======================================================
| HEADER
====================================================== -->

@include('layout.partials.header')

<!-- ======================================================
| MAIN CONTENT
====================================================== -->

<main class="main-wrapper">

    @yield('content')

</main>

<!-- ======================================================
| FOOTER
====================================================== -->

@include('layout.partials.footer')

<!-- ======================================================
| BACK TO TOP
====================================================== -->

<button
    type="button"
    class="back-to-top"
    id="backToTop"
>

    <i class="fa-solid fa-arrow-up"></i>

</button>

<!-- ======================================================
| JQUERY
====================================================== -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- ======================================================
| BOOTSTRAP JS
====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ======================================================
| SWEET ALERT
====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ======================================================
| AOS JS
====================================================== -->

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<!-- ======================================================
| AOS INIT
====================================================== -->

<script>

AOS.init({

    duration: 1000,

    once: true
});

</script>

<!-- ======================================================
| ENQUIRY JS
====================================================== -->

<script src="{{ asset('assets/js/enquiry.js') }}"></script>

<!-- ======================================================
| PAGE SCRIPTS
====================================================== -->



@yield('scripts')

<!-- ======================================================
| GLOBAL PAGE SCRIPT
====================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | MOBILE MENU
    |--------------------------------------------------------------------------
    */

    const mobileBtn =
        document.getElementById('advancedMobileBtn');

    const mobileMenu =
        document.getElementById('advancedMobileMenu');

    const closeMenu =
        document.getElementById('closeAdvancedMenu');

    /*
    |--------------------------------------------------------------------------
    | OPEN MENU
    |--------------------------------------------------------------------------
    */

    if (mobileBtn && mobileMenu) {

        mobileBtn.addEventListener('click', function () {

            mobileMenu.style.display = 'block';

            requestAnimationFrame(() => {

                mobileMenu.classList.add('active');

            });

            document.body.style.overflow = 'hidden';

        });

    }

    /*
    |--------------------------------------------------------------------------
    | CLOSE MENU
    |--------------------------------------------------------------------------
    */

    function closeMobileMenu() {

        if (!mobileMenu) {

            return;
        }

        mobileMenu.classList.remove('active');

        document.body.style.overflow = 'auto';

        setTimeout(() => {

            mobileMenu.style.display = 'none';

        }, 300);
    }

    if (closeMenu) {

        closeMenu.addEventListener('click', function () {

            closeMobileMenu();

        });

    }

    /*
    |--------------------------------------------------------------------------
    | CLOSE OUTSIDE
    |--------------------------------------------------------------------------
    */

    document.addEventListener('click', function (e) {

        if (
            mobileMenu &&
            mobileMenu.classList.contains('active') &&
            !mobileMenu.contains(e.target) &&
            mobileBtn &&
            !mobileBtn.contains(e.target)
        ) {

            closeMobileMenu();

        }

    });

    /*
    |--------------------------------------------------------------------------
    | SEARCH MODAL
    |--------------------------------------------------------------------------
    */

    const searchBtn =
        document.getElementById('openSearchModal');

    const searchModal =
        document.getElementById('advancedSearchModal');

    const closeSearch =
        document.getElementById('closeSearchModal');

    /*
    |--------------------------------------------------------------------------
    | OPEN SEARCH
    |--------------------------------------------------------------------------
    */

    if (searchBtn && searchModal) {

        searchBtn.addEventListener('click', function () {

            searchModal.classList.add('active');

            document.body.style.overflow = 'hidden';

        });

    }

    /*
    |--------------------------------------------------------------------------
    | CLOSE SEARCH
    |--------------------------------------------------------------------------
    */

    function closeSearchModal() {

        if (!searchModal) {

            return;
        }

        searchModal.classList.remove('active');

        document.body.style.overflow = 'auto';
    }

    if (closeSearch) {

        closeSearch.addEventListener('click', function () {

            closeSearchModal();

        });

    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH OUTSIDE CLICK
    |--------------------------------------------------------------------------
    */

    if (searchModal) {

        searchModal.addEventListener('click', function (e) {

            if (e.target === searchModal) {

                closeSearchModal();

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | ESC SUPPORT
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', function (e) {

        if (e.key === 'Escape') {

            closeMobileMenu();

            closeSearchModal();

        }

    });

    /*
    |--------------------------------------------------------------------------
    | HEADER EFFECT
    |--------------------------------------------------------------------------
    */

    const header =
        document.getElementById('advancedHeader');

    window.addEventListener('scroll', function () {

        if (!header) {

            return;
        }

        if (window.scrollY > 40) {

            header.classList.add(
                'header-fixed-effect'
            );

        } else {

            header.classList.remove(
                'header-fixed-effect'
            );
        }

    });

});

</script>

</body>

</html>