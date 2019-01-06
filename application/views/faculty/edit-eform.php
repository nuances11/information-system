<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Enrollment Form</h2>
  </div>
</header>
<pre>
<?php
    $details = unserialize($enroll->raw_data);
    // print_r($details);
?>
</pre>
<div class="mt-3 container">
    <div class="card container">
    <p><a href="<?php echo base_url();?>faculty/list/sy/<?=$enroll->school_year_id;?>/section/<?= $enroll->section_id;?>/students" class="text-left">Back to List</a></p>
        <div class="mt-3 top text-center">
            <h4>LITTLE ANGEL STUDY CENTER</h4>
            <h6>OLONGAPO CITY</h6>
            <h4>ENROLLMENT FORM</h4>
            <h4><?=$enroll->school_year;?></h4>
        </div>
        <form id="update_enroll_student_form" data-section="<?= $enroll->section_id;?>" data-year="<?= $enroll->school_year_id;?>">
        <input type="hidden" name="enroll_id" value="<?= $enroll->id;?>">
        <input type="hidden" name="section_id" value="<?= $enroll->section_id;?>">
        <input type="hidden" name="sy" value="<?=$enroll->school_year_id;?>">
        <div class="form-group row text-center">
            <div class="col-sm-6 form-inline">
                <label for="">Grade : </label>
                <input id="grade_level" type ="text" class="form-control" name="grade" disable readonly value="<?= $enroll->grade_level;?>">
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-6 form-inline">
                <label for="">Type : </label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" value="<?php echo (!empty($details)) ? $details['student_type'] : '' ; ?>" name="student_type" id="student_type">
                            <option <?php echo (!empty($details) && $details['student_type'] == '') ? 'selected' : '' ; ?> value="">Choose Type</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'New Student') ? 'selected' : '' ; ?> value="New Student">New Student</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'Old Student') ? 'selected' : '' ; ?> value="Old Student">Old Student</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'JHS-ECS Grantee') ? 'selected' : '' ; ?> value="JHS-ECS Grantee">JHS-ECS Grantee</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'SHS-QVR') ? 'selected' : '' ; ?> value="SHS-QVR">SHS-QVR</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'Returning') ? 'selected' : '' ; ?> value="Returning">Returning (Balik Aral)</option>
                            <option <?php echo (!empty($details) && $details['student_type'] == 'Repeater') ? 'selected' : '' ; ?> value="Repeater">Repeater</option>
                        </select>
                    </div>
            </div>
        </div>
        <div class="shs">
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Learners Reference Number(LRN)</label>
                    <input id="lrn" class="form-control" type="text" placeholder="LRN" name="lrn"  maxlength="12" value="<?php echo (!empty($details)) ? $details['lrn'] : '' ; ?>">
                </div>
                <div class="col-sm-6">
                    <label for="">ESC ID Number(ESC)</label>
                    <input id="esc" class="form-control" type="text" placeholder="ESC" name="esc"  maxlength="8"  value="<?php echo (!empty($details)) ? $details['esc'] : '' ; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <label for="">Name</label>
                    <div class="form-group form-inline">
                        <input id="lastname" class="form-control col-md-4" type="text" name="lastname" placeholder="Last Name" value="<?php echo (!empty($details)) ? $details['lastname'] : '' ; ?>">
                        <input id="firstname" class="form-control col-md-4" type="text" name="firstname" placeholder="First Name" value="<?php echo (!empty($details)) ? $details['firstname'] : '' ; ?>">
                        <input id="middlename" class="form-control col-md-4" type="text" name="middlename" placeholder="Middle Name" value="<?php echo (!empty($details)) ? $details['middlename'] : '' ; ?>">
                    </div>
                    

                </div>
                <div class="col-sm-3">
                    <label for="">Sex</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" name="sex" id="sex"  value="<?php echo (!empty($details)) ? $details['sex'] : '' ; ?>">
                            <!-- <option selected>Choose Sex</option> -->
                            <option <?php echo (!empty($details) && $details['sex'] == 'M') ? 'selected' : '' ; ?>  value="M">Male</option>
                            <option <?php echo (!empty($details) && $details['sex'] == 'F') ? 'selected' : '' ; ?> value="F">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <label for="">Age</label>
                    <input id="age" class="form-control" type="number" name="age" placeholder="Age" maxlength="2" max="99" value="<?php echo (!empty($details)) ? $details['age'] : '' ; ?>">
                </div>
                <div class="col-sm-6">
                    <label for="">Date of Birth</label>
                    <div class='input-group date' id='sandbox-container'>
                        <input id="birthdate" type="text" pleceholder="MM-DD-YYY" name="dob" class="form-control" value="<?php echo (!empty($details)) ? $details['dob'] : '' ; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="">Place of Birth</label>
                    <input id="birthplace" type="text" name="pob" class="form-control" value="<?php echo (!empty($details)) ? $details['pob'] : '' ; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="">Religion</label>
                    <input id="religion" type="text" name="religion" class="form-control" value="<?php echo (!empty($details)) ? $details['religion'] : '' ; ?>">
                </div>
                <div class="col-sm-4">
                    <label for="">Mother Tongue</label>
                    <input id="mother_tongue" type="text" name="mother_tounge" class="form-control" value="<?php echo (!empty($details)) ? $details['mother_tounge'] : '' ; ?>">
                </div>
                <div class="col-sm-4">
                    <label for="">Nationality</label>
                    <input id="nationality" type="text" name="nationality" class="form-control" value="<?php echo (!empty($details)) ? $details['nationality'] : '' ; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input id="address" type="text" name="address" class="form-control" value="<?php echo (!empty($details)) ? $details['address'] : '' ; ?>">
            </div>
            <div class="form-group">
                <label for="">State nature of illness or disability, if any</label>
                <input id="disability" type="text" name="disablity" class="form-control" value="<?php echo (!empty($details)) ? $details['disablity'] : '' ; ?>">
            </div>
            <div class="form-group">
                <small>For transfer-In student, please provide a complete list of all the schools you attended:</small>
            </div>
            <div class="form-group">
                <table class="table">
                    <thead>
                        <th>School</th>
                        <th>Location</th>
                        <th>School Year of Attendance</th>
                        <th>Grade Level Completed</th>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<=5;$i++) {
                            $info = 0;?>
                            <tr>
                                <td><input id="school<?php echo $i; ?>" type="text" name="school[<?=$i;?>][]" class="form-control" value="<?php echo (!empty($details)) ? $details['school'][$i][$info] : '' ; ?>"></td>
                                <td><input id="location<?php echo $i; ?>" type="text" name="location[<?=$i;?>][]" class="form-control" value="<?php echo (!empty($details)) ? $details['location'][$i][$info] : '' ; ?>"></td>
                                <td><input id="school_yeary<?php echo $i; ?>" type="text" name="school_year[<?=$i;?>][]" class="form-control" value="<?php echo (!empty($details)) ? $details['school_year'][$i][$info] : '' ; ?>"></td>
                                <td><input id="grade_completed<?php echo $i; ?>" type="text" name="grade_completed[<?=$i;?>][]" class="form-control" value="<?php echo (!empty($details)) ? $details['grade_completed'][$i][$info] : '' ; ?>"></td>
                            </tr>
                        <?php $info++; } ?>
                    </tbody>
                </table>
            </div>
            <!-- Parent's Section -->
            <div id="parent-info">
                <h3 class="text-center text-bold">PARENT/GUARDIAN INFORMATION</h3>
                <div class="form-group">
                    <label for="">Name:</label>
                    <div class="form-inline">     
                        <input id="father_name" name="father_name" type="text" class="form-control col-sm-6" placeholder="Father's Name" value="<?php echo (!empty($details)) ? $details['father_name'] : '' ; ?>">
                        <input id="mother_name" name="mother_name" type="text" class="form-control col-sm-6" placeholder="Mother's Name" value="<?php echo (!empty($details)) ? $details['mother_name'] : '' ; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Occupation:</label>
                    <div class="form-inline">     
                        <input id="father_occupation" name="father_occupation" type="text" class="form-control col-sm-6" placeholder="Father's Occupation" value="<?php echo (!empty($details)) ? $details['father_occupation'] : '' ; ?>">
                        <input id="mother_occupation" name="mother_occupation" type="text" class="form-control col-sm-6" placeholder="Mother's Occupation" value="<?php echo (!empty($details)) ? $details['mother_occupation'] : '' ; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contact:</label>
                    <div class="form-inline">     
                        <input id="father_contact" name="father_contact" type="text" class="form-control col-sm-6" placeholder="Father's Contact" value="<?php echo (!empty($details)) ? $details['father_contact'] : '' ; ?>">
                        <input id="mother_contact" name="mother_contact" type="text" class="form-control col-sm-6" placeholder="Mother's Contact" value="<?php echo (!empty($details)) ? $details['mother_contact'] : '' ; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input id="parent_address" name="parent_address" type="text" class="form-control"  placeholder="Parents Address" value="<?php echo (!empty($details)) ? $details['parent_address'] : '' ; ?>">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Guardian's Name:</label>
                            <input id="gurdian_name" name="gurdian_name" type="text" class="form-control"  placeholder="Guardian's Name" value="<?php echo (!empty($details)) ? $details['gurdian_name'] : '' ; ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Contact:</label>
                            <input id="guardian_contact" name="guardian_contact" type="text" class="form-control" placeholder="Guardian's Contact" value="<?php echo (!empty($details)) ? $details['guardian_contact'] : '' ; ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Occupation:</label>
                            <input id="guardian_occupation" name="guardian_occupation" type="text" class="form-control" placeholder="Guardian's Occupation" value="<?php echo (!empty($details)) ? $details['guardian_contact'] : '' ; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Parent's Section -->
            <div id="incase-of-emergency">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">In case of emergency, please notify</label>
                            <input id="emergency_name" name="emergency_name" type="text" class="form-control"  placeholder="Name" value="<?php echo (!empty($details)) ? $details['emergency_name'] : '' ; ?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Contact</label>
                            <input id="emergency_contact" name="emergency_contact" type="text" class="form-control"  placeholder="Contact" value="<?php echo (!empty($details)) ? $details['emergency_contact'] : '' ; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group form-inline">
                        <label class="text-bold">Who will receive the InfoText Service, please choose one: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="contact_reciepient" type="radio" id="info1" value="father" <?php echo (!empty($details) && $details['contact_reciepient'] == 'father') ? 'checked' : '' ; ?>>
                        <label class="form-check-label" for="inlineCheckbox1">Father</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"  name="contact_reciepient" type="radio" id="info2" value="mother"  <?php echo (!empty($details) && $details['contact_reciepient'] == 'mother') ? 'checked' : '' ; ?>>
                        <label class="form-check-label" for="inlineCheckbox2">Mother</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="contact_reciepient" type="radio" id="info3" value="guardian" <?php echo (!empty($details) && $details['contact_reciepient'] == 'guardian') ? 'checked' : '' ; ?> >
                        <label class="form-check-label" for="inlineCheckbox3">Guradian</label>
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 4rem!important;">
                <input class="btn btn-primary float-right" type="submit" value="Enroll Student">
            </div>
            </form>
        </div>
 
    </div>
</div>