<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Users</h2>
	</div>
</header>
<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary float-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#addusermodal">
	Add User
</button>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">User List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="users_table" width="100%">
					<thead>
						<tr>
							<th>User ID</th>
							<th>Username</th>
							<th>Department</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="add_user_form">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Username</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Password</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" disabled placeholder="Password123" name="password" readonly>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">First Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="firstname">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Middle Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="middlename">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="lastname">
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Department</label>
						<div class="col-sm-9">
							<select name="department" class="form-control mb-3">
                                <option value="">Select Department</option>
                                <?php foreach($departments as $department):?>
								    <option value="<?= $department->id ;?>"><?= $department->department_detail ;?></option>
                                <?php endforeach;?>
							</select>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Status</label>
						<div class="col-sm-9">
							<select name="status" class="form-control mb-3">
								<option value="">Select Status</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
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
<div class="modal fade" id="updateusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="update_user_form">
					<input type="hidden" name="user_id">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Username</label>
						<div class="col-sm-9">
							<input type="text" disabled read-only class="form-control" name="username">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Password</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="password">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">First Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="firstname">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Middle Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="middlename">
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="lastname">
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Department</label>
						<div class="col-sm-9">
							<select name="department" class="form-control mb-3">
                                <option value="">Select Department</option>
                                <?php foreach($departments as $department):?>
								    <option value="<?= $department->id ;?>"><?= $department->department_detail ;?></option>
                                <?php endforeach;?>
							</select>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">Status</label>
						<div class="col-sm-9">
							<select name="status" class="form-control mb-3">
								<option value="">Select Status</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
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
</div>

<!--Modal Delete-->
<div class="modal fade" id="deleteusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
				<p>Are you sure you want to delete this user
					<!--lagay mo dito username--> ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Delete</button>
			</div>
		</div>
	</div>
</div>
