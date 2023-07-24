@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{--form--}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Standard</b></h4>
                        <hr class="text-light">
                    </div>
                    <div class="card-body">
                        <form action="{{route('register-standar.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pos_name" class="form-control-label text-light"
                                    name="pos_name">Pos</label><br>
                                <select class="form-select" name="pos_name">
                                    <option value="marking">Marking</option>
                                    <option value="dolly-tool-supply">Dolly Tool Supply</option>
                                    <option value="tools-input">Tools Input</option>
                                    <option value="disasemmbly">Disasemmbly</option>
                                    <option value="washing">Washing</option>
                                    <option value="regrinding-auto">Regrinding Auto</option>
                                    <option value="regrinding-manual">Regrinding Manual</option>
                                    <option value="pre-assembly">Pre-Assembly</option>
                                    <option value="setting-tool-mc-nt">Setting Tool Mc NT</option>
                                    <option value="setting-tool-mc-spe">Setting Tool Mc Spe</option>
                                    <option value="setting-tool-mc-zol">Setting Tool Mc Zol</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="item_check" class="form-control-label text-light"
                                    name="item_check">Item Check</label><br>
                                <select class="form-select" name="item_check">
                                    <option value="diameter">Diameter</option>
                                    <option value="length">Length</option>
                                </select>
                            </div>

                            <form action="{{ route('register-standar.store') }}" method="POST">
                                @csrf
    
                                <div class="form-group text-light">
                                    <label class="text-light">Select Standard Type:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="standard_check" value="Standard Value"
                                            id="opt-standard-value">
                                        <label class="form-check-label text-light" for="opt-standard-value">
                                            Standard Value
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="standard_check" value="Standard String"
                                            id="opt-standard-string">
                                        <label class="form-check-label text-light" for="opt-standard-string">
                                            Standard String
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="standard_check" value="Standard Image"
                                            id="opt-standard-image">
                                        <label class="form-check-label text-light" for="opt-standard-image">
                                            Standard Image
                                        </label>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="standard_value" class="form-control-label text-light">Standard Value</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="standard_value" id="standard-value"
                                            placeholder="Enter a value" style="margin-right: 7px"
                                            {{ old('standard_check') === 'Standard Value' ? '' : 'disabled' }}>
                                        <div class="input-group-append">
                                            <select class="form-select" id="unit-dropdown" name="unit-dropdown"
                                                {{ old('standard_check') === 'Standard Value' ? '' : 'disabled' }}>
                                                <option value="cm">cm</option>
                                                <option value="inch">inch</option>
                                                <option value="m">m</option>
                                                <option value="ft">ft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group d-flex">
                                <div class="flex-grow-1 me-2">
                                    <label for="batas_atas" class="form-control-label text-light">Toleransi Atas</label>
                                    <input class="form-control" type="text" name="batas_atas" id="batas_atas" disabled>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="batas_bawah" class="form-control-label text-light">Toleransi
                                        Bawah</label>
                                    <input class="form-control" type="text" name="batas_bawah" id="batas_bawah" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="standard-string" class="form-control-label text-light">Standard String</label>
                                <input class="form-control" type="text" id="standard-string" disabled>
                            </div>

                            <div class="form-group">
                                <label for="standard-image" class="form-control-label text-light">Standard Image</label>
                                <input class="form-control" type="file" id="standard-image" accept="image/*"
                                    disabled>
                                <img id="uploaded-image" class="uploaded-image" src="#" alt="Uploaded Image"
                                    hidden
                                    style="max-width: 100%; max-height: 100%; object-fit: contain; margin-top: 10px;">
                            </div>


                            <div class="form-group">
                                <label for="remark" class="form-control-label text-light">Remark</label>
                                <input class="form-control" type="text" id="remark" disabled>
                            </div>


                            <div class="form-group">
                                <label for="status" class="form-control-label text-light"
                                    name="status">Status</label><br>
                                <select class="form-select" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <script>
                                const radioButtons = document.querySelectorAll('input[name="standard_check"]');
                                const standardValueInput = document.getElementById('standard-value');
                                const unitDropdown = document.getElementById('unit-dropdown');
                                const toleransiAtas = document.getElementById('batas_atas');
                                const toleransiBawah = document.getElementById('batas_bawah');
                                const standardStringInput = document.getElementById('standard-string');
                                const standardImageInput = document.getElementById('standard-image');
                                const remarkImage = document.getElementById('remark');
                                const statusImage = document.getElementById('status-image');
                                const uploadedImage = document.getElementById('uploaded-image');

                                radioButtons.forEach((radioButton) => {
                                    radioButton.addEventListener('change', function() {
                                        console.log(this.value);
                                        standardValueInput.disabled = this.id !== 'opt-standard-value';
                                        unitDropdown.disabled = this.id !== 'opt-standard-value';
                                        toleransiAtas.disabled = this.id !== 'opt-standard-value';
                                        toleransiBawah.disabled = this.id !== 'opt-standard-value';
                                        standardStringInput.disabled = this.id !== 'opt-standard-string';
                                        standardImageInput.disabled = this.id !== 'opt-standard-image';
                                        remarkImage.disabled = this.id !== 'opt-standard-image';
                                        statusImage.disabled = this.id !== 'opt-standard-image';

                                        standardValueInput.required = this.id === 'opt-standard-value';
                                        unitDropdown.required = this.id === 'opt-standard-value';
                                        toleransiAtas.required = this.id === 'opt-standard-value';
                                        toleransiBawah.required = this.id === 'opt-standard-value';
                                        standardStringInput.required = this.id === 'opt-standard-string';
                                        standardImageInput.required = this.id === 'opt-standard-image';
                                        remarkImage.required = this.id !== 'opt-standard-image';
                                        statusImage.required = this.id !== 'opt-standard-image';
                                    });
                                });

                                standardImageInput.addEventListener('change', function() {
                                    const file = this.files[0];
                                    if (file) {
                                        uploadedImage.src = URL.createObjectURL(file);
                                        uploadedImage.hidden = false;
                                    } else {
                                        uploadedImage.src = '#';
                                        uploadedImage.hidden = true;
                                    }
                                });
                                
                            </script>


                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                    Standard</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>

            {{--Table--}}
            <div class="col-12 col-xl-9">
                <div class="card mb-4 mt-n4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Standard Table</h6>
                            <form action=" " method="GET" class="form-inline">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                <input class="form-control" placeholder="Search" type="text">
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
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pos</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Item Check</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Standard</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($standar as $standard)
                                    <tr class = "text-center">
                                        <td>{{ $standard->pos_name }}</td>
                                        <td>{{ $standard->item_check }}</td>
                                        <td>{{ $standard->standard_check }}</td>
                                        <td>{{ $standard->status }}</td>
                                        <td>
                                            <form action="{{ route('register-standar.destroy', $standard->id) }}" method="POST">
                                                <a href="{{ route('register-standar.index', $standard->id) }}"
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
                    @if ($standar->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $standar->previousPageUrl() }}" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($standar->getUrlRange(1, $standar->lastPage()) as $page => $url)
                        @if ($page == $standar->currentPage())
                            <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($standar->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $standar->nextPageUrl() }}">
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
