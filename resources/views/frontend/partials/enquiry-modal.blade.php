<!-- =========================================================
     PREMIUM ENQUIRY MODAL
========================================================= -->

<div
    class="modal fade enquiry-modal"
    id="enquiryModal"
    tabindex="-1"
>

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content enquiry-modal-content">

            <!-- =========================================================
                 CLOSE BUTTON
            ========================================================== -->

            <button
                type="button"
                class="enquiry-close-btn"
                data-bs-dismiss="modal"
                aria-label="Close Modal"
            >

                <i class="fa-solid fa-xmark"></i>

            </button>

            <!-- =========================================================
                 MODAL HEADER
            ========================================================== -->

            <div class="enquiry-modal-header">

                <div class="enquiry-modal-badge">

                    <i class="fa-solid fa-building"></i>

                    RealEstate AI

                </div>

                <h2>

                    Property Enquiry

                </h2>

                <p>

                    Interested in this premium property?
                    Fill out the form and our expert team
                    will contact you shortly.

                </p>

            </div>

            <!-- =========================================================
                 MODAL BODY
            ========================================================== -->

            <div class="modal-body">

                <form
                    id="enquiryForm"
                    class="enquiry-form"
                    method="POST"
                    autocomplete="off"
                >

                    @csrf

                    <!-- =========================================================
                         PROPERTY ID
                    ========================================================== -->

                    <input
                        type="hidden"
                        name="property_id"
                        value="{{ $property->id ?? '' }}"
                    >

                    <div class="row g-4">

                        <!-- =========================================================
                             NAME
                        ========================================================== -->

                        <div class="col-md-6">

                            <label class="form-label">

                                Full Name

                            </label>

                            <div class="enquiry-input-group">

                                <span class="input-icon">

                                    <i class="fa-solid fa-user"></i>

                                </span>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter your full name"
                                    maxlength="50"
                                >

                            </div>

                        </div>

                        <!-- =========================================================
                             MOBILE
                        ========================================================== -->

                        <div class="col-md-6">

                            <label class="form-label">

                                Mobile Number

                            </label>

                            <div class="enquiry-input-group">

                                <span class="input-icon">

                                    <i class="fa-solid fa-phone"></i>

                                </span>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="mobile"
                                    placeholder="Enter mobile number"
                                    maxlength="10"
                                    inputmode="numeric"
                                    autocomplete="off"
                                >

                            </div>

                        </div>

                        <!-- =========================================================
                             EMAIL
                        ========================================================== -->

                        <div class="col-12">

                            <label class="form-label">

                                Email Address

                            </label>

                            <div class="enquiry-input-group">

                                <span class="input-icon">

                                    <i class="fa-solid fa-envelope"></i>

                                </span>

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Enter email address"
                                    maxlength="100"
                                >

                            </div>

                        </div>

                        <!-- =========================================================
                             MESSAGE
                        ========================================================== -->

                        <div class="col-12">

                            <label class="form-label">

                                Message

                            </label>

                            <div class="enquiry-input-group textarea-group">

                                <span class="input-icon">

                                    <i class="fa-solid fa-comment-dots"></i>

                                </span>

                                <textarea
                                    class="form-control"
                                    rows="5"
                                    name="message"
                                    placeholder="Write your message..."
                                    maxlength="1000"
                                ></textarea>

                            </div>

                        </div>

                        <!-- =========================================================
                             BUTTON
                        ========================================================== -->

                        <div class="col-12">

                            <button
                                type="submit"
                                class="btn enquiry-submit-btn"
                            >

                                <span>

                                    Submit Enquiry

                                </span>

                                <i class="fa-solid fa-paper-plane"></i>

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- =========================================================
     ACCESSIBILITY + MODAL FIX
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const enquiryModal =
        document.getElementById('enquiryModal');

    if (!enquiryModal) {

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | MODAL OPEN
    |--------------------------------------------------------------------------
    */

    enquiryModal.addEventListener(
        'shown.bs.modal',
        function () {

            document
                .querySelector('main.main-wrapper')
                ?.removeAttribute('aria-hidden');

            requestAnimationFrame(() => {

                const firstInput =
                    enquiryModal.querySelector(
                        'input[name="name"]'
                    );

                if (firstInput) {

                    firstInput.focus();
                }

            });

        }
    );

    /*
    |--------------------------------------------------------------------------
    | MODAL CLOSE
    |--------------------------------------------------------------------------
    */

    enquiryModal.addEventListener(
        'hidden.bs.modal',
        function () {

            if (document.activeElement) {

                document.activeElement.blur();
            }

            document.body.classList.remove(
                'modal-open'
            );

            document.body.style.overflow =
                '';

            document.body.style.paddingRight =
                '';

            document
                .querySelectorAll('.modal-backdrop')
                .forEach(backdrop => {

                    backdrop.remove();
                });

        }
    );

});

</script>