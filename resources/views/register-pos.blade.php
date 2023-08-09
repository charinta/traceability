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
                                <h6 class="mb-0">Pos Table</h6>
                                <form class="form-inline" method="get" action="{{ route('register-pos.search') }}">
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
                                        <tr class="text-center">
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Pos</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tbl_pos as $pos)
                                            <tr class="text-center">
                                                <td class="text-xs font-weight-bold mb-0 text-center">{{ $pos->id }}</td>
                                                <td class="text-xs font-weight-bold mb-0 text-center">{{ $pos->date_created }}</td>
                                                <td class="text-xs font-weight-bold mb-0 text-center">{{ $pos->pos_name }} </td>
                                                <td>
                                                    {{-- toggle switch dinamis --}}
                                                    <label class="toggle-switch">
                                                        <input type="checkbox" class="toggle-switch-checkbox" name="status"
                                                            value="active" {{ $pos->status === 'active' ? 'checked' : '' }}
                                                            disabled>
                                                        <span
                                                            class="toggle-switch-slider {{ $pos->status === 'active' ? 'bg-info' : '' }}"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <form action="{{ route('register-pos.destroy', $pos->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger fa fa-trash"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Section -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{-- Previous Page Link --}}
                    @if ($tbl_pos->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $tbl_pos->previousPageUrl() }}" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($tbl_pos->getUrlRange(1, $tbl_pos->lastPage()) as $page => $url)
                        @if ($page == $tbl_pos->currentPage())
                            <li class="page-item active"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($tbl_pos->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $tbl_pos->nextPageUrl() }}">
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
    </div>
@endsection
