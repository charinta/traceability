<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-edit-item" tabindex="-1" aria-labelledby="modalItem" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-edit-item" id="modalItem">EDIT ITEM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id" type="text" name="id" hidden>
                <div class="form-group">
                    <label class="control-label" for="name">Item</label>
                    <input class="form-control" id="item-edit" type="text">
                    <div class="alert alert-danger mt-2 d-none" id="alert-item-edit" role="alert"></div>
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
        $('body').on('click', '#btn-edit-item', function() {
            let id = $(this).data('id');
            // console.log(id);

            //fetch detail post with ajax
            $.ajax({
                url: `/register-item/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    // console.log(response.data);
                    //fill data to form
                    $('#id').val(response.data.id);
                    $('#item-edit').val(response.data.item_check);
                    //open modal
                    $('#modal-edit-item').modal('show');
                }
            });
        });

        $('#update').click(function(e) {
            e.preventDefault();
            // console.log("update button clicked");

            //define variable
            let id = $('#id').val();
            if (!id) {
                // console.log('id is not defined');
            }
            let item_check = $('#item-edit').val();
            // console.log("item:", item_check);
            let token = $("meta[name='csrf-token']").attr("content");
            // console.log(token);

            $.ajax({
                url: `/register-item/${id}`,
                type: "PUT",
                dataType: 'json',
                cache: false,
                data: {
                    "_method": 'PUT',
                    "item_check": item_check,
                    "_token": token
                },
                success: function(response) {
                    location.reload();

                    let item = `
                          <tr id="index_${response.data.id}">
                              <td>${response.data.item_check}</td>
                              <td class="text-center">
                                  <a href="javascript:void(0)" id="btn-edit-item" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-item">EDIT</a>
                                  <a href="javascript:void(0)" id="btn-delete-item" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-item">DELETE</a>
                              </td>
                          </tr>
                      `;

                    //append to post data
                    $(`#index_${response.data.id}`).replaceWith(item);

                    //close modal
                    $('#modal-edit-item').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.item_check[0]) {

                        //show alert
                        $('#alert-item-edit').removeClass('d-none');
                        $('#alert-item-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-item-edit').html(error.responseJSON.item_check[0]);
                    }

                }

            });
        });
        $('[data-dismiss="modal"]').click(function() {
            // Hide the modal with ID "modal-edit-item"
            $('#modal-edit-item').modal('hide');
        });
    });
</script>
