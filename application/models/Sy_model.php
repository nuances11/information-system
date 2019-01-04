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
        $this->db->select('fd.*, sy.id as school_year_id, sy.year as school_year, s.section_name, s.id as section_id')
                ->from('faculty_designation as fd')
                ->join('school_year as sy', 'sy.id = fd.school_year_id')
                ->join('section as s', 's.id = fd.section_id');
        return $this->db->get();
    }

    public function getSubject($sy, $section)
    {
         $this->db->select("sb.*,sub.subject_name, CONCAT(u.first_name,' ',u.last_name) AS faculty_name,", FALSE)
                ->from('subjects as sub')
                ->join('subject_designation as sb', 'sb.subject_id = sub.id', 'left')
                ->join('users as u', 'u.id = sb.user_id', 'left')
                ->join('school_year as sy', 'sy.id = sb.school_year_id', 'left')
                ->join('section as s', 's.grade = sub.grade_level')
                ->where('sb.school_year_id', $sy)
                ->where('sb.section_id', $section);
        // $this->db->select('sb.*,sub.subject_name,CONCAT(u.first_name, '.', u.last_name) AS faculty_name,', FALSE)
        //         ->from('subject_designation as sb')
        //         ->join('subjects as sub', 'sub.id = sb.subject_id')
        //         ->join('users as u', 'u.id = sb.user_id')
        //         ->where('school_year_id', $sy)
        //         ->where('section_id', $section);
        // $this->db->select('sb.*,sub.subject_name, CONCAT(u.first_name, '.', u.last_name) AS faculty_name,', FALSE)
        //         ->from('subject_designation as sb')
        //         ->join('subjects as sub', 'sub.id = sb.subject_id')
        //         ->join('users as u', 'u.id = sb.user_id')
        //         ->where('sb.school_year_id', $sy)
        //         ->where('sb.section_id', $section);
        return $this->db->get();
    }

    public function getRemainingSubject($sy, $section)
    {
        $this->db->select('*')
                ->from('section')
                ->where('id', $section);
        $grade = $this->db->get()->row();

        $this->db->select('*')
                ->from('subject_designation')
                ->where('section_id', $section)
                ->where('school_year_id', $sy);
        $unsub = $this->db->get()->result_array();
        
        $unavailableSubject = array();
        
        foreach ($unsub as $uns) {
            array_push($unavailableSubject, $uns['subject_id']);
        }

        $this->db->select('*')
                ->from('subjects')
                ->where('grade_level', $grade->grade)
                ->where_not_in('id', $unavailableSubject);
        return $this->db->get()->result();

    }

    public function saveSubjectAssign()
    {
        $data = array(
            'school_year_id' => $this->input->post('school_year'),
            'section_id' => $this->input->post('section_id'),
            'user_id' => $this->input->post('faculty'),
            'subject_id' => $this->input->post('subject')
        );

        return $this->db->insert('subject_designation', $data);
    }

    public function get_subject_details($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('subject_designation')->row();
    }

}

?>
