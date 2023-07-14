<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="card">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
                <img src="../assets/img/daihatsu.png" class="navbar-brand-img h-100" alt="...">
                <span class="ms-3 font-weight-bold">MASTER DATA MANAGEMENT</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#ffffff" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            {{-- warna hitam --}}
                                            <path class="color-background opacity-6"
                                                d="M501.62 92.11L267.24 2.04a31.958 31.958 0 0 0-22.47 0L10.38 92.11A16.001 16.001 0 0 0 0 107.09V144c0 8.84 7.16 16 16 16h480c8.84 0 16-7.16 16-16v-36.91c0-6.67-4.14-12.64-10.38-14.98zM64 192v160H48c-8.84 0-16 7.16-16 16v48h448v-48c0-8.84-7.16-16-16-16h-16V192h-64v160h-96V192h-64v160h-96V192H64zm432 256H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h480c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z">
                                            </path>
                                            {{-- warna putih saat hover --}}
                                            <path class="color-background"
                                                d="M501.62 92.11L267.24 2.04a31.958 31.958 0 0 0-22.47 0L10.38 92.11A16.001 16.001 0 0 0 0 107.09V144c0 8.84 7.16 16 16 16h480c8.84 0 16-7.16 16-16v-36.91c0-6.67-4.14-12.64-10.38-14.98zM64 192v160H48c-8.84 0-16 7.16-16 16v48h448v-48c0-8.84-7.16-16-16-16h-16V192h-64v160h-96V192h-64v160h-96V192H64zm432 256H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h480c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z">
                                            </path>
                                        </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('user-account') ? 'active' : '' }}" href="{{ url('user-account') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#000000" width="248px" height="248px"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path class="color-background opacity-6"
                                    d="M4,7A4,4,0,1,0,8,3,4,4,0,0,0,4,7Zm6,0A2,2,0,1,1,8,5,2,2,0,0,1,10,7ZM2,21H14a1,1,0,0,0,1-1V17a4,4,0,0,0-4-4H5a4,4,0,0,0-4,4v3A1,1,0,0,0,2,21Zm1-4a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2v2H3ZM23,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,4Zm0,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,8Zm0,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,12Z">
                                </path>
                                <path class="color-background"
                                    d="M4,7A4,4,0,1,0,8,3,4,4,0,0,0,4,7Zm6,0A2,2,0,1,1,8,5,2,2,0,0,1,10,7ZM2,21H14a1,1,0,0,0,1-1V17a4,4,0,0,0-4-4H5a4,4,0,0,0-4,4v3A1,1,0,0,0,2,21Zm1-4a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2v2H3ZM23,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,4Zm0,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,8Zm0,4a1,1,0,0,1-1,1H16a1,1,0,0,1,0-2h6A1,1,0,0,1,23,12Z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">User Account</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-pos') ? 'active' : '' }}" href="{{ url('register-pos') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#000000" height="200px" width="200px" version="1.1"
                            id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path class="color-background opacity-6"
                                    d="M240.3,396.8L240.3,396.8c3.3,5.1,9.1,8.5,15.7,8.5c6.6,0,12.4-3.4,15.8-8.5l110.2-170.2c14.8-22.9,23.4-48.1,23.4-77.3 C405.3,64.9,339,0,256,0c-83,0-149.3,64.9-149.3,149.3c0,29.2,8.6,54.4,23.4,77.3L240.3,396.8z M256,64c47.1,0,85.3,38.2,85.3,85.3 s-38.2,85.3-85.3,85.3s-85.3-38.2-85.3-85.3S208.9,64,256,64z M365.4,323.5L256,469.3L146.6,323.5c-37.4,19.6-61.3,48.9-61.3,81.8 C85.3,464.2,161.7,512,256,512s170.7-47.8,170.7-106.7C426.7,372.4,402.8,343.1,365.4,323.5z">
                                </path>
                                <path class="color-background"
                                    d="M240.3,396.8L240.3,396.8c3.3,5.1,9.1,8.5,15.7,8.5c6.6,0,12.4-3.4,15.8-8.5l110.2-170.2c14.8-22.9,23.4-48.1,23.4-77.3 C405.3,64.9,339,0,256,0c-83,0-149.3,64.9-149.3,149.3c0,29.2,8.6,54.4,23.4,77.3L240.3,396.8z M256,64c47.1,0,85.3,38.2,85.3,85.3 s-38.2,85.3-85.3,85.3s-85.3-38.2-85.3-85.3S208.9,64,256,64z M365.4,323.5L256,469.3L146.6,323.5c-37.4,19.6-61.3,48.9-61.3,81.8 C85.3,464.2,161.7,512,256,512s170.7-47.8,170.7-106.7C426.7,372.4,402.8,343.1,365.4,323.5z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Register Pos</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-line-op') ? 'active' : '' }}"
                    href="{{ url('register-line-op') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#000000" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 40.875 40.875" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path class="color-background opacity-6"
                                        d="M40.875,28.344v8.375c0,0.828-0.674,1.5-1.5,1.5H31c-0.828,0-1.5-0.672-1.5-1.5v-8.375c0-0.828,0.672-1.5,1.5-1.5h2.188 v-4.438h-11.25v4.438h2.688c0.828,0,1.5,0.672,1.5,1.5v8.375c0,0.828-0.672,1.5-1.5,1.5H16.25c-0.828,0-1.5-0.672-1.5-1.5v-8.375 c0-0.828,0.672-1.5,1.5-1.5h2.687v-4.438H7.687v4.438h2.188c0.827,0,1.5,0.672,1.5,1.5v8.375c0,0.828-0.673,1.5-1.5,1.5H1.5 c-0.828,0-1.5-0.672-1.5-1.5v-8.375c0-0.828,0.672-1.5,1.5-1.5h3.188v-5.938c0-0.826,0.672-1.5,1.5-1.5h12.75v-5.375H16.25 c-0.828,0-1.5-0.672-1.5-1.5V4.156c0-0.827,0.672-1.5,1.5-1.5h8.375c0.828,0,1.5,0.673,1.5,1.5v8.375c0,0.828-0.672,1.5-1.5,1.5 h-2.688v5.375h12.75c0.826,0,1.5,0.674,1.5,1.5v5.938h3.188C40.201,26.844,40.875,27.516,40.875,28.344z">
                                    </path>
                                    <path class="color-background"
                                        d="M40.875,28.344v8.375c0,0.828-0.674,1.5-1.5,1.5H31c-0.828,0-1.5-0.672-1.5-1.5v-8.375c0-0.828,0.672-1.5,1.5-1.5h2.188 v-4.438h-11.25v4.438h2.688c0.828,0,1.5,0.672,1.5,1.5v8.375c0,0.828-0.672,1.5-1.5,1.5H16.25c-0.828,0-1.5-0.672-1.5-1.5v-8.375 c0-0.828,0.672-1.5,1.5-1.5h2.687v-4.438H7.687v4.438h2.188c0.827,0,1.5,0.672,1.5,1.5v8.375c0,0.828-0.673,1.5-1.5,1.5H1.5 c-0.828,0-1.5-0.672-1.5-1.5v-8.375c0-0.828,0.672-1.5,1.5-1.5h3.188v-5.938c0-0.826,0.672-1.5,1.5-1.5h12.75v-5.375H16.25 c-0.828,0-1.5-0.672-1.5-1.5V4.156c0-0.827,0.672-1.5,1.5-1.5h8.375c0.828,0,1.5,0.673,1.5,1.5v8.375c0,0.828-0.672,1.5-1.5,1.5 h-2.688v5.375h12.75c0.826,0,1.5,0.674,1.5,1.5v5.938h3.188C40.201,26.844,40.875,27.516,40.875,28.344z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Register Line & OP</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-tool') ? 'active' : '' }}"
                    href="{{ url('register-tool') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#000000" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path class="color-background opacity-6"
                                    d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z">
                                </path>
                                <path class="color-background"
                                    d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z">
                                </path>

                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Register Tool</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-holder') ? 'active' : '' }}"
                    href="{{ url('register-holder') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" fill="#000000" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path class="color-background opacity-6"
                                    d="M502.63 214.63l-45.25-45.25c-6-6-14.14-9.37-22.63-9.37H384V80c0-26.51-21.49-48-48-48H176c-26.51 0-48 21.49-48 48v80H77.25c-8.49 0-16.62 3.37-22.63 9.37L9.37 214.63c-6 6-9.37 14.14-9.37 22.63V320h128v-16c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v16h128v-16c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v16h128v-82.75c0-8.48-3.37-16.62-9.37-22.62zM320 160H192V96h128v64zm64 208c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-16H192v16c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-16H0v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96H384v16z">
                                </path>
                                <path class="color-background"
                                    d="M502.63 214.63l-45.25-45.25c-6-6-14.14-9.37-22.63-9.37H384V80c0-26.51-21.49-48-48-48H176c-26.51 0-48 21.49-48 48v80H77.25c-8.49 0-16.62 3.37-22.63 9.37L9.37 214.63c-6 6-9.37 14.14-9.37 22.63V320h128v-16c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v16h128v-16c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v16h128v-82.75c0-8.48-3.37-16.62-9.37-22.62zM320 160H192V96h128v64zm64 208c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-16H192v16c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-16H0v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96H384v16z">
                                </path>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Register Holder</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-standar') ? 'active' : '' }}"
                    href="{{ url('register-standar') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                            fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g fill="#000000">
                                    <path fill-rule="evenodd" class="color-background opacity-6"
                                        d="M3.25 2.5H4v.25C4 3.44 4.56 4 5.25 4h5.5C11.44 4 12 3.44 12 2.75V2.5h.75a.75.75 0 01.75.75v3a.75.75 0 001.5 0v-3A2.25 2.25 0 0012.75 1h-.775c-.116-.57-.62-1-1.225-1h-5.5c-.605 0-1.11.43-1.225 1H3.25A2.25 2.25 0 001 3.25v10.5A2.25 2.25 0 003.25 16h9.5A2.25 2.25 0 0015 13.75v-1a.75.75 0 00-1.5 0v1a.75.75 0 01-.75.75h-9.5a.75.75 0 01-.75-.75V3.25a.75.75 0 01.75-.75zm2.25-1v1h5v-1h-5z"
                                        clip-rule="evenodd"></path>
                                    <path class="color-background opacity-6"
                                        d="M4.75 5.5a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3zM4 12.25a.75.75 0 01.75-.75h3a.75.75 0 010 1.5h-3a.75.75 0 01-.75-.75zM4.75 8.5a.75.75 0 000 1.5h2a.75.75 0 000-1.5h-2zM16 9.25a.75.75 0 01-.75.75h-4.19l1.22 1.22a.75.75 0 11-1.06 1.06l-2.5-2.5a.752.752 0 010-1.06l2.5-2.5a.75.75 0 111.06 1.06L11.06 8.5h4.19a.75.75 0 01.75.75z">
                                    </path>
                                    <path fill-rule="evenodd" class="color-background"
                                        d="M3.25 2.5H4v.25C4 3.44 4.56 4 5.25 4h5.5C11.44 4 12 3.44 12 2.75V2.5h.75a.75.75 0 01.75.75v3a.75.75 0 001.5 0v-3A2.25 2.25 0 0012.75 1h-.775c-.116-.57-.62-1-1.225-1h-5.5c-.605 0-1.11.43-1.225 1H3.25A2.25 2.25 0 001 3.25v10.5A2.25 2.25 0 003.25 16h9.5A2.25 2.25 0 0015 13.75v-1a.75.75 0 00-1.5 0v1a.75.75 0 01-.75.75h-9.5a.75.75 0 01-.75-.75V3.25a.75.75 0 01.75-.75zm2.25-1v1h5v-1h-5z"
                                        clip-rule="evenodd"></path>
                                    <path class="color-background"
                                        d="M4.75 5.5a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3zM4 12.25a.75.75 0 01.75-.75h3a.75.75 0 010 1.5h-3a.75.75 0 01-.75-.75zM4.75 8.5a.75.75 0 000 1.5h2a.75.75 0 000-1.5h-2zM16 9.25a.75.75 0 01-.75.75h-4.19l1.22 1.22a.75.75 0 11-1.06 1.06l-2.5-2.5a.752.752 0 010-1.06l2.5-2.5a.75.75 0 111.06 1.06L11.06 8.5h4.19a.75.75 0 01.75.75z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Register Standar</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('resume-dashboard') ? 'active' : '' }}"
                    href="{{ url('resume-dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" class="color-background opacity-6"
                                    d="M1 5C1 3.34315 2.34315 2 4 2H8.43845C9.81505 2 11.015 2.93689 11.3489 4.27239L11.7808 6H13.5H20C21.6569 6 23 7.34315 23 9V11C23 11.5523 22.5523 12 22 12C21.4477 12 21 11.5523 21 11V9C21 8.44772 20.5523 8 20 8H13.5H11.7808H4C3.44772 8 3 8.44772 3 9V10V19C3 19.5523 3.44772 20 4 20H9C9.55228 20 10 20.4477 10 21C10 21.5523 9.55228 22 9 22H4C2.34315 22 1 20.6569 1 19V10V9V5ZM3 6.17071C3.31278 6.06015 3.64936 6 4 6H9.71922L9.40859 4.75746C9.2973 4.3123 8.89732 4 8.43845 4H4C3.44772 4 3 4.44772 3 5V6.17071ZM20.1716 18.7574C20.6951 17.967 21 17.0191 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21C17.0191 21 17.967 20.6951 18.7574 20.1716L21.2929 22.7071C21.6834 23.0976 22.3166 23.0976 22.7071 22.7071C23.0976 22.3166 23.0976 21.6834 22.7071 21.2929L20.1716 18.7574ZM13 16C13 14.3431 14.3431 13 16 13C17.6569 13 19 14.3431 19 16C19 17.6569 17.6569 19 16 19C14.3431 19 13 17.6569 13 16Z"
                                    fill="#000000"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" class="color-background"
                                    d="M1 5C1 3.34315 2.34315 2 4 2H8.43845C9.81505 2 11.015 2.93689 11.3489 4.27239L11.7808 6H13.5H20C21.6569 6 23 7.34315 23 9V11C23 11.5523 22.5523 12 22 12C21.4477 12 21 11.5523 21 11V9C21 8.44772 20.5523 8 20 8H13.5H11.7808H4C3.44772 8 3 8.44772 3 9V10V19C3 19.5523 3.44772 20 4 20H9C9.55228 20 10 20.4477 10 21C10 21.5523 9.55228 22 9 22H4C2.34315 22 1 20.6569 1 19V10V9V5ZM3 6.17071C3.31278 6.06015 3.64936 6 4 6H9.71922L9.40859 4.75746C9.2973 4.3123 8.89732 4 8.43845 4H4C3.44772 4 3 4.44772 3 5V6.17071ZM20.1716 18.7574C20.6951 17.967 21 17.0191 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21C17.0191 21 17.967 20.6951 18.7574 20.1716L21.2929 22.7071C21.6834 23.0976 22.3166 23.0976 22.7071 22.7071C23.0976 22.3166 23.0976 21.6834 22.7071 21.2929L20.1716 18.7574ZM13 16C13 14.3431 14.3431 13 16 13C17.6569 13 19 14.3431 19 16C19 17.6569 17.6569 19 16 19C14.3431 19 13 17.6569 13 16Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Resume Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ Request::is('register-item') ? 'active' : '' }}"
                    href="{{ url('register-item') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path class="color-background opacity-6"
                                    d="M7 2H6C3 2 2 3.79 2 6V7V21C2 21.83 2.94 22.3 3.6 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.29 22.29C8.68 22.68 9.32 22.68 9.71 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7ZM5.97 14.01C5.42 14.01 4.97 13.56 4.97 13.01C4.97 12.46 5.42 12.01 5.97 12.01C6.52 12.01 6.97 12.46 6.97 13.01C6.97 13.56 6.52 14.01 5.97 14.01ZM5.97 10.01C5.42 10.01 4.97 9.56 4.97 9.01C4.97 8.46 5.42 8.01 5.97 8.01C6.52 8.01 6.97 8.46 6.97 9.01C6.97 9.56 6.52 10.01 5.97 10.01ZM12 13.76H9C8.59 13.76 8.25 13.42 8.25 13.01C8.25 12.6 8.59 12.26 9 12.26H12C12.41 12.26 12.75 12.6 12.75 13.01C12.75 13.42 12.41 13.76 12 13.76ZM12 9.76H9C8.59 9.76 8.25 9.42 8.25 9.01C8.25 8.6 8.59 8.26 9 8.26H12C12.41 8.26 12.75 8.6 12.75 9.01C12.75 9.42 12.41 9.76 12 9.76Z"
                                    fill="#292D32"></path>
                                <path class="color-background opacity-6"
                                    d="M18.01 2V3.5C18.67 3.5 19.3 3.77 19.76 4.22C20.24 4.71 20.5 5.34 20.5 6V8.42C20.5 9.16 20.17 9.5 19.42 9.5H17.5V4.01C17.5 3.73 17.73 3.5 18.01 3.5V2ZM18.01 2C16.9 2 16 2.9 16 4.01V11H19.42C21 11 22 10 22 8.42V6C22 4.9 21.55 3.9 20.83 3.17C20.1 2.45 19.11 2.01 18.01 2C18.02 2 18.01 2 18.01 2Z"
                                    fill="#292D32"></path>
                                <path class="color-background"
                                    d="M7 2H6C3 2 2 3.79 2 6V7V21C2 21.83 2.94 22.3 3.6 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.29 22.29C8.68 22.68 9.32 22.68 9.71 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7ZM5.97 14.01C5.42 14.01 4.97 13.56 4.97 13.01C4.97 12.46 5.42 12.01 5.97 12.01C6.52 12.01 6.97 12.46 6.97 13.01C6.97 13.56 6.52 14.01 5.97 14.01ZM5.97 10.01C5.42 10.01 4.97 9.56 4.97 9.01C4.97 8.46 5.42 8.01 5.97 8.01C6.52 8.01 6.97 8.46 6.97 9.01C6.97 9.56 6.52 10.01 5.97 10.01ZM12 13.76H9C8.59 13.76 8.25 13.42 8.25 13.01C8.25 12.6 8.59 12.26 9 12.26H12C12.41 12.26 12.75 12.6 12.75 13.01C12.75 13.42 12.41 13.76 12 13.76ZM12 9.76H9C8.59 9.76 8.25 9.42 8.25 9.01C8.25 8.6 8.59 8.26 9 8.26H12C12.41 8.26 12.75 8.6 12.75 9.01C12.75 9.42 12.41 9.76 12 9.76Z"
                                    fill="#ffffff"></path>
                                <path class="color-background"
                                    d="M18.01 2V3.5C18.67 3.5 19.3 3.77 19.76 4.22C20.24 4.71 20.5 5.34 20.5 6V8.42C20.5 9.16 20.17 9.5 19.42 9.5H17.5V4.01C17.5 3.73 17.73 3.5 18.01 3.5V2ZM18.01 2C16.9 2 16 2.9 16 4.01V11H19.42C21 11 22 10 22 8.42V6C22 4.9 21.55 3.9 20.83 3.17C20.1 2.45 19.11 2.01 18.01 2C18.02 2 18.01 2 18.01 2Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Register Item</span>
                </a>
            </li>

</aside>
