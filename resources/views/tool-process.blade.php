@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">

            {{-- button back --}}
            <div class="card card-plain col-1">
                <a href="{{ route('register-op.line', ['id' => $OP->id]) }}" class="btn btn-primary active fa fa-arrow-left"
                    role="button" aria-pressed="true"></a>
            </div>

            {{-- container --}}
            <div class="row mt-4">

                {{-- form --}}
                <div class="col-12 col-xl-3">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Tool Process </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tool-process.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="tool_process" class="form-control-label text-light">Tool Process</label>
                                    <input class="form-control" type="tool_process" name="tool_process" id="Tool Process">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Insert
                                        Tool Process</button>
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
                            <h6>Tool Process for OP: {{ $OP->op }}</h6>
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
                                                Line</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                OP</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                Tool</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder OPacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($tool_process as $tp)
                                            <tr>
                                                <td>{{ $tp->id }}</td>
                                                <td>{{ $tp->date_created }}</td>
                                                <td>{{ $tp->line }}</td>
                                                <td>{{ $tp->OP }}</td>
                                                <td>{{ $tp->tool_process }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('tool-process.destroy', $tp->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('tool-process.index', $tp->id) }}"
                                                            class="btn btn-sm btn-primary fa fa-edit"></a>
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
                            @if ($tool_process->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tool_process->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Page Links --}}
                            @foreach ($tool_process->getUrlRange(1, $tool_process->lastPage()) as $page => $url)
                                @if ($page == $tool_process->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($tool_process->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tool_process->nextPageUrl() }}">
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
