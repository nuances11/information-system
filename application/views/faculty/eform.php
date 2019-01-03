<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Enrollment Form</h2>
  </div>
</header>

<div class="mt-3 container">
    <div class="card container"> 
        <div class="mt-3 top text-center">
            <h4>LITTLE ANGEL STUDY CENTER</h4>
            <h6>OLONGAPO CITY</h6>
            <h4>ENROLLMENT FORM</h4>
            <h4>SY 2018-2019</h4>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-6 form-inline">
                <label for="">Grade:</label>
                <input id="grade_level" type ="text" class="form-control">
            </div>
            <div class="col-sm-6 form-inline flex-row-reverse">
                <input id="date_completed" type="text" class="form-control">
                <label for="">Date:</label>
            </div>
        </div>
        <div class="shs">
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Learners Reference Number(LRN)</label>
                    <input id="lrn" class="form-control" type="text" placeholder="LRN"  maxlength="12">
                </div>
                <div class="col-sm-6">
                    <label for="">ESC ID Number(ESC)</label>
                    <input id="esc" class="form-control" type="text" placeholder="ESC"  maxlength="8">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <label for="">Name</label>
                    <div class="form-group form-inline">
                        <input id="lastname" class="form-control col-md-4" type="text" placeholder="Last Name">
                        <input id="firstname" class="form-control col-md-4" type="text" placeholder="First Name">
                        <input id="middlename" class="form-control col-md-4" type="text" placeholder="Middle Name">
                    </div>
                    

                </div>
                <div class="col-sm-3">
                    <label for="">Sex</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" id="sex">
                            <!-- <option selected>Choose Sex</option> -->
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <label for="">Age</label>
                    <input id="age" class="form-control" type="number" placeholder="Age" maxlength="2" max="99">
                </div>
                <div class="col-sm-6">
                    <label for="">Date of Birth</label>
                    <div class='input-group date' id='sandbox-container'>
                        <input id="birthdate" type="text" class="form-control">
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="">Place of Birth</label>
                    <input id="birthplace" type="text" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="">Religion</label>
                    <input id="religion" type="text" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="">Mother Tongue</label>
                    <input id="mother_tongue" type="text" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="">Nationality</label>
                    <input id="nationality" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input id="address" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">State nature of illness or disability, if any</label>
                <input id="disability" type="text" class="form-control">
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
                                <td><input id="school<?php echo $i; ?>" type="text" class="form-control"></td>
                                <td><input id="location<?php echo $i; ?>" type="text" class="form-control"></td>
                                <td><input id="school_yeary<?php echo $i; ?>" type="text" class="form-control"></td>
                                <td><input id="grade_completed<?php echo $i; ?>" type="text" class="form-control"></td>
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
                        <input id="father_name" type="text" class="form-control col-sm-6" placeholder="Father's Name">
                        <input id="mother_name" type="text" class="form-control col-sm-6" placeholder="Mother's Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Occupation:</label>
                    <div class="form-inline">     
                        <input id="father_occupation" type="text" class="form-control col-sm-6" placeholder="Father's Occupation">
                        <input id="mother_occupation" type="text" class="form-control col-sm-6" placeholder="Mother's Occupation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contact:</label>
                    <div class="form-inline">     
                        <input id="father_contact" type="number" class="form-control col-sm-6" placeholder="Father's Contact">
                        <input id="mother_contact" type="number" class="form-control col-sm-6" placeholder="Mother's Contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input id="parent_address" type="text" class="form-control"  placeholder="Parents Address">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Guardian's Name:</label>
                            <input id="gurdian_address" type="text" class="form-control"  placeholder="Guardian's Name">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Contact:</label>
                            <input id="guardian_contact" type="number" class="form-control" placeholder="Guardian's Contact">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Occupation:</label>
                            <input id="guardian_occupation" type="number" class="form-control" placeholder="Guardian's Occupation">
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
                            <input id="emergency_name" type="text" class="form-control"  placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Contact</label>
                            <input id="emergency_contact" type="text" class="form-control"  placeholder="Contact">
                        </div>
                    </div>
                </div>
                <div class="form-group form-inline">
                        <label class="text-bold">Who will receive the InfoText Service, please choose one: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="info1" value="father">
                        <label class="form-check-label" for="inlineCheckbox1">Father</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="info2" value="mother">
                        <label class="form-check-label" for="inlineCheckbox2">Mother</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="info3" value="guardian" >
                        <label class="form-check-label" for="inlineCheckbox3">Guradian</label>
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 4rem!important;">
                <input class="btn btn-primary float-right" type="button" value="Enroll Student">
            </div>
        </div>
 
    </div>
</div>
<script>
    $('#sandbox-container input').datepicker({
    });
</script>