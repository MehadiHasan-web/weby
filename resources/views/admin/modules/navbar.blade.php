<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 fw-bold text-info" href="index.html">Weby</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>


    <div class="form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <button type="button" class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#note"> <i class="bi bi-journal-bookmark"></i></button>
        <button type="button" class="btn btn-success  btn-sm" data-bs-toggle="modal" data-bs-target="#whatsapp"> <i class="bi bi-whatsapp"></i> </button>
        <button type="button" class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#notice"> <i class="bi bi-bell"></i> </button>

    </div>


    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropPass" class="dropdown-item" >Change Password</button></li>
                {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('post')
                    <li><button type="submit" class="dropdown-item">Logout</button></li>
                </form>
            </ul>
        </li>
    </ul>
</nav>

<!-- whatsapp  -->
<div class="modal fade" id="whatsapp" tabindex="-1" aria-labelledby="whatsappLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        {{-- body --}}
        @livewire('send-message')
      </div>
    </div>
</div>
<!-- note  -->
<div class="modal fade" id="note" tabindex="-1" aria-labelledby="noteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h1 class=" modal-title fs-5 fs-5" >Note</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @livewire('note-book')
      </div>
    </div>
</div>
<!-- notice  -->
<div class="modal fade" id="notice" tabindex="-1" aria-labelledby="noticeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h1 class=" modal-title fs-5 fs-5" >Notice Board</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @livewire('notice')
      </div>
    </div>
</div>

<!-- change password -->
<div class="modal fade" id="staticBackdropPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropPassword" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropPassword">Change Password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form action="{{ route('change.password') }}" method="POST" >
            @csrf
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                    <input name="password" type="password" class="form-control" placeholder="password" aria-label="Password" aria-describedby="basic-addon1" required>

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="password" aria-label="Confirm password" aria-describedby="basic-addon1" required>
                </div>
                @error('password')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

      </div>
    </div>
</div>
