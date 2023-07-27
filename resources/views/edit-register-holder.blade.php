@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            {{-- form update register holder --}}
            <div class="col-12 col-xl-3">
                {{-- form header --}}
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Update Register Holder </b></h4>
                        <hr class="text-light">
                    </div>
                    {{-- form body --}}
                    <div class="card-body">
                        <form action="{{ route('register-holder.updateHolder', $holder) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="no_drawing_holder" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="text" name="no_drawing_holder"
                                    value="{{ old('no_drawing_holder', $holder->no_drawing_holder) }}"
                                    placeholder="Masukkan No Drawing">
                            </div>
                            <div class="form-group">
                                <label for="holder_name" class="form-control-label text-light">Holder Name</label>
                                <input class="form-control" type="text" name="holder_name"
                                    value="{{ old('holder_name', $holder->holder_name) }}"
                                    placeholder="Masukkan Holder Name">
                            </div>
                            <div class="form-group">
                                <label for="holder_spec" class="form-control-label text-light">Spec. Holder</label>
                                <input class="form-control" type="text" name="holder_spec"
                                    value="{{ old('holder_spec', $holder->holder_spec) }}"
                                    placeholder="Masukkan Spec. Holder">
                            </div>
                            <div class="form-group">
                                <label for="holder_diameter" class="form-control-label text-light">Diameter</label>
                                <input class="form-control" type="text" name="holder_diameter"
                                    value="{{ old('holder_diameter', $holder->holder_diameter) }}"
                                    placeholder="Masukkan diameter">
                            </div>
                            <div class="form-group">
                                <label for="holder_lifetime_std" class="form-control-label text-light">Lifetime</label>
                                <input class="form-control" type="text" name="holder_lifetime_std"
                                    value="{{ old('holder_lifetime_std', $holder->holder_lifetime_std) }}"
                                    placeholder="Masukkan lifetime">
                            </div>
                            <div class="form-group">
                                <label for="holder_frequency_std" class="form-control-label text-light">Standard
                                    Frekuensi</label>
                                <input class="form-control" type="text" name="holder_frequency_std"
                                    value="{{ old('holder_frequency_std', $holder->holder_frequency_std) }}"
                                    placeholder="Masukkan Standard Frekuensi">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update
                                    Holder</button>
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
                        <h6>Holder Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-item-center">

                                <thead>
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
                                <tbody>
                                    @foreach ($holder as $hold)
                                        <tr>
                                            <td>{{ $hold->id }}</td>
                                            <td>{{ $hold->date_created }}</td>
                                            <td>{{ $hold->no_drawing_holder }}</td>
                                            <td>{{ $hold->holder_name }}</td>
                                            <td>
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('register-holder.destroy', $hold->id) }}"
                                                    method="POST">
                                                    <button type="button">
                                                        <a href="{{ route('register-holder.editHolder', $hold->id) }}">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z"
                                                                        fill="#0F0F0F"></path>
                                                                </g>
                                                            </svg>
                                                        </a></button>
                                                    <button type="submit"> <svg width="18px" height="18px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path d="M10 12V17" stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M14 12V17" stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                                    stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                    stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg></button>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}

            {{-- pagination --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" tabindex="-1">
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                    <li class="page-item "><a class="page-link" href="javascript:;">2</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:;">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:;">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:;">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
