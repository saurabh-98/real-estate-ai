<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>

        @yield('title')

    </title>

    <!-- BOOTSTRAP -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <!-- ADMIN CSS -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin.css') }}">

</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->

    @include('admin.layouts.sidebar')

    <!-- CONTENT -->

    <div class="admin-content">

        <!-- TOPBAR -->

        @include('admin.layouts.topbar')

        <!-- PAGE CONTENT -->

        <div class="admin-page-content">

            @yield('content')

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>