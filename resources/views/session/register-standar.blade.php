@extends('layouts.user_type.guest')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card h-100 w-80 mt-n4 bg-gradient-dark">
                    <div class="card-header pb-0 p-3 bg-gradient-dark">
                        <h4 class="mb-0 text-light"> <b>Register Standard</b></h4>
                        <hr class="text-light">
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="pos" class="form-control-label text-light">Pos</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pos
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="item-check" class="form-control-label text-light">Item Check</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Item Check
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="opt-standard-value">
                                <label class="form-check-label text-light" for="opt-standard-value">
                                    Standard Value
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="opt-standard-string">
                                <label class="form-check-label text-light" for="opt-standard-string">
                                    Standard String
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="opt-standard-image">
                                <label class="form-check-label text-light" for="opt-standard-image">
                                    Standard Image
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="standard-value" class="form-control-label text-light">Standard Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="standard-value"
                                        placeholder="Enter a value" style="margin-right: 7px" disabled>
                                    <div class="input-group-append">
                                        <select class="form-select" id="unit-dropdown" disabled>
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
                                    <label for="toleransi-atas" class="form-control-label text-light">Toleransi Atas</label>
                                    <input class="form-control" type="text" id="toleransi-atas" disabled>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="toleransi-bawah" class="form-control-label text-light">Toleransi
                                        Bawah</label>
                                    <input class="form-control" type="text" id="toleransi-bawah" disabled>
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
                                <label for="status" class="form-control-label text-light">Status</label>
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="javascript:;">1</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">2</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">3</a></li>
                                    </ul>
                                </div>
                            </div>

                            <script>
                                const radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
                                const standardValueInput = document.getElementById('standard-value');
                                const unitDropdown = document.getElementById('unit-dropdown');
                                const toleransiAtas = document.getElementById('toleransi-atas');
                                const toleransiBawah = document.getElementById('toleransi-bawah');
                                const standardStringInput = document.getElementById('standard-string');
                                const standardImageInput = document.getElementById('standard-image');
                                const remarkImage = document.getElementById('remark');
                                const statusImage = document.getElementById('status-image');
                                const uploadedImage = document.getElementById('uploaded-image');

                                radioButtons.forEach((radioButton) => {
                                    radioButton.addEventListener('change', function() {
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
                                <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                    Standard</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tool Table</h6>
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
                                            Tool</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lifetime</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                    </tr>
                                </tbody>

                            </table>
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
