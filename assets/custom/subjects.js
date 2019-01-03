$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var subjectsDataTable =  $('#subjects_table').DataTable({
        "ajax": {
            url : base_url + 'admin/ajax/subjects_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#add_subject_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/add_subject',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    $('#addsubjmodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addsubjmodal').modal('toggle');
                    $('#add_subject_form').trigger('reset');
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

    })

    $(document).on('submit', '#update_subject_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'admin/action/update_subject',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);  
                    $('#updatesubjmodal').modal('toggle');
                    $('#update_subject_form').trigger('reset');
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

    })

    $(document).on('change', '.subject_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                subjectsDataTable.ajax.reload();
                editSubject(id);
                break;
            case '2':
                subjectsDataTable.ajax.reload();
                deleteSubject(id);
                break;
        
            
        }
    })

    function editSubject( id )
    {
        $.ajax({
            method : "GET",
            url : base_url + 'admin/ajax/get_subject_details',
            dataType : "JSON",
            data : { id : id },
            success : function(response) {
                if (response.success) {
                    $('#update_subject_form input[name="subject_id"]').val(response.subject.id);
                    $('#update_subject_form input[name="subject_name"]').val(response.subject.subject_name);
                    $('#update_subject_form select[name="grade_level"]').val(response.subject.grade_level);
                    $('#updatesubjmodal').modal({backdrop: 'static', keyboard: false})
                    $('#updatesubjmodal').modal('toggle');
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