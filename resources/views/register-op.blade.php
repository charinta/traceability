@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">

            {{-- button back --}}
            <div class="card card-plain col-1">
                <a href="{{ url('register-line') }}" class="btn btn-primary active fa fa-arrow-left" role="button"
                    aria-pressed="true"></a>
            </div>

            {{-- container --}}
            <div class="row mt-4">

                {{-- form --}}
                <div class="col-12 col-xl-3">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register OP </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register-op.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="OP" class="form-control-label text-light">OP</label>
                                    <input class="form-control" type="OP" name="OP" id="OP">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                        OP</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- table --}}
                <div class="col-12 col-xl-9">
                    <div class="card mb-4 mt-n4">
                        <div class="card-header pb-0">
                            <h6>OP Table for Line: {{ $line->line }}</h6>>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-item-center">

                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                OP</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                   <tbody class="text-center">
                                        @foreach ($OP as $op)
                                            <tr>
                                                <td>{{ $op->id }}</td>
                                                <td>{{ $op->date_created }}</td>
                                                <td>{{ $op->OP }}</td>
                                                <td class="text-center">
                                                <form action="{{ route('register-op.destroy', $op->id) }}" method="POST">
                                                    <a href="{{ route('register-op.index', $op->id) }}"
                                                    class="btn btn-sm btn-primary fa fa-edit"></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fa fa-trash"></button>
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
                    @if ($OP->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $OP->previousPageUrl() }}" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($OP->getUrlRange(1, $OP->lastPage()) as $page => $url)
                        @if ($page == $OP->currentPage())
                            <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($OP->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $OP->nextPageUrl() }}">
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
