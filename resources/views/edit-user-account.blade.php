@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">

        {{-- FORM USER ACCOUNT --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-3 pr-15">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Update User Account </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{route('user-account.update', $user->id)}}" method="POST"
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
                                    <label for="pos" class="form-control-label text-light" name="pos">Pos</label>
                                    <select class="form-select" name="pos">
                                        @foreach ($activePosNames as $posName)
                                            <option value="{{ $posName }}"
                                                @if ($user->pos === $posName) selected @endif>
                                                {{ $posName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-control-label text-light">Role</label>
                                    <br>
                                    <select class="form-select" name="role">
                                        <option value="Admin" @if ($user->role === 'admin') selected @endif>Admin
                                        </option>
                                        <option value="User" @if ($user->role === 'user') selected @endif>User
                                        </option>
                                    </select>
                                <div class="form-group">
                            <label for="example-password-input" class="form-control-label text-light">Password</label>
                            <div class="input-group">
                                <input class="form-control" type="password" name="password"
                                    value="{{ old('password', $user->password) }}" placeholder="Masukkan Password" id="password-input">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="show-password-toggle">
                                <label class="form-check-label text-light" for="show-password-toggle">Show Password</label>
                            </div>
                        </div>
                        <script>
                            const passwordInput = document.getElementById('password-input');
                            const showPasswordToggle = document.getElementById('show-password-toggle');

                            showPasswordToggle.addEventListener('change', function () {
                                if (showPasswordToggle.checked) {
                                    passwordInput.type = 'text';
                                } else {
                                    passwordInput.type = 'password';
                                }
                            });
                        </script>




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
                                </table>
                            </div>
                        </div> --}}
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection



<script>
    function updateUser(event, userId) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);
        var _token = formData.get('_token');

        $.ajax({
            type: "POST",
            url: "{{ route('user-account.update', ':id') }}".replace(':id', userId),
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': _token
            },
            success: function(response) {
                // Handle success response (if needed)
                console.log(response);
                // Optionally, you can update the UI here without a page reload
            },
            error: function(xhr, status, error) {
                // Handle error response (if needed)
                console.log(xhr.responseText);
            },
        });
    }
</script>
