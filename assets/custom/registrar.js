$(document).ready(function() {
    var base_url = $('meta[name=base_url]').attr("content");

    var schoolyearDataTable =  $('#class_record_List').DataTable({
        "ajax": {
            url : base_url + 'registrar/ajax/registrar_sy_datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var recordsGradeDataTable =  $('#records_grade').DataTable({
        "ajax": {
            url : base_url + 'registrar/ajax/registrar_grades',
            type : 'GET',
            data : function ( d ) {
                d.year = $('#records_grade').data('year');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var recordsSubjectDataTable =  $('#records_subjects').DataTable({
        "ajax": {
            url : base_url + 'registrar/ajax/registrar_subjects',
            type : 'GET',
            data : function ( d ) {
                d.section = $('#records_subjects').data('section');
                d.grade = $('#records_subjects').data('grade');
                d.year = $('#records_subjects').data('year');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    var studentGradeDataTable =  $('#student_grades').DataTable({
        "ajax": {
            url : base_url + 'registrar/ajax/student_grades',
            type : 'GET',
            data : function ( d ) {
                d.section = $('#student_grades').data('section');
                d.grade = $('#student_grades').data('grade');
                d.year = $('#student_grades').data('year');
                d.subject = $('#student_grades').data('subject');
            },
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
        }
    });

    $(document).on('submit', '#check_lrn_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'registrar/action/check_form',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    location.href = base_url + 'print/sf10?lrn=' + response.lrn;
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