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
                        <form action="{{ route('register-tool.updateTool', $tool->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="no_drawing_tool" class="form-control-label text-light">No Drawing</label>
                                <input class="form-control" type="text" name="no_drawing_tool"
                                    value=" {{ old('no_drawing_tool', $tool->no_drawing_tool) }}"
                                    placeholder="Masukkan No Drawing">
                            </div>
                            <div class="form-group">
                                <label for="tool_type" class="form-control-label text-light" name="tool_type">Type
                                    Tool</label>
                                <select class="form-select" name="tool_type">
                                    <option value="">---Pilih Type---</option>
                                    <option value="drill" @if ($tool->tool_type === 'drill') selected @endif>D</option>
                                    <option value="reamer" @if ($tool->tool_type === 'reamer') selected @endif>R</option>
                                    <option value="tap" @if ($tool->tool_type === 'tap') selected @endif>T</option>
                                    <option value="enmilld" @if ($tool->tool_type === 'enmilld') selected @endif>E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tool_spec" class="form-control-label text-light">Spec. Tool</label>
                                <input class="form-control" type="text" name="tool_spec"
                                    value="{{ old('tool_spec', $tool->tool_spec) }}" placeholder="Masukkan Spec. Tool">
                            </div>
                            <div class="form-group">
                                <label for="tool_diameter" class="form-control-label text-light">Diameter</label>
                                <input class="form-control" type="text" name="tool_diameter"
                                    value="{{ old('tool_diameter', $tool->tool_diameter) }}"
                                    placeholder="Masukkan Diameter">
                            </div>
                            <div class="form-group">
                                <label for="tool_lifetime_std" class="form-control-label text-light">Lifetime</label>
                                <input class="form-control" type="text" name="tool_lifetime_std"
                                    value="{{ old('tool_lifetime_std', $tool->tool_lifetime_std) }}"
                                    placeholder="Masukkan Lifetime">
                            </div>
                            <div class="form-group">
                                <label for="tool_frequency_std" class="form-control-label text-light">Standard
                                    Frekuensi</label>
                                <input class="form-control" type="text" name="tool_frequency_std"
                                    value="{{ old('tool_frequency_std', $tool->tool_frequency_std) }}"
                                    placeholder="Masukkan Frekuensi">
                            </div>
                            <div class="form-group">
                                <label for="line" class="form-control-label text-light" name="line">Line</label>
                                <select class="form-select" name="line">
                                    <option value="">---Pilih Line---</option>
                                    <option value="1" @if ($tool->line === '1') selected @endif>1</option>
                                    <option value="2" @if ($tool->line === '2') selected @endif>2</option>
                                    <option value="3" @if ($tool->line === '3') selected @endif>3</option>
                                    <option value="4" @if ($tool->line === '4') selected @endif>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="op" class="form-control-label text-light" name="op">OP</label>
                                <select class="form-select" name="op">
                                    <option value="">---Pilih OP---</option>
                                    <option value="1" @if ($tool->op === '1') selected @endif>1</option>
                                    <option value="2" @if ($tool->op === '2') selected @endif>2</option>
                                    <option value="3" @if ($tool->op === '3') selected @endif>3</option>
                                    <option value="4" @if ($tool->op === '4') selected @endif>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_drawing_holder" class="form-control-label text-light"
                                    name="no_drawing_holder">Holder</label>
                                <select class="form-select" name="no_drawing_holder">
                                    <option value="">---Pilih Holder---</option>
                                    <option value="1" @if ($tool->no_drawing_holder === '1') selected @endif>1</option>
                                    <option value="2" @if ($tool->no_drawing_holder === '2') selected @endif>2</option>
                                    <option value="3" @if ($tool->no_drawing_holder === '3') selected @endif>3</option>
                                    <option value="4" @if ($tool->no_drawing_holder === '4') selected @endif>4</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="washing_ct" class="form-control-label text-light">Washing CT</label>
                                        <input class="form-control" type="text" name="washing_ct"
                                            value="{{ old('washing_ct', $tool->washing_ct) }}">
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
                                        <input class="form-control" type="text" name="grinding_ct"
                                            value="{{ old('grinding_ct', $tool->grinding_ct) }}">
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
                                        <input class="form-control" type="text" name="setting_ct"
                                            value="{{ old('setting_ct', $tool->setting_ct) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <br>
                                    <p class="text-light" style="color: white">Sec</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update
                                    Tool</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>


            {{-- table
            <div class="col-12 col-xl-9">
                <div class="card mb-4 mt-n4">
                    <div class="card-header pb-0">
                        <h6>Tool Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table">
                                table header
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
                                table body
                                <tbody align="center">
                                    @foreach ($tool as $tol)
                                        <tr>
                                            <td>{{ $tol->id }}</td>
                                            <td>{{ $tol->date_created }}</td>
                                            <td>{{ $tol->no_drawing_tool }}</td>
                                            <td>{{ $tol->tool_type }}</td>
                                            <td>{{ $tol->tool_lifetime_std }}</td>
                                            <td>
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('register-tool.destroy', $tol->id) }}"
                                                    method="POST">
                                                    <button type="button">
                                                        <a href="{{ route('register-tool.editTool', $tol->id) }}">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table> --}}
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
