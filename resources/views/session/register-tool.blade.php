@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            {{-- form --}}
            <div class="col-12 col-xl-4">
                <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Tool </b></h4>
                        <hr class="text-light">
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="no-drawing" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="no-drawing" id="no-drawing">
                            </div>
                            <div class="form-group">
                                <label for="type-tool" class="form-control-label text-light">Type Tool</label>
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
                                <label for="spec-tool" class="form-control-label text-light">Spec. Tool</label>
                                <input class="form-control" type="spec-tool" id="spec-tool">
                            </div>
                            <div class="form-group">
                                <label for="diameter" class="form-control-label text-light">Diameter</label>
                                <input class="form-control" type="diameter" id="diameter">
                            </div>
                            <div class="form-group">
                                <label for="lifetime" class="form-control-label text-light">Lifetime</label>
                                <input class="form-control" type="lifetime" id="lifetime">
                            </div>
                            <div class="form-group">
                                <label for="standard-frekuensi" class="form-control-label text-light">Standard
                                    Frekuensi</label>
                                <input class="form-control" type="standard-frekuensi" id="standard-frekuensi">
                            </div>
                            <div class="form-group">
                                <label for="line" class="form-control-label text-light">Line</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Line
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="op" class="form-control-label text-light">OP</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        OP
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="holder" class="form-control-label text-light">Holder</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Holder
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                    Tool</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>


            {{-- table --}}
            <div class="col-12 col-xl-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tool Table</h6>
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
                                            No Drawing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tool</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lifetime</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
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
@endsection
