@extends('layouts.user_type.guest')

@section('content')


    <div class="container-fluid py-4">
        <div class="row">
             
                        {{-- form body --}} {{--form--}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Standard</b></h4>
                        <hr class="text-light">
                    </div>
                        <div class="card-body">
                            <form action="{{ route('register-standar.update', $standar->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        <div class="form-group">
                         <label for="pos_name" class="form-control-label text-light">Pos</label><br>
                        <select class="form-select" name="pos_name">
                                <option value="marking"  @if ($standar->pos_name === 'marking') selected @endif>Marking</option>
                                <option value="dolly-tool-supply" @if ($standar->pos_name === 'dolly-tolly-supply') selected @endif>Dolly Tool Supply</option>
                                <option value="tools-input" @if ($standar->pos_name === 'tools-input') selected @endif>Tools Input</option>
                                <option value="disasemmbly" @if ($standar->pos_name === 'disassembly') selected @endif>Disasemmbly</option>
                                <option value="washing" @if ($standar->pos_name === 'washing') selected @endif>Washing</option>
                                <option value="regrinding-auto" @if ($standar->pos_name === 'regrinding-auto') selected @endif>Regrinding Auto</option>
                                <option value="regrinding-manual" @if ($standar->pos_name === 'regrinding-manual') selected @endif>Regrinding Manual</option>
                                <option value="pre-assembly" @if ($standar->pos_name === 'pre-assembly') selected @endif>Pre-Assembly</option>
                                <option value="setting-tool-mc-nt" @if ($standar->pos_name === 'setting-tool-mc-nt') selected @endif>Setting Tool Mc NT</option>
                                <option value="setting-tool-mc-spe" @if ($standar->pos_name === 'setting-tool-mc-spe') selected @endif>Setting Tool Mc Spe</option>
                                <option value="setting-tool-mc-zol" @if ($standar->pos_name === 'setting-tool-mc-zol') selected @endif>Setting Tool Mc Zol</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="item_check" class="form-control-label text-light"
                                name="item_check">Item Check</label><br>
                            <select class="form-select" name="item_check">
                                <option value="diameter" @if ($standar->item_check === 'diameter') selected @endif>Diameter</option>
                                <option value="length" @if ($standar->item_check === 'length') selected @endif>Length</option>
                            </select>
                        </div>

                        <div class="form-group text-light">
                                    <label class="text-light">Select Standard Type:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="check" value="Standard Value"
                                            id="opt-standard-value" @if ($standar->status_data === 'int' ? $standar->standard_check : '') checked @endif>
                                        <label class="form-check-label text-light" for="opt-standard-value">
                                            Standard Value
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="check" value="Standard String"
                                            id="opt-standard-string"  @if ($standar->status_data === 'string' ? $standar->standard_check : '') checked @endif>
                                        <label class="form-check-label text-light" for="opt-standard-string">
                                            Standard String
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="check" value="Standard Image"
                                            id="opt-standard-image"  @if ($standar->status_data === 'image' ? $standar->standard_check : '') checked @endif>
                                        <label class="form-check-label text-light" for="opt-standard-image">
                                            Standard Image
                                        </label>
                                    </div>
                                </div>

                        <div class="form-group">
                            <label for="standard_value" class="form-control-label text-light">Standard Value</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="standard_check" id="standard-value"
                                    value="{{ old('standard_check', $standar->status_data === 'int' ? $standar->standard_check : '')}}" style="margin-right: 7px"
                                    {{ old('check', $standar->check ?? '') === 'Standard Value' ? '' : 'disabled' }}>
                                <div class="input-group-append">
                                     <input type="hidden" name="selected_option" value="Standard Value">
                                    <select class="form-select" id="unit-dropdown" name="unit-dropdown"
                                        {{ old('check', $standar->check ?? '') === 'Standard Value' ? '' : 'disabled' }}>
                                        <option value="cm" {{ old('unit-dropdown', $standar->unit ?? '') === 'cm' ? 'selected' : '' }}>cm</option>
                                        <option value="inch" {{ old('unit-dropdown', $standar->unit ?? '') === 'inch' ? 'selected' : '' }}>inch</option>
                                        <option value="m" {{ old('unit-dropdown', $standar->unit ?? '') === 'm' ? 'selected' : '' }}>m</option>
                                        <option value="ft" {{ old('unit-dropdown', $standar->unit ?? '') === 'ft' ? 'selected' : '' }}>ft</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                       <div class="form-group d-flex">
                                <div class="flex-grow-1 me-2">
                                    <label for="batas_atas" class="form-control-label text-light">Toleransi Atas</label>
                                    <input class="form-control" type="text" name="batas_atas" id="batas_atas" value="{{ old('standar', $standar->batas_atas) }}" disabled>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="batas_bawah" class="form-control-label text-light">Toleransi
                                        Bawah</label>
                                    <input class="form-control" type="text" name="batas_bawah" id="batas_bawah" value="{{ old('standar', $standar->batas_bawah) }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="standard-string" class="form-control-label text-light">Standard String</label>
                                <input class="form-control" type="text" name="standard_check" id="standard-string" value="{{ old('standar', $standar->status_data === 'string' ? $standar->standard_check : '') }}" disabled>
                            <input type="hidden" name="selected_option" value="Standard String">
                            </div>

                        <div class="form-group">
                            <label for="standard-image" class="form-control-label text-light">Standard Image</label>
                            <input class="form-control" type="file" name="standard_check" id="standard-image" accept="image/*"
                                @if ($standar->check !== 'Standard Image') disabled @endif>
                            <img id="uploaded-image" class="uploaded-image" value="{{ old('standard_check', $standar->status_data === 'image' ? $standar->standard_check : '') }}"
                                alt="Uploaded Image" @if ($standar->check !== 'Standard Image' || empty($standar->standard_check)) hidden @endif
                                style="max-width: 100%; max-height: 100%; object-fit: contain; margin-top: 10px;">
                        </div>


                        <div class="form-group">
                            <label for="remark" class="form-control-label text-light">Remark</label>
                            <input class="form-control" type="text" name="remark" id="remark"
                                value="{{ old('remark', $standar->status_data === 'image' ? $standar->remark : '') }}" @if ($standar->check !== 'Standard Image') disabled @endif>
                        </div>
                            <script>
                                const radioButtons = document.querySelectorAll('input[name="check"]');
                                const standardValueInput = document.getElementById('standard-value');
                                const unitDropdown = document.getElementById('unit-dropdown');
                                const batasAtas = document.getElementById('batas_atas');
                                const batasBawah = document.getElementById('batas_bawah');
                                const standardStringInput = document.getElementById('standard-string');
                                const standardImageInput = document.getElementById('standard-image');
                                const remarkImage = document.getElementById('remark');
                                const statusImage = document.getElementById('status-image');

                                radioButtons.forEach((radioButton) => {
                                    radioButton.addEventListener('change', function () {
                                        standardValueInput.disabled = this.value !== 'Standard Value';
                                        unitDropdown.disabled = this.value !== 'Standard Value';
                                        batasAtas.disabled = this.value!=='Standard Value';
                                        batasBawah.disabled = this.value!=='Standard Value';
                                        standardStringInput.disabled = this.value !== 'Standard String';
                                        standardImageInput.disabled = this.value !== 'Standard Image';
                                        remarkImage.disabled = this.value !== 'Standard Image';
                                        statusImage.disabled = this.value !== 'Standard Image';

                                        standardValueInput.required = this.value === 'Standard Value';
                                        unitDropdown.required = this.value === 'Standard Value';
                                        batasAtas.required=this.value==='Standard Value';
                                        batasBawah.required=this.value==='Standard Value';
                                        standardStringInput.required = this.value === 'Standard String';
                                        standardImageInput.required = this.value === 'Standard Image';
                                        remarkImage.required = this.value === 'Standard Image';
                                        statusImage.required = this.value === 'Standard Image';
                                    });
                                });

                                    function resetFormElements() {
                                        standardValueInput.value = '';
                                        unitDropdown.value = ''; // If you want to set a default option, update this accordingly
                                        batasAtas.value = '';
                                        batasBawah.value = '';
                                        standardStringInput.value = '';
                                        standardImageInput.value = '';
                                        remarkImage.value = '';
                                        statusImage.value = '';
                                        uploadedImage.src = '#';
                                        uploadedImage.hidden = true;
                                    }

                                    radioButtons.forEach((radioButton) => {
                                        radioButton.addEventListener('change', function() {
                                            const selectedOption = this.value;
                                            resetFormElements();

                                            standardValueInput.disabled = selectedOption !== 'Standard Value';
                                            unitDropdown.disabled = selectedOption !== 'Standard Value';
                                            batasAtas.disabled = selectedOption !== 'Standard Value';
                                            batasBawah.disabled = selectedOption !== 'Standard Value';
                                            standardStringInput.disabled = selectedOption !== 'Standard String';
                                            standardImageInput.disabled = selectedOption !== 'Standard Image';
                                            remarkImage.disabled = selectedOption !== 'Standard Image';

                                            standardValueInput.required = selectedOption === 'Standard Value';
                                            unitDropdown.required = selectedOption === 'Standard Value';
                                            batasAtas.required = selectedOption === 'Standard Value';
                                            batasBawah.required = selectedOption === 'Standard Value';
                                            standardStringInput.required = selectedOption === 'Standard String';
                                            standardImageInput.required = selectedOption === 'Standard Image';
                                            remarkImage.required = selectedOption === 'Standard Image';
                                        });
                                    });

                                     // Function to handle image preview
                                    function previewImage(event) {
                                    const input = event.target;
                                    const previewImage = document.getElementById('uploaded-image');

                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();

                                        reader.onload = function (e) {
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
                                const fileInput = document.getElementById('standard-image');
                                fileInput.addEventListener('change', previewImage);

                                // Show the uploaded image if it exists
                                @if ($standar->check === 'Standard Image' && !empty($standar->standard_check))
                                uploadedImage.hidden = false;
                                @endif
                            </script>

                            <div class="form-group">
                                <label for="status" class="form-control-label text-light"
                                    name="status">Status</label><br>
                                <select class="form-select" name="status">
                                    <option value="active"  @if ($standar->status === 'active') selected @endif>Active</option>
                                    <option value="inactive"  @if ($standar->status === 'inactive') selected @endif>Inactive</option>
                                </select>
                            </div>

                        <input type="hidden" name="check" value="{{ $standar->status_data === 'int' ? 'Standard Value' : ($standar->status_data === 'string' ? 'Standard String' : 'Standard Image') }}">

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update Standard</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
@endsection


