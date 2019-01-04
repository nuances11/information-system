<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Section</h2>
	</div>
</header>

<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary float-right"
	 data-toggle="modal" data-target="#addsubjectmodal">
		Assign Subject
</button>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">Subject List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="subject_list" data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" width="100%">
					<thead>
						<tr>
							<th>Subject Name</th>
							<th>Teacher</th>
							<th>Action</th>
						</tr>
                    </thead>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addsubjectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="assign_subject_form" data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>">
					<input type="hidden" name="section_id" value="<?= $data['section'] ;?>">
					<input type="hidden" name="school_year" value="<?= $data['sy'] ;?>">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Subject Name</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" class="custom-select form-control" name="subject" id="subject">
									<option value="">Choose Subject</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Faculty</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" class="custom-select form-control" name="faculty" id="faculty">
									<option value="">Choose Faculty</option>
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
<div class="modal fade" id="updatesubjectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
				<form class="form-horizontal" id="update_subject_form">
				<input type="hidden" name="section_id" value="<?= $data['section'] ;?>">
					<input type="hidden" name="school_year" value="<?= $data['sy'] ;?>">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Subject Name</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" class="custom-select form-control" name="subject" id="subject">
									<option value="">Choose Subject</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Faculty</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" class="custom-select form-control" name="faculty" id="faculty">
									<option value="">Choose Faculty</option>
								</select>
							</div>
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
