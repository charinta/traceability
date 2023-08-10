<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-holder" tabindex="-1" aria-labelledby="modalHolder" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-holder" id="modalHolder">EDIT HOLDER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">No Drawing</label>
                    <input class="form-control" id="no-holder" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-no-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Holder Name</label>
                    <input class="form-control" id="holder-name" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-name-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Spec. Holder</label>
                    <input class="form-control" id="holder-spec" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-spec-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Diameter</label>
                    <input class="form-control" id="holder-diameter" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-diameter-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Lifetime</label>
                    <input class="form-control" id="holder-lifetime" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-lifetime-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Standard Frekuensi</label>
                    <input class="form-control" id="holder-frequency" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-frequency-edit" role="alert"></div>
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
        $('body').on('click', '#btn-edit-holder', function() {
            let id = $(this).data('id');
            console.log(id);

            //fetch detail post with ajax
            $.ajax({
                url: `/register-holder/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    //fill data to form
                    $('#id').val(response.data.id);
                    $('#no-holder').val(response.data.no_drawing_holder);
                    $('#holder-name').val(response.data.holder_name);
                    $('#holder-spec').val(response.data.holder_spec);
                    $('#holder-diameter').val(response.data.holder_diameter);
                    $('#holder-lifetime').val(response.data.holder_lifetime_std);
                    $('#holder-frequency').val(response.data.holder_frequency_std);
                    //open modal
                    $('#modal-edit-holder').modal('show');
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
            let no_drawing_holder = $('#no-holder').val();
            let holder_name = $('#holder-name').val();
            let holder_spec = $('#holder-spec').val();
            let holder_diameter = $('#holder-diameter').val();
            let holder_lifetime_std = $('#holder-lifetime').val();
            let holder_frequency_std = $('#holder-frequency').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: `/register-holder/${id}`,
                type: "PUT",
                dataType: 'json',
                cache: false,
                data: {
                    "_method": 'PUT',
                    "no_drawing_holder": no_drawing_holder,
                    "holder_name": holder_name,
                    "holder_spec": holder_spec,
                    "holder_diameter": holder_diameter,
                    "holder_lifetime_std": holder_lifetime_std,
                    "holder_frequency_std": holder_frequency_std,
                    "_token": token
                },
                success: function(response) {
                    location.reload();

                    let holder = `
                          <tr id="index_${response.data.id}">
                              <td>${response.data.no_drawing_holder}</td>
                              <td>${response.data.holder_name}</td>
                              <td>${response.data.holder_spec}</td>
                              <td>${response.data.holder_diameter}</td>
                              <td>${response.data.holder_lifetime_std}</td>
                              <td>${response.data.holder_frequency_std}</td>
                              <td class="text-center">
                                  <a href="javascript:void(0)" id="btn-edit-holder" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-holder">EDIT</a>
                                  <a href="javascript:void(0)" id="btn-delete-holder" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-holder">DELETE</a>
                              </td>
                          </tr>
                      `;

                    // //append to post data
                    $(`#index_${response.data.id}`).replaceWith(holder);

                    //close modal
                    $('#modal-edit-holder').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.no_drawing_holder[0]) {

                        //show alert
                        $('#alert-no-edit').removeClass('d-none');
                        $('#alert-no-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-no-edit').html(error.responseJSON.no_drawing_holder[
                            0]);
                    }
                    if (error.responseJSON.holder_name[0]) {

                        //show alert
                        $('#alert-name-edit').removeClass('d-none');
                        $('#alert-name-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-name-edit').html(error.responseJSON.holder_name[
                            0]);
                    }
                    if (error.responseJSON.holder_spec[0]) {

                        //show alert
                        $('#alert-spec-edit').removeClass('d-none');
                        $('#alert-spec-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-spec-edit').html(error.responseJSON.holder_spec[
                            0]);
                    }
                    if (error.responseJSON.holder_diameter[0]) {

                        //show alert
                        $('#alert-diameter-edit').removeClass('d-none');
                        $('#alert-diameter-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-diameter-edit').html(error.responseJSON.holder_diameter[
                            0]);
                    }
                    if (error.responseJSON.holder_lifetime_std[0]) {

                        //show alert
                        $('#alert-lifetime-edit').removeClass('d-none');
                        $('#alert-lifetime-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-lifetime-edit').html(error.responseJSON
                            .holder_lifetime_std[
                                0]);
                    }
                    if (error.responseJSON.holder_frequency_std[0]) {

                        //show alert
                        $('#alert-frequency-edit').removeClass('d-none');
                        $('#alert-frequency-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-frequency-edit').html(error.responseJSON
                            .holder_frequency_std[
                                0]);
                    }
                }
            });
        });
        $('[data-dismiss="modal"]').click(function() {
            // Hide the modal with ID "modal-edit-holder"
            $('#modal-edit-holder').modal('hide');
        });
    });
</script>
