@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- button back --}}
                <div class="card card-plain col-1">
                    <a href="{{ url('resume-dashboard') }}" class="btn btn-primary active fa fa-arrow-left" role="button"
                        aria-pressed="true"></a>
                </div>

                {{-- container --}}
                <div class="row mt-4">

                    {{-- table --}}
                    <div class="col-12">
                        <div class="card mb-4 mt-n4">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Resume Holder Table</h6>
                                    <form class="form-inline" method="get" action="{{ route('resume-holder.search') }}">
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
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    No Drawing</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    QR Marking</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Part Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Pos ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Pos Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($holder_position as $holderpos)
                                                <tr>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $holderpos->no_drawing }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $holderpos->qr_marking }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $holderpos->part_name }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $holderpos->pos_id }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $holderpos->pos_name }}
                                                    </td>
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
                            @if ($holder_position->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $holder_position->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Page Links --}}
                            @foreach ($holder_position->getUrlRange(1, $holder_position->lastPage()) as $page => $url)
                                @if ($page == $holder_position->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($holder_position->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $holder_position->nextPageUrl() }}">
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
    </div @endsection
