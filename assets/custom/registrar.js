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
            type : 'GET'
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
})