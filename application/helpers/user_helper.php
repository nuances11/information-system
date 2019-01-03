
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('is_logged_in')){
    function is_logged_in($id){
        //get main CodeIgniter object
        $CI =& get_instance();
    
        $CI->load->library('session');

        $CI->load->helper('url');
        
        if (!$id || !$_SESSION['is_logged_in']) {
            redirect('login', 'refresh');
        }

    }
}


