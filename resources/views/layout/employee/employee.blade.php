<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        @yield('title','Employee Dashboard')

    </title>

    <!-- ===========================================================
        FAVICON
    ============================================================ -->

    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}">

    <!-- ===========================================================
        GOOGLE FONT
    ============================================================ -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- ===========================================================
        BOOTSTRAP
    ============================================================ -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- ===========================================================
        FONT AWESOME
    ============================================================ -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ===========================================================
        EMPLOYEE CSS
    ============================================================ -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/employee.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/employee-header.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/employee-sidebar.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/employee-footer.css') }}">

    <link rel="stylesheet"
      href="{{ asset('assets/css/employee-dashboard.css') }}">

    @stack('styles')

</head>

<body>

    <!-- ===========================================================
        PAGE LOADER
    ============================================================ -->

    <div
        class="employee-loader"
        id="employeeLoader">

        <div class="loader-spinner"></div>

    </div>

    <!-- ===========================================================
        HEADER
    ============================================================ -->

    @include('layout.employee.partials.header')

    <!-- ===========================================================
        MAIN WRAPPER
    ============================================================ -->

    <div class="employee-layout">

        <!-- Sidebar -->

        @include('layout.employee.partials.sidebar')

        <!-- Content -->

        <main class="employee-main">

            <div class="employee-container">

                @if(session('success'))

                    <div
                        class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button
                            class="btn-close"
                            data-bs-dismiss="alert">

                        </button>

                    </div>

                @endif

                @if(session('error'))

                    <div
                        class="alert alert-danger alert-dismissible fade show">

                        {{ session('error') }}

                        <button
                            class="btn-close"
                            data-bs-dismiss="alert">

                        </button>

                    </div>

                @endif

                @if($errors->any())

                    <div
                        class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>

                                    {{ $error }}

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                @yield('content')

            </div>

        </main>

    </div>

    <!-- ===========================================================
        FOOTER
    ============================================================ -->

    @include('layout.employee.partials.footer')

 <!-- ===========================================================
    JAVASCRIPT
=========================================================== -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(window).on('load', function () {

    $('#employeeLoader').fadeOut(300);

});

</script>

@stack('scripts')

</body>
</html>