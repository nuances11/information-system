<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Subject</h2>
	</div>
</header>
<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary float-right" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addsubjmodal">
	Add Subject
</button>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">Subject List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="subjects_table" width="100%">
					<thead>
						<tr>
							<th>Subject ID</th>
							<th>Subject Name</th>
                            <th>Grade Level</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addsubjmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="add_subject_form">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Subject Name</label>
						<div class="col-sm-9">
							<input id="name" name="subject_name" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Grade Level</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="grade_level" id="faculty">
									<option value="">Choose Grade</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
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
<div class="modal fade" id="updatesubjmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <input type="hidden" name="subject_id">
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Subject Name</label>
						<div class="col-sm-9">
							<input id="name" name="subject_name" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Grade Level</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="grade_level" id="faculty">
									<option value="">Choose Grade</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
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

<!--Modal Delete-->
<div class="modal fade" id="deletesubjmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Subject
					<!--lagay mo dito username--> ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Delete</button>
			</div>
		</div>
	</div>
</div>
