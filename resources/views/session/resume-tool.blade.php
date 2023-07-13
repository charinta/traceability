@extends('layouts.user_type.guest')

@section('content')
    <div class="row">
        {{-- button back --}}
        <div class="card card-plain col-2">
            <a href="{{ url('resume-dashboard') }}" class="btn btn-primary active" role="button" aria-pressed="true">Back</a>
        </div>
        
        
        {{-- table --}}
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Resume Tool Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-item-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID Tool</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Dolly Tool In</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Disassy Tool</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Regrinding Auto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Regrinding Manual</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pre Assy</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        MC NT</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        MC Zoller</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        MC Speroni</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Supply</th>
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
@endsection
