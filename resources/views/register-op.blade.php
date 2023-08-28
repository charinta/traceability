@extends('layouts.user_type.auth')

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
                            <form action="{{ route('register-op.store', $line->id) }}" method="POST">
                                @csrf
                                <div class="form-group">

                                    <label for="op" class="form-control-label text-light">OP</label>
                                    <input class="form-control" type="text" name="op" id="op">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Insert
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
                            <h6>OP Table for Line: {{ $line->id }}</h6>
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
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($ops as $op)
                                            <tr>
                                                <td>{{ $op->id }}</td>
                                                <td>{{ date('Y-m-d', strtotime($op->date_created)) }}</td>
                                                <td>{{ $line->line }}</td>
                                                <td>{{ $op->op }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('register-op.destroy', $op->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('register-op.edit', $op->id) }}"
                                                            class="btn btn-sm btn-primary fa fa-edit"></a>
                                                        <a href="{{ route('tool-process.op', $op->id) }}"
                                                            class="btn btn-sm btn-info fa fa-eye"></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger fa fa-trash"></button>
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
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
