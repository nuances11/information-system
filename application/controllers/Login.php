<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('users_model');

	    $styles = array(
            // Dito ilalagay yung css na gagamitin ng Admin Pages
            // ex : 'assets/css/sample.css'\
     
        );

        $js = array(
            // Dito ilalagay yung js na gagamitin ng Admin Pages
            // ex : 'assets/css/sample.js'
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Login');
	    $this->template->set_template('backend/login');

  }

	public function index()
	{        
		$this->template->load('login/index');
    }

    public function login_check()
    {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('username','User ID', 'required');
		$this->form_validation->set_rules('password','Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('login', 'refresh');

		}else{

			$creds = array(
				'user_id' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);

            $res = $this->users_model->chkUserLogin($creds);

			if ($res) {

				$session_data = array(
					'id' => $res->id,
					'user_id' => $res->user_id,
					'fullname' => $res->first_name . ' ' . $res->last_name,
					'user_type' => $res->department,
					'is_logged_in' => TRUE
				);
				// Add user data in session
                $this->session->set_userdata($session_data);
                if ($res->department == 1) {
                    redirect('admin/user', 'refresh');
                }elseif($res->department == 2){
                    redirect('faculty/student/list', 'refresh');
                }elseif($res->department == 3){
                    redirect('registrar/class', 'refresh');
                }else{
                    $this->session->sess_destroy();
		            $this->session->set_flashdata('login_error', '<div class="alert alert-danger">You have been looged out.</div>');
                    redirect('login', 'refresh');
                }
				
			}else{
				$this->session->set_flashdata('login_error', '<div class="alert alert-danger">User ID or Password Incorrect</div>');
				redirect('login', 'refresh');
			}

		}
    }

    public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('login_error', '<div class="alert alert-danger">You have been logged out.</div>');
		redirect('login', 'refresh');
	}

}
