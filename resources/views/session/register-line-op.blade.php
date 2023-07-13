@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- form --}}
                <div class="col-12 col-xl-4">
                    <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Line & OP </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="line" class="form-control-label text-light">Line</label>
                                    <input class="form-control" type="line" id="line">
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


                {{-- table --}}
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header pb-0 p-3 col-xl-8">
                            <h6>Line Table</b></h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table">

                                    <thead align="center">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Line</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody align="center">
                                        <tr>
                                            <td>1</td>
                                            <td>Thomas Hardy</td>
                                            <td>89 Chiaroscuro Rd.</td>
                                            <td>
                                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                                        class="fa fa-edit">&#xE417;</i></a>
                                                <a href="{{ url('register-op') }}" class="edit" title="Edit"
                                                    data-toggle="tooltip"><i class="fa fa-eye">&#xE254;</i></a>
                                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                        class="fa fa-trash">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Thomas Hardy</td>
                                            <td>89 Chiaroscuro Rd.</td>
                                            <td>
                                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                                        class="fa fa-edit">&#xE417;</i></a>
                                                <a href="{{ url('register-op') }}" class="edit" title="Edit"
                                                    data-toggle="tooltip"><i class="fa fa-eye">&#xE254;</i></a>
                                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                        class="fa fa-trash">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
