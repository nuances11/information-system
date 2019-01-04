$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var subjectsDataTable =  $('#student_sy_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/student_sy_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var studentSectionDataTable = $('#student_section_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/student_section_datatable',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#student_section_list').data('year');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var subjectDataTable = $('#subject_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/subject_datatable',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#subject_list').data('year');
                d.section = $('#subject_list').data('section');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('click', '#assign_subject_form select[name="subject"]', function(e) {
        e.preventDefault();
        var section = $(this).data('section');
        var year = $(this).data('year');
        var subject_option = '';
        var subjectSelect = $('select[name="subject"]');

        var data = {
            section : section,
            year : year
        }

        $.ajax({
            method : "POST",
            url : base_url + 'faculty/ajax/get_subject',
            dataType : "JSON",
            data : data,
            success : function(response) {
                // console.log(response);
                if (response.success) {
                    $.each(response.subject, function(index, item) {
                        subject_option += '<option value="'+item.id+'">'+item.subject_name+'</option>';
                    });
                    subjectSelect.html(subject_option);

                }else{
                    toastr.error(response.message);
                }
            }
        })
    })

    $(document).on('click', '#assign_subject_form select[name="faculty"]', function(e) {
        e.preventDefault();
        var section = $(this).data('section');
        var year = $(this).data('year');
        var faculty_option = '';
        var facultySelect = $('select[name="faculty"]');

        var data = {
            section : section,
            year : year
        }

        $.ajax({
            method : "POST",
            url : base_url + 'faculty/ajax/get_faculty',
            dataType : "JSON",
            data : data,
            success : function(response) {
                // console.log(response);
                if (response.success) {
                    $.each(response.faculty, function(index, item) {
                        faculty_option += '<option value="'+item.id+'">'+item.first_name+' '+item.last_name+'</option>';
                    });
                        facultySelect.html(faculty_option);

                }else{
                    toastr.error(response.message);
                }
            }
        })
    })

    $(document).on('submit', '#assign_subject_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            method : "POST",
            url : base_url + 'faculty/action/assign_subject',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    $('#addsubjectmodal').modal({backdrop: 'static', keyboard: false})                      
                    $('#addsubjectmodal').modal('toggle');
                    $('#assign_subject_form').trigger('reset');
                    subjectDataTable.ajax.reload();
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

    $(document).on('click', '.edit_assign_subject', function(e)
    {
        var id = $(this).data('id');
        var faculty_option = '';
        var facultySelect = $('#update_subject_form select[name="faculty"]');
        var subject_option = '';
        var subjectSelect = $('#update_subject_form select[name="subject"]');

        $.ajax({
            method : "GET",
            url : base_url + 'faculty/ajax/get_subject_details',
            dataType : "JSON",
            data : { id : id },
            success : function(response) {
                if (response.success) {
                    $('#update_subject_form input[name="section_id"]').val(response.subject.section_id);
                    $('#update_subject_form input[name="school_year"]').val(response.subject.school_year_id);
                    $('#update_subject_form select[name="faculty"]').val(response.subject.user_id);
                    $('#update_subject_form select[name="subject"]').val(response.subject.subject_id);

                    var data = {
                        section : subject.section_id,
                        year : subject.school_year_id
                    }
            
                    $.ajax({
                        method : "POST",
                        url : base_url + 'faculty/ajax/get_faculty',
                        dataType : "JSON",
                        data : data,
                        success : function(response) {
                            // console.log(response);
                            if (response.success) {
                                $.each(response.faculty, function(index, item) {
                                    faculty_option += '<option value="'+item.id+'">'+item.first_name+' '+item.last_name+'</option>';
                                });
                                    facultySelect.html(faculty_option);
            
                            }else{
                                toastr.error(response.message);
                            }
                        }
                    });

                    $.ajax({
                        method : "POST",
                        url : base_url + 'faculty/ajax/get_subject',
                        dataType : "JSON",
                        data : data,
                        success : function(response) {
                            console.log(response);
                            if (response.success) {
                                $.each(response.subject, function(index, item) {
                                    subject_option += '<option value="'+item.id+'">'+item.subject_name+'</option>';
                                });
                                subjectSelect.html(subject_option);

                            }else{
                                toastr.error(response.message);
                            }
                        }
                    })

                    $('#updatesubjectmodal').modal({backdrop: 'static', keyboard: false})
                    $('#updatesubjectmodal').modal('toggle');
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
})