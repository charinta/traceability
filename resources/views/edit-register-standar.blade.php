@extends('layouts.user_type.auth')

@section('content')


    <div class="container-fluid py-4">
        <div class="row">
             
                        {{-- form body --}} {{--form--}}
            <div class="col-12 col-xl-3">
                <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Update Register Standard</b></h4>
                        <hr class="text-light">
                    </div>
                        <div class="card-body">
                            <form action="{{ route('register-standar.update', $standar->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                         <div class="form-group">
                                   <label for="pos_name" class="form-control-label text-light"
                                    name="pos_name">Pos</label><br>
                                    <select class="form-select" name="pos_name">
                                            @foreach($activePosNames as $posName)
                                                <option value="{{ $posName }}" @if($standar->pos_name === $posName) selected @endif>{{ $posName }}</option>
                                            @endforeach
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

                        
                            <script>
                                const radioButtons = document.querySelectorAll('input[name="check"]');
                                const standardValueInput = document.getElementById('standard-value');
                                const unitDropdown = document.getElementById('unit-dropdown');
                                const batasAtas = document.getElementById('batas_atas');
                                const batasBawah = document.getElementById('batas_bawah');
                                const standardStringInput = document.getElementById('standard-string');
                               
                                radioButtons.forEach((radioButton) => {
                                    radioButton.addEventListener('change', function () {
                                        standardValueInput.disabled = this.value !== 'Standard Value';
                                        unitDropdown.disabled = this.value !== 'Standard Value';
                                        batasAtas.disabled = this.value!=='Standard Value';
                                        batasBawah.disabled = this.value!=='Standard Value';
                                        standardStringInput.disabled = this.value !== 'Standard String';
                                       
                                        standardValueInput.required = this.value === 'Standard Value';
                                        unitDropdown.required = this.value === 'Standard Value';
                                        batasAtas.required=this.value==='Standard Value';
                                        batasBawah.required=this.value==='Standard Value';
                                        standardStringInput.required = this.value === 'Standard String';
                                     });
                                });

                                    function resetFormElements() {
                                        standardValueInput.value = '';
                                        unitDropdown.value = ''; // If you want to set a default option, update this accordingly
                                        batasAtas.value = '';
                                        batasBawah.value = '';
                                        standardStringInput.value = '';
                                        statusImage.value = '';
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
                                     //       remarkImage.disabled = selectedOption !== 'Standard Image';

                                            standardValueInput.required = selectedOption === 'Standard Value';
                                            unitDropdown.required = selectedOption === 'Standard Value';
                                            batasAtas.required = selectedOption === 'Standard Value';
                                            batasBawah.required = selectedOption === 'Standard Value';
                                            standardStringInput.required = selectedOption === 'Standard String';
                                       //     remarkImage.required = selectedOption === 'Standard Image';
                                        });
                                    });
                            </script>

                            <div class="form-group">
                                <label for="status" class="form-control-label text-light"
                                    name="status">Status</label><br>
                                <select class="form-select" name="status">
                                    <option value="active"  @if ($standar->status === 'active') selected @endif>Active</option>
                                    <option value="inactive"  @if ($standar->status === 'inactive') selected @endif>Inactive</option>
                                </select>
                            </div>

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


