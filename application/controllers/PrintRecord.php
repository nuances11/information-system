<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintRecord extends CI_Controller {

	function __construct(){
	    parent::__construct();
			

	    $styles = array(

        );

        $js = array(

        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

        $this->template->set_title('Print');
	    $this->template->set_template('backend/print');

  }


    public function studcard(){
        $this->template->load('print/clstudcard');
    }
    
    public function sf10Front(){
        $this->template->load('print/sf10-front');
    }
        
    public function sf10Back(){
        $this->template->load('print/sf10-back');
    }

    public function clrecordprint(){
        $this->template->load('print/clrecordprint');
    }
}
