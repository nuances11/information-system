<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Encode Grade</h2>
    </div>
</header>
<?php 
    $info = unserialize($student->raw_data);
    $student_name = ucfirst($info['firstname']) . ' ' . ucfirst($info['middlename']) . '. ' . ucfirst($info['lastname']);
;?>
<div class="mt-3 container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="text-bold"><?= ucfirst($section->section_name);?>e</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="250">Student Name</th>
                            <th>Q1</th>
                            <th>Q2</th>
                            <th>Q2</th>
                            <th>Q4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form id="encode_grade">
                            <input type="hidden" name="school_year_id" value="<?= $data['school_year'];?>">
                            <input type="hidden" name="section_id" value="<?= $data['section'];?>">
                            <input type="hidden" name="enroll_id" value="<?= $data['student'];?>">
                            <input type="hidden" name="subject_id" value="<?= $data['subject'];?>">

                            <td><?= $student_name ;?></td>
                            <td>
                                <input id="id_q1" name="quarter_one" type="text" class="form-control" value="<?php echo (!empty($grades)) ? $grades->quarter_one : '' ; ?>">
                            </td>
                            <td>
                                <input id="id_q2" name="quarter_two" type="text" class="form-control" value="<?php echo (!empty($grades)) ? $grades->quarter_two : '' ; ?>">
                            </td>
                            <td>
                                <input id="id_q3" name="quarter_three" type="text" class="form-control" value="<?php echo (!empty($grades)) ? $grades->quarter_three : '' ; ?>">
                            </td>
                            <td>
                                <input id="id_q4" name="quarter_four" type="text" class="form-control" value="<?php echo (!empty($grades)) ? $grades->quarter_four : '' ; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
