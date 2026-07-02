<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ==========================================================
        META
    =========================================================== -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <meta
        name="base-url"
        content="{{ url('/') }}">

    <!-- ==========================================================
        TITLE
    =========================================================== -->

    <title>

        @yield('title','Employee Management System')

    </title>

    <!-- ==========================================================
        SEO
    =========================================================== -->

    <meta
        name="description"
        content="@yield(
            'meta_description',
            'Employee Management System | Human Resource Management Portal'
        )">

    <meta
        name="keywords"
        content="@yield(
            'meta_keywords',
            'employee management, hrms, human resource, employee portal'
        )">

    <!-- ==========================================================
        FAVICON
    =========================================================== -->

    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}">

    <!-- ==========================================================
        GOOGLE FONT
    =========================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- ==========================================================
        BOOTSTRAP
    =========================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- ==========================================================
        FONT AWESOME
    =========================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ==========================================================
        AOS
    =========================================================== -->

    <link
        rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css">

    <!-- ==========================================================
        GLOBAL CSS
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}">

    <!-- ==========================================================
        PUBLIC HEADER
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/header.css') }}">

    <!-- ==========================================================
        FOOTER
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/footer.css') }}">

    <!-- ==========================================================
        HOME PAGE
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/home.css') }}">

    <!-- ==========================================================
        EMPLOYEE LOGIN
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/employee-login.css') }}">


    <link
        rel="stylesheet"
        href="{{ asset('assets/css/auth.css') }}">

    <!-- ==========================================================
        RESPONSIVE
    =========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/responsive.css') }}">

    <!-- ==========================================================
        CUSTOM PAGE CSS
    =========================================================== -->

    @stack('styles')

</head>

<body>

<!-- ==========================================================
    PAGE LOADER
========================================================== -->

<div
    class="page-loader"
    id="pageLoader">

    <div class="loader-wrapper">

        <div class="loader-circle"></div>

        <div class="loader-circle delay"></div>

        <div class="loader-logo">

            <i class="fa-solid fa-users"></i>

        </div>

    </div>

</div>

<!-- ==========================================================
    PUBLIC HEADER
========================================================== -->

@include('layout.partials.header')

<!-- ==========================================================
    MAIN CONTENT
========================================================== -->

<main
    class="main-wrapper">

    @yield('content')

</main>

<!-- ==========================================================
    FOOTER
========================================================== -->

@include('layout.partials.footer')

<!-- ==========================================================
    BACK TO TOP
========================================================== -->

<button
    class="back-to-top"
    id="backToTop">

    <i class="fa-solid fa-arrow-up"></i>

</button>

<!-- ==========================================================
    MOBILE OVERLAY
========================================================== -->

<div
    class="mobile-overlay">

</div>

<!-- ==========================================================
    BOOTSTRAP JS
========================================================== -->

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<!-- ==========================================================
    JQUERY
========================================================== -->

<script
src="https://code.jquery.com/jquery-3.7.1.min.js">

</script>

<!-- ==========================================================
    SWEET ALERT
========================================================== -->

<script
src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>

<!-- ==========================================================
    AOS
========================================================== -->

<script
src="https://unpkg.com/aos@2.3.4/dist/aos.js">
</script>

<script>

AOS.init({

    duration:900,

    once:true,

    offset:80,

});

</script>

<!-- ==========================================================
     GLOBAL SCRIPT
========================================================== -->

<script>


