@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- form insert shift --}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    {{-- form header --}}
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Shift</b></h4>
                        <hr class="text-light">
                    </div>
                    {{-- form body --}}
                    <div class="card-body">
                        <form action="{{ route('shift.update', $shift->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="shift" class="form-control-label text-light">Shift</label>
                                <input class="form-control" type="text" name="shift"
                                    value="{{ old('shift', $shift->shift) }}" placeholder="Masukkan Shift">
                            </div>
                            <div class="form-group">
                                <label for="start" class="form-control-label text-light">Start</label>
                                <input class="form-control" type="time" name="start"
                                    value="{{ old('start', $shift->start) }}" placeholder="Masukkan Start">
                            </div>
                            <div class="form-group">
                                <label for="finish" class="form-control-label text-light">Finish</label>
                                <input class="form-control" type="time" name="finish"
                                    value="{{ old('finish', $shift->finish) }}" placeholder="Masukkan Finish">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update
                                    Shift</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>


            {{-- table --}}
            {{-- <div class="col-12 col-xl-9">
                <div class="card mb-4 mt-n4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Shift Table</h6>
                            <form class="form-inline" method="get" action=" ">
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
                            <table class="table align-item-center">
                                {{-- table header --}}
            {{-- <thead class="text-center">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Shift</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Start At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Finish At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead> --}}
            {{-- table body --}}
            {{-- <tbody class="text-center">
                                    @foreach ($shift as $shi)
                                        <tr>
                                            <td>{{ $shi->shift }}</td>
                                            <td>{{ $shi->start }}</td>
                                            <td>{{ $shi->finish }}</td>

                                            <td class="text-center">
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('shift.destroy', $shi->id) }}" method="POST"> --}}
            {{-- icon edit --}}
            {{-- <a href="{{ route('shift.edit', $shi->id) }}"
                                                        class="btn btn-sm btn-primary fa fa-edit">
                                                    </a> --}}
            {{-- icon delete --}}

            {{-- @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger fa fa-trash"></button>
                                                </form>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
