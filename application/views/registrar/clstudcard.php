<!-- <div class="mt-3 container"> -->
<pre>
<?php #endregion
    //print_r($subject_grade);
    $student_details = unserialize($student->raw_data);
    $student_name = ucfirst($student_details['firstname']) . ' ' . ucfirst($student_details['middlename'][0]) .'. ' . ucfirst($student_details['lastname']);
    // $average = ($grade->quarter_one + $grade->quarter_two + $grade->quarter_three + $grade->quarter_four) / 4.0;

    //Get the current UNIX timestamp.
    $now = time();

    //Get the timestamp of the person's date of birth.
    $dob = strtotime($student_details['dob']);

    //Calculate the difference between the two timestamps.
    $difference = $now - $dob;

    //There are 31556926 seconds in a year.
    $age = floor($difference / 31556926);


?>
</pre>
<div class="mt-3">
    <!-- <div class="card"> -->
    <div>
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
                <h5>PROGRESS REPORT CARD-SECONDARY</h5>
            </div>
            <div class="form-group">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <h6 class="mb-0 text-bold">Name</h6>
                                <small>Pangalan</small>
                            </td>
                            <td colspan="3">
                                <?= $student_name ?>
                            </td>
                            <td>
                                <h6 class="mb-0 text-bold"> </h6>
                                <small>LRN</small>
                            </td>
                            <td>
                                <?= $student_details['lrn'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0 text-bold">Sex</h6>
                                <small>Kasarian</small>
                            </td>
                            <td>
                                <?= $student_details['sex'] ;?>
                            </td>
                            <td>
                                <h6 class="mb-0 text-bold">Age</h6>
                                <small>Gulang</small>
                            </td>
                            <td><?= $age ;?></td>
                            <td>
                                <h6 class="mb-0 text-bold">Year/Section</h6>
                                <small>Taon/Pangkat</small>
                            </td>
                            <td colspan="2"><?= $section->grade . ' / ' . $section->section_name ;?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <b>School Year/</b>Taong Pampaaralan <?= $year->year ;?>
                            </td>
                            <td colspan="3">
                                <b>Curriculum/</b>Kurikulum: 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2">
                                <h6 class="mb-0 text-bold">LEARNING AREAS</h6>
                                <small>(Larangan ng Pag-aaral)</small>
                            </th>
                            <th colspan="4">
                                <h6 class="mb-0 text-bold">MARKAHAN</h6>
                            </th>
                            <!-- <th rowspan="2">
                                <h6 class="mb-0 text-bold">Final Grade</h6>
                                <small>Huling Marka</small>
                            </th> -->
                            <th rowspan="2">
                                <h6 class="mb-0 text-bold">Remarks</h6>
                                <small>Pasiya</small>
                            </th>
                        </tr>
                        <tr class="text-center">
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $avg = '' ;
                            $remarks = '';
                            $subjavg = '';
                            $subjremarks = '';
                        ?>
                        <?php foreach($subject_grade as $subgrade):?>
                            <td class="text-left"><?= $subgrade->subject_name ;?></td>
                            <td class="text-center"><?= $subgrade->quarter_one ;?></td>
                            <td class="text-center"><?= $subgrade->quarter_two ;?></td>
                            <td class="text-center"><?= $subgrade->quarter_three ;?></td>
                            <td class="text-center"><?= $subgrade->quarter_four ;?></td>
                            <?php if(!empty($subgrade->quarter_one) && !empty($subgrade->quarter_two) && !empty($subgrade->quarter_three) && !empty($subgrade->quarter_four)): ?>
                                <?php
                                    $subjavg = ($subgrade->quarter_one + $subgrade->quarter_two + $subgrade->quarter_three + $subgrade->quarter_four) / 4;
                                    $avg = ($subgrade->quarter_one + $subgrade->quarter_two + $subgrade->quarter_three + $subgrade->quarter_four) / 4;
                                    $remarks = ($avg >= 75) ? 'Passed' : 'Failed' ;
                                    $avg_first = $subgrade->avg_first;
                                    $avg_two = $subgrade->avg_two;
                                    $avg_three = $subgrade->avg_three;
                                    $avg_four = $subgrade->avg_four;
                                    $subjremarks = ($subjavg >= 75) ? 'Passed' : 'Failed' ;

                                ?>
                                <td class="text-center"><?= $subjremarks ;?></td>
                            <?php endif;?>
                            
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <td class="text-left">General Average:</td>
                            <td><?= $avg_first ;?></td>
                            <td><?= $avg_two ;?></td>
                            <td><?= $avg_three ;?></td>
                            <td><?= $avg_four ;?></td>
                            <td><?= $remarks ;?></td>
                        </tr>
                    </tfoot>
                </table>

                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6 class="mb-0 text-bold">Mga Araw na</h6>
                                <small>Attendance</small>
                            </th>
                            <!-- class="vertical-th" -->
                            <th class="vertical-th">June</th>
                            <th class="vertical-th">July</th>
                            <th class="vertical-th">Aug.</th>
                            <th class="vertical-th">Sept.</th>
                            <th class="vertical-th">Oct.</th>
                            <th class="vertical-th">Nov.</th>
                            <th class="vertical-th">Dec.</th>
                            <th class="vertical-th">Jan.</th>
                            <th class="vertical-th">Feb.</th>
                            <th class="vertical-th">Mar.</th>
                            <th class="vertical-th">Apr.</th>
                            <th>Kabuuan<br/></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="text-left">
                                <h6 class="mb-0 text-bold">May Pasok</h6>
                                <small>Days of School</small>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-left">
                                <h6 class="mb-0 text-bold">Ipinasok</h6>
                                <small>Days Present</small>
                            </td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-left">
                                <h6 class="mb-0 text-bold">Lumiban</h6>
                                <small>Days Absent</small>
                            </td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-left">
                                <h6 class="mb-0 text-bold">Nahuli</h6>
                                <small>Times Tardy</small>
                            </td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>