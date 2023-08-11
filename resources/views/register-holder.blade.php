@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            {{-- form insert register holder --}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    {{-- form header --}}
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Holder </b></h4>
                        <hr class="text-light">
                    </div>
                    {{-- form body --}}
                    <div class="card-body">
                        <form action="{{ route('register-holder.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="no_drawing_holder" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="text" name="no_drawing_holder"
                                    placeholder="Masukkan No Drawing">
                            </div>
                            <div class="form-group">
                                <label for="holder_name" class="form-control-label text-light">Holder Name</label>
                                <input class="form-control" type="text" name="holder_name"
                                    placeholder="Masukkan Holder Name">
                            </div>
                            <div class="form-group">
                                <label for="holder_spec" class="form-control-label text-light">Spec. Holder</label>
                                <input class="form-control" type="text" name="holder_spec"
                                    placeholder="Masukkan Spec. Holder">
                            </div>
                            <div class="form-group">
                                <label for="holder_diameter" class="form-control-label text-light">Diameter</label>
                                <input class="form-control" type="text" name="holder_diameter"
                                    placeholder="Masukkan diameter">
                            </div>
                            <div class="form-group">
                                <label for="holder_lifetime_std" class="form-control-label text-light">Lifetime</label>
                                <input class="form-control" type="text" name="holder_lifetime_std"
                                    placeholder="Masukkan lifetime">
                            </div>
                            <div class="form-group">
                                <label for="holder_frequency_std" class="form-control-label text-light">Standard
                                    Frekuensi</label>
                                <input class="form-control" type="text" name="holder_frequency_std"
                                    placeholder="Masukkan Standard Frekuensi">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Insert
                                    Holder</button>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Register Holder Table</h6>
                            <form class="form-inline" method="get" action="{{route ('register-holder.search')}} ">
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
                            <table class="table align-items-center justify-content-center mb-0">
                                {{-- table header --}}
                                <thead class="text-center">
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
                                {{-- table body --}}
                                <tbody class="text-center">
                                    @foreach ($holder as $hold)
                                        <tr id="{{ 'index_' . $hold->id }}">
                                            <td class="text-xs font-weight-bold mb-0">{{ $hold->id }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hold->date_created }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hold->no_drawing_holder }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $hold->holder_name }}</td>

                                            <td class="text-xs font-weight-bold mb-0">
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('register-holder.destroy', $hold->id) }}"
                                                    method="POST">
                                                    {{-- icon edit --}}
                                                    <a href="javascript:void(0)" id="btn-edit-holder"
                                                        data-id="{{ $hold->id }}"
                                                        class="btn btn-edit-holder btn-primary btn-sm fa fa-edit"></a>
                                                    {{-- icon delete --}}

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger fa fa-trash"></button>
                                                </form>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('components.modal-edit-holder')
                <!-- Pagination Section -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{-- Previous Page Link --}}
                        @if ($holder->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $holder->previousPageUrl() }}" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif

                        {{-- Page Links --}}
                        @foreach ($holder->getUrlRange(1, $holder->lastPage()) as $page => $url)
                            @if ($page == $holder->currentPage())
                                <li class="page-item active"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($holder->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $holder->nextPageUrl() }}">
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
