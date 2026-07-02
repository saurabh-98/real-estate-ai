<div class="row">

    <div class="col-md-3 text-center mb-4">

        <img id="photoPreview"
             src="https://via.placeholder.com/180x180?text=Photo"
             class="img-thumbnail rounded-circle shadow"
             style="width:180px;height:180px;object-fit:cover;">

        <div class="mt-3">

            <input type="file"
                   name="profile_photo"
                   id="profile_photo"
                   class="form-control">

            <small class="text-danger error-profile_photo"></small>

        </div>

    </div>

    <div class="col-md-9">

        <div class="row">

            <!-- Full Name -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Full Name <span class="text-danger">*</span>
                </label>

                <input type="text"
                       name="full_name"
                       class="form-control"
                       value="{{ old('full_name', auth()->user()->name) }}">

                <small class="text-danger error-full_name"></small>

            </div>

            <!-- Email -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', auth()->user()->email) }}"
                       readonly>

                <small class="text-danger error-email"></small>

            </div>

            <!-- Phone -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Phone Number
                </label>

                <input type="text"
                       name="phone_number"
                       class="form-control"
                       value="{{ old('phone_number') }}">

                <small class="text-danger error-phone_number"></small>

            </div>

            <!-- DOB -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Date of Birth
                </label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth') }}">

                <small class="text-danger error-date_of_birth"></small>

            </div>

            <!-- Gender -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Gender
                </label>

                <select name="gender" class="form-select">

                    <option value="">Select Gender</option>

                    <option value="male">Male</option>

                    <option value="female">Female</option>

                    <option value="other">Other</option>

                </select>

                <small class="text-danger error-gender"></small>

            </div>

            <!-- Address Line 1 -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Address Line 1
                </label>

                <input type="text"
                       name="address_line_1"
                       class="form-control"
                       value="{{ old('address_line_1') }}">

                <small class="text-danger error-address_line_1"></small>

            </div>

            <!-- Address Line 2 -->

            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Address Line 2
                </label>

                <input type="text"
                       name="address_line_2"
                       class="form-control"
                       value="{{ old('address_line_2') }}">

                <small class="text-danger error-address_line_2"></small>

            </div>

            <!-- City -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    City
                </label>

                <input type="text"
                       name="city"
                       class="form-control"
                       value="{{ old('city') }}">

                <small class="text-danger error-city"></small>

            </div>

            <!-- State -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    State
                </label>

                <input type="text"
                       name="state"
                       class="form-control"
                       value="{{ old('state') }}">

                <small class="text-danger error-state"></small>

            </div>

            <!-- Pincode -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Pincode
                </label>

                <input type="text"
                       name="pincode"
                       class="form-control"
                       value="{{ old('pincode') }}">

                <small class="text-danger error-pincode"></small>

            </div>

            <!-- Country -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Country
                </label>

                <input type="text"
                       name="country"
                       class="form-control"
                       value="{{ old('country','India') }}">

                <small class="text-danger error-country"></small>

            </div>

        </div>

    </div>

</div>