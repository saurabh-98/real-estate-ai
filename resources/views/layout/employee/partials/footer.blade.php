<footer class="employee-footer">

    <div class="container-fluid">

        <div class="row gy-4">

            <!-- =====================================================
                BRAND
            ====================================================== -->

            <div class="col-lg-4">

                <div class="employee-footer-brand">

                    <div class="footer-logo">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <div>

                        <h4>

                            Employee Manager

                        </h4>

                        <p>

                            Employee Management System built with Laravel 12.
                            Manage your profile, education, documents and
                            career records from one place.

                        </p>

                    </div>

                </div>

            </div>

            <!-- =====================================================
                QUICK LINKS
            ====================================================== -->

            <div class="col-lg-2 col-md-4">

                <h5>

                    Quick Links

                </h5>

                <ul class="footer-links">

                    <li>

                        <a href="{{ route('employee.profile.show') }}">

                            Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('employee.profile.edit') }}">

                            Edit Profile

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('employee.profile.show') }}">

                            My Profile

                        </a>

                    </li>

                </ul>

            </div>

            <!-- =====================================================
                SUPPORT
            ====================================================== -->

            <div class="col-lg-3 col-md-4">

                <h5>

                    Support

                </h5>

                <ul class="footer-links">

                    <li>

                        <a href="#">

                            Help Center

                        </a>

                    </li>

                    <li>

                        <a href="#">

                            Contact HR

                        </a>

                    </li>

                    <li>

                        <a href="#">

                            Privacy Policy

                        </a>

                    </li>

                </ul>

            </div>

            <!-- =====================================================
                ACCOUNT
            ====================================================== -->

            <div class="col-lg-3 col-md-4">

                <h5>

                    Account

                </h5>

                <div class="footer-user">

                    <div class="footer-avatar">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <div>

                        <strong>

                            {{ auth()->user()->name }}

                        </strong>

                        <small>

                            Employee

                        </small>

                    </div>

                </div>

            </div>

        </div>

        <hr>

        <!-- =====================================================
            COPYRIGHT
        ====================================================== -->

        <div class="employee-footer-bottom">

            <div>

                © {{ date('Y') }}

                Employee Manager

                • All Rights Reserved.

            </div>

            <div>

                Version 1.0.0

            </div>

        </div>

    </div>

</footer>