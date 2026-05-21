<!DOCTYPE html>
<html lang="en">

<head>

    <!-- =====================================================
    | META TAGS
    ====================================================== -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <!-- =====================================================
    | TITLE
    ====================================================== -->

    <title>

        @yield('title', 'Admin Panel')

    </title>

    <!-- =====================================================
    | GOOGLE FONT
    ====================================================== -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- =====================================================
    | BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- =====================================================
    | FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <!-- =====================================================
    | GLOBAL ADMIN CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin.css') }}">

     <!-- =====================================================
    |  ADMIN PROPERTY FORM CSS
    ====================================================== -->
    
    <link
    rel="stylesheet"
    href="{{ asset('assets/css/property-form.css') }}">

      <!-- =====================================================
    |  ADMIN PROPERTY INDEX CSS
    ====================================================== -->

    <link
    rel="stylesheet"
    href="{{ asset('assets/css/property-index.css') }}">

     <!-- =====================================================
    |  ADMIN PROPERTY FORM EDIT CSS
    ====================================================== -->

    <link
    rel="stylesheet"
    href="{{ asset('assets/css/property-form-edit.css') }}">

    <!-- =====================================================
    |  ADMIN ENQUIRY CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-enquiry.css') }}">

    
    <!-- =====================================================
    |  ADMIN ENQUIRY DETAILS CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-enquiry-details.css') }}">

    

    <!-- =====================================================
    |  ADMIN LAYOUT CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-layout.css') }}">

    <!-- =====================================================
    | SIDEBAR CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-sidebar.css') }}">

    <!-- =====================================================
    | TOPBAR CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-topbar.css') }}">

    <!-- =====================================================
    | DASHBOARD CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-dashboard.css') }}">

    <!-- =====================================================
    | FOOTER CSS
    ====================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin-footer.css') }}">

    <!-- =====================================================
    | EXTRA CSS
    ====================================================== -->

    @stack('styles')

</head>

<body>

<!-- =====================================================
| ADMIN LAYOUT WRAPPER
===================================================== -->

<div class="admin-layout-wrapper">

    <!-- =====================================================
    | SIDEBAR
    ====================================================== -->

    @include('layout.admin.side-bar')

    <!-- =====================================================
    | MAIN CONTENT WRAPPER
    ====================================================== -->

    <div class="admin-main-wrapper">

        <!-- =====================================================
        | TOPBAR
        ====================================================== -->

        @include('layout.admin.top-bar')

        <!-- =====================================================
        | PAGE CONTENT
        ====================================================== -->

        <div class="admin-page-wrapper">

            @yield('content')

        </div>

        <!-- =====================================================
        | FOOTER
        ====================================================== -->

        @include('layout.admin.footer')

    </div>

</div>

<!-- =====================================================
| JQUERY
===================================================== -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- =====================================================
| BOOTSTRAP
===================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- =====================================================
| SWEET ALERT
===================================================== -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>


<!-- PAGE SCRIPTS -->

@yield('scripts')

<!-- =====================================================
| SIDEBAR TOGGLE SCRIPT
===================================================== -->

<script>

    /*
    |--------------------------------------------------------------------------
    | SIDEBAR OPEN
    |--------------------------------------------------------------------------
    */

    $('#adminMobileToggle').click(function(){

        $('#adminSidebar').addClass('show');

        $('#adminSidebarOverlay').addClass('show');

        $('body').addClass('sidebar-open');

    });

    /*
    |--------------------------------------------------------------------------
    | SIDEBAR CLOSE
    |--------------------------------------------------------------------------
    */

    $('#adminSidebarClose, #adminSidebarOverlay').click(function(){

        $('#adminSidebar').removeClass('show');

        $('#adminSidebarOverlay').removeClass('show');

        $('body').removeClass('sidebar-open');

    });

    /*
    |--------------------------------------------------------------------------
    | WINDOW RESIZE
    |--------------------------------------------------------------------------
    */

    $(window).resize(function(){

        if($(window).width() > 992){

            $('#adminSidebar').removeClass('show');

            $('#adminSidebarOverlay').removeClass('show');

            $('body').removeClass('sidebar-open');

        }

    });

</script>

<!-- =====================================================
| EXTRA SCRIPTS
===================================================== -->

@stack('scripts')

</body>

</html>