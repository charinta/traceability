@extends('layouts.user_type.guest')

@section('content')

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">

<!--FORM USER ACCOUNT -->
    <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-4 pr-15">
        <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
          <div class="card-header pb-0 p-3 bg-gradient-dark">
            <h4 class="mb-0 text-light"> <b>User Account </b></h4>
            <hr class="text-light">
          </div>
          <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="nama-user" class="form-control-label text-light">Nama</label>
                    <input class="form-control" type="nama" id="nama-user">
                </div>
                <div class="form-group">
                    <label for="NPK" class="form-control-label text-light">NPK</label>
                    <input class="form-control" type="NPK" id="NPK">
                </div>
                <div class="form-group">
                    <label for="pos" class="form-control-label text-light">Pos</label><label for="type-tool" class="form-control-label text-light">Type Tool</label>
                    <div class="dropdown">
                                        <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Pos
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                        </ul>
                                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="form-control-label text-light">Role</label>
                    <div class="dropdown">
                                        <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Type
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                        </ul>
                                    </div>
                </div>
                <div class="form-group">
                    <label for="example-password-input" class="form-control-label text-light">Password</label>
                    <input class="form-control" type="password" value="password" id="example-password-input">
                </div>
                <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert User</button>
                  </div>

                <br>
            </form>
            </div>
        </div>
      </div>
          <!-- FORM USER ACCOUNT ENDS -->


          <!-- TABEL USER ACCOUNT START -->
          <div class="col-xl-8">
            <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">User Account Table</h6>
            <br>
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Karyawan</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">NPK</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Station</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Role</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Password</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection