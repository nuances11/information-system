$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var schoolyearDataTable =  $('#sy_table').DataTable({
        "ajax": {
            url : base_url + 'admin/ajax/sy_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#add_sy_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/add_sy',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    $('#addsymodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addsymodal').modal('toggle');
                    $('#add_sy_form').trigger('reset');
                    schoolyearDataTable.ajax.reload();
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

    $(document).on('submit', '#update_sy_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/update_sy',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);  
                    $('#updatesymodal').modal('toggle');
                    $('#update_sy_form').trigger('reset');
                    schoolyearDataTable.ajax.reload();
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

    $(document).on('change', '.sy_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                schoolyearDataTable.ajax.reload();
                editSy(id);
                break;
            case '2':
                schoolyearDataTable.ajax.reload();
                deleteSy(id);
                break;
            case '3':
                schoolyearDataTable.ajax.reload();
                activateSy(id);
                break;
        
            
        }
    })

    function editSy( id )
    {
        $.ajax({
            method : "GET",
            url : base_url + 'admin/ajax/get_sy_details',
            dataType : "JSON",
            data : { id : id },
            success : function(response) {
                if (response.success) {
                    $('#update_sy_form input[name="sy_id"]').val(response.sy.id);
                    $('#update_sy_form select[name="year_from"]').val(response.sy.year_from);
                    $('#update_sy_form select[name="year_to"]').val(response.sy.year_to);
                    $('#updatesymodal').modal({backdrop: 'static', keyboard: false})
                    $('#updatesymodal').modal('toggle');
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

    function deleteSubject( id )
    {
        var r = confirm("Are you sure you want to delete this subject?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'admin/action/delete_subject',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        subjectsDataTable.ajax.reload();
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