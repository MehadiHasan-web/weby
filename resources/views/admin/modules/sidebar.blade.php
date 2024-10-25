<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @hasrole('admin')
                    <div class="sb-sidenav-menu-heading">Institutes</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Institutes"
                        aria-expanded="false" aria-controls="Institutes">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Institutes
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Institutes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('institute.index') }}">All Institutes</a>
                            <a class="nav-link" href="{{ route('institute.create') }}">Create Institutes</a>
                        </nav>
                    </div>
                @endhasrole

                @hasrole('moderator')
                    <div class="sb-sidenav-menu-heading">Student's</div>
                    <a class="nav-link" href="{{ route('student.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Students
                    </a>
                    <a class="nav-link" href="{{ route('batch.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Batch's
                    </a>
                    <a class="nav-link" href="{{ route('teacher.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                        Teacher's
                    </a>
                    <a class="nav-link" href="{{ route('exam.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                        Exam's
                    </a>

                    <div class="sb-sidenav-menu-heading">Attendance</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#teacher-attendance-report" aria-expanded="false"
                        aria-controls="teacher-attendance-report">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Attendance
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="teacher-attendance-report" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('attendance') }}">Student Attendance</a>
                            <a class="nav-link" href="{{ route('teacher.attendance') }}">Teacher Attendance</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Attendance Report</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#teacher-attendance" aria-expanded="false" aria-controls="teacher-attendance">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Attendance report
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="teacher-attendance" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('attendance.report') }}">Student report</a>
                            <a class="nav-link" href="{{ route('teacher.report') }}">Teacher report</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Payment</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#FEE"
                        aria-expanded="false" aria-controls="FEE">
                        <div class="sb-nav-link-icon"><i class="fas fa-account"></i></div>
                        Payment
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="FEE" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('student.payment.index') }}">Student Payment</a>
                            <a class="nav-link" href="{{ route('teacher.payment') }}">Teacher Payment</a>
                        </nav>
                    </div>
                @endhasrole
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>
