<div class="card border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">

                <i class="fas fa-graduation-cap me-2"></i>

                Education Details

            </h5>

            <button type="button"
                    class="btn btn-primary btn-sm"
                    id="addEducation">

                <i class="fas fa-plus"></i>

                Add More

            </button>

        </div>

        <div id="educationWrapper">

            <div class="education-item border rounded p-3 mb-3">

                <div class="row">

                    <!-- Certificate Name -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Certificate Name

                        </label>

                        <input type="text"
                               name="certificate_name[]"
                               class="form-control">

                        <small class="text-danger error-certificate_name"></small>

                    </div>

                    <!-- Institute Name -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Institute Name

                        </label>

                        <input type="text"
                               name="institute_name[]"
                               class="form-control">

                        <small class="text-danger error-institute_name"></small>

                    </div>

                    <!-- Year -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Year of Completion

                        </label>

                        <input type="number"
                               name="year_of_completion[]"
                               class="form-control">

                        <small class="text-danger error-year_of_completion"></small>

                    </div>

                    <!-- Upload -->

                    <div class="col-md-10 mb-3">

                        <label class="form-label">

                            Certificate

                        </label>

                        <input type="file"
                               name="document_file[]"
                               class="form-control">

                        <small class="text-danger error-document_file"></small>

                    </div>

                    <!-- Remove -->

                    <div class="col-md-2 d-flex align-items-end mb-3">

                        <button type="button"
                                class="btn btn-danger removeEducation w-100">

                            <i class="fas fa-trash"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<template id="educationTemplate">

    <div class="education-item border rounded p-3 mb-3">

        <div class="row">

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Certificate Name

                </label>

                <input type="text"
                       name="certificate_name[]"
                       class="form-control">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Institute Name

                </label>

                <input type="text"
                       name="institute_name[]"
                       class="form-control">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Year of Completion

                </label>

                <input type="number"
                       name="year_of_completion[]"
                       class="form-control">

            </div>

            <div class="col-md-10 mb-3">

                <label class="form-label">

                    Certificate

                </label>

                <input type="file"
                       name="document_file[]"
                       class="form-control">

            </div>

            <div class="col-md-2 d-flex align-items-end mb-3">

                <button type="button"
                        class="btn btn-danger removeEducation w-100">

                    <i class="fas fa-trash"></i>

                </button>

            </div>

        </div>

    </div>

</template>