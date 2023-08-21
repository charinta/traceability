<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-user" tabindex="-1" aria-labelledby="modalUser" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-user" id="modalUser">EDIT USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">Nama</label>
                    <input class="form-control" id="nama-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-nama-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">NPK</label>
                    <input class="form-control" id="npk-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-npk-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Pos</label>
                    <select class="form-select" name="pos" id="pos-edit">
                        @foreach ($activePosNames as $posName)
                            <option value="{{ $posName }}">{{ $posName }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-pos-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Role</label>
                    <select class="form-select" name="role" id="role-edit">
                        <option value="Admin">Admin
                        </option>
                        <option value="User">User
                        </option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" id="alert-role-edit" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Password</label>
                    <input class="form-control" id="password-edit" type="password">
                    <div class="alert alert-danger mt-2 d-none" id="alert-password-edit" role="alert"></div>
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
        $('body').on('click', '#btn-edit-user', function() {
            let id = $(this).data('id');
            console.log(id);

            //fetch detail post with ajax
            $.ajax({
                url: `/user-account/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    //fill data to form
                    $('#id').val(response.data.id);
                    $('#nama-edit').val(response.data.username);
                    $('#npk-edit').val(response.data.npk);
                    $('#pos-edit').val(response.data.pos);
                    $('#role-edit').val(response.data.role);
                    $('#password-edit').val(response.data.password);
                    //open modal
                    $('#modal-edit-user').modal('show');
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
            let username = $('#nama-edit').val();
            let npk = $('#npk-edit').val();
            let pos = $('#pos-edit').val();
            let role = $('#role-edit').val();
            let password = $('#password-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: `/user-account/${id}`,
                type: "PUT",
                dataType: 'json',
                cache: false,
                data: {
                    "_method": 'PUT',
                    "username": username,
                    "npk": npk,
                    "pos": pos,
                    "role": role,
                    "password": password,
                    "_token": token
                },
                success: function(response) {
                    location.reload();

                    let user = `
                          <tr id="index_${response.data.id}">
                              <td>${response.data.username}</td>
                              <td>${response.data.npk}</td>
                              <td>${response.data.pos}</td>
                              <td>${response.data.role}</td>
                              <td>${response.data.password}</td>
                              <td class="text-center">
                                  <a href="javascript:void(0)" id="btn-edit-user" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-user">EDIT</a>
                                  <a href="javascript:void(0)" id="btn-delete-user" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-user">DELETE</a>
                              </td>
                          </tr>
                      `;

                    // //append to post data
                    $(`#index_${response.data.id}`).replaceWith(holder);

                    //close modal
                    $('#modal-edit-user').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.username[0]) {

                        //show alert
                        $('#alert-nama-edit').removeClass('d-none');
                        $('#alert-nama-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-nama-edit').html(error.responseJSON.username[
                            0]);
                    }
                    if (error.responseJSON.npk[0]) {

                        //show alert
                        $('#alert-npk-edit').removeClass('d-none');
                        $('#alert-npk-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-npk-edit').html(error.responseJSON.npk[
                            0]);
                    }
                    if (error.responseJSON.pos[0]) {

                        //show alert
                        $('#alert-pos-edit').removeClass('d-none');
                        $('#alert-pos-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-pos-edit').html(error.responseJSON.pos[
                            0]);
                    }
                    if (error.responseJSON.role[0]) {

                        //show alert
                        $('#alert-role-edit').removeClass('d-none');
                        $('#alert-role-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-role-edit').html(error.responseJSON.role[
                            0]);
                    }
                    if (error.responseJSON.password[0]) {

                        //show alert
                        $('#alert-password-edit').removeClass('d-none');
                        $('#alert-password-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-password-edit').html(error.responseJSON
                            .password[
                                0]);
                    }
                }
            });
        });
        $('[data-dismiss="modal"]').click(function() {
            // Hide the modal with ID "modal-edit-user"
            $('#modal-edit-user').modal('hide');
        });
    });
</script>
