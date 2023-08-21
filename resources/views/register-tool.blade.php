@extends('layouts.user_type.auth')

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
                        <form action="{{ route('register-tool.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="op" class="form-control-label text-light" name="op">OP</label>
                                <select class="form-select" name="op">
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
                            <div class="form-group">
                                    <label for="image_check" class="form-control-label text-light">
                                        Image Check</label>
                                    <input class="form-control" type="file" name="image_check" id="image_check"
                                        accept="image/*" >
                                    <input type="hidden" name="selected_option" value="Image Check">

                                    <img id="uploaded-image" class="uploaded-image" src="#" alt="Uploaded Image"
                                        hidden
                                        style="max-width: 100%; max-height: 100%; object-fit: contain; margin-top: 10px;">
                                </div>
                                
                                <div class="form-group">
                                    <label for="remark" class="form-control-label text-light">Remark</label>
                                    <input class="form-control" type="text" name="remark" id="remark" >
                                </div>

                                <script>
                                    const ImageInput = document.getElementById('image_check');
                                    // Function to handle image preview
                                    function previewImage(event) {
                                        const input = event.target;
                                        const previewImage = document.getElementById('uploaded-image');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                previewImage.src = e.target.result;
                                                previewImage.hidden = false;
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            previewImage.src = '#';
                                            previewImage.hidden = true;
                                        }
                                    }

                                    // Add an event listener to the file input
                                    const fileInput = document.getElementById('image_check');
                                    fileInput.addEventListener('change', previewImage);
                                </script>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Insert
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Tool Table</h6>
                            <form class="form-inline" method="get" action="{{ route('register-tool.search') }}">
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
                                <thead class="text-center">
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
                                <tbody class="text-center">
                                    @foreach ($tool as $tol)
                                        <tr>
                                            <td class="text-xs font-weight-bold mb-0">{{ $tol->id }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $tol->date_created }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $tol->no_drawing_tool }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $tol->tool_type }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $tol->tool_lifetime_std }}</td>
                                            <td class="text-xs font-weight-bold mb-0">
                                                <form onsubmit="return confirm ('Apakah Anda Yakin?');"
                                                    action="{{ route('register-tool.destroy', $tol->id) }}"
                                                    method="POST">
                                                    {{-- icon edit --}}
                                                    <a href="{{ route('register-tool.edit', $tol->id) }}"
                                                        class="btn btn-sm btn-primary fa fa-edit">
                                                    </a>
                                                    {{-- icon delete --}}

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
