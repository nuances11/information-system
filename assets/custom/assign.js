$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var assignDataTable =  $('#assign_table').DataTable({
        "ajax": {
            url : base_url + 'admin/ajax/assign_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#assign_faculty_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/add_assign',
            dataType : "JSON",
            data : data,
            success : function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#addassignmodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addassignmodal').modal('toggle');
                    $('#assign_faculty_form').trigger('reset');
                    assignDataTable.ajax.reload();
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

    $(document).on('submit', '#update_assign_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/update_assign',
            dataType : "JSON",
            data : data,
            success : function(response) {
                if (response.success) {
                    toastr.success(response.message);  
                    $('#updateassignmodal').modal('toggle');
                    $('#update_assign_form').trigger('reset');
                    assignDataTable.ajax.reload();
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

    $(document).on('change', '.assign_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                assignDataTable.ajax.reload();
                editAssign(id);
                break;
            case '2':
                assignDataTable.ajax.reload();
                deleteAssign(id);
                break;
        
            
        }
    })

    // function editAssign( id )
    // {
    //     $.ajax({
    //         method : "GET",
    //         url : base_url + 'admin/ajax/get_sy_details',
    //         dataType : "JSON",
    //         data : { id : id },
    //         success : function(response) {
    //             if (response.success) {
    //                 $('#update_assign_form input[name="sy_id"]').val(response.assign.id);
    //                 $('#update_assign_form select[name="year_from"]').val(response.assign.year_from);
    //                 $('#update_assign_form select[name="year_to"]').val(response.assign.year_to);
    //                 $('#updateassignmodal').modal({backdrop: 'static', keyboard: false})
    //                 $('#updateassignmodal').modal('toggle');
    //             }else{
    //                 if (response.validation_errors) {
    //                     toastr.error(response.validation_errors);
    //                 }else{
    //                     toastr.error(response.message);
    //                 }
    //             }
    //         }
    //     })
    // }

    // function deleteSubject( id )
    // {
    //     var r = confirm("Are you sure you want to delete this data?");

    //     if(r == true){

    //         $.ajax({
    //             method : "POST",
    //             url : base_url + 'admin/action/delete_assign',
    //             dataType : "JSON",
    //             data : { id : id },
    //             success : function(response) {
    //                 console.log(response);
    //                 if (response.success) {
    //                     toastr.success(response.message);
    //                     assignDataTable.ajax.reload();
    //                 }else{
    //                     if (response.validation_errors) {
    //                         toastr.error(response.validation_errors);
    //                     }else{
    //                         toastr.error(response.message);
    //                     }
    //                 }
    //             }
    //         })

    //     }
    // }


})