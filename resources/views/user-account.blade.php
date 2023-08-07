@extends('layouts.user_type.auth')

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

                            <form id="insert-form" action="{{ route('user-account.store') }}" method="POST"
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
                                    <label for="pos" class="form-control-label text-light"
                                        name="pos">Pos</label><br>
                                    <select class="form-select" name="pos">
                                        @foreach ($activePosNames as $posName)
                                            <option value="{{ $posName }}">{{ $posName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-control-label text-light" name="role">Role</label>
                                    <br>
                                    <select class="form-select" name="role">
                                        <option value="">---Pilih Role---</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
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
                {{-- FORM USER ACCOUNT END --}}


                {{-- Table --}}
                <div class="col-12 col-xl-9">
                    <div class="card mb-4 mt-n4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">User Account Table</h6>
                                <form class="form-inline" method="get" action="{{ route('user-account.search') }}">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <div class="input-group mb-4">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                    <input class="form-control" placeholder="Search" type="text"
                                                        name="search" value="{{ request('search') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table table-striped align-items-center justify-content-center mb-0">
            {{-- table header --}}
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        Nama Karyawan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        NPK</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        Station</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        Role</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        Password</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                        Action</th>
                </tr>
            </thead>
            {{-- table body --}}
            <tbody>
                @foreach ($user as $users)
                <tr>
                    <td class="text-xs font-weight-bold mb-0 text-center">{{ $users->id }}</td>
                    <td class="text-xs font-weight-bold mb-0 text-center">{{ $users->username }}</td>
                    <td class="text-xs font-weight-bold mb-0 text-center">{{ $users->npk }}</td>
                    <td class="text-xs font-weight-bold mb-0 text-center">{{ $users->pos }}</td>
                    <td class="text-xs font-weight-bold mb-0 text-center">{{ $users->role }}</td>
                    <td class="text-xs font-weight-bold mb-0 text-center" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $users->password }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm ('Apakah Anda Yakin?');" action="{{ route('user-account.destroy', $users->id) }}" method="POST">
                            {{-- icon edit --}}
                            <a href="{{ route('user-account.edit', $users->id) }}" class="edit_user btn btn-sm btn-primary fa fa-edit"></a>

                            {{-- icon delete --}}
                            @csrf
                            @method('DELETE') <button type="submit" class="delete_user btn btn-sm btn-danger fa fa-trash"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
                    </div>
                    <!-- Pagination Section -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{-- Previous Page Link --}}
                            @if ($user->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $user->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Page Links --}}
                            @foreach ($user->getUrlRange(1, $user->lastPage()) as $page => $url)
                                @if ($page == $user->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($user->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $user->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
