<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
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

                <div class="sb-sidenav-menu-heading">Students</div>
                <a class="nav-link" href="{{ route('students.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Students
                </a>
                <a class="nav-link" href="{{ route('batch.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Batchs
                </a>
                <a class="nav-link" href="{{ route('teacher.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                    Teacher
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
