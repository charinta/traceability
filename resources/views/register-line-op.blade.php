@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- form register line --}}
                <div class="col-12 col-xl-3">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        {{-- form header --}}
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Line </b></h4>
                            <hr class="text-light">
                        </div>
                        {{-- form body --}}
                        <div class="card-body">
                            <form action="{{ route('register-line.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="line" class="form-control-label text-light">Line</label>
                                    <input class="form-control" type="text" name="line" placeholder="Masukkan Line">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Insert
                                        Line</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- table --}}
                <div class="col-12 col-xl-9">
                    <div class="card mb-4 mt-n4">
                        <div class="card-header pb-0 p-3 col-xl-8">
                            <h6>Line Table</b></h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0 table-striped">
                                    {{-- table header --}}
                                    <thead class="text-center">
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
                                    {{-- table body --}}
                                    <tbody class="text-center">
                                        @foreach ($line as $lin)
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">{{ $lin->id }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $lin->date_created }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $lin->line }}</td>
                                                <td class="text-xs font-weight-bold mb-0">
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('register-line.destroy', $lin->id) }}"
                                                    method="POST">
                                                    {{-- icon edit --}}
                                                    <a href="{{ route('register-line.edit', $lin->id) }}"
                                                        class="btn btn-sm btn-primary fa fa-edit">
                                                    </a>
                                                     <a href="{{ route('register-op.index', $lin->line) }}"  }}"
                                                    class="btn btn-sm btn-info fa fa-eye"></a>
                                                    {{-- icon delete --}}

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger fa fa-trash"></button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Section -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{-- Previous Page Link --}}
                            @if ($line->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $line->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif
        
                            {{-- Page Links --}}
                            @foreach ($line->getUrlRange(1, $line->lastPage()) as $page => $url)
                                @if ($page == $line->currentPage())
                                    <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
        
                            {{-- Next Page Link --}}
                            @if ($line->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $line->nextPageUrl() }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
