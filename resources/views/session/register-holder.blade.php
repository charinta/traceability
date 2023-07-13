@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            {{-- form --}}
            <div class="col-12 col-xl-4">
                <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Holder </b></h4>
                        <hr class="text-light">
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="no-drawing" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="no-drawing" id="no-drawing">
                            </div>
                            <div class="form-group">
                                <label for="holder-name" class="form-control-label text-light">Holder Name</label>
                                <input class="form-control" type="holder-name" id="holder-name">
                            </div>
                            <div class="form-group">
                                <label for="spec-holder" class="form-control-label text-light">Spec. Holder</label>
                                <input class="form-control" type="spec-holder" id="spec-holder">
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
                            <div class="text-center">
                                <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                    Holder</button>
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
                        <h6>Holder Table</h6>
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
                                            Holder</th>
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
