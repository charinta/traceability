@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">

        {{-- FORM INSERT USER ACCOUNT --}}
        <div class="container-fluid py-4">
            <div class="row">
                {{-- form header --}}
                <div class="col-12 col-xl-3 pr-15">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>User Account </b></h4>
                            <hr class="text-light">
                        </div>
                        {{-- form body --}}
                        <div class="card-body">
                            <form action="{{ route('user-account.storeUser') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username" class="form-control-label text-light">Nama</label>
                                    <input class="form-control" type="text" name="username" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="npk" class="form-control-label text-light">NPK</label>
                                    <input class="form-control" type="text" name="npk" placeholder="Masukkan NPK">
                                </div>
                                <div class="form-group">
                                    <label for="pos_id" class="form-control-label text-light"
                                        name="pos_id">Pos</label><br>
                                    <select class="form-select" name="pos_id">
                                        {{-- tanpa relasi --}}
                                        <option value="">---Pilih Pos---</option>
                                        <option value="marking">Marking</option>
                                        <option value="dolly-tool-supply">Dolly Tool Supply</option>
                                        <option value="tools-input">Tools Input</option>
                                        <option value="disasemmbly">Disasemmbly</option>
                                        <option value="washing">Washing</option>
                                        <option value="regrinding-auto">Regrinding Auto</option>
                                        <option value="regrinding-manual">Regrinding Manual</option>
                                        <option value="pre-assembly">Pre-Assembly</option>
                                        <option value="setting-tool-mc-nt">Setting Tool Mc NT</option>
                                        <option value="setting-tool-mc-spe">Setting Tool Mc Spe</option>
                                        <option value="setting-tool-mc-zol">Setting Tool Mc Zol</option>

                                        {{-- pake relasi ke tabel pos --}}
                                        {{-- @foreach ($user as $use)
                                            <option value="{{ $use->pos_id }}">{{ $use->pos_name }}</option>
                                        @endforeach --}}
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-control-label text-light" name="role">Role</label>
                                    <br>
                                    <select class="form-select" name="role">
                                        <option value="">---Pilih Role---</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label text-light">Password</label>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Masukkan Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                        User</button>
                                </div>

                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- FORM USER ACCOUNT ENDS --}}


                {{-- TABEL USER ACCOUNT START --}}
                <div class="col-xl-9">
                    <div class="card mt-n4">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">User Account Table</h6>
                            <br>
                            <div class="table-responsive">
                                <table class="table">
                                    {{-- table header --}}
                                    <thead align="center">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Nama Karyawan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                NPK</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Station</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Role</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Password</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    {{-- table body --}}
                                    <tbody align="center">
                                        @foreach ($user as $users)
                                            <tr>
                                                <td>{{ $users->id }}</td>
                                                <td>{{ $users->username }}</td>
                                                <td>{{ $users->npk }}</td>

                                                {{-- mau dijadiin relasi tapi belum --}}
                                                <td>{{ $users->pos_id }}</td>

                                                <td>{{ $users->role }}</td>
                                                <td>{{ $users->password }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                        action="{{ route('user-account.destroy', $users->id) }}"
                                                        method="POST">
                                                        {{-- icon edit --}}
                                                        <button type="button">
                                                            <a href="{{ route('user-account.editUser', $users->id) }}">
                                                                <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z"
                                                                            fill="#0F0F0F"></path>
                                                                    </g>
                                                                </svg>
                                                            </a></button>
                                                        {{-- icon delete --}}
                                                        <button type="submit"> <svg width="18px" height="18px"
                                                                viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path d="M10 12V17" stroke="#000000"
                                                                        stroke-width="2" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path d="M14 12V17" stroke="#000000"
                                                                        stroke-width="2" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path d="M4 7H20" stroke="#000000"
                                                                        stroke-width="2" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                                        stroke="#000000" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                        stroke="#000000" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg></button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- pagination --}}
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:;" tabindex="-1">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                                        <li class="page-item "><a class="page-link" href="javascript:;">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="javascript:;">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">5</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:;">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
