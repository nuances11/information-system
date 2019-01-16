<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

	function __construct(){
	    parent::__construct();
        $this->load->model('users_model');
        $this->load->model('subjects_model');
        $this->load->model('sy_model');
        $this->load->model('assign_model');
			

	    $styles = array(
            'assets/css/toastr.min.css'
        );

        $js = array(
            'assets/custom/registrar.js',
            'assets/js/toastr.min.js',
            
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Registrar - Dashboard');
	    $this->template->set_template('backend/registrar');

  }

    public function ajax($request)
    {
        switch ($request) {
            case 'registrar_sy_datatable':
                $this->registrar_sy_datatable();
                break;
            case 'registrar_grades':
                $this->registrar_grades();
                break;
            case 'registrar_subjects':
                $this->registrar_subjects();
                break;
            case 'student_grades';
                $this->student_grades();
                break;
        }
    }

    public function do_action($request)
    {
        switch ($request) {
            case 'check_form':
                $this->check_form();
                break;
        }
    }

    public function printForm()
    {
        $lrn = $this->input->get('lrn');
        if ($lrn) {
            $this->template->load_sub('grade_seven', $this->sy_model->getGradeSeven($lrn, 7));
            $this->template->load_sub('grade_seven_detail', $this->sy_model->getGradeSevenDetails($lrn, 7));
            $this->template->load_sub('grade_eight', $this->sy_model->getGradeEight($lrn, 8));
            $this->template->load_sub('grade_eight_detail', $this->sy_model->getGradeEightDetails($lrn, 8));
            $this->template->load_sub('grade_nine', $this->sy_model->getGradeNine($lrn, 9));
            $this->template->load_sub('grade_nine_detail', $this->sy_model->getGradeNineDetails($lrn, 9));
            $this->template->load_sub('grade_ten', $this->sy_model->getGradeTen($lrn, 10));
            $this->template->load_sub('grade_ten_detail', $this->sy_model->getGradeTenDetails($lrn, 10));
            // $this->template->load_sub('grade_eight', $this->sy_model->getGradeEight($lrn,8));
            // $this->template->load_sub('grade_nine', $this->sy_model->getGradeNine($lrn,9));
            // $this->template->load_sub('grade_ten', $this->sy_model->getGradeTen($lrn,10));
            $this->template->set_title('Print');
            $this->template->set_template('backend/print');
            $this->template->load('print/sf10-front');
        }
    }

    public function check_form()
    {
        $response = array();
        $lrn = $this->input->post('input_lrn');
        if ($lrn) {
            $res = $this->sy_model->getRecords($lrn);
            if ($res) {
                $response['success'] = TRUE;
                $response['lrn'] = urlencode($res);
            }
        }else{
            $response['success'] = FALSE;
            $response['message'] = 'LRN Fiels is empty';
        }

        echo json_encode($response);
        exit;
    }

    public function student_grades_print($sy, $grade, $section, $subject, $student)
    {
        $data = array(
            'school_year' => $sy,
            'section' => $section,
            'subject' => $subject,
            'student' => $student,
        );
        
        $this->template->load_sub('year', $this->sy_model->get_sy_details($sy));
        $this->template->load_sub('student', $this->sy_model->getStudentGrades($data));
        $this->template->load_sub('subject_grade', $this->sy_model->getSubjectGrade($data));
        $this->template->load_sub('grades', $this->sy_model->getAllStudentsGrade($data));
        $this->template->load_sub('subject', $this->subjects_model->get_subject_details($subject));
        $this->template->load_sub('section', $this->sy_model->get_section_details($section));
        $this->template->set_title('Print');
	    $this->template->set_template('backend/print');
        $this->template->load('registrar/clstudcard');
    }

    public function subject_grades_print($sy, $grade, $section, $subject)
    {
        $data = array(
            'school_year' => $sy,
            'section' => $section,
            'subject' => $subject,
        );
        
        $this->template->load_sub('grades', $this->sy_model->getAllStudentsGrade($data));
        $this->template->load_sub('subject', $this->subjects_model->get_subject_details($subject));
        $this->template->load_sub('section', $this->sy_model->get_section_details($section));
        $this->template->set_title('Print');
	    $this->template->set_template('backend/print');
        $this->template->load('registrar/clrecordprint');
    }

    public function student_grades()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $grade = intval($this->input->get("grade"));
        $section = intval($this->input->get("section"));
        $subject = intval($this->input->get("subject"));
        $year = intval($this->input->get("year"));
        $student_name = '';
        $action = '';

        $query = $this->sy_model->getAllGrades($grade, $section, $year, $subject);
        
        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            $student = unserialize($r->raw_data);
            $student_name = '<a href="'. base_url() .'registrar/records/sy/'.$year.'/grade/'.$grade.'/section/'.$section.'/subject/'.$subject.'/student/'.$r->enroll_id.'">' . ucfirst($student['firstname']) . ' ' . ucfirst($student['middlename'][0]) .'. ' . ucfirst($student['lastname']) . '</a>';
            // $action = '<a href="'.base_url().'registrar/records/sy/'.$r->id.'/grade/'.$grade.'/section/'.$section.'/subject/'.$r->id.'/print">View</a>';

            $average = ($r->quarter_one + $r->quarter_two + $r->quarter_three + $r->quarter_four) / 4.0;
            $data[] = array(

                $student_name,
                $r->quarter_one,
                $r->quarter_two,
                $r->quarter_three,
                $r->quarter_four,
                $average,
                $action

           );

        }

        $result = array(

            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data

        );

        echo json_encode($result);
        exit();
    }

    public function subject_grades($sy, $grade, $section, $subject)
    {
        $data = array(
            'school_year' => $sy,
            'grade' => $grade,
            'section' => $section,
            'subject' => $subject
        );

        $this->template->load_sub('section', $this->sy_model->get_section_details($section));
        $this->template->load_sub('data', $data);
        $this->template->load('registrar/student-grade');
    }

    public function registrar_subjects()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $grade = intval($this->input->get("grade"));
        $section = intval($this->input->get("section"));
        $year = intval($this->input->get("year"));


        $query = $this->sy_model->getSubjects($grade, $section);

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            
            $action = '<a href="'.base_url().'registrar/records/sy/'.$year.'/grade/'.$grade.'/section/'.$section.'/subject/'.$r->id.'">View</a>';
            $data[] = array(

                ucfirst($r->subject_name) ,
                $action

           );

        }

        $result = array(

            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data

        );

        echo json_encode($result);
        exit();
    }

    public function records_students($sy, $grade, $section)
    {
        $data = array(
            'school_year' => $sy,
            'grade' => $grade,
            'section' => $section
        );

        $this->template->load_sub('data', $data);
        $this->template->load('registrar/records-students');
    }

    public function registrar_grades()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));

        $query = $this->sy_model->getGrades();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            
            $action = '<a href="'.base_url().'registrar/records/sy/'.$year.'/grade/'.$r->grade.'/section/'.$r->id.'">View</a>';
            $data[] = array(

                $r->grade . ' - ' . ucfirst($r->section_name) ,
                $action

           );

        }

        $result = array(

            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data

        );

        echo json_encode($result);
        exit();
    }

    public function records_sy($id)
    {
        $data = array(
            'school_year' => $id,
        );
        $this->template->load_sub('data', $data);
        $this->template->load('registrar/records-sy');
    }

    public function registrar_sy_datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->sy_model->getSy();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            
            $action = '<a href="'.base_url().'registrar/records/sy/'.$r->id.'">View</a>';
            $data[] = array(

                $r->year,
                $action

           );

        }

        $result = array(

            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data

        );

        echo json_encode($result);
        exit();
    }

	public function index()
	{        
		$this->template->load('registrar/index');
    }

    public function clrecord()
    {
        $this->template->load('registrar/clrecord');
    }

    public function studlist(){
        $this->template->load('registrar/clstudlist');
    }

    public function studcard(){
        $this->template->set_title('Print');
	    $this->template->set_template('backend/print');
        $this->template->load('registrar/clstudcard');
    }
    
    public function clrecordprint(){
        $this->template->set_title('Print');
	    $this->template->set_template('backend/print');
        $this->template->load('registrar/clrecordprint');
    }
    public function sf10(){
        $this->template->load('registrar/sf10index');
    }
}
