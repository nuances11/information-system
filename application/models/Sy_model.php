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

    public function deleteSection($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('section');
    }

    public function updateSection()
    {
        $data = array(
            'grade' => $this->input->post('grade'),
            'section_name' => $this->input->post('section_name'),
        );
        $this->db->where('id', $this->input->post('section_id'));
        return $this->db->update('section', $data);
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
                ->join('section as s', 's.id = fd.section_id')
                ->where('fd.user_id', $id)
                ->where('fd.school_year_id', $sy);
        return $this->db->get();
    }

    public function getSubjectSectionList($sy, $id)
    {
        $this->db->select("sd.*, sub.subject_name,sub.grade_level,s.section_name, CONCAT(u.first_name,' ',u.last_name) AS faculty_name,")
            ->from('subject_designation as sd')
            ->join('subjects as sub', 'sub.id = sd.subject_id')
            ->join('section as s', 's.id = sd.section_id')
            ->join('users as u', 'u.id = sd.user_id')
            ->where('sd.user_id', $id)
            ->where('sd.school_year_id', $sy);
        return $this->db->get();       
    }

    public function getSubjectStudentList($sy, $section)
    {
        $this->db->select('ed.*,')
                ->from('enroll_data as ed')
                ->where('ed.section_id', $section)
                ->where('ed.school_year_id', $sy);
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

    public function getCurGrade($section)
    {
        $this->db->select('*')
                ->from('section')
                ->where('id', $section);
        return $this->db->get()->row();
    }

    public function getStudent($year, $section)
    {
        $this->db->where('school_year_id', $year)
                    ->where('section_id', $section);
        return $this->db->get('enroll_data');
    }

    public function withdrawStudent($id)
    {
        $data = array(
            'is_drop' => 0,
            'is_withdraw' => 1
        );
        $this->db->where('id', $id);
        return $this->db->update('enroll_data',$data);
    }

    public function deleteStudent($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('enroll_data');
    }

    public function getEnrollDetails($id)
    {
        $this->db->select('ed.*, sy.year as school_year')
            ->from('enroll_data as ed')
            ->join('school_year as sy', 'ed.school_year_id = sy.id')
            ->where('ed.id', $id);
        return $this->db->get()->row();
    }

    public function getStudentGrade($data)
    {
        $this->db->select('*')
                ->where('school_year_id', $data['school_year'])
                ->where('section_id', $data['section'])
                ->where('enroll_id', $data['student'])
                ->where('subject_id', $data['subject']);
        return $this->db->get('encoded_grade')->row();
    }

    public function getAllStudentsGrade($data)
    {
        $this->db->select('eg.*, ed.raw_data')
        ->from('encoded_grade as eg')
        ->join('enroll_data as ed', 'ed.id = eg.enroll_id')
        ->where('eg.school_year_id', $data['school_year'])
        ->where('eg.section_id', $data['section'])
        ->where('eg.subject_id', $data['subject']);
        
        return $this->db->get('encoded_grade')->result();
    }

    public function saveEncodeGrade()
    {
        $data = $this->input->post();
        $this->db->select('*')
                ->where('school_year_id', $data['school_year_id'])
                ->where('section_id', $data['section_id'])
                ->where('enroll_id', $data['enroll_id'])
                ->where('subject_id', $data['subject_id']);
        $encode = $this->db->get('encoded_grade')->row();

        if ($encode) {
            $update = array(
                'quarter_one' => $data['quarter_one'],
                'quarter_two' => $data['quarter_two'],
                'quarter_three' => $data['quarter_three'],
                'quarter_four' => $data['quarter_four'],
            );

            $this->db->where('school_year_id', $data['school_year_id'])
            ->where('section_id', $data['section_id'])
            ->where('enroll_id', $data['enroll_id'])
            ->where('subject_id', $data['subject_id']);
            return $this->db->update('encoded_grade', $update);
        }else{
            $grade = array(
                'school_year_id' => $data['school_year_id'],
                'section_id' => $data['section_id'],
                'enroll_id' => $data['enroll_id'],
                'subject_id' => $data['subject_id'],
                'quarter_one' => $data['quarter_one'],
                'quarter_two' => $data['quarter_two'],
                'quarter_three' => $data['quarter_three'],
                'quarter_four' => $data['quarter_four'],
            );

            return $this->db->insert('encoded_grade', $grade);
        }
    }

    public function activateStudent($id)
    {
        $data = array(
            'is_drop' => 0,
            'is_withdraw' => 0
        );
        $this->db->where('id', $id);
        return $this->db->update('enroll_data',$data);
    }

    public function dropStudent($id)
    {
        $data = array(
            'is_drop' => 1,
            'is_withdraw' => 0
        );
        $this->db->where('id', $id);
        return $this->db->update('enroll_data',$data);
    }

    public function saveStudentData()
    {
        $post = $this->input->post();
        $raw_data = serialize($post);
        $data = array(
            'section_id' => $post['section_id'],
            'school_year_id' => $post['sy'],
            'grade_level' => $post['grade'],
            'raw_data' => $raw_data,
        );

        return $this->db->insert('enroll_data', $data);
    }

    public function updateStudentData()
    {
        $post = $this->input->post();
        $raw_data = serialize($post);
        $data = array(
            'section_id' => $post['section_id'],
            'school_year_id' => $post['sy'],
            'grade_level' => $post['grade'],
            'raw_data' => $raw_data,
        );
        $this->db->where('id', $post['enroll_id']);
        return $this->db->update('enroll_data', $data);
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
                ->where('grade_level', $grade->grade);
                if (!empty($unavailableSubject)) {
                    $this->db->where_not_in('id', $unavailableSubject);
                }
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

    public function deleteSubjectAssign($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('subject_designation');
    }

    public function getGrades()
    {
        return $this->db->get('section');
    }

    public function getSubjects($grade, $section)
    {
        $this->db->where('grade_level', $grade);
        return $this->db->get('subjects');
    }

    public function getAllGrades($grades, $section, $year, $subject)
    {
        $this->db->select('eg.*, ed.raw_data')
                ->from('encoded_grade as eg')
                ->join('enroll_data as ed', 'ed.id = eg.enroll_id')
                ->where('eg.school_year_id', $year)
                ->where('eg.section_id', $section)
                ->where('eg.subject_id', $subject);
        return $this->db->get();
    }

    public function getStudentGrades($data)
    {
        $this->db->select('eg.*, ed.raw_data')
                ->from('encoded_grade as eg')
                ->join('enroll_data as ed', 'ed.id = eg.enroll_id')
                ->where('eg.school_year_id', $data['school_year'])
                ->where('eg.section_id', $data['section'])
                ->where('eg.subject_id', $data['subject'])
                ->where('eg.enroll_id', $data['student']);
        return $this->db->get()->row();
    }

    public function getSubjectGrade($data)
    {
        $this->db->select('eg.*, sub.subject_name, AVG (eg.quarter_one) as avg_first, AVG (eg.quarter_two) as avg_two, AVG (eg.quarter_three) as avg_three, AVG (eg.quarter_four) as avg_four ')
                ->from('encoded_grade as eg')
                ->join('subjects as sub', 'sub.id = eg.subject_id')
                ->where('eg.school_year_id', $data['school_year'])
                ->where('eg.section_id', $data['section'])
                ->where('eg.enroll_id', $data['student']);
        return $this->db->get()->result();
    }

    public function getRecords($lrn)
    {
        $formdata = array();
        $enroll_data = $this->db->get('enroll_data')->result();
        $records_found = 0;
        foreach ($enroll_data as $ed) {
            if($ed->raw_data)
            {
                $student = unserialize($ed->raw_data);
                if($student['lrn'] !== $lrn)
                {
                    continue;
                }else{
                    $records_found++;
                    // $this->db->select('eg.*, sub.subject_name, AVG (eg.quarter_one) as avg_first, AVG (eg.quarter_two) as avg_two, AVG (eg.quarter_three) as avg_three, AVG (eg.quarter_four) as avg_four ')
                    //         ->from('encoded_grade as eg')
                    //         ->join('subjects as sub', 'sub.id = eg.subject_id')
                    //         ->where('eg.school_year_id', $ed->school_year_id)
                    //         ->where('eg.section_id', $ed->section_id)
                    //         ->where('eg.enroll_id', $ed->id);
                    // $sg['grade'] =  $this->db->get()->result();
                    // array_push($formdata, $sg['grade']);
                }
            }
        }

        if ($records_found > 0) {
            return $lrn;
        }
        
        return [];
    }

    // Grade Seven

    public function getGradeSeven($lrn, $grade = false)
    {
    //     echo '<pre>';
        $student_id = '';
        if($grade != false && $lrn != '')
        {
            // Get Student Data Per Year Level
            $this->db->where('grade_level', $grade);
            $students = $this->db->get('enroll_data')->result();
            foreach ($students as $stud) {
                $rawData = unserialize($stud->raw_data);
                if ($rawData['lrn'] == $lrn) {
                    $student_id = $stud->id;
                    $student_sy = $stud->school_year_id;
                    $section_id = $stud->section_id;
                    // return $this->db->get()->result();
                    
                }

            }
            // echo $student_id . ' : Student<br>';
            // echo $student_sy . ' : School Year<br>';
            // echo $section_id . ' : Section ID<br>';
            $this->db->select('eg.*, sub.subject_name')
                    ->from('encoded_grade as eg')
                    ->join('subjects as sub', 'sub.id = eg.subject_id')
                    ->where('eg.school_year_id', $student_sy)
                    ->where('eg.section_id', $section_id)
                    ->where('eg.enroll_id', $student_id);
            return $this->db->get()->result();
        }
    
    }

    public function getGradeSevenDetails($lrn, $grade = false)
    {
        //echo '<pre>';
        $this->db->where('grade_level', $grade);
        $students = $this->db->get('enroll_data')->result();
        foreach ($students as $stud) {
            $rawData = unserialize($stud->raw_data);
            if ($rawData['lrn'] == $lrn) {
                $student_id = $stud->id;
                $student_sy = $stud->school_year_id;
                $section_id = $stud->section_id;
                
            }

        }
        // echo $student_id . ' : Student<br>';
        // echo $student_sy . ' : School Year<br>';
        // echo $section_id . ' : Section ID<br>';
        $this->db->select('ed.*, sec.section_name, sec.grade, sy.year, CONCAT(u.first_name, '.', u.last_name) AS faculty_name', FALSE)
                ->from('enroll_data as ed')
                ->join('section as sec', 'sec.id = ed.section_id')
                ->join('school_year as sy', 'sy.id = ed.school_year_id')
                ->join('faculty_designation as fd', 'fd.section_id = ed.section_id')
                ->join('users as u', 'u.id = fd.user_id')
                ->where('ed.school_year_id', $student_sy)
                ->where('ed.section_id', $section_id)
                ->where('ed.id', $student_id);
        return $this->db->get()->row();
    }

    // Grade Eight

    public function getGradeEight($lrn, $grade = false)
    {
        
        $student_id = '';
        if($grade != false && $lrn != '')
        {
            // Get Student Data Per Year Level
            $this->db->where('grade_level', $grade);
            $students = $this->db->get('enroll_data')->result();
            if($students)
            {
                foreach ($students as $stud) {
                    $rawData = unserialize($stud->raw_data);
                    if ($rawData['lrn'] == $lrn) {
                        $student_id = $stud->id;
                        $student_sy = $stud->school_year_id;
                        $section_id = $stud->section_id;
                        // return $this->db->get()->result();
                        
                    }
    
                }
                // echo $student_id . ' : Student<br>';
                // echo $student_sy . ' : School Year<br>';
                // echo $section_id . ' : Section ID<br>';
                $this->db->select('eg.*, sub.subject_name')
                        ->from('encoded_grade as eg')
                        ->join('subjects as sub', 'sub.id = eg.subject_id')
                        ->where('eg.school_year_id', $student_sy)
                        ->where('eg.section_id', $section_id)
                        ->where('eg.enroll_id', $student_id);
                return $this->db->get()->result();
            }
            
        }

        return [];
    
    }

    public function getGradeEightDetails($lrn, $grade = false)
    {
        //echo '<pre>';
        $this->db->where('grade_level', $grade);
        $students = $this->db->get('enroll_data')->result();
        if ($students) {
            foreach ($students as $stud) {
                $rawData = unserialize($stud->raw_data);
                if ($rawData['lrn'] == $lrn) {
                    $student_id = $stud->id;
                    $student_sy = $stud->school_year_id;
                    $section_id = $stud->section_id;
                    
                }
    
            }
            // echo $student_id . ' : Student<br>';
            // echo $student_sy . ' : School Year<br>';
            // echo $section_id . ' : Section ID<br>';
            $this->db->select('ed.*, sec.section_name, sec.grade, sy.year, CONCAT(u.first_name, '.', u.last_name) AS faculty_name', FALSE)
                    ->from('enroll_data as ed')
                    ->join('section as sec', 'sec.id = ed.section_id')
                    ->join('school_year as sy', 'sy.id = ed.school_year_id')
                    ->join('faculty_designation as fd', 'fd.section_id = ed.section_id')
                    ->join('users as u', 'u.id = fd.user_id')
                    ->where('ed.school_year_id', $student_sy)
                    ->where('ed.section_id', $section_id)
                    ->where('ed.id', $student_id);
            return $this->db->get()->row();
        }

        return [];
        
    }

    // Grade Nince

    public function getGradeNine($lrn, $grade = false)
    {
    //     echo '<pre>';
        $student_id = '';
        if($grade != false && $lrn != '')
        {
            // Get Student Data Per Year Level
            $this->db->where('grade_level', $grade);
            $students = $this->db->get('enroll_data')->result();
            if ($students) {
                foreach ($students as $stud) {
                    $rawData = unserialize($stud->raw_data);
                    if ($rawData['lrn'] == $lrn) {
                        $student_id = $stud->id;
                        $student_sy = $stud->school_year_id;
                        $section_id = $stud->section_id;
                        // return $this->db->get()->result();
                        
                    }
    
                }
                // echo $student_id . ' : Student<br>';
                // echo $student_sy . ' : School Year<br>';
                // echo $section_id . ' : Section ID<br>';
                $this->db->select('eg.*, sub.subject_name')
                        ->from('encoded_grade as eg')
                        ->join('subjects as sub', 'sub.id = eg.subject_id')
                        ->where('eg.school_year_id', $student_sy)
                        ->where('eg.section_id', $section_id)
                        ->where('eg.enroll_id', $student_id);
                return $this->db->get()->result();
            }
            
        }

        return [];
    
    }

    public function getGradeNineDetails($lrn, $grade = false)
    {
        //echo '<pre>';
        $this->db->where('grade_level', $grade);
        $students = $this->db->get('enroll_data')->result();
        if ($students) {
            foreach ($students as $stud) {
                $rawData = unserialize($stud->raw_data);
                if ($rawData['lrn'] == $lrn) {
                    $student_id = $stud->id;
                    $student_sy = $stud->school_year_id;
                    $section_id = $stud->section_id;
                    
                }
    
            }
            // echo $student_id . ' : Student<br>';
            // echo $student_sy . ' : School Year<br>';
            // echo $section_id . ' : Section ID<br>';
            $this->db->select('ed.*, sec.section_name, sec.grade, sy.year, CONCAT(u.first_name, '.', u.last_name) AS faculty_name', FALSE)
                    ->from('enroll_data as ed')
                    ->join('section as sec', 'sec.id = ed.section_id')
                    ->join('school_year as sy', 'sy.id = ed.school_year_id')
                    ->join('faculty_designation as fd', 'fd.section_id = ed.section_id')
                    ->join('users as u', 'u.id = fd.user_id')
                    ->where('ed.school_year_id', $student_sy)
                    ->where('ed.section_id', $section_id)
                    ->where('ed.id', $student_id);
            return $this->db->get()->row();
        }

        return [];
        
    }

    // Grade Ten

    public function getGradeTen($lrn, $grade = false)
    {
    //     echo '<pre>';
        $student_id = '';
        if($grade != false && $lrn != '')
        {
            // Get Student Data Per Year Level
            $this->db->where('grade_level', $grade);
            $students = $this->db->get('enroll_data')->result();
            if ($students) {
                foreach ($students as $stud) {
                    $rawData = unserialize($stud->raw_data);
                    if ($rawData['lrn'] == $lrn) {
                        $student_id = $stud->id;
                        $student_sy = $stud->school_year_id;
                        $section_id = $stud->section_id;
                        // return $this->db->get()->result();
                        
                    }
    
                }
                // echo $student_id . ' : Student<br>';
                // echo $student_sy . ' : School Year<br>';
                // echo $section_id . ' : Section ID<br>';
                $this->db->select('eg.*, sub.subject_name')
                        ->from('encoded_grade as eg')
                        ->join('subjects as sub', 'sub.id = eg.subject_id')
                        ->where('eg.school_year_id', $student_sy)
                        ->where('eg.section_id', $section_id)
                        ->where('eg.enroll_id', $student_id);
                return $this->db->get()->result();
            }
            
        }
    
    }

    public function getGradeTenDetails($lrn, $grade = false)
    {
        //echo '<pre>';
        $this->db->where('grade_level', $grade);
        $students = $this->db->get('enroll_data')->result();
        if ($students) {
            foreach ($students as $stud) {
                $rawData = unserialize($stud->raw_data);
                if ($rawData['lrn'] == $lrn) {
                    $student_id = $stud->id;
                    $student_sy = $stud->school_year_id;
                    $section_id = $stud->section_id;
                    
                }
    
            }
            // echo $student_id . ' : Student<br>';
            // echo $student_sy . ' : School Year<br>';
            // echo $section_id . ' : Section ID<br>';
            $this->db->select('ed.*, sec.section_name, sec.grade, sy.year, CONCAT(u.first_name, '.', u.last_name) AS faculty_name', FALSE)
                    ->from('enroll_data as ed')
                    ->join('section as sec', 'sec.id = ed.section_id')
                    ->join('school_year as sy', 'sy.id = ed.school_year_id')
                    ->join('faculty_designation as fd', 'fd.section_id = ed.section_id')
                    ->join('users as u', 'u.id = fd.user_id')
                    ->where('ed.school_year_id', $student_sy)
                    ->where('ed.section_id', $section_id)
                    ->where('ed.id', $student_id);
            return $this->db->get()->row();
        }
        
    }

    

}

?>
