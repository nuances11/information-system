<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('subjects_model');
        $this->load->model('sy_model');
        $this->load->model('assign_model');
			

	    $styles = array(
            // Dito ilalagay yung css na gagamitin ng Admin Pages
            // ex : 'assets/css/sample.css'
            'assets/css/toastr.min.css'
     
        );

        $js = array(
            // Dito ilalagay yung js na gagamitin ng Admin Pages
            // ex : 'assets/css/sample.js'
            'assets/custom/users.js',
            'assets/js/toastr.min.js' 
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Dashboard');
	    $this->template->set_template('backend/admin');

  }

	public function index()
	{        
		$this->template->load('admin/index');
    }

    public function user()
    {
        $this->template->set_title('Admin - Users');

        $this->template->load_sub('departments', $this->users_model->getUserDeparments());
        $this->template->load('admin/user');
    }

    public function subject()
    {
        $js = array(
            'assets/custom/subjects.js',
            'assets/js/toastr.min.js',
        );

        $this->template->set_additional_js($js);
        $this->template->set_title('Admin - Subjects');

        $this->template->load('admin/subject');
    }

    public function assign()
    {
        $js = array(
            'assets/custom/assign.js',
            'assets/js/toastr.min.js',
        );

        $this->template->set_additional_js($js);
        $this->template->set_title('Admin - Assign');

        $this->template->load_sub('sections', $this->sy_model->getSections());
        $this->template->load_sub('faculty', $this->users_model->getFacultyUsers(2)); // Department ID for Faculty is 2
        $this->template->load_sub('syear', $this->sy_model->getCurSy());
        $this->template->load('admin/assign');
    }

    public function forms()
    {
        $this->template->load('admin/forms');        
    }

    public function ajax($request)
    {
        switch ($request) {
            case 'users_datatable':
                $this->get_all_users_dt();
                break;
            case 'get_user_details':
                $this->get_user_details();
                break;
            case 'subjects_datatable':
                $this->get_all_subjects_dt();
                break;
            case 'get_subject_details':
                $this->get_subject_details();
                break;
            case 'sy_datatable':
                $this->get_all_sy_dt();
                break;
            case 'get_sy_details':
                $this->get_sy_details();
                break;
            case 'assign_datatable':
                $this->get_all_assign_dt();
                break;
            case 'get_assign_details':
                $this->get_assign_details();
                break;
            case 'section_datatable':
                $this->get_all_section_dt();
                break;
            case 'get_section_details':
                $this->get_section_details();
                break;
        }
    }

    public function do_action($request)
    {
        switch ($request) {
            case 'add_user':
                $this->add_user();
                break;
            case 'update_user':
                $this->update_user();
                break;
            case 'delete_user':
                $this->delete_user();
                break;
            case 'add_subject':
                $this->add_subject();
                break;
            case 'update_subject':
                $this->update_subject();
                break;
            case 'delete_subject':
                $this->delete_subject();
                break;
            case 'add_sy':
                $this->add_sy();
                break;
            case 'add_assign':
                $this->add_assign();
                break;
            case 'add_section':
                $this->add_section();
                break;
        }
    }

    public function add_section()
    {
        $response = array();

        $this->form_validation->set_rules('grade','Grade', 'required');
        $this->form_validation->set_rules('section_name','Section Name', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->sy_model->saveSection();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding data';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function add_assign()
    {
        $response = array();

        $this->form_validation->set_rules('school_year','School Year', 'required');
        $this->form_validation->set_rules('faculty','Faculty', 'required');
        $this->form_validation->set_rules('grade','Grade', 'required');
        $this->form_validation->set_rules('section_id','Section Name', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->assign_model->saveAssign();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Data added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding data';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function get_section_details()
    {
        $id = $this->input->get('id');
        $response = array();
        if ($id) {
            $res = $this->sy_model->get_section_details($id);
            $response['section'] = $res;
            $response['success'] = TRUE;
        }else{
            $response['success'] = FALSE;
        }

        echo json_encode($response);
        exit;
    }

    public function get_sy_details()
    {
        $id = $this->input->get('id');
        $response = array();
        if ($id) {
            $res = $this->sy_model->get_sy_details($id);
            $response['sy'] = $res;
            $response['success'] = TRUE;
        }else{
            $response['success'] = FALSE;
        }

        echo json_encode($response);
        exit;
    }

    public function add_sy()
    {
        $response = array();

        $this->form_validation->set_rules('year_from','Year From', 'required');
        $this->form_validation->set_rules('year_to','Year To', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->sy_model->saveSy();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'School year added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding school year';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function get_subject_details()
    {
        $id = $this->input->get('id');
        $response = array();
        if ($id) {
            $res = $this->subjects_model->get_subject_details($id);
            $response['subject'] = $res;
            $response['success'] = TRUE;
        }else{
            $response['success'] = FALSE;
        }

        echo json_encode($response);
        exit;
    }

    public function update_subject()
    {
        $response = array();
        
        $this->form_validation->set_rules('subject_name','Subject Name', 'required');
        $this->form_validation->set_rules('grade_level','Grade Level', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->subjects_model->updateSubject();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Subject updated successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error updating subject';
            }

        }

        echo json_encode($response);
        exit;

    }

    public function add_subject()
    {
        $response = array();

        $this->form_validation->set_rules('subject_name','Subject Name', 'required');
        $this->form_validation->set_rules('grade_level','Grade Level', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->subjects_model->saveSubject();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Subject added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding subject';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function delete_subject()
    {
        $response = array();
        
        $id = $this->input->post('id');
        if (!$id) {

            $response['message'] = 'Error retrieving subject data';
            $response['success'] = FALSE;

        }else{

            $res = $this->subjects_model->deleteSubject();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'Subject deleted successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error deleting subject';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function delete_user()
    {
        $response = array();
        
        $id = $this->input->post('id');
        if (!$id) {

            $response['message'] = 'Error retrieving user data';
            $response['success'] = FALSE;

        }else{

            $res = $this->users_model->deleteUser();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'User deleted successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error deleting user';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function update_user()
    {
        $response = array();
        
        $this->form_validation->set_rules('firstname','First Name', 'required');
        $this->form_validation->set_rules('middlename','Middle Name', 'required');
        $this->form_validation->set_rules('lastname','Last Name', 'required');
        $this->form_validation->set_rules('department','Department', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->users_model->updateUser();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'User updated successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error updating user';
            }

        }

        echo json_encode($response);
        exit;

    }

    public function get_user_details()
    {
        $id = $this->input->get('id');
        $response = array();
        if ($id) {
            $res = $this->users_model->get_user_details($id);
            $response['user'] = $res;
            $response['success'] = TRUE;
        }else{
            $response['success'] = FALSE;
        }

        echo json_encode($response);
        exit;
    }

    public function add_user()
    {
        $response = array();

        $this->form_validation->set_rules('username','Username', 'required|is_unique[users.user_id]');
        $this->form_validation->set_rules('firstname','First Name', 'required');
        $this->form_validation->set_rules('middlename','Middle Name', 'required');
        $this->form_validation->set_rules('lastname','Last Name', 'required');
        $this->form_validation->set_rules('department','Department', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->users_model->saveUser();
            if ($res) {
                $response['success'] = TRUE;
                $response['message'] = 'User added successfully';
            }else{
                $response['success'] = FALSE;
                $response['message'] = 'Error adding user';
            }

        }

        echo json_encode($response);
        exit;
    }

    public function get_all_users_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->users_model->getUsers();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {

            $name = $r->first_name . ' ' . $r->last_name;
            $edit_btn = '<button type="button" class="btn btn-primary btn-sm" data-id="' . $r->id . '" data-toggle="modal" data-target="#updateUserModal">Update</button>';
            $delete_btn = '<button type="button" class="btn btn-danger btn-sm" data-id="' . $r->id . '" data-toggle="modal" data-target="#deleteUserModal">Delete</button>';
            //$action = $edit_btn . ' ' . $delete_btn;
            $department = $r->department;

            
            $action_select = '<select class="user_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2" class="text-red">Delete</option>
                        </select>';
            $action = ($r->id == 1 && $r->department == 'Admin') ? '' : $action_select ;
            $data[] = array(

                $r->id,
                $name,
				$department,
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

    public function get_all_subjects_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->subjects_model->getSubjects();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {

            $name = $r->subject_name;
            
            $action = '<select class="subject_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2" class="text-red">Delete</option>
                        </select>';
            $data[] = array(

                $r->id,
                $name,
                $r->grade_level,
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

    public function get_all_sy_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->sy_model->getSy();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {

            $year = $r->year;
            $active = ($r->is_active == 1) ? 'Active' : 'Inactive' ;
            $activate = ($r->is_active == 1) ? '' : '<option value="3">Activate</option>' ;
            
            $action = '<select class="sy_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2" class="text-red">Delete</option>
                            '.$activate.'
                        </select>';
            $data[] = array(

                $r->id,
                $year,
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

    public function get_all_assign_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->assign_model->getAssign();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {

            $year = $r->year;
            $grade = $r->grade;
            
            $action = '<select class="sy_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2" class="text-red">Delete</option>
                        </select>';
            $data[] = array(

                $year,
                $grade,
                $r->sec_name,
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

    public function get_all_section_dt()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->sy_model->getSection();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {
            $grade = $r->grade;
            
            $action = '<select class="section_action" data-id="' . $r->id . '">
                            <option value="">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2" class="text-red">Delete</option>
                        </select>';
            $data[] = array(

                $r->id,
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

    public function school_year()
    {
        $js = array(
            'assets/custom/schoolyear.js',
            'assets/js/toastr.min.js',
        );

        $this->template->set_additional_js($js);
        $this->template->set_title('Admin - School Year');
        $this->template->load('admin/school-year');
    }

    public function section()
    {
        $js = array(
            'assets/custom/section.js',
            'assets/js/toastr.min.js',
        );

        $this->template->set_additional_js($js);
        $this->template->set_title('Admin - Section');
        $this->template->load('admin/section');
    }
}
