@extends('layout.app')

@section('title', 'Admin Login')

@section('content')

<section class="advanced-login-page">

    <!-- BACKGROUND SHAPES -->

    <div class="login-bg-shape shape-1"></div>
    <div class="login-bg-shape shape-2"></div>
    <div class="login-bg-shape shape-3"></div>

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <!-- LOGIN CARD -->

                <div class="advanced-login-card">

                    <!-- TOP -->

                    <div class="advanced-login-top">

                        <div class="advanced-login-logo">

                            <div class="advanced-login-logo-icon">

                                <i class="fa-solid fa-building"></i>

                            </div>

                        </div>

                        <h2>

                            Welcome Back

                        </h2>

                        <p>

                            Login to Admin Dashboard

                        </p>

                    </div>

                    <!-- FORM -->

                    <form
                        id="advancedLoginForm"
                        method="POST"
                        action="{{ route('login') }}"
                    >

                        @csrf

                        <!-- EMAIL -->

                        <div class="advanced-form-group">

                            <label>

                                Email Address

                            </label>

                            <div class="advanced-input-group">

                                <span>

                                    <i class="fa-solid fa-envelope"></i>

                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    placeholder="Enter your email"
                                >

                            </div>

                            <small
                                class="text-danger error-text email_error"
                            ></small>

                        </div>

                        <!-- PASSWORD -->

                        <div class="advanced-form-group">

                            <label>

                                Password

                            </label>

                            <div class="advanced-input-group password-group">

                                <span>

                                    <i class="fa-solid fa-lock"></i>

                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    placeholder="Enter your password"
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    id="togglePassword"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            <small
                                class="text-danger error-text password_error"
                            ></small>

                        </div>

                        <!-- OPTIONS -->

                        <div class="advanced-login-options">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember_me"
                                >

                                <label
                                    class="form-check-label"
                                    for="remember_me"
                                >

                                    Remember Me

                                </label>

                            </div>


                        </div>

                        <!-- LOGIN BUTTON -->

                        <button
                            type="submit"
                            class="advanced-login-btn"
                            id="loginBtn"
                        >

                            <span class="btn-text">

                                <i class="fa-solid fa-right-to-bracket"></i>

                                Login Now

                            </span>

                            <span class="btn-loader d-none">

                                <i class="fa fa-spinner fa-spin"></i>

                                Please Wait...

                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@section('scripts')

<!-- JQUERY -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- SWEET ALERT -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | PREVENT MULTIPLE SUBMISSION
    |--------------------------------------------------------------------------
    */

    let isSubmitting = false;

    /*
    |--------------------------------------------------------------------------
    | PASSWORD TOGGLE
    |--------------------------------------------------------------------------
    */

    $('#togglePassword').on('click', function () {

        const passwordField =
            $('#password');

        const type =
            passwordField.attr('type') === 'password'
                ? 'text'
                : 'password';

        passwordField.attr('type', type);

        $(this)
            .find('i')
            .toggleClass('fa-eye fa-eye-slash');

    });

    /*
    |--------------------------------------------------------------------------
    | AJAX LOGIN FORM
    |--------------------------------------------------------------------------
    */

    $('#advancedLoginForm').on('submit', function (e) {

        e.preventDefault();

        /*
        |--------------------------------------------------------------------------
        | STOP DUPLICATE SUBMISSION
        |--------------------------------------------------------------------------
        */

        if (isSubmitting === true) {

            return false;

        }

        /*
        |--------------------------------------------------------------------------
        | CLEAR ERRORS
        |--------------------------------------------------------------------------
        */

        $('.error-text').text('');

        /*
        |--------------------------------------------------------------------------
        | CONFIRMATION ALERT
        |--------------------------------------------------------------------------
        */

        Swal.fire({

            title: 'Confirm Login',

            text: 'Are you sure you want to login?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#2563eb',

            cancelButtonColor: '#ef4444',

            confirmButtonText: 'Yes, Login',

            cancelButtonText: 'Cancel',

            reverseButtons: true,

            customClass: {

                popup: 'swal-popup',

                confirmButton: 'swal-confirm-btn',

                cancelButton: 'swal-cancel-btn'

            }

        }).then((result) => {

            /*
            |--------------------------------------------------------------------------
            | CANCELLED
            |--------------------------------------------------------------------------
            */

            if (!result.isConfirmed) {

                return;

            }

            /*
            |--------------------------------------------------------------------------
            | LOCK SUBMISSION
            |--------------------------------------------------------------------------
            */

            isSubmitting = true;

            /*
            |--------------------------------------------------------------------------
            | BUTTON LOADING
            |--------------------------------------------------------------------------
            */

            $('#loginBtn')
                .prop('disabled', true)
                .addClass('loading-active');

            $('.btn-text').addClass('d-none');

            $('.btn-loader').removeClass('d-none');

            /*
            |--------------------------------------------------------------------------
            | FORM DATA
            |--------------------------------------------------------------------------
            */

            let formData =
                new FormData(
                    document.getElementById(
                        'advancedLoginForm'
                    )
                );

            /*
            |--------------------------------------------------------------------------
            | AJAX REQUEST
            |--------------------------------------------------------------------------
            */

            $.ajax({

                url:
                    $('#advancedLoginForm')
                        .attr('action'),

                type: "POST",

                data: formData,

                processData: false,

                contentType: false,

                cache: false,

                headers: {

                    'X-CSRF-TOKEN':
                        $('meta[name="csrf-token"]')
                            .attr('content')

                },

                /*
                |--------------------------------------------------------------------------
                | SUCCESS
                |--------------------------------------------------------------------------
                */

                success: function (response) {

                    Swal.fire({

                        icon: 'success',

                        title: 'Login Successful',

                        text:
                            response.message
                                ? response.message
                                : 'Redirecting to dashboard...',

                        confirmButtonColor: '#2563eb',

                        timer: 2200,

                        showConfirmButton: false

                    });

                    /*
                    |--------------------------------------------------------------------------
                    | REDIRECT
                    |--------------------------------------------------------------------------
                    */

                    setTimeout(function () {

                        window.location.href =
                            response.redirect
                                ? response.redirect
                                : "{{ route('admin.dashboard') }}";

                    }, 2200);

                },

                /*
                |--------------------------------------------------------------------------
                | ERROR
                |--------------------------------------------------------------------------
                */

                error: function (xhr) {

                    /*
                    |--------------------------------------------------------------------------
                    | UNLOCK SUBMISSION
                    |--------------------------------------------------------------------------
                    */

                    isSubmitting = false;

                    /*
                    |--------------------------------------------------------------------------
                    | RESET BUTTON
                    |--------------------------------------------------------------------------
                    */

                    $('#loginBtn')
                        .prop('disabled', false)
                        .removeClass('loading-active');

                    $('.btn-text').removeClass('d-none');

                    $('.btn-loader').addClass('d-none');

                    /*
                    |--------------------------------------------------------------------------
                    | VALIDATION ERROR
                    |--------------------------------------------------------------------------
                    */

                    if (xhr.status === 422) {

                        $.each(xhr.responseJSON.errors, function (key, value) {

                            $('.' + key + '_error')
                                .text(value[0]);

                        });

                        Swal.fire({

                            icon: 'warning',

                            title: 'Validation Error',

                            text: 'Please fill all required fields correctly.',

                            confirmButtonColor: '#f59e0b'

                        });

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | LOGIN FAILED
                    |--------------------------------------------------------------------------
                    */

                    else if (xhr.status === 401) {

                        Swal.fire({

                            icon: 'error',

                            title: 'Authentication Failed',

                            text: 'Invalid email or password.',

                            confirmButtonColor: '#ef4444'

                        });

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | SERVER ERROR
                    |--------------------------------------------------------------------------
                    */

                    else {

                        Swal.fire({

                            icon: 'error',

                            title: 'Something Went Wrong',

                            text: 'Server error. Please try again later.',

                            confirmButtonColor: '#ef4444'

                        });

                    }

                }

            });

        });

    });

    /*
    |--------------------------------------------------------------------------
    | PREVENT ENTER SPAM
    |--------------------------------------------------------------------------
    */

    $('#advancedLoginForm input').on('keypress', function (e) {

        if (e.which === 13 && isSubmitting) {

            e.preventDefault();

            return false;

        }

    });

});

</script>

@endsection
