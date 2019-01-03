<?php

class Assign_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getAssign()
    {
        $this->db->select('fd.*,s.section_name as sec_name, CONCAT(u.first_name, '.', u.last_name) AS faculty_name, sy.year as year', FALSE)
                ->from('faculty_designation as fd')
                ->join('school_year as sy','sy.id = fd.school_year_id')
                ->join('users as u', 'u.id = fd.user_id')
                ->join('section as s', 's.id = fd.section_id');
        return $this->db->get();
    }

    public function saveAssign()
    {
        $data = array(
            'school_year_id' => $this->input->post('school_year'),
            'user_id' => $this->input->post('faculty'),
            'grade' => $this->input->post('grade'),
            'section_id' => $this->input->post('section_id'),
        );

        return $this->db->insert('faculty_designation', $data);
    }

}

?>
