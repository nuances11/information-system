<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Assign Faculty</h2>
	</div>
</header>
<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary float-right" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addassignmodal">
	Assign
</button>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">School Year List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="assign_table" width="100%">
					<thead>
						<tr>
							<th>SY</th>
							<th>Grade</th>
                            <th>Section</th>
							<th>Faculty</th>
                            <th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addassignmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Assign Faculty</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="assign_faculty_form">
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">School Year</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="school_year" id="faculty">
									<option value="">Choose Year</option>
									<option value="<?= $syear->id ;?>"><?= $syear->year ;?></option>
								</select>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Faculty</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="faculty" id="faculty">
									<option value="">Choose Faculty</option>
									<?php foreach($faculty as $f): ?>
                                        <option value="<?= $f->id ;?>"><?= $f->first_name . ' ' . $f->last_name ;?></option>
                                    <?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Grade</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="grade" id="faculty">
									<option value="">Choose Grade</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Section</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="section_id" id="faculty">
									<option value="">Choose Section</option>
									<?php foreach($sections as $section) :?>
										<option value="<?= $section->id ;?>"><?= $section->section_name ;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
            </form>
		</div>
	</div>
</div>

<!--Modal Update-->
<div class="modal fade" id="updateassignmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="update_sy_form">
                    <input type="hidden" name="year_id">
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Year</label>
						<div class="col-sm-9">
							<input id="name" name="year" type="text" class="form-control">
						</div>
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
            </form>
		</div>
	</div>
</div>
