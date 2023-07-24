@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">

        {{-- <!--FORM USER ACCOUNT --> ini setelah diupdate belum mau redirect ke view sebelumnya --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-3 pr-15">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Update User Account </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user-account.updateUser', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama-user" class="form-control-label text-light">Nama</label>
                                    <input class="form-control" type="text" name="username"
                                        value="{{ old('username', $user->username) }}" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="npk" class="form-control-label text-light">NPK</label>
                                    <input class="form-control" type="text" name="npk"
                                        value="{{ old('npk', $user->npk) }}" placeholder="Masukkan NPK">
                                </div>
                                <div class="form-group">
                                    <label for="pos_id" class="form-control-label text-light">Pos</label><br>
                                    <select class="form-select" name="pos_id">
                                        <option value="">---Pilih Pos---</option>
                                        <option value="marking" @if ($user->pos_id === 'marking') selected @endif>Marking
                                        </option>
                                        <option value="dolly-tool-supply" @if ($user->pos_id === 'dolly-tool-supply') selected @endif>
                                            Dolly Tool Supply</option>
                                        <option value="tools-input" @if ($user->pos_id === 'tools-input') selected @endif>Tools
                                            Input</option>
                                        <option value="disasemmbly" @if ($user->pos_id === 'disasemmbly') selected @endif>
                                            Disasemmbly</option>
                                        <option value="washing" @if ($user->pos_id === 'washing') selected @endif>Washing
                                        </option>
                                        <option value="regrinding-auto" @if ($user->pos_id === 'regrinding-auto') selected @endif>
                                            Regrinding Auto</option>
                                        <option value="regrinding-manual" @if ($user->pos_id === 'regrinding-manual') selected @endif>
                                            Regrinding Manual</option>
                                        <option value="pre-assembly" @if ($user->pos_id === 'pre-assembly') selected @endif>
                                            Pre-Assembly</option>
                                        <option value="setting-tool-mc-nt"
                                            @if ($user->pos_id === 'setting-tool-mc-nt') selected @endif>Setting Tool Mc NT</option>
                                        <option value="setting-tool-mc-spe"
                                            @if ($user->pos_id === 'setting-tool-mc-spe') selected @endif>Setting Tool Mc Spe</option>
                                        <option value="setting-tool-mc-zol"
                                            @if ($user->pos_id === 'setting-tool-mc-zol') selected @endif>Setting Tool Mc Zol</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-control-label text-light">Role</label>
                                    <br>
                                    <select class="form-select" name="role">
                                        <option value="">---Pilih Role---</option>
                                        <option value="admin" @if ($user->role === 'admin') selected @endif>Admin
                                        </option>
                                        <option value="user" @if ($user->role === 'user') selected @endif>User
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input"
                                        class="form-control-label text-light">Password</label>
                                    <input class="form-control" type="password" name="password"
                                        value="{{ old('password', $user->password) }}" placeholder="Masukkan Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update
                                        User</button>
                                </div>

                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- FORM USER ACCOUNT ENDS -->


                <!-- TABEL USER ACCOUNT START -->
                {{-- <div class="col-xl-9">
                    <div class="card mt-n4">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">User Account Table</h6>
                            <br>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
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
                                    <tbody>
                                        @foreach ($user as $users)
                                            <tr>
                                                <td>{{ $users->id }}</td>
                                                <td>{{ $users->username }}</td>
                                                <td>{{ $users->npk }}</td>
                                                <td>{{ $users->role }}</td>
                                                <td>{{ $users->password }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                        action="{{ route('user-account.destroy', $users->id) }}"
                                                        method="POST">
                                                        <a
                                                            href="{{ route('user-account.editUser', $users->id) }}"></a>@csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
