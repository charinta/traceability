@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- table --}}
                <div class="col-12">
                    <div class="card mb-4 mt-n4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Historical Data Table</h6>
                                <form class="form-inline" method="get" action="{{ route('historical-data.search') }}">
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
                                <table class="table align-items-center justify-content-center mb-0 table-striped">

                                    <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
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
                            <tbody class="text-center">
                                    @foreach ($historical as $hist)
                                        <tr>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->id }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Id_tool }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Dolly_Tool_In }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Disassy_Tool}}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Regrinding_Auto }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Regrinding_Manual }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Pre_Assy }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Mc_NT }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Mc_Zoller }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Mc_Speroni }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hist->Supply }}</td>
                                        </tr>
                                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
              <!-- Pagination Section -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{-- Previous Page Link --}}
                            @if ($historical->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $historical->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif
        
                            {{-- Page Links --}}
                            @foreach ($historical->getUrlRange(1, $historical->lastPage()) as $page => $url)
                                @if ($page == $historical->currentPage())
                                    <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
        
                            {{-- Next Page Link --}}
                            @if ($historical->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $historical->nextPageUrl() }}">
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
    </div
@endsection
