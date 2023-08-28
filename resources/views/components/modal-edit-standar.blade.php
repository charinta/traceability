<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-standar" tabindex="-1" aria-labelledby="modalStandar" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-standar" id="modalHolder">EDIT STANDAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">Pos</label>
                    <select class="form-select" name="pos_name" id="pos-edit">
                        @foreach ($activePosNames as $posName)
                            <option value="{{ $posName }}">{{ $posName }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-pos-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Item Check</label>
                    <select class="form-select" name="item_check" id="item-edit">
                        <option value="diameter">Diameter</option>
                        <option value="length">Length</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-item-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Select Standard Type:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="Standard Value"
                            id="opt-standard-value-int">
                        <label class="control-label" for="name">Standard Value</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="Standard String"
                            id="opt-standard-string-string">
                        <label class="control-label" for="name">Standard String</label>
                    </div>
                    <div class="alert alert-danger mt-2 d-none" id="alert-type-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Standard Value</label>
                    <div class="input-group">
                        @foreach ($standar as $stand)
                            <input type="text" class="form-control" name="standard_check" style="margin-right: 7px"
                                id="value-edit" value="{{ explode(' ', $stand)[0] }}">
                            <input type="hidden" name="selected_option" value="Standard Value">
                            <div class="input-group-append">
                                <select class="form-select" id="dropdown-edit" name="unit-dropdown">
                                    <option value="cm" {{ strpos($stand, 'cm') !== false ? 'selected' : '' }}>cm
                                    </option>
                                    <option value="inch" {{ strpos($stand, 'inch') !== false ? 'selected' : '' }}>inch
                                    </option>
                                    <option value="m" {{ strpos($stand, 'm') !== false ? 'selected' : '' }}>m
                                    </option>
                                    <option value="ft" {{ strpos($stand, 'ft') !== false ? 'selected' : '' }}>ft
                                    </option>
                                </select>
                            </div>
                            @endforeach
                    </div>
                    <div class="alert alert-danger mt-2 d-none" id="alert-value-edit" role="alert"></div>
                </div>
                <div class="form-group d-flex">
                    <div class="flex-grow-1 me-2">
                        <label class="control-label" for="name">Toleransi Atas</label>
                        <input class="form-control" type="text" name="batas_atas" id="batas-atas" disabled>
                        <div class="alert alert-danger mt-2 d-none" id="alert-atas-edit" role="alert"></div>
                    </div>
                    <div class="flex-grow-1">
                        <label class="control-label" for="name">Toleransi Bawah</label>
                        <input class="form-control" type="text" name="batas_bawah" id="batas-bawah" disabled>
                        <div class="alert alert-danger mt-2 d-none" id="alert-bawah-edit" role="alert"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Standard String</label>
                    <input class="form-control" id="string-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-string-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Status</label>
                    <select class="form-select" name="status" id="status-edit">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-status-edit" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="button" class="btn bg-gradient-warning update" id="update">UPDATE</button>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // $(document).ready(function() {
    //     const radioButtons1 = document.querySelectorAll('input[name="check"]');
    //     const standardValueInput1 = document.getElementById('value-edit');
    //     const unitDropdown1 = document.getElementById('dropdown-edit');
    //     const batasAtas1 = document.getElementById('batas-atas');
    //     const batasBawah1 = document.getElementById('batas-bawah');
    //     const standardStringInput1 = document.getElementById('string-edit');

    //     radioButtons1.forEach((radioButton) => {
    //         radioButton.addEventListener('change', function() {
    //             const selectedOption = this.value;

    //             standardValueInput1.disabled = selectedOption !== 'Standard Value';
    //             unitDropdown1.disabled = selectedOption !== 'Standard Value';
    //             batasAtas1.disabled = selectedOption !== 'Standard Value';
    //             batasBawah1.disabled = selectedOption !== 'Standard Value';
    //             standardStringInput1.disabled = selectedOption !== 'Standard String';

    //             standardValueInput1.required = selectedOption === 'Standard Value';
    //             unitDropdown1.required = selectedOption === 'Standard Value';
    //             batasAtas1.required = selectedOption === 'Standard Value';
    //             batasBawah1.required = selectedOption === 'Standard Value';
    //             standardStringInput1.required = selectedOption === 'Standard String';
    //         });
    //     });

    //     function resetFormElements() {
    //         standardValueInput1.value = '';
    //         unitDropdown1.value = ''; // If you want to set a default option, update this accordingly
    //         batasAtas1.value = '';
    //         batasBawah1.value = '';
    //         standardStringInput1.value = '';
    //         // statusImage1.value = '';
    //     }

    //     radioButtons1.forEach((radioButtons) => {
    //         radioButtons.addEventListener('change', function() {
    //             const selectedOption = this.value;
    //             resetFormElements();

    //             standardValueInput1.disabled = selectedOption !== 'Standard Value';
    //             unitDropdown1.disabled = selectedOption !== 'Standard Value';
    //             batasAtas1.disabled = selectedOption !== 'Standard Value';
    //             batasBawah1.disabled = selectedOption !== 'Standard Value';
    //             standardStringInput1.disabled = selectedOption !== 'Standard String';
    //             // remarkImage.disabled = selectedOption !== 'Standard Image';

    //             standardValueInput1.required = selectedOption === 'Standard Value';
    //             unitDropdown1.required = selectedOption === 'Standard Value';
    //             batasAtas1.required = selectedOption === 'Standard Value';
    //             batasBawah1.required = selectedOption === 'Standard Value';
    //             standardStringInput1.required = selectedOption === 'Standard String';
    //             // remarkImage.required = selectedOption === 'Standard Image';
    //         });
    //     });
    // });

    $(document).ready(function() {
        $('body').on('click', '#btn-edit-standar', function() {
            let id = $(this).data('id');
            console.log(id);

            //fetch detail post with ajax
            $.ajax({
                url: `/register-standar/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    //fill data to form
                    $('#id').val(response.data.id);
                    $('#pos-edit').val(response.data.pos_name);
                    $('#item-edit').val(response.data.item_check);
                    $('#batas-atas').val(response.data.batas_atas);
                    $('#batas-bawah').val(response.data.batas_bawah);
                    $('#status-edit').val(response.data.status);
                    // Set the selected radio button based on status_data
                    $('#opt-standard-value-int').prop('checked', response.data
                        .status_data ===
                        'int');
                    $('#opt-standard-string-string').prop('checked', response.data
                        .status_data ===
                        'string');

                    // Set values for dropdown and standard value based on the response data
                    if (response.data.status_data === 'int') {
                        $('#value-edit').val(response.data.standard_check);
                        $('#dropdown-edit').val(response.data.standard_check);
                    } else if (response.data.status_data === 'string') {
                        $('#string-edit').val(response.data.standard_check);
                    }

                    $('.radio-type').prop('checked', response.data.status_data === 'int');
                    $('.standard-input').val(response.data.standard_check);

                    //open modal
                    $('#modal-edit-standar').modal('show');
                }
            });
        });

        $('#update').click(function(e) {
            e.preventDefault();
            console.log("update button clicked");

            //define variable
            let id = $('#id').val();
            // console.log("id clicked: ", id);
            if (!id) {
                console.log('id is not defined');
            }
            let pos_name = $('#pos-edit').val();
            let item_check = $('#item-edit').val();
            let batas_atas = $('#batas-atas').val();
            let batas_bawah = $('#batas-bawah').val();
            let status = $('#status-edit').val();

            let status_data = '';
            let standard_check = '';

            if ($('#opt-standard-value-int').prop('checked')) {
                status_data = 'int';
                standard_check = $('#value-edit').val() + ' ' + $('#dropdown-edit').val();
            } else if ($('#opt-standard-string-string').prop('checked')) {
                status_data = 'string';
                standard_check = $('#string-edit').val();
            }
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: `/register-standar/${id}`,
                type: "PUT",
                dataType: 'json',
                cache: false,
                data: {
                    "_method": 'PUT',
                    "pos_name": pos_name,
                    "item_check": item_check,
                    "batas_atas": batas_atas,
                    "batas_bawah": batas_bawah,
                    "status": status,
                    "status_data": status_data,
                    "standard_check": standard_check,
                    "_token": token
                },
                success: function(response) {
                    location.reload();

                    let standar = `
                                    <tr id="index_${response.data.id}">
                                        <td>${response.data.pos_name}</td>
                                        <td>${response.data.item_check}</td>
                                        <td>${response.data.standard_check}</td>
                                        <td>${response.data.batas_atas}</td>
                                        <td>${response.data.batas_bawah}</td>
                                        <td>${response.data.status_data}</td>
                                        <td>${response.data.status}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" id="btn-edit-standar" data-id="${response.data.id}"
                                                class="btn btn-primary btn-sm btn-edit-standar">EDIT</a>
                                            <a href="javascript:void(0)" id="btn-delete-standar" data-id="${response.data.id}"
                                                class="btn btn-danger btn-sm btn-delete-standar">DELETE</a>
                                        </td>
                                    </tr>
                                    `;

                    // //append to post data
                    $(`#index_${response.data.id}`).replaceWith(standar);

                    //close modal
                    $('#modal-edit-standar').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.pos_name[0]) {

                        //show alert
                        $('#alert-pos-edit').removeClass('d-none');
                        $('#alert-pos-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-pos-edit').html(error.responseJSON.pos_name[
                            0]);
                    }
                    if (error.responseJSON.item_check[0]) {

                        //show alert
                        $('#alert-item-edit').removeClass('d-none');
                        $('#alert-item-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-item-edit').html(error.responseJSON.item_check[
                            0]);
                    }
                    if (error.responseJSON.batas_atas[0]) {

                        //show alert
                        $('#alert-atas-edit').removeClass('d-none');
                        $('#alert-atas-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-atas-edit').html(error.responseJSON.batas_atas[
                            0]);
                    }
                    if (error.responseJSON.batas_bawah[0]) {

                        //show alert
                        $('#alert-bawah-edit').removeClass('d-none');
                        $('#alert-bawah-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-bawah-edit').html(error.responseJSON.batas_bawah[
                            0]);
                    }
                    if (error.responseJSON.status[0]) {

                        //show alert
                        $('#alert-status-edit').removeClass('d-none');
                        $('#alert-status-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-status-edit').html(error.responseJSON
                            .status[
                                0]);
                    }
                    if (error.responseJSON.status_data[0]) {

                        //show alert
                        $('#alert-type-edit').removeClass('d-none');
                        $('#alert-type-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-type-edit').html(error.responseJSON
                            .status_data[
                                0]);
                    }
                    if (error.responseJSON.standard_check[0]) {

                        //show alert
                        $('#alert-string-edit').removeClass('d-none');
                        $('#alert-string-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-string-edit').html(error.responseJSON
                            .standard_check[
                                0]);
                    }
                    if (error.responseJSON.standard_check[0]) {

                        //show alert
                        $('#alert-value-edit').removeClass('d-none');
                        $('#alert-value-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-value-edit').html(error.responseJSON
                            .standard_check[
                                0]);
                    }
                }
            });
        });


        $('[data-dismiss="modal"]').click(function() {
            // Hide the modal with ID "modal-edit-standar"
            $('#modal-edit-standar').modal('hide');
        });
    });
</script>
