<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">School Year</h2>
	</div>
</header>
<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary float-right" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addsymodal">
	Add School Year
</button>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">School Year List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="sy_table" width="100%">
					<thead>
						<tr>
							<th>SY ID</th>
							<th>Year</th>
                            <th>Active</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addsymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add School Year</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="add_sy_form">
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">From</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="year_from" id="faculty">
									<option value="">Choose Year</option>
                                    <?php $year_from = date("Y");?>
									<option value="<?= $year_from ;?>"><?= $year_from ;?></option>
								</select>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 form-control-label">To</label>
						<div class="col-sm-9">
							<div class="input-group mb-3">
								<select class="custom-select form-control" name="year_to" id="faculty">
									<option value="">Choose Year</option>
                                    <?php $year_to = date("Y", strtotime('+1 year'));?>
									<option value="<?= $year_to ;?>"><?= $year_to ;?></option>
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
<div class="modal fade" id="updatesymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