$(function(){

    /*
    |--------------------------------------------------------------------------
    | PAGE LOADER
    |--------------------------------------------------------------------------
    */

    $(window).on('load', function () {

    setTimeout(function () {

        $('#pageLoader').fadeOut(300, function () {

            $(this).remove();

        });

    }, 300);

});
    /*
    |--------------------------------------------------------------------------
    | STICKY HEADER
    |--------------------------------------------------------------------------
    */

    $(window).on('scroll',function(){

        if($(this).scrollTop()>50){

            $('#employeeHeader').addClass('scrolled');

        }else{

            $('#employeeHeader').removeClass('scrolled');

        }

    });

    /*
    |--------------------------------------------------------------------------
    | BACK TO TOP
    |--------------------------------------------------------------------------
    */

    $(window).on('scroll',function(){

        if($(this).scrollTop()>300){

            $('#backToTop').fadeIn();

        }else{

            $('#backToTop').fadeOut();

        }

    });

    $('#backToTop').click(function(e){

        e.preventDefault();

        $('html,body').animate({

            scrollTop:0

        },700);

    });

    /*
    |--------------------------------------------------------------------------
    | SMOOTH SCROLL
    |--------------------------------------------------------------------------
    */

    $('a[href^="#"]').on('click',function(e){

        let target=$(this.getAttribute('href'));

        if(target.length){

            e.preventDefault();

            $('html,body').animate({

                scrollTop:target.offset().top-90

            },700);

        }

    });

    /*
    |--------------------------------------------------------------------------
    | SEARCH MODAL OPEN
    |--------------------------------------------------------------------------
    */

    $('#openSearch').click(function(){

        $('#employeeSearchModal').addClass('show');

        $('body').css({

            overflow:'hidden'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | SEARCH MODAL CLOSE
    |--------------------------------------------------------------------------
    */

    $('#closeSearch').click(function(){

        $('#employeeSearchModal').removeClass('show');

        $('body').css({

            overflow:'auto'

        });

    });

    $('#employeeSearchModal').click(function(e){

        if(e.target===this){

            $(this).removeClass('show');

            $('body').css({

                overflow:'auto'

            });

        }

    });

        /*
    |--------------------------------------------------------------------------
    | MOBILE MENU
    |--------------------------------------------------------------------------
    */

    $('#mobileMenuBtn').click(function(){

        $('#employeeMobileMenu').addClass('show');

        $('.mobile-overlay').addClass('show');

        $('body').css({

            overflow:'hidden'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | CLOSE MOBILE MENU
    |--------------------------------------------------------------------------
    */

    $('#closeMobileMenu').click(function(){

        $('#employeeMobileMenu').removeClass('show');

        $('.mobile-overlay').removeClass('show');

        $('body').css({

            overflow:'auto'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | CLOSE OVERLAY
    |--------------------------------------------------------------------------
    */

    $('.mobile-overlay').click(function(){

        $('#employeeMobileMenu').removeClass('show');

        $('#employeeSearchModal').removeClass('show');

        $(this).removeClass('show');

        $('body').css({

            overflow:'auto'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | ESC KEY
    |--------------------------------------------------------------------------
    */

    $(document).keyup(function(e){

        if(e.key==="Escape"){

            $('#employeeMobileMenu').removeClass('show');

            $('#employeeSearchModal').removeClass('show');

            $('.mobile-overlay').removeClass('show');

            $('body').css({

                overflow:'auto'

            });

        }

    });

    /*
    |--------------------------------------------------------------------------
    | USER DROPDOWN
    |--------------------------------------------------------------------------
    */

    $('.employee-user-trigger').click(function(e){

        e.stopPropagation();

        $('.employee-dropdown-menu').stop(true,true).slideToggle(200);

    });

    $(document).click(function(){

        $('.employee-dropdown-menu').slideUp(200);

    });

    $('.employee-dropdown-menu').click(function(e){

        e.stopPropagation();

    });

    /*
    |--------------------------------------------------------------------------
    | RIPPLE EFFECT
    |--------------------------------------------------------------------------
    */

    $('.employee-login-btn').click(function(e){

        let x=e.pageX-$(this).offset().left;

        let y=e.pageY-$(this).offset().top;

        let ripple=$('<span class="ripple"></span>');

        ripple.css({

            left:x,

            top:y

        });

        $(this).append(ripple);

        setTimeout(function(){

            ripple.remove();

        },700);

    });

    /*
    |--------------------------------------------------------------------------
    | HOVER ANIMATION
    |--------------------------------------------------------------------------
    */

    $('.employee-stat-box').hover(

        function(){

            $(this).find('.stat-icon').css({

                transform:'rotate(-10deg) scale(1.08)'

            });

        },

        function(){

            $(this).find('.stat-icon').css({

                transform:'rotate(0deg) scale(1)'

            });

        }

    );

    /*
    |--------------------------------------------------------------------------
    | NAV ACTIVE EFFECT
    |--------------------------------------------------------------------------
    */

    $('.employee-navbar a').click(function(){

        $('.employee-navbar a').removeClass('active');

        $(this).addClass('active');

    });

    /*
    |--------------------------------------------------------------------------
    | SEARCH INPUT FOCUS
    |--------------------------------------------------------------------------
    */

    $('.employee-search-input input')

    .focus(function(){

        $(this).parent().addClass('focused');

    })

    .blur(function(){

        $(this).parent().removeClass('focused');

    });

    /*
    |--------------------------------------------------------------------------
    | BUTTON HOVER SCALE
    |--------------------------------------------------------------------------
    */

    $('.employee-login-btn,.employee-search-btn,.employee-mobile-btn')

    .hover(

        function(){

            $(this).css({

                transform:'translateY(-4px)'

            });

        },

        function(){

            $(this).css({

                transform:''

            });

        }

    );

        /*
    |--------------------------------------------------------------------------
    | SCROLL PROGRESS BAR
    |--------------------------------------------------------------------------
    */

    $(window).on('scroll',function(){

        let scrollTop=$(window).scrollTop();

        let docHeight=$(document).height()-$(window).height();

        let progress=(scrollTop/docHeight)*100;

        $('#scrollProgress').css({

            width:progress+'%'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | HEADER SHADOW EFFECT
    |--------------------------------------------------------------------------
    */

    $(window).scroll(function(){

        if($(this).scrollTop()>120){

            $('#employeeHeader').css({

                boxShadow:'0 20px 45px rgba(15,23,42,.10)'

            });

        }else{

            $('#employeeHeader').css({

                boxShadow:''

            });

        }

    });

    /*
    |--------------------------------------------------------------------------
    | FLOATING ANIMATION
    |--------------------------------------------------------------------------
    */

    $('.employee-stat-box').each(function(i){

        $(this).css({

            animationDelay:(i*.12)+'s'

        });

    });

    /*
    |--------------------------------------------------------------------------
    | COUNTER ANIMATION
    |--------------------------------------------------------------------------
    */

    $('.counter').each(function(){

        let $this=$(this);

        let countTo=parseInt($this.text());

        if(isNaN(countTo)){

            return;

        }

        $({

            countNum:0

        }).animate({

            countNum:countTo

        },

        {

            duration:1800,

            easing:'swing',

            step:function(){

                $this.text(Math.floor(this.countNum));

            },

            complete:function(){

                $this.text(this.countNum);

            }

        });

    });

    /*
    |--------------------------------------------------------------------------
    | BUTTON RIPPLE CLEANUP
    |--------------------------------------------------------------------------
    */

    $(document).on('animationend','.ripple',function(){

        $(this).remove();

    });

    /*
    |--------------------------------------------------------------------------
    | TOOLTIP
    |--------------------------------------------------------------------------
    */

    $('[data-bs-toggle="tooltip"]').tooltip();

    /*
    |--------------------------------------------------------------------------
    | POPOVER
    |--------------------------------------------------------------------------
    */

    $('[data-bs-toggle="popover"]').popover();

    /*
    |--------------------------------------------------------------------------
    | WINDOW RESIZE
    |--------------------------------------------------------------------------
    */

    $(window).resize(function(){

        if($(window).width()>991){

            $('#employeeMobileMenu').removeClass('show');

            $('.mobile-overlay').removeClass('show');

            $('body').css({

                overflow:'auto'

            });

        }

    });

    /*
    |--------------------------------------------------------------------------
    | PREVENT EMPTY SEARCH
    |--------------------------------------------------------------------------
    */

    $('.employee-search-box form').submit(function(e){

        let value=$.trim(

            $(this)

            .find('input')

            .val()

        );

        if(value===""){

            e.preventDefault();

            Swal.fire({

                icon:'warning',

                title:'Search Required',

                text:'Please enter a keyword to search.',

                confirmButtonColor:'#2563eb'

            });

        }

    });

    /*
    |--------------------------------------------------------------------------
    | LOADER FOR LINKS
    |--------------------------------------------------------------------------
    */

    $('a').not('[target="_blank"]').click(function(){

        let href=$(this).attr('href');

        if(

            href &&

            href!="#" &&

            !href.startsWith('javascript')

        ){

            $('#pageLoader').fadeIn(150);

        }

    });

});

</script>

<!-- ==========================================================
    PAGE SPECIFIC JAVASCRIPT
========================================================== -->

@yield('scripts')

</body>

</html>
