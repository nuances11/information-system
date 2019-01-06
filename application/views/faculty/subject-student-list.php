<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Students</h2>
	</div>
</header>

<br><br><br>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h3 class="h4">Student List</h3>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="subject_student_list" data-year="<?= $data['school_year'] ;?>" data-section="<?= $data['section'] ;?>" data-subject="<?= $data['subject'] ;?>" width="100%">
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Encode Grade</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
