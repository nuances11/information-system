$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var sectionDataTable =  $('#section_table').DataTable({
        "ajax": {
            url : base_url + 'admin/ajax/section_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#add_section_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/add_section',
            dataType : "JSON",
            data : data,
            success : function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#addsectionmodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addsectionmodal').modal('toggle');
                    $('#add_section_form').trigger('reset');
                    sectionDataTable.ajax.reload();
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

    // $(document).on('submit', '#update_assign_form', function(e) {
    //     e.preventDefault();
    //     var data = $(this).serialize();

    //     $.ajax({
    //         method : "POST",
    //         url : base_url + 'admin/action/update_assign',
    //         dataType : "JSON",
    //         data : data,
    //         success : function(response) {
    //             if (response.success) {
    //                 toastr.success(response.message);  
    //                 $('#updateassignmodal').modal('toggle');
    //                 $('#update_assign_form').trigger('reset');
    //                 assignDataTable.ajax.reload();
    //             }else{
    //                 if (response.validation_errors) {
    //                     toastr.error(response.validation_errors);
    //                 }else{
    //                     toastr.error(response.message);
    //                 }
    //             }
    //         }
    //     })

    // })

    $(document).on('change', '.section_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                sectionDataTable.ajax.reload();
                editSection(id);
                break;
            case '2':
                sectionDataTable.ajax.reload();
                deleteSection(id);
                break;
        
            
        }
    })

    function editSection( id )
    {
        $.ajax({
            method : "GET",
            url : base_url + 'admin/ajax/get_section_details',
            dataType : "JSON",
            data : { id : id },
            success : function(response) {
                if (response.success) {
                    $('#update_section_form input[name="secion_id"]').val(response.section.id);
                    $('#update_section_form select[name="grade"]').val(response.section.grade);
                    $('#update_section_form input[name="section_name"]').val(response.section.section_name);
                    $('#updatesectionnmodal').modal({backdrop: 'static', keyboard: false})
                    $('#updatesectionnmodal').modal('toggle');
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
        var r = confirm("Are you sure you want to delete this data?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'admin/action/delete_assign',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
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

        }
    }


})