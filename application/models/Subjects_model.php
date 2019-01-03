<?php

class Subjects_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getSubjects()
    {
        return $this->db->get('subjects');
    }

    public function saveSubject()
    {
        $data = array(
            'subject_name' => $this->input->post('subject_name'),
            'grade_level' => $this->input->post('grade_level'),
        );

        return $this->db->insert('subjects', $data);
    }

    public function updateSubject()
    {
        $id = $this->input->post('subject_id');
        $data = array(
            'subject_name' => $this->input->post('subject_name'),
            'grade_level' => $this->input->post('grade_level'),
        );
        $this->db->where('id', $id);
        return $this->db->update('subjects', $data);
    }

    public function get_subject_details($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('subjects')->row();
    }

    public function deleteSubject()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        return $this->db->delete('subjects');
    }

}

?>
