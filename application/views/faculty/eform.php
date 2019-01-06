<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Enrollment Form</h2>
  </div>
</header>

<div class="mt-3 container">
    <div class="card container">
    <p><a href="<?php echo base_url();?>faculty/list/sy/<?=$school_year->id;?>/section/<?= $grade->id;?>/students" class="text-left">Back to List</a></p>
        <div class="mt-3 top text-center">
            <h4>LITTLE ANGEL STUDY CENTER</h4>
            <h6>OLONGAPO CITY</h6>
            <h4>ENROLLMENT FORM</h4>
            <h4><?=$school_year->year;?></h4>
        </div>
        <form id="enroll_student_form" data-section="<?= $grade->id;?>" data-year="<?= $school_year->id;?>">
        <input type="hidden" name="section_id" value="<?= $grade->id;?>">
        <input type="hidden" name="sy" value="<?=$school_year->id;?>">
        <div class="form-group row text-center">
            <div class="col-sm-6 form-inline">
                <label for="">Grade : </label>
                <input id="grade_level" type ="text" class="form-control" name="grade" disable readonly value="<?= $grade->grade;?>">
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-6 form-inline">
                <label for="">Type : </label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" name="student_type" id="student_type">
                            <!-- <option selected>Choose Sex</option> -->
                            <option value="New Student">New Student</option>
                            <option value="Old Student">Old Student</option>
                            <option value="JHS-ECS Grantee">JHS-ECS Grantee</option>
                            <option value="SHS-QVR">SHS-QVR</option>
                            <option value="Returning">Returning (Balik Aral)</option>
                            <option value="Reapeter">Reapeter</option>
                        </select>
                    </div>
            </div>
        </div>
        <div class="shs">
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Learners Reference Number(LRN)</label>
                    <input id="lrn" class="form-control" type="text" placeholder="LRN" name="lrn"  maxlength="12">
                </div>
                <div class="col-sm-6">
                    <label for="">ESC ID Number(ESC)</label>
                    <input id="esc" class="form-control" type="text" placeholder="ESC" name="esc"  maxlength="8">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <label for="">Name</label>
                    <div class="form-group form-inline">
                        <input id="lastname" class="form-control col-md-4" type="text" name="lastname" placeholder="Last Name">
                        <input id="firstname" class="form-control col-md-4" type="text" name="firstname" placeholder="First Name">
                        <input id="middlename" class="form-control col-md-4" type="text" name="middlename" placeholder="Middle Name">
                    </div>
                    

                </div>
                <div class="col-sm-3">
                    <label for="">Sex</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" name="sex" id="sex">
                            <!-- <option selected>Choose Sex</option> -->
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <label for="">Age</label>
                    <input id="age" class="form-control" type="number" name="age" placeholder="Age" maxlength="2" max="99">
                </div>
                <div class="col-sm-6">
                    <label for="">Date of Birth</label>
                    <div class='input-group date' id='sandbox-container'>
                        <input id="birthdate" type="text" pleceholder="MM-DD-YYY" name="dob" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="">Place of Birth</label>
                    <input id="birthplace" type="text" name="pob" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="">Religion</label>
                    <input id="religion" type="text" name="religion" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="">Mother Tongue</label>
                    <input id="mother_tongue" type="text" name="mother_tounge" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="">Nationality</label>
                    <input id="nationality" type="text" name="nationality" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input id="address" type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="">State nature of illness or disability, if any</label>
                <input id="disability" type="text" name="disablity" class="form-control">
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
                        <?php for($i=1;$i<=5;$i++) {?>
                            <tr>
                                <td><input id="school<?php echo $i; ?>" type="text" name="school[<?=$i;?>][]" class="form-control"></td>
                                <td><input id="location<?php echo $i; ?>" type="text" name="location[<?=$i;?>][]" class="form-control"></td>
                                <td><input id="school_yeary<?php echo $i; ?>" type="text" name="school_year[<?=$i;?>][]" class="form-control"></td>
                                <td><input id="grade_completed<?php echo $i; ?>" type="text" name="grade_completed[<?=$i;?>][]" class="form-control"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Parent's Section -->
            <div id="parent-info">
                <h3 class="text-center text-bold">PARENT/GUARDIAN INFORMATION</h3>
                <div class="form-group">
                    <label for="">Name:</label>
                    <div class="form-inline">     
                        <input id="father_name" name="father_name" type="text" class="form-control col-sm-6" placeholder="Father's Name">
                        <input id="mother_name" name="mother_name" type="text" class="form-control col-sm-6" placeholder="Mother's Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Occupation:</label>
                    <div class="form-inline">     
                        <input id="father_occupation" name="father_occupation" type="text" class="form-control col-sm-6" placeholder="Father's Occupation">
                        <input id="mother_occupation" name="mother_occupation" type="text" class="form-control col-sm-6" placeholder="Mother's Occupation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contact:</label>
                    <div class="form-inline">     
                        <input id="father_contact" name="father_contact" type="text" class="form-control col-sm-6" placeholder="Father's Contact">
                        <input id="mother_contact" name="mother_contact" type="text" class="form-control col-sm-6" placeholder="Mother's Contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input id="parent_address" name="parent_address" type="text" class="form-control"  placeholder="Parents Address">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Guardian's Name:</label>
                            <input id="gurdian_name" name="gurdian_name" type="text" class="form-control"  placeholder="Guardian's Name">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Contact:</label>
                            <input id="guardian_contact" name="guardian_contact" type="text" class="form-control" placeholder="Guardian's Contact">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Occupation:</label>
                            <input id="guardian_occupation" name="guardian_occupation" type="text" class="form-control" placeholder="Guardian's Occupation">
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
                            <input id="emergency_name" name="emergency_name" type="text" class="form-control"  placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Contact</label>
                            <input id="emergency_contact" name="emergency_contact" type="text" class="form-control"  placeholder="Contact">
                        </div>
                    </div>
                </div>
                <div class="form-group form-inline">
                        <label class="text-bold">Who will receive the InfoText Service, please choose one: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="contact_reciepient" type="radio" id="info1" value="father">
                        <label class="form-check-label" for="inlineCheckbox1">Father</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"  name="contact_reciepient" type="radio" id="info2" value="mother">
                        <label class="form-check-label" for="inlineCheckbox2">Mother</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="contact_reciepient" type="radio" id="info3" value="guardian" >
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