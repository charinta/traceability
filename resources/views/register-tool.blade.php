@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            {{-- form register tool --}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    {{-- form header --}}
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Tool </b></h4>
                        <hr class="text-light">
                    </div>
                    {{-- form body --}}
                    <div class="card-body">
                        <form action="{{ route('register-tool.storeTool') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="no_drawing_tool" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="text" name="no_drawing_tool"
                                    placeholder="Masukkan No Drawing">
                            </div>
                            <div class="form-group">
                                <label for="tool_type" class="form-control-label text-light" name="tool_type">Type
                                    Tool</label>
                                <select class="form-select" name="tool_type">
                                    <option value="">---Pilih Type---</option>
                                    <option value="drill">D</option>
                                    <option value="reamer">R</option>
                                    <option value="tap">T</option>
                                    <option value="enmilld">E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tool_spec" class="form-control-label text-light">Spec. Tool</label>
                                <input class="form-control" type="text" name="tool_spec"
                                    placeholder="Masukkan Spec. Tool">
                            </div>
                            <div class="form-group">
                                <label for="tool_diameter" class="form-control-label text-light">Diameter</label>
                                <input class="form-control" type="text" name="tool_diameter"
                                    placeholder="Masukkan Diameter">
                            </div>
                            <div class="form-group">
                                <label for="tool_lifetime_std" class="form-control-label text-light">Lifetime</label>
                                <input class="form-control" type="text" name="tool_lifetime_std"
                                    placeholder="Masukkan Lifetime">
                            </div>
                            <div class="form-group">
                                <label for="tool_frequency_std" class="form-control-label text-light">Standard
                                    Frekuensi</label>
                                <input class="form-control" type="text" name="tool_frequency_std"
                                    placeholder="Masukkan Frekuensi">
                            </div>
                            <div class="form-group">
                                <label for="line" class="form-control-label text-light" name="line">Line</label>
                                <select class="form-select" name="line">
                                    <option value="">---Pilih Line---</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="op" class="form-control-label text-light" name="op">OP</label>
                                <select class="form-select" name="op">
                                    <option value="">---Pilih OP---</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_drawing_holder" class="form-control-label text-light"
                                    name="no_drawing_holder">Holder</label>
                                <select class="form-select" name="no_drawing_holder">
                                    @foreach ($noDrawingHold as $noHold)
                                        <option value="{{ $noHold }}">{{ $noHold }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="washing_ct" class="form-control-label text-light">Washing CT</label>
                                        <input class="form-control" type="text" name="washing_ct">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <br>
                                    <p class="text-light" style="color: white">Sec</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="grinding_ct" class="form-control-label text-light">Grinding CT</label>
                                        <input class="form-control" type="text" name="grinding_ct">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <br>
                                    <p class="text-light" style="color: white">Sec</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="setting_ct" class="form-control-label text-light">Setting CT</label>
                                        <input class="form-control" type="text" name="setting_ct">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <br>
                                    <p class="text-light" style="color: white">Sec</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                    Tool</button>
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
                        <h6>Tool Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table">
                                {{-- table header --}}
                                <thead align="center">
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
                                {{-- table body --}}
                                <tbody align="center">
                                    @foreach ($tool as $tol)
                                        <tr>
                                            <td>{{ $tol->id }}</td>
                                            <td>{{ $tol->date_created }}</td>
                                            <td>{{ $tol->no_drawing_tool }}</td>
                                            <td>{{ $tol->tool_type }}</td>
                                            <td>{{ $tol->tool_lifetime_std }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('user-account.destroy', $users->id) }}"
                                                    method="POST">
                                                    {{-- icon edit --}}
                                                    <a href="{{ route('user-account.editUser', $users->id) }}"
                                                        class="btn btn-sm btn-primary fa fa-edit">
                                                    </a>
                                                    {{-- icon delete --}}

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
                <!-- Pagination Section -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{-- Previous Page Link --}}
                        @if ($tool->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $tool->previousPageUrl() }}" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif

                        {{-- Page Links --}}
                        @foreach ($tool->getUrlRange(1, $tool->lastPage()) as $page => $url)
                            @if ($page == $tool->currentPage())
                                <li class="page-item active"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($tool->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $tool->nextPageUrl() }}">
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
@endsection
