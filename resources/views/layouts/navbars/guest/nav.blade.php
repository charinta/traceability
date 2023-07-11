<!-- Navbar -->
<nav class="navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ Request::is('static-sign-up') ? 'w-100 navbar-transparent mt-4' : 'py-2 start-0 end-0 mx4' }}">
    <div class="container-fluid {{ Request::is('static-sign-up') ? 'container' : 'container-fluid' }}">
        <a class="font-weight-bolder ms-lg-0 {{ Request::is('static-sign-up') ? 'text-white' : '' }}" href="{{ url('dashboard') }}">
            Dashboard
        </a>
        <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ url('profile') }}">
                        <i class="fa fa-user opacity-6 me-1 {{ Request::is('static-sign-up') ? '' : 'text-dark' }}"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-up') : url('register') }}">
                        <i class="fas fa-user-circle opacity-6 me-1 {{ Request::is('static-sign-up') ? '' : 'text-dark' }}"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-in') : url('login') }}">
                        <i class="fas fa-key opacity-6 me-1 {{ Request::is('static-sign-up') ? '' : 'text-dark' }}"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
