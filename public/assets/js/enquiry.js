/* =========================================================
   ENQUIRY FORM AJAX + VALIDATION
========================================================= */

$(document).ready(function () {

    console.log('Enquiry JS Loaded');

    /*
    |--------------------------------------------------------------------------
    | FORM
    |--------------------------------------------------------------------------
    */

    const enquiryForm =
        $('#enquiryForm');

    /*
    |--------------------------------------------------------------------------
    | REMOVE ERRORS
    |--------------------------------------------------------------------------
    */

    function removeErrors() {

        $('.invalid-feedback').remove();

        $('.form-control').removeClass('is-invalid');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW ERROR
    |--------------------------------------------------------------------------
    */

    function showError(input, message) {

        input.addClass('is-invalid');

        input
            .closest('.enquiry-input-group')
            .parent()
            .append(
                `
                    <div class="invalid-feedback d-block">

                        ${message}

                    </div>
                `
            );
    }

    /*
    |--------------------------------------------------------------------------
    | MOBILE NUMBER ONLY
    |--------------------------------------------------------------------------
    */

    $('input[name="mobile"]').on('input', function () {

        /*
        |--------------------------------------------------------------------------
        | REMOVE NON NUMERIC
        |--------------------------------------------------------------------------
        */

        let value =
            $(this).val().replace(/\D/g, '');

        /*
        |--------------------------------------------------------------------------
        | LIMIT TO 10 DIGITS
        |--------------------------------------------------------------------------
        */

        value =
            value.substring(0, 10);

        /*
        |--------------------------------------------------------------------------
        | UPDATE VALUE
        |--------------------------------------------------------------------------
        */

        $(this).val(value);
    });

    /*
    |--------------------------------------------------------------------------
    | REMOVE ERROR ON INPUT
    |--------------------------------------------------------------------------
    */

    $('.form-control').on('input', function () {

        $(this).removeClass('is-invalid');

        $(this)
            .closest('.enquiry-input-group')
            .parent()
            .find('.invalid-feedback')
            .remove();
    });

    /*
    |--------------------------------------------------------------------------
    | FORM SUBMIT
    |--------------------------------------------------------------------------
    */

    enquiryForm.on('submit', function (e) {

        e.preventDefault();

        console.log('Form Submitted');

        /*
        |--------------------------------------------------------------------------
        | RESET ERRORS
        |--------------------------------------------------------------------------
        */

        removeErrors();

        /*
        |--------------------------------------------------------------------------
        | VALUES
        |--------------------------------------------------------------------------
        */

        let name =
            $('input[name="name"]').val().trim();

        let mobile =
            $('input[name="mobile"]').val().trim();

        let email =
            $('input[name="email"]').val().trim();

        let message =
            $('textarea[name="message"]').val().trim();

        /*
        |--------------------------------------------------------------------------
        | VALIDATION FLAG
        |--------------------------------------------------------------------------
        */

        let isValid = true;

        /*
        |--------------------------------------------------------------------------
        | NAME VALIDATION
        |--------------------------------------------------------------------------
        */

        let nameRegex =
            /^[A-Za-z\s]{3,50}$/;

        if (name === '') {

            showError(

                $('input[name="name"]'),

                'Full name is required.'
            );

            isValid = false;
        }

        else if (!nameRegex.test(name)) {

            showError(

                $('input[name="name"]'),

                'Only alphabets allowed (3-50 characters).'
            );

            isValid = false;
        }

        /*
        |--------------------------------------------------------------------------
        | MOBILE VALIDATION
        |--------------------------------------------------------------------------
        */

        let mobileRegex =
            /^[6-9]\d{9}$/;

        if (mobile === '') {

            showError(

                $('input[name="mobile"]'),

                'Mobile number is required.'
            );

            isValid = false;
        }

        else if (!mobileRegex.test(mobile)) {

            showError(

                $('input[name="mobile"]'),

                'Enter valid 10 digit Indian mobile number.'
            );

            isValid = false;
        }

        /*
        |--------------------------------------------------------------------------
        | EMAIL VALIDATION
        |--------------------------------------------------------------------------
        */

        let emailRegex =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === '') {

            showError(

                $('input[name="email"]'),

                'Email address is required.'
            );

            isValid = false;
        }

        else if (!emailRegex.test(email)) {

            showError(

                $('input[name="email"]'),

                'Enter valid email address.'
            );

            isValid = false;
        }

        /*
        |--------------------------------------------------------------------------
        | MESSAGE VALIDATION
        |--------------------------------------------------------------------------
        */

        if (message === '') {

            showError(

                $('textarea[name="message"]'),

                'Message is required.'
            );

            isValid = false;
        }

        else if (message.length < 10) {

            showError(

                $('textarea[name="message"]'),

                'Message must contain minimum 10 characters.'
            );

            isValid = false;
        }

        else if (message.length > 1000) {

            showError(

                $('textarea[name="message"]'),

                'Message is too long.'
            );

            isValid = false;
        }

        /*
        |--------------------------------------------------------------------------
        | XSS VALIDATION
        |--------------------------------------------------------------------------
        */

        let xssRegex =
            /<script|<\/script>|<.*?>/gi;

        if (xssRegex.test(message)) {

            showError(

                $('textarea[name="message"]'),

                'HTML or script tags are not allowed.'
            );

            isValid = false;
        }

        /*
        |--------------------------------------------------------------------------
        | STOP IF INVALID
        |--------------------------------------------------------------------------
        */

        if (!isValid) {

            Swal.fire({

                icon: 'warning',

                title: 'Validation Error',

                text: 'Please correct highlighted fields.',

                confirmButtonColor: '#2563eb'
            });

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | CONFIRMATION ALERT
        |--------------------------------------------------------------------------
        */

        Swal.fire({

            title: 'Submit Enquiry?',

            text: 'Do you want to send this enquiry?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#2563eb',

            cancelButtonColor: '#dc2626',

            confirmButtonText: 'Yes, Submit'

        }).then((result) => {

            /*
            |--------------------------------------------------------------------------
            | CANCEL
            |--------------------------------------------------------------------------
            */

            if (!result.isConfirmed) {

                return;
            }

            console.log('Confirmed');

            /*
            |--------------------------------------------------------------------------
            | BUTTON LOADING
            |--------------------------------------------------------------------------
            */

            let submitBtn =
                $('.enquiry-submit-btn');

            submitBtn.prop('disabled', true);

            submitBtn.html(
                `
                    <span class="spinner-border spinner-border-sm"></span>

                    Sending...
                `
            );

            /*
            |--------------------------------------------------------------------------
            | AJAX REQUEST
            |--------------------------------------------------------------------------
            */

            $.ajax({

                url: '/send-enquiry',

                type: 'POST',

                data: enquiryForm.serialize(),

                success: function (response) {

                    console.log(response);

                    /*
                    |--------------------------------------------------------------------------
                    | RESET FORM
                    |--------------------------------------------------------------------------
                    */

                    enquiryForm[0].reset();

                    removeErrors();

                    /*
                    |--------------------------------------------------------------------------
                    | CLOSE MODAL
                    |--------------------------------------------------------------------------
                    */

                    $('#enquiryModal').modal('hide');

                    /*
                    |--------------------------------------------------------------------------
                    | SUCCESS ALERT
                    |--------------------------------------------------------------------------
                    */

                    Swal.fire({

                        icon: 'success',

                        title: 'Enquiry Submitted',

                        text: response.message,

                        confirmButtonColor: '#2563eb',

                        timer: 3000,

                        timerProgressBar: true
                    });
                },

                /*
                |--------------------------------------------------------------------------
                | ERROR
                |--------------------------------------------------------------------------
                */

                error: function (xhr) {

                    console.log(xhr);

                    removeErrors();

                    /*
                    |--------------------------------------------------------------------------
                    | VALIDATION ERROR
                    |--------------------------------------------------------------------------
                    */

                    if (xhr.status === 422) {

                        let errors =
                            xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {

                            let input =
                                $('[name="' + key + '"]');

                            showError(

                                input,

                                value[0]
                            );
                        });

                        Swal.fire({

                            icon: 'error',

                            title: 'Validation Failed',

                            text: 'Please correct highlighted fields.',

                            confirmButtonColor: '#dc2626'
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

                            title: 'Submission Failed',

                            text: 'Something went wrong.',

                            confirmButtonColor: '#dc2626'
                        });
                    }
                },

                /*
                |--------------------------------------------------------------------------
                | COMPLETE
                |--------------------------------------------------------------------------
                */

                complete: function () {

                    let submitBtn =
                        $('.enquiry-submit-btn');

                    submitBtn.prop('disabled', false);

                    submitBtn.html(
                        `
                            <span>

                                Submit Enquiry

                            </span>

                            <i class="fa-solid fa-paper-plane"></i>
                        `
                    );
                }

            });

        });

    });

});