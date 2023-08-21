
<nav class="navbar navbar-expand-sm shadow-none">
    <div class="container-fluid {{ Request::is('static-sign-up') ? 'container' : 'container-fluid' }}">
        <a class="font-weight-bolder navbar-brand text-gradient text-primary">
            @if (Request::is('dashboard'))
                Dashboard
            @elseif(Request::is('resume-dashboard'))
                Overview Resume Dashboard
            @elseif(Request::is('resume-tool'))
                Overview Resume Tool
            @elseif(Request::is('resume-holder'))
                Overview Resume Holder
            @elseif(Request::is('historical-data'))
                Historical Data
            @endif
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
             <!-- icon settings -->
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('') : url('#') }}">
                        <i class="fas fa-cog opacity-6 me-1 {{ Request::is('#') ? 'active' : '' }}"></i>
                    </a>
                </li>
                <!-- icon notifications -->
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ auth()->user() ? url('#') : url('#') }}">
                        <i class="fas fa-bell opacity-6 me-1 {{ Request::is('#') ? 'active' : '' }}"></i>
                    </a>
                </li>
                <!-- icon profile -->
                <li class="nav-item dropdown-show pe-2 d-flex align-items-center">
                    <a class="nav-link me-2 text-primary me-3 dropdown-toggle" role="button" href="#" id="navbarDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle cursor-pointer"></i> {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm" aria-labelledby="navbarDropdown">
                                <li>
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn dropdown-item text-dark">
                                <i class="fa fa-sign-out text-dark"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
                </li>

                
                {{-- icon sidenav --}}
                <li class="nac-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
