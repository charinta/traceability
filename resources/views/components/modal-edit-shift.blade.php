<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-shift" tabindex="-1" aria-labelledby="modalShift" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-shift" id="modalShift">EDIT SHIFT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">Shift</label>
                    <input class="form-control" id="shift-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-shift-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Start</label>
                    <input class="form-control" id="start-edit" type="time">
                    <div class="alert alert-danger mt-2 d-none" id="alert-start-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Finish</label>
                    <input class="form-control" id="finish-edit" type="time">
                    <div class="alert alert-danger mt-2 d-none" id="alert-finish-edit" role="alert"></div>
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
    $(document).ready(function() {
        $('body').on('click', '#btn-edit-shift', function() {
            let id = $(this).data('id');
            console.log(id);

            //fetch detail post with ajax
            $.ajax({
                url: `/shift/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    //fill data to form
                    $('#id').val(response.data.id);
                    $('#shift-edit').val(response.data.shift);
                    $('#start-edit').val(response.data.start);
                    $('#finish-edit').val(response.data.finish);

                    //open modal
                    $('#modal-edit-shift').modal('show');
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
            let shift = $('#shift-edit').val();
            // console.log(shift);
            let start = $('#start-edit').val();
            // console.log(start);
            let finish = $('#finish-edit').val();
            // console.log(finish);
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: `/shift/${id}`,
                type: "PUT",
                dataType: "json",
                cache: false,
                data: {
                    "_method": 'PUT',
                    "shift": shift,
                    "start": start,
                    "finish": finish,
                    "_token": token
                },
                success: function(response) {
                    location.reload();

                    let shiftUpdate = `
                          <tr id="index_${response.data.id}">
                              <td>${response.data.shift}</td>
                              <td>${response.data.start}</td>
                              <td>${response.data.finish}</td>
                              <td class="text-center">
                                  <a href="javascript:void(0)" id="btn-edit-shift" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-shift">EDIT</a>
                                  <a href="javascript:void(0)" id="btn-delete-shift" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-shift">DELETE</a>
                              </td>
                          </tr>
                      `;

                    //append to post data
                    $(`#index_${response.data.id}`).replaceWith(shiftUpdate);

                    //close modal
                    $('#modal-edit-shift').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.shift[0]) {

                        //show alert
                        $('#alert-shift-edit').removeClass('d-none');
                        $('#alert-shift-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-shift-edit').html(error.responseJSON.shift[0]);
                    }
                    if (error.responseJSON.start[0]) {

                        //show alert
                        $('#alert-start-edit').removeClass('d-none');
                        $('#alert-start-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-start-edit').html(error.responseJSON.start[0]);
                    }
                    if (error.responseJSON.finish[0]) {

                        //show alert
                        $('#alert-finish-edit').removeClass('d-none');
                        $('#alert-finish-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-finish-edit').html(error.responseJSON.finish[0]);
                    }
                }
            });
        });
        $('[data-dismiss="modal"]').click(function() {
            $('#modal-edit-shift').modal('hide');
        });
    });
</script>
