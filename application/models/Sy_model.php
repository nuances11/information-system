<?php

class Sy_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getSy()
    {
        return $this->db->get('school_year');
    }

    public function saveSy()
    {
        $year = $this->input->post('year_from') . '-' . $this->input->post('year_to');
        $data = array(
            'year' => $year,
        );

        return $this->db->insert('school_year', $data);
    }
    public function get_sy_details($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('school_year')->row();
    }

    public function getCurSy()
    {
        $this->db->where('is_active', 1);
        return $this->db->get('school_year')->row();
    }

    public function getSection()
    {
        return $this->db->get('section');
    }

    public function saveSection()
    {
        $data = array(
            'grade' => $this->input->post('grade'),
            'section_name' => $this->input->post('section_name'),
        );
        return $this->db->insert('section', $data);
    }

    public function get_section_details($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('section')->row();
    }

    public function getSections()
    {
        return $this->db->get('section')->result();
    }

    public function getSectionList($sy)
    {
        $this->db->where('id', $sy);
        return $this->db->get('school_year')->row();
    }

    public function getStudentSectionList($sy, $id)
    {
        $this->db->select('fd.*, sy.year as school_year, s.section_name, s.id as section_id')
                ->from('faculty_designation as fd')
                ->join('school_year as sy', 'sy.id = fd.school_year_id')
                ->join('section as s', 's.id = fd.section_id');
        return $this->db->get();
    }

}

?>
