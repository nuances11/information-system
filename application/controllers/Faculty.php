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
            'assets/custom/faculty.js',
            'assets/js/toastr.min.js',
            
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
            case 'subject_datatable':
                $this->get_subject_dt();
                break;
            case 'get_subject':
                $this->get_subject();
                break;
            case 'get_faculty':
                $this->get_faculty();
                break;
            case 'get_subject_details':
                $this->get_subject_details();
                break;
            case 'student_list_datatable':
                $this->student_list_datatable();
                break;
            case 'subject_sy_datatable':
                $this->subject_sy_datatable();
                break;
            case 'faculty_section_datatable':
                $this->faculty_section_datatable();
                break;
            case 'subject_student_datatable':
                $this->subject_student_datatable();
                break;
        }
    }

    public function do_action($request)
    {
        switch ($request) {
            case 'assign_subject':
                $this->assign_subject();
                break;
            case 'delete_assign_subject':
                $this->delete_assign_subject();
                break;
            case 'enroll_student':
                $this->enroll_student();
                break;
            case 'update_enroll_student':
                $this->update_enroll_student();
                break;
            case 'withdraw_student':
                $this->withdraw_student();
                break;
            case 'drop_student':
                $this->drop_student();
                break;
            case 'activate_student':
                $this->activate_student();
                break;
            case 'delete_student':
                $this->delete_student();
                break;
            case 'encode_grades':
                $this->encode_grades();
                break;
        }
    }

    public function encode_grades()
    {
        $response = array();

        $this->form_validation->set_rules('quarter_one','Quarter One', 'required|is_numeric|regex_match[/^[0-9]{2}$/]');
        $this->form_validation->set_rules('quarter_two','Quarter Two', 'is_numeric|regex_match[/^[0-9]{2}$/]');
        $this->form_validation->set_rules('quarter_three','Quarter Three', 'is_numeric|regex_match[/^[0-9]{2}$/]');
        $this->form_validation->set_rules('quarter_four','Quarter Four', 'is_numeric|regex_match[/^[0-9]{2}$/]');

        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->sy_model->saveEncodeGrade();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Grade added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding grade';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function encode_subject_grade($sy, $section, $subject, $student)
    {
        $data = array(
            'school_year' => $sy,
            'section' => $section,
            'subject' => $subject,
            'student' => $student,
        );

        $this->template->load_sub('grades', $this->sy_model->getStudentGrade($data));
        $this->template->load_sub('student', $this->sy_model->getEnrollDetails($student));
        $this->template->load_sub('subject', $this->subjects_model->get_subject_details($subject));
        $this->template->load_sub('section', $this->sy_model->get_section_details($section));
        $this->template->load_sub('data', $data);
        $this->template->load('faculty/subject-encode-grade');
    }

    public function subject_student_datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));
        $section = intval($this->input->get("section"));
        $subject = intval($this->input->get("subject"));
        $student_name = '';

        $query = $this->sy_model->getSubjectStudentList($year, $section);

        $data = [];

        foreach($query->result() as $r) {
            
            $details = unserialize($r->raw_data);
            $student_name = ucfirst($details['firstname']) . ' ' . ucfirst($details['middlename']) . '. ' . ucfirst($details['lastname']);

            $action = '<a href="'.base_url().'faculty/subject/sy/'.$r->school_year_id.'/section/'.$r->section_id.'/encode/'.$subject.'/student/'.$r->id.'">Encode</a>';
            $data[] = array(

                $student_name,
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

    public function subject_student_list($sy, $section, $subject)
    {
        $data = array(
            'school_year' => $sy,
            'section' => $section,
            'subject' => $subject,
        );

        $this->template->load_sub('data', $data);
        $this->template->set_title('Faculty - Student List');
        $this->template->load('faculty/subject-student-list');
    }

    public function faculty_section_datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));

        $query = $this->sy_model->getSubjectSectionList($year, $this->session->userdata('id'));
        $data = [];

        foreach($query->result() as $r) {
            
            $student = '<a href="'.base_url().'faculty/subject/sy/'.$r->school_year_id.'/section/'.$r->section_id.'/subject/'.$r->subject_id.'">View Students</a>';
            $action = $student;
            $data[] = array(

                $r->grade_level,
                $r->subject_name,
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

    public function subject_sy_datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->sy_model->getSy();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            
            $action = '<a href="'.base_url().'faculty/subjects/sy/'.$r->id.'">View</a>';
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

    public function update_enroll_student()
    {
        $response = array();

        $this->form_validation->set_rules('section_id','Section', 'required|is_numeric');
        $this->form_validation->set_rules('sy','School Year', 'required');
        $this->form_validation->set_rules('student_type','Student Type', 'required');
        $this->form_validation->set_rules('lrn','LRN', 'required');
        $this->form_validation->set_rules('esc','ESC', 'required');
        $this->form_validation->set_rules('lastname','Last Name', 'required');
        $this->form_validation->set_rules('firstname','First Name', 'required');
        $this->form_validation->set_rules('middlename','Middle Name', 'required');
        $this->form_validation->set_rules('sex','Sex', 'required');
        $this->form_validation->set_rules('age','Age', 'required|is_numeric');
        $this->form_validation->set_rules('dob','Date of Birth', 'required|regex_match[/^\d{2}[\-\/]\d{2}[\-\/]\d{4}$/]');
        $this->form_validation->set_rules('pob','Place of Birth', 'required');
        $this->form_validation->set_rules('religion','Religion', 'required');
        $this->form_validation->set_rules('mother_tounge','Mother Tounge', 'required');
        $this->form_validation->set_rules('nationality','Nationality', 'required');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('father_name','Father Name', 'required');
        $this->form_validation->set_rules('mother_name','Mother Name', 'required');
        $this->form_validation->set_rules('father_occupation','Father Occupation', 'required');
        $this->form_validation->set_rules('mother_occupation','Mother Occupation', 'required');
        $this->form_validation->set_rules('father_contact','Father Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
        array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        $this->form_validation->set_rules('mother_contact','Mother Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
        array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        $this->form_validation->set_rules('parent_address','Parent Address', 'required');
        $this->form_validation->set_rules('gurdian_name','Guardian Name', 'required');
        $this->form_validation->set_rules('guardian_contact','Guardian Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
        array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        $this->form_validation->set_rules('emergency_name','Emergency Person', 'required');
        $this->form_validation->set_rules('emergency_contact','Emergency Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
        array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        $this->form_validation->set_rules('contact_reciepient','InfoText Receiver', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->sy_model->updateStudentData();
                if ($res) {
                    $response['success'] = TRUE;
                    $response['message'] = 'Student updated successfully';
                }else{
                    $response['success'] = FALSE;
                    $response['message'] = 'Error updating data';
                }

            }

        echo json_encode($response);
        exit;
    }

    public function edit_eform($id)
    {
        $this->template->load_sub('enroll', $this->sy_model->getEnrollDetails($id));
        $this->template->set_title('Faculty - Enrollment Form');
        $this->template->load('faculty/edit-eform');
    }

    public function delete_student()
    {
        $id = $this->input->post('id');
        $response = array();
        $res = $this->sy_model->deleteStudent($id);
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data deleted successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error deleting data';
            }

        echo json_encode($response);
        exit;
    }

    public function withdraw_student()
    {
        $id = $this->input->post('id');
        $response = array();
        $res = $this->sy_model->withdrawStudent($id);
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data updated successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error updating data';
            }

        echo json_encode($response);
        exit;
    }

    public function drop_student()
    {
        $id = $this->input->post('id');
        $response = array();
        $res = $this->sy_model->dropStudent($id);
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data updated successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error updating data';
            }

        echo json_encode($response);
        exit;
    }

    public function student_list_datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));
        $section = intval($this->input->get("section"));
        $name = '';;
        $document = '';
        $status = '';

        $query = $this->sy_model->getStudent($year, $section);
        $data = [];

        foreach($query->result() as $r) {
            // Get student Raw Data
            $student = unserialize($r->raw_data);
            $name = ucfirst($student['firstname']) . ' ' . ucfirst($student['middlename'][0]) .'. ' . ucfirst($student['lastname']);
            $document_url = base_url() . 'faculty/student/eform/'.$r->id;
            $document = '<a href="'.$document_url.'" data-id="'.$r->id.'">E-Form</a>';

            if($r->is_drop == 1 && $r->is_withdraw == 0)
            {
                $status = '<span class="text-red">Dropped</span>';
                $action_select = '<select class="student_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Withdraw</option>
                            <option value="3" class="text-green">Active</option>
                            <option value="4" class="text-red">Delete</option>
                        </select>';
            }elseif($r->is_withdraw == 1 && $r->is_drop == 0)
            {
                $status = '<span class="text-orange">Withdraw</span>';
                $action_select = '<select class="student_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="2" class="text-red">Drop</option>
                            <option value="3" class="text-green">Active</option>
                            <option value="4" class="text-red">Delete</option>
                        </select>';
            }else{
                $status = '<span class="text-green">Active</span>';
                $action_select = '<select class="student_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Withdraw</option>
                            <option value="2" class="text-red">Drop</option>
                            <option value="4" class="text-red">Delete</option>
                        </select>';
            }
            
            // $action_select = '<select class="student_action" data-id="' . $r->id . '">
            //                 <option value="">Select Action</option>
            //                 <option value="1">Withdraw</option>
            //                 <option value="2" class="text-red">Drop</option>
            //             </select>';
            // $action = ' Edit | Remove';
            $data[] = array(

                $r->id,
                $name,
                $document,
                $status,
                $action_select

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

    public function enroll_student()
    {
        $response = array();

            $this->form_validation->set_rules('section_id','Section', 'required|is_numeric');
            $this->form_validation->set_rules('sy','School Year', 'required');
            $this->form_validation->set_rules('student_type','Student Type', 'required');
            $this->form_validation->set_rules('lrn','LRN', 'required');
            $this->form_validation->set_rules('esc','ESC', 'required');
            $this->form_validation->set_rules('lastname','Last Name', 'required');
            $this->form_validation->set_rules('firstname','First Name', 'required');
            $this->form_validation->set_rules('middlename','Middle Name', 'required');
            $this->form_validation->set_rules('sex','Sex', 'required');
            $this->form_validation->set_rules('age','Age', 'required|is_numeric');
            $this->form_validation->set_rules('dob','Date of Birth', 'required|regex_match[/^\d{2}[\-\/]\d{2}[\-\/]\d{4}$/]');
            $this->form_validation->set_rules('pob','Place of Birth', 'required');
            $this->form_validation->set_rules('religion','Religion', 'required');
            $this->form_validation->set_rules('mother_tounge','Mother Tounge', 'required');
            $this->form_validation->set_rules('nationality','Nationality', 'required');
            $this->form_validation->set_rules('address','Address', 'required');
            $this->form_validation->set_rules('father_name','Father Name', 'required');
            $this->form_validation->set_rules('mother_name','Mother Name', 'required');
            $this->form_validation->set_rules('father_occupation','Father Occupation', 'required');
            $this->form_validation->set_rules('mother_occupation','Mother Occupation', 'required');
            $this->form_validation->set_rules('father_contact','Father Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
            $this->form_validation->set_rules('mother_contact','Mother Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
            $this->form_validation->set_rules('parent_address','Parent Address', 'required');
            $this->form_validation->set_rules('gurdian_name','Guardian Name', 'required');
            $this->form_validation->set_rules('guardian_contact','Guardian Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
            $this->form_validation->set_rules('emergency_name','Emergency Person', 'required');
            $this->form_validation->set_rules('emergency_contact','Emergency Contact', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
            $this->form_validation->set_rules('contact_reciepient','InfoText Receiver', 'required');
            if ($this->form_validation->run() == FALSE) {

                $response['validation_errors'] = validation_errors();
                $response['success'] = FALSE;

            }else{

                $res = $this->sy_model->saveStudentData();
                if ($res) {
                    $response['success'] = TRUE;
                    $response['message'] = 'Student added successfully';
                }else{
                    $response['success'] = FALSE;
                    $response['message'] = 'Error adding data';
                }

            }

        echo json_encode($response);
        exit;
    }

    public function delete_assign_subject()
    {
        $id = $this->input->post('id');
        $response = array();
        $res = $this->sy_model->deleteSubjectAssign($id);
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data removed successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error removing data';
            }

        echo json_encode($response);
        exit;
    }

    public function assign_subject()
    {
        $response = array();

        $this->form_validation->set_rules('subject','Subject', 'required');
        $this->form_validation->set_rules('faculty','Faculty', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->sy_model->saveSubjectAssign();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Subject added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding data';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function get_faculty()
    {
        $response = array();

        $res = $this->users_model->getFacultyUsers(2);
    
        if ($res) {
            $response['success'] = TRUE;
            $response['faculty'] = $res;
        }else{
            $response['success'] = FALSE;
            $response['message'] = 'Error getting data';
        }

        echo json_encode($response);
        exit;
    }

    public function get_subject()
    {
        $year = $this->input->post('year');
        $section = $this->input->post('section');

        $response = array();

        $res = $this->sy_model->getRemainingSubject($year, $section);
    
        if ($res) {
            $response['success'] = TRUE;
            $response['subject'] = $res;
        }else{
            $response['success'] = FALSE;
            $response['message'] = 'Error getting data';
        }

        echo json_encode($response);
        exit;
    }

    public function get_subject_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));
        $section = intval($this->input->get("section"));

        $query = $this->sy_model->getSubject($year, $section);
        $data = [];

        foreach($query->result() as $r) {
            
            $remove = '<a href="javascript:void(0);" class="delete_assign_subject" data-id="'.$r->id.'">Remove</a>';
            $action = $remove;
            // $action = ' Edit | Remove';
            $data[] = array(

                $r->subject_name,
                $r->faculty_name,
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

    public function get_student_section_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $year = intval($this->input->get("year"));

        $query = $this->sy_model->getStudentSectionList($year, $this->session->userdata('id'));
        $data = [];

        foreach($query->result() as $r) {
            
            $student = '<a href="'.base_url().'faculty/list/sy/'.$r->school_year_id.'/section/'.$r->section_id.'/students">Students</a>';
            $subject = '<a href="'.base_url().'faculty/list/sy/'.$r->school_year_id.'/section/'.$r->section_id.'/subjects">Subjects</a>';
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

    public function eform($sy, $section)
    {
        $data = array(
            'sy' => $sy,
            'section' => $section
        );
        
        $this->template->load_sub('school_year', $this->sy_model->getCurSy());
        $this->template->load_sub('grade', $this->sy_model->getCurGrade($section));
        $this->template->load_sub('data', $data);
        $this->template->set_title('Faculty - Enrollment Form');
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

    public function subjects()
    {
        $this->template->set_title('Faculty - Subjects');
        $this->template->load('faculty/assigned-subject');
    }

    public function subject_section_list($sy)
    {
        $school_year = $this->sy_model->getSectionList($sy);
        $this->template->set_title('Faculty - Subjects | ' . $school_year->year);

        $this->template->load_sub('sy', $school_year);
        $this->template->load('faculty/subject-section');
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
        $data = array(
            'sy' => $sy,
            'section' => $section,
        );

        $this->template->load_sub('data', $data);
        $this->template->load('faculty/student-list');
    }

    public function section_subjects($sy, $section)
    {
        
        $data = array(
            'sy' => $sy,
            'section' => $section,
        );

        $this->template->load_sub('data', $data);
        $this->template->load('faculty/subject-list');
    }
}
