<?php

class Users_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getUsers()
    {
        $this->db->select('u.*, ud.user_id, ud.department_detail_id, udd.id as department_detail_id, udd.department_detail as department')
                ->from('users as u')
                ->join('user_department as ud', 'ud.user_id = u.id')
                ->join('user_department_details as udd', 'udd.id = ud.department_detail_id');
        return $this->db->get();
    }

    public function get_user_details($id)
    {
        $this->db->select('u.*,u.user_id as username, ud.user_id, ud.department_detail_id, udd.id as department_detail_id, udd.department_detail as department')
                ->from('users as u')
                ->join('user_department as ud', 'ud.user_id = u.id')
                ->join('user_department_details as udd', 'udd.id = ud.department_detail_id')
                ->where('u.id', $id);
        return $this->db->get()->row();
    }

    public function getUserDeparments()
    {
        return $this->db->get('user_department_details')->result();
    }

    public function deleteUser()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->db->where('id', $id);
            return $this->db->delete('users');
        }
        return [];
    }

    public function updateUser()
    {
        $id = $this->input->post('user_id');
        if ($id) {
            $data = array(
                'first_name' => $this->input->post('firstname'),
                'middle_name' => $this->input->post('middlename'),
                'last_name' => $this->input->post('lastname'),
                'first_name' => $this->input->post('firstname'),
                'department' => $this->input->post('department'),
                'is_active' => $this->input->post('status'),
            );
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            unset($data);

            $department = array(
                'department_detail_id' => $this->input->post('department')
            );

            $this->db->where('user_id', $id);
            return $this->db->update('user_department', $department);            

        }
        
        return [];
        
    }

    public function saveUser()
    {
        $data = array(
            'user_id' => $this->input->post('username'),
            'password' => md5('Password123'), // Set Default Password for created user 
            'first_name' => $this->input->post('firstname'),
            'middle_name' => $this->input->post('middlename'),
            'last_name' => $this->input->post('lastname'),
            'department' => $this->input->post('department'),
            'is_active' => $this->input->post('status'),        
        );

        $res = $this->db->insert('users', $data);
        if ($res) {
            $id = $this->db->insert_id();
            $department = array(
                'user_id' => $id,
                'department_detail_id' => $this->input->post('department'),
            );

            return $this->db->insert('user_department', $department);
        }

        return [];
    }

    public function getFacultyUsers($type = false)
    {
        $this->db->select('u.*, ud.user_id, ud.department_detail_id, udd.id as department_detail_id, udd.department_detail as department')
                ->from('users as u')
                ->join('user_department as ud', 'ud.user_id = u.id')
                ->join('user_department_details as udd', 'udd.id = ud.department_detail_id')
                ->where('u.department', 2);
        return $this->db->get()->result();
    }

    public function chkUserLogin($creds)
    {
        $this->db->select('*')
                ->from('users')
                ->where('user_id', $creds['user_id'])
                ->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $user =  $query->row();

            // Check if password input is correct
            if ($user->password == md5($creds['password'])) {
                return $user;
            } 
        }

        return false;
    }

}

?>
