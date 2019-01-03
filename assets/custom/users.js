$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");

    var usersDataTable =  $('#users_table').DataTable({
        "ajax": {
            url : base_url + 'admin/ajax/users_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#add_user_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/add_user',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    $('#addusermodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addusermodal').modal('toggle');
                    $('#add_user_form').trigger('reset');
                    usersDataTable.ajax.reload();
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        })

    })

    $(document).on('submit', '#update_user_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/update_user',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);  
                    $('#updateusermodal').modal('toggle');
                    $('#update_user_form').trigger('reset');
                    usersDataTable.ajax.reload();
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        })

    })

    $(document).on('change', '.user_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                usersDataTable.ajax.reload();
                editUser(id);
                break;
            case '2':
                usersDataTable.ajax.reload();
                deleteUser(id);
                break;
        
            
        }
    })

    function editUser( id )
    {
        $.ajax({
            method : "GET",
            url : base_url + 'admin/ajax/get_user_details',
            dataType : "JSON",
            data : { id : id },
            success : function(response) {
                if (response.success) {
                    $('#update_user_form input[name="user_id"]').val(response.user.id);
                    $('#update_user_form input[name="username"]').val(response.user.username);
                    $('#update_user_form input[name="firstname"]').val(response.user.first_name);
                    $('#update_user_form input[name="middlename"]').val(response.user.middle_name);
                    $('#update_user_form input[name="lastname"]').val(response.user.last_name);
                    $('#update_user_form select[name="department"]').val(response.user.department_detail_id);
                    $('#update_user_form select[name="status"]').val(response.user.is_active);
                    $('#updateusermodal').modal({backdrop: 'static', keyboard: false})
                    $('#updateusermodal').modal('toggle');
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        })
    }

    function deleteUser( id )
    {
        var r = confirm("Are you sure you want to delete this user?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'admin/action/delete_user',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        usersDataTable.ajax.reload();
                    }else{
                        if (response.validation_errors) {
                            toastr.error(response.validation_errors);
                        }else{
                            toastr.error(response.message);
                        }
                    }
                }
            })

        }
    }

})