<div class="mt-3">
<pre>
    <?php 
        //print_r($section); 
        // $student = unserialize($grades->raw_data);
        // $student_name = ucfirst($student['firstname']) . ' ' . ucfirst($student['middlename'][0]) .'. ' . ucfirst($student['lastname']);
        // $average = ($student->quarter_one + $student->quarter_two + $student->quarter_three + $student->quarter_four) / 4.0;
    ?>
</pre>
    <!-- <div class="card"> -->
    <!-- <div> -->
        <!-- <div class="card-header d-flex align-items-center">
            <h3 class="text-bold">Student Name</h3>
        </div> -->
        <div class="container">
            <div class="mt-3 top text-center">
                <h6>Republic of the Philippines</h6>
                <h6>Department of Education</h6>
                <h6>Bureau of Secondary Education</h6>
                <h6>Region III</h6>
                <h4>LITTLE ANGEL STUDY CENTER</h4>
                <h6>OLONGAPO CITY</h6>
                <h5>CLASS RECORD - SECONDARY</h5><br>
                <h4 class="text-bold"><?=$section->section_name ?>/<?=$section->grade ?></h4><br>
            </div>

            <div class="form-group table-responsive">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                            <th width="250" class="text-left">Student Name</th>
                            <th>Q1</th>
                            <th>Q2</th>
                            <th>Q2</th>
                            <th>Q4</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <?php foreach($grades as $grade): ?>
                            <?php
                                $student = unserialize($grade->raw_data);
                                $student_name = ucfirst($student['firstname']) . ' ' . ucfirst($student['middlename'][0]) .'. ' . ucfirst($student['lastname']);
                                $average = ($grade->quarter_one + $grade->quarter_two + $grade->quarter_three + $grade->quarter_four) / 4.0;
                            ;?>
                            <td class="text-left">
                                <!-- <a href="<?php echo base_url(); ?>registrar/section-id/student-id/card" target="_blank"> -->
                                <?= $student_name; ?>
                            </td>
                            <td>
                                <?= $grade->quarter_one ?>
                            </td>
                            <td>
                                <?= $grade->quarter_two ?>
                            </td>
                            <td>
                                <?= $grade->quarter_three ?>
                            </td>
                            <td>
                                <?= $grade->quarter_four ?>
                            </td>
                            <td>
                                <?= $average ?>
                            </td>
                            <?php endforeach;?>
                        </tr>
                    </tbody>
                </table>
            </div>
</div>
</div>