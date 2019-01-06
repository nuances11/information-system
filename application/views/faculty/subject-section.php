<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">School Year <?= $sy->year ;?></h2>
	</div>
</header>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">Subject List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="faculty_section_list" data-year="<?= $sy->id ;?>" data-faculty="<?= $this->session->userdata('id') ;?>" width="100%">
					<thead>
						<tr>
							<th>Grade</th>
                            <th>Subject</th>
							<th>Section Name</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
