<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-50 translate-middle-x') }}" style="width: 80%;">
    <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
            <img src="../assets/img/astra.png" class="navbar-brand-img" style="width:5%; margin-right:7px" alt="...">
            PT. ASTRA DAIHATSU MOTOR
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if (Request::is('login'))
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('sign-up') : url('sign-up') }}">
                        <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('sign-up') ? '' : 'text-dark') }}"></i>
                        Sign Up
                    </a>
                    @elseif (Request::is('sign-up'))
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('login') : url('login') }}">
                        <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('login') ? '' : 'text-dark') }}"></i>
                        Login
                    </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
