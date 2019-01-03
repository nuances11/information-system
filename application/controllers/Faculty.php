<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

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
            'assets/js/toastr.min.js',
            'assets/custom/faculty.js',
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Faculty - Dashboard');
	    $this->template->set_template('backend/faculty');

  }

	public function index()
	{        
		$this->template->load('faculty/index');
    }

    public function ajax($request)
    {
        switch ($request) {
            case 'student_sy_datatable':
                $this->get_student_sy_dt();
                break;
            case 'student_section_datatable':
                $this->get_student_section_dt();
                break;
        }
    }

    public function do_action($request)
    {
        // switch ($request) {
        //     case 'add_user':
        //         $this->add_user();
        //         break;
        // }
    }

    public function get_student_section_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));

        $query = $this->sy_model->getStudentSectionList($year, $this->session->userdata('id'));
        $data = [];

        foreach($query->result() as $r) {
            
            $student = '<a href="'.base_url().'faculty/list/sy/'.$r->id.'/section/'.$r->section_id.'">Students\</a>';
            $subject = '<a href="'.base_url().'faculty/list/sy/'.$r->id.'/section/'.$r->section_id.'/subjects">Subjects</a>';
            $action = $student . ' | ' . $subject;
            $data[] = array(

                $r->grade,
                $r->section_name,
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

    public function get_student_sy_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->sy_model->getSy();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            
            $action = '<a href="'.base_url().'faculty/list/sy/'.$r->id.'">View</a>';
            $active = ($r->is_active == 1) ? 'Active' : 'Inactive' ;
            $data[] = array(

                $r->year,
                $active,
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

    // public function student()
    // {
    //     $this->template->load('faculty/student');
    // }

    public function eform()
    {
        $this->template->load('faculty/eform');
    }

    public function clreport()
    {
        $this->template->load('faculty/clreport');
    }
    
    public function scsubjlist()
    {
        $this->template->load('faculty/scsubjlist');
    }

    public function scsubj()
    {
        $this->template->load('faculty/scsubj');
    }

    public function student_list()
    {
	    $this->template->set_title('Faculty - Student');
        $this->template->load('faculty/student');
    }

    public function student_list_sy($sy)
    {
        $school_year = $this->sy_model->getSectionList($sy);
        $this->template->set_title('Faculty - Students | ' . $school_year->year);

        $this->template->load_sub('sy', $school_year);
        $this->template->load('faculty/student-section');
    }

    public function student_list_section($sy, $section)
    {
        // $section = $this->sy_model->getStudentList($sy, $section);
        // $this->template->set_title('Faculty - Section | ' . $section->section_name);

        // $this->template->load_sub('sy', $section);
        $this->template->load('faculty/student-list');
    }

    public function section_subjects($sy, $section)
    {
        $this->template->load('faculty/subject-list');
    }
}
