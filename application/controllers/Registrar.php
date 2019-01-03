<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

	function __construct(){
	    parent::__construct();
			

	    $styles = array(

        );

        $js = array(

        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Registrar - Dashboard');
	    $this->template->set_template('backend/registrar');

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
