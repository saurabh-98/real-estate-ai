<footer class="realestate-footer">

    <div class="container-fluid">

        <div class="realestate-footer-wrapper">

            <!-- ==========================================
            | BRAND
            =========================================== -->

            <div class="realestate-footer-left">

                <div class="footer-brand">

                    <div class="footer-logo">

                        <i class="fa-solid fa-users-gear"></i>

                    </div>

                    <div>

                        <h5>Employee Management System</h5>

                        <p>
                            Smart HR Management • Employee Records • Workforce Analytics
                        </p>

                    </div>

                </div>

            </div>

            <!-- ==========================================
            | FEATURES
            =========================================== -->

            <div class="realestate-footer-center">

                <div class="footer-property-status">

                    <div class="status-item">
                        <i class="fa-solid fa-users"></i>
                        <span>Employee Records</span>
                    </div>

                    <div class="status-item">
                        <i class="fa-solid fa-user-check"></i>
                        <span>Verified Profiles</span>
                    </div>

                    <div class="status-item">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Education Details</span>
                    </div>

                    <div class="status-item">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>HR Analytics</span>
                    </div>

                </div>

            </div>

            <!-- ==========================================
            | LINKS
            =========================================== -->

            <div class="realestate-footer-right">

                <div class="footer-links">

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.employees.index') }}">
                        Employees
                    </a>

                    <a href="{{ route('login') }}">
                        Admin Login
                    </a>

                </div>

                <div class="footer-social">

                    <a href="#" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" aria-label="Linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="#" aria-label="Github">
                        <i class="fab fa-github"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- ==========================================
        | FOOTER BOTTOM
        =========================================== -->

        <div class="realestate-footer-bottom">

            <div>

                © {{ date('Y') }}

                <strong>Employee Management System</strong>

                | All Rights Reserved

            </div>

            <div>

                Workforce Management Solution

                <span>|</span>

                Version 1.0.0

            </div>

        </div>

    </div>

</footer>