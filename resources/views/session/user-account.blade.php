@extends('layouts.user_type.guest')

@section('content')

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-4">
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
                    <label for="pos" class="form-control-label text-light">Pos</label>
                    <div class="dropdown">
                        <a href="javascript:;" class="btn dropdown-toggle w-100 bg-light " data-bs-toggle="dropdown" id="pos">
                        </a>
                        <ul class="dropdown-menu mx-auto" aria-labelledby="pos">
                            <li>
                                <a class="dropdown-item" href="javascript:;">111</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;">2222</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;">3333</a>
                            </li>
                        </ul>
                      </div>
                </div>
                <div class="form-group">
                    <label for="role" class="form-control-label text-light">Role</label>
                    <div class="dropdown">
                        <a href="javascript:;" class="btn dropdown-toggle w-100 bg-light " data-bs-toggle="dropdown" id="role">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="role">
                            <li>
                                <a class="dropdown-item" href="javascript:;">1111</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;">2222</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;">3333</a>
                            </li>
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
          <!-- Rest of the card content -->
        </div>
      </div>
    </div>
</div>
</div>
@endsection