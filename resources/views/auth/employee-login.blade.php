@extends('layout.app')

@section('title','Employee Login')

@section('content')

<section class="employee-login-page">

    <!-- Animated Background -->

    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>
    <div class="bg-circle circle-3"></div>

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div class="employee-login-card">

                    <!-- Logo -->

                    <div class="text-center mb-4">

                        <div class="employee-login-icon">

                            <i class="fa-solid fa-user-tie"></i>

                        </div>

                        <h2 class="mt-3 fw-bold">

                            Employee Login

                        </h2>

                        <p class="text-muted">

                            Welcome back! Login to access your employee portal.

                        </p>

                    </div>

                    <!-- Login Form -->

                    <form
                        id="employeeLoginForm"
                        method="POST"
                        action="{{ route('employee.login.store') }}" >

                        @csrf

                        <div class="mb-4">

                            <label class="form-label">

                                Email Address

                            </label>

                            <div class="input-group employee-input">

                                <span class="input-group-text">

                                    <i class="fa-solid fa-envelope"></i>

                                </span>

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Enter your email"
                                    required>

                            </div>

                            <small class="text-danger email_error"></small>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Password

                            </label>

                            <div class="input-group employee-input">

                                <span class="input-group-text">

                                    <i class="fa-solid fa-lock"></i>

                                </span>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required>

                                <button
                                    class="btn btn-outline-secondary"
                                    type="button"
                                    id="togglePassword">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            <small class="text-danger password_error"></small>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember">

                                <label class="form-check-label">

                                    Remember Me

                                </label>

                            </div>

                        </div>

                        <button
                            type="submit"
                            class="btn employee-login-btn w-100"
                            id="loginBtn">

                            <span class="btn-text">

                                <i class="fa-solid fa-right-to-bracket"></i>

                                Login

                            </span>

                            <span class="btn-loader d-none">

                                <i class="fa fa-spinner fa-spin"></i>

                                Please Wait...

                            </span>

                        </button>

                    </form>

                    <hr class="my-4">

                    <div class="text-center">

                        <span class="text-muted">

                            Employee Management System

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@section('scripts')



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(function(){

    /*
    |--------------------------------------------------------------------------
    | Toggle Password
    |--------------------------------------------------------------------------
    */

    $('#togglePassword').click(function(){

        let password = $('#password');

        let icon = $(this).find('i');

        if(password.attr('type') === 'password'){

            password.attr('type','text');

            icon.removeClass('fa-eye')
                .addClass('fa-eye-slash');

        }else{

            password.attr('type','password');

            icon.removeClass('fa-eye-slash')
                .addClass('fa-eye');

        }

    });

    /*
    |--------------------------------------------------------------------------
    | Login Submit
    |--------------------------------------------------------------------------
    */

    $('#employeeLoginForm').submit(function(e){

        e.preventDefault();

        $('.text-danger').html('');

        Swal.fire({

            title:'Employee Login',

            text:'Do you want to login?',

            icon:'question',

            showCancelButton:true,

            confirmButtonText:'Login',

            cancelButtonText:'Cancel',

            confirmButtonColor:'#2563eb',

            cancelButtonColor:'#ef4444'

        }).then((result)=>{

            if(!result.isConfirmed){

                return;

            }

            let form=$(this);

            let url=form.attr('action');

            let formData=new FormData(this);

            $('.btn-text').addClass('d-none');

            $('.btn-loader').removeClass('d-none');

            $('#loginBtn').prop('disabled',true);

            $.ajax({

                url:url,

                type:'POST',

                data:formData,

                processData:false,

                contentType:false,

                headers:{
                    'Accept':'application/json'
                },

                success:function(response){

                    Swal.fire({

                        icon:'success',

                        title:'Login Successful',

                        text:response.message,

                        timer:1500,

                        showConfirmButton:false

                    });

                    setTimeout(function(){

                        window.location=response.redirect;

                    },1500);

                },

                error:function(xhr){

                    $('.btn-text').removeClass('d-none');

                    $('.btn-loader').addClass('d-none');

                    $('#loginBtn').prop('disabled',false);

                    /*
                    |--------------------------------------------------------------------------
                    | Validation Errors
                    |--------------------------------------------------------------------------
                    */

                    if(xhr.status===422){

                        $.each(xhr.responseJSON.errors,function(key,value){

                            $('.'+key+'_error').html(value[0]);

                        });

                        return;

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Other Errors
                    |--------------------------------------------------------------------------
                    */

                    let message='Something went wrong.';

                    if(xhr.responseJSON){

                        if(xhr.responseJSON.message){

                            message=xhr.responseJSON.message;

                        }

                        if(xhr.responseJSON.errors){

                            if(xhr.responseJSON.errors.email){

                                message=xhr.responseJSON.errors.email[0];

                            }
                        }
                    }

                    Swal.fire({

                        icon:'error',

                        title:'Login Failed',

                        text:message

                    });

                },

                complete:function(){

                    $('.btn-text').removeClass('d-none');

                    $('.btn-loader').addClass('d-none');

                    $('#loginBtn').prop('disabled',false);

                }

            });

        });

    });

});

</script>

@endsection