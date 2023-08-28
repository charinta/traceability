<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-tool" tabindex="-1" aria-labelledby="modalTool" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-tool" id="modalTool">EDIT TOOL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">No Drawing</label>
                    <input class="form-control" id="no-draw-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-no-draw-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Type Tool</label>
                    <select class="form-select" id="type-edit">
                        <option value="drill">D</option>
                        <option value="reamer">R</option>
                        <option value="tap">T</option>
                        <option value="enmilld">E</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-type-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Spec. Tool</label>
                    <input class="form-control" id="spec-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-spec-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Diameter</label>
                    <input class="form-control" id="diameter-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-diameter-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Lifetime</label>
                    <input class="form-control" id="lifetime-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-lifetime-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Standard Frekuensi</label>
                    <input class="form-control" id="frekuensi-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-frekuensi-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="line">Line</label>
                    <select class="form-select" id="line-edit">
                        @foreach ($lines as $line)
                                        <option value="{{ $line->id }}">{{ ucfirst($line->line) }}</option>
                                    @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-line-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="op">OP</label>
                    <select class="form-select" id="ops" name="op">
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-ops" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Holder</label>
                    <select class="form-select" id="holder-edit">
                        @foreach ($noDrawingHold as $noHold)
                            <option value="{{ $noHold }}">{{ $noHold }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-holder-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Washing CT</label>
                    <input class="form-control" id="washing-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-washing-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Grinding CT</label>
                    <input class="form-control" id="grinding-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-grinding-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Setting CT</label>
                    <input class="form-control" id="setting-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-setting-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Image Check</label>
                    <input class="form-control" type="file" name="image-edit" id="image-edit" accept="image/*">
                    <input type="hidden" id="selected-image-id" value="">
                    <div id="image-preview-container" class="mt-3">
                          </div>
                </div>
                                    
                <div class="form-group">
                    <label class="control-label" for="name">Remark</label>
                    <input class="form-control" id="remark-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-remark-edit" role="alert"></div>
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

  $(document).ready(function () {
    function previewImage(input) {
    const previewContainer = $('#image-preview-container');
    previewContainer.empty();

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = $('<img>', {
                class: 'uploaded-image',
                src: e.target.result,
                alt: 'Uploaded Image',
                style: 'max-width: 100%; max-height: 100%; object-fit: contain; margin-top: 10px;'
            });

            previewContainer.append(img);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

  
    // Code for handling Line dropdown change event
    $('#line-edit').on('change', function () {
        var lineID = $(this).val();
        if (lineID) {
            $.ajax({
                url: '/findOp/' + lineID,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('select[name="op"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="op"]').append('<option value="'+ value.op +'">' + value.op + '</option>');
                        });
                    } else {
                        $('select[name="op"]').empty();
                    }
                }
            });
        } else {
            $('select[name="op"]').empty();
        }
    });

    $('body').on('click', '#btn-edit-tool', function () {
        let id = $(this).data('id');
        // Fetch detail post with ajax
        $.ajax({
            url: `/register-tool/${id}`,
            type: "GET",
            dataType: "json",
            cache: false,
            success: function (response) {
                console.log(response.data);
                // Fill data to form
                $('#id').val(response.data.id);
                $('#no-draw-edit').val(response.data.no_drawing_tool);
                $('#type-edit').val(response.data.tool_type);
                $('#spec-edit').val(response.data.tool_spec);
                $('#diameter-edit').val(response.data.tool_diameter);
                $('#lifetime-edit').val(response.data.tool_lifetime_std);
                $('#frekuensi-edit').val(response.data.tool_frequency_std);
                $('#line-edit').val(response.data.line);
                $('#holder-edit').val(response.data.no_drawing_holder);
                $('#washing-edit').val(response.data.washing_ct);
                $('#grinding-edit').val(response.data.grinding_ct);
                $('#setting-edit').val(response.data.setting_ct);
                $('#remark-edit').val(response.data.remark);
                console.log("Image Path:", image_check);
                $('#image-edit').html(`<img src="${response.data.image_check}" width="100">`);
                $('#selected-image-id').val(response.data.image_check);
               //  previewImage(document.getElementById('image-edit'));
                $('#line-edit').trigger('change');

                // Set default value for the OP dropdown
                var defaultOp = response.data.op;

                // Fetch OP options and set selected for default
                var lineID = $('#line-edit').val();
                if (lineID) {
                    $.ajax({
                        url: '/findOp/' + lineID,
                        type: "GET",
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                $('select[name="op"]').empty();
                                $.each(data, function (key, value) {
                                    var option = $('<option></option>')
                                        .val(value.op)
                                        .text(value.op);

                                    if (value.op === defaultOp) {
                                        option.attr('selected', 'selected');
                                    }

                                    $('select[name="op"]').append(option);
                                });
                            } else {
                                $('select[name="op"]').empty();
                            }
                        }
                    });
                } else {
                    $('select[name="op"]').empty();
                }
                     // Open modal
                    $('#modal-edit-tool').modal('show');
                }
            });
        });
        //ini buat nampilin image pas abis di input di form update
    $('#image-edit').on('change', function () {
    previewImage(this);
});


        $('#update').click(function (e) {
            e.preventDefault();
            console.log("update button clicked");

            //define variable
            let id = $('#id').val();
            if (!id) {
                console.log('id is not defined');
            }
            let no_drawing_tool = $('#no-draw-edit').val();
            let tool_type = $('#type-edit').val();
            let tool_spec = $('#spec-edit').val();
            let tool_diameter = $('#diameter-edit').val();
            let tool_lifetime_std = $('#lifetime-edit').val();
            let tool_frequency_std = $('#frekuensi-edit').val();
            let line = $('#line-edit').val();
            let op = $('#ops').val();
            let no_drawing_holder = $('#holder-edit').val();
            let washing_ct = $('#washing-edit').val();
            let grinding_ct = $('#grinding-edit').val();
            let setting_ct = $('#setting-edit').val();
            let image_check = $('#selected-image-id').val();
            let remark = $('#remark-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");
          //  console.log(token);

            $.ajax({
                url: `/register-tool/${id}`,
                type: "PUT",
                dataType: 'json',
                cache: false,
                data: {
                    "_method": 'PUT',
                    "no_drawing_tool": no_drawing_tool,
                    "tool_type": tool_type,
                    "tool_spec": tool_spec,
                    "tool_diameter": tool_diameter,
                    "tool_lifetime_std": tool_lifetime_std,
                    "tool_frequency_std": tool_frequency_std,
                    "line": line,
                    "op": op,
                    "no_drawing_holder": no_drawing_holder,
                    "washing_ct": washing_ct,
                    "grinding_ct": grinding_ct,
                    "setting_ct": setting_ct,
                    "image_check": image_check,
                    "remark": remark,
                    "_token": token
                },
                success: function(response) {
                    location.reload();
                    // $('#image-edit').attr('src', 'assets/img/image_check/' + imageInput
                    //     .dataset.filename);
                    // $('#image-edit').removeAttr('hidden'); // Show the image

                    let tool = `
                          <tr id="index_${response.data.id}">
                              <td>${response.data.no_drawing_tool}</td>
                              <td>${response.data.tool_type}</td>
                              <td>${response.data.tool_spec}</td>
                              <td>${response.data.tool_diameter}</td>
                              <td>${response.data.tool_lifetime_std}</td>
                              <td>${response.data.tool_frequency_std}</td>
                              <td>${response.data.line}</td>
                              <td>${response.data.op}</td>
                              <td>${response.data.no_drawing_holder}</td>
                              <td>${response.data.washing_ct}</td>
                              <td>${response.data.grinding_ct}</td>
                              <td>${response.data.setting_ct}</td>
                              <td>${response.data.image_check}</td>
                              <td>${response.data.remark}</td>
                              <td class="text-center">
                                  <a href="javascript:void(0)" id="btn-edit-tool" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-tool">EDIT</a>
                                  <a href="javascript:void(0)" id="btn-delete-tool" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-tool">DELETE</a>
                              </td>
                          </tr>
                      `;

                    //append to post data
                    $(`#index_${response.data.id}`).replaceWith(tool);
                    $('#image-edit').attr('src', newImageUrl);
                    //close modal
                    $('#modal-edit-tool').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.no_drawing_tool[0]) {

                        //show alert
                        $('#alert-no-draw-edit').removeClass('d-none');
                        $('#alert-no-draw-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-no-draw-edit').html(error.responseJSON
                            .no_drawing_tool[
                                0]);
                    }
                    if (error.responseJSON.tool_type[0]) {

                        //show alert
                        $('#alert-type-edit').removeClass('d-none');
                        $('#alert-type-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-type-edit').html(error.responseJSON.tool_type[0]);
                    }
                    if (error.responseJSON.tool_spec[0]) {

                        //show alert
                        $('#alert-spec-edit').removeClass('d-none');
                        $('#alert-spec-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-spec-edit').html(error.responseJSON.tool_spec[0]);
                    }
                    if (error.responseJSON.tool_diameter[0]) {

                        //show alert
                        $('#alert-diameter-edit').removeClass('d-none');
                        $('#alert-diameter-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-diameter-edit').html(error.responseJSON.tool_diameter[
                            0]);
                    }
                    if (error.responseJSON.tool_lifetime_std[0]) {

                        //show alert
                        $('#alert-lifetime-edit').removeClass('d-none');
                        $('#alert-lifetime-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-lifetime-edit').html(error.responseJSON
                            .tool_lifetime_std[
                                0]);
                    }
                    if (error.responseJSON.tool_frequency_std[0]) {

                        //show alert
                        $('#alert-frekuensi-edit').removeClass('d-none');
                        $('#alert-frekuensi-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-frekuensi-edit').html(error.responseJSON
                            .tool_frequency_std[0]);
                    }
                    if (error.responseJSON.line[0]) {

                        //show alert
                        $('#alert-line-edit').removeClass('d-none');
                        $('#alert-line-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-line-edit').html(error.responseJSON.line[0]);
                    }
                    if (error.responseJSON.op[0]) {

                        //show alert
                        $('#alert-ops').removeClass('d-none');
                        $('#alert-ops').addClass('d-block');

                        //add message to alert
                        $('#alert-ops').html(error.responseJSON.op[0]);
                    }
                    if (error.responseJSON.no_drawing_holder[0]) {

                        //show alert
                        $('#alert-holder-edit').removeClass('d-none');
                        $('#alert-holder-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-holder-edit').html(error.responseJSON
                            .no_drawing_holder[
                                0]);
                    }
                    if (error.responseJSON.washing_ct[0]) {

                        //show alert
                        $('#alert-washing-edit').removeClass('d-none');
                        $('#alert-washing-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-washing-edit').html(error.responseJSON.washing_ct[0]);
                    }
                    if (error.responseJSON.grinding_ct[0]) {

                        //show alert
                        $('#alert-grinding-edit').removeClass('d-none');
                        $('#alert-grinding-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-grinding-edit').html(error.responseJSON.grinding_ct[
                            0]);
                    }
                    if (error.responseJSON.setting_ct[0]) {

                        //show alert
                        $('#alert-setting-edit').removeClass('d-none');
                        $('#alert-setting-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-setting-edit').html(error.responseJSON.setting_ct[0]);
                    }
                    if (error.responseJSON.image_check[0]) {

                        //show alert
                        $('#alert-image-edit').removeClass('d-none');
                        $('#alert-image-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-image-edit').html(error.responseJSON.image_check[0]);
                    }
                    if (error.responseJSON.remark[0]) {

                        //show alert
                        $('#alert-remark-edit').removeClass('d-none');
                        $('#alert-remark-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-remark-edit').html(error.responseJSON.remark[0]);
                    }

                }

            });
        });
        $('[data-dismiss="modal"]').click(function() {
            // Hide the modal with ID "modal-edit-tool"
            $('#modal-edit-tool').modal('hide');
        });
    });
</script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
