@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Line & OP </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="register-line-op" class="form-control-label text-light">Line</label>
                                    <input class="form-control" type="register-line-op" id="register-line-op">
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                        Line</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Line Table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-item-center">

                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Line</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
