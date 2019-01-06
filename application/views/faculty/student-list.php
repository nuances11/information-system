<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Section</h2>
	</div>
</header>

<a href="javascript:void(0);"><button id="addbtn" data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" type="button" class="btn btn-primary float-right enrollbtn"
	 data-toggle="modal" data-target="#addusermodal">
		Enrollment Form
	</button></a>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">Student List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" data-section="<?= $data['section'] ;?>" data-year="<?= $data['sy'] ;?>" id="student_list" data-section="" width="100%">
					<thead>
						<tr>
							<th>Entoll ID</th>
							<th>Name</th>
							<th>Forms</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
