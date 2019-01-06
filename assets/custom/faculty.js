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

    var assignedsubjectDataTable = $('#subject_sy_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/subject_sy_datatable',
            type : 'GET',
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var facultySubjectDataTable = $('#faculty_section_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/faculty_section_datatable',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#faculty_section_list').data('year');
                d.faculty = $('#faculty_section_list').data('faculty');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var facultySubjectDataTable = $('#subject_student_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/subject_student_datatable',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#subject_student_list').data('year');
                d.section = $('#subject_student_list').data('section');
                d.subject = $('#subject_student_list').data('subject');
            },
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

    var studentListDataTable = $('#student_list').DataTable({
        "ajax": {
            url : base_url + 'faculty/ajax/student_list_datatable',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#student_list').data('year');
                d.section = $('#student_list').data('section');
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

    

    $(document).on('change', '.student_action', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).val();
        
        switch (action) {
            case '1':
                studentListDataTable.ajax.reload();
                withdrawStudent(id);
                break;
            case '2':
                studentListDataTable.ajax.reload();
                dropStudent(id);
                break;
            case '3':
                studentListDataTable.ajax.reload();
                activateStudent(id);
                break;
            case '4':
                studentListDataTable.ajax.reload();
                deleteStudent(id);
                break;
        
            
        }
    })

    function deleteStudent( id )
    {
        var r = confirm("Are you sure you want to delete this student?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'faculty/action/delete_student',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        studentListDataTable.ajax.reload();
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

    function withdrawStudent( id )
    {
        var r = confirm("Are you sure you want to update this student?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'faculty/action/withdraw_student',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        studentListDataTable.ajax.reload();
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

    function dropStudent( id )
    {
        var r = confirm("Are you sure you want to update this student?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'faculty/action/drop_student',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        studentListDataTable.ajax.reload();
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

    function activateStudent( id )
    {
        var r = confirm("Are you sure you want to update this student?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'faculty/action/activate_student',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        studentListDataTable.ajax.reload();
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

    $(document).on('click', '.assignSubject', function(e) {
        e.preventDefault();
        var section = $(this).data('section');
        var year = $(this).data('year');
        var subject_option = '';
        var subjectSelect = $('select[name="subject"]');
        var faculty_option = '';
        var facultySelect = $('select[name="faculty"]');

        var data = {
            section : section,
            year : year
        }
        console.log(data);

        $.ajax({
            method : "POST",
            url : base_url + 'faculty/ajax/get_subject',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log('subject');
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

        $.ajax({
            method : "POST",
            url : base_url + 'faculty/ajax/get_faculty',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log('faculty');
                console.log(response);
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

        $('#addsubjectmodal').modal({backdrop: 'static', keyboard: false})                      
        $('#addsubjectmodal').modal('toggle');
        $('#assign_subject_form').trigger('reset');




    })

    $(document).on('click', '.enrollbtn', function() {
        var sy = $(this).data('year');
        var section = $(this).data('section');
        location.href = base_url + 'faculty/student/eform/sy/'+sy+'/section/'+section;
    })

    $(document).on('submit', '#enroll_student_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        
        $.ajax({
            method : "POST",
            url : base_url + 'faculty/action/enroll_student',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    $('#enroll_student_form').trigger('reset');
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

    $(document).on('submit', '#update_enroll_student_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        
        $.ajax({
            method : "POST",
            url : base_url + 'faculty/action/update_enroll_student',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    location.reload(); 
                    $('#update_enroll_student_form').trigger('reset');
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

    $(document).on('submit', '#encode_grade', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        
        $.ajax({
            method : "POST",
            url : base_url + 'faculty/action/encode_grades',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    location.reload(); 
                    $('#encode_grade').trigger('reset');
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

    $(document).on('submit', '#assign_subject_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
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

    $(document).on('click', '.delete_assign_subject', function(e)
    {
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this data?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'faculty/action/delete_assign_subject',
                dataType : "JSON",
                data : { id : id },
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
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

        }

        
    })
})