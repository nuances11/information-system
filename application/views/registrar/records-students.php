<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Class Report</h2>
    </div>
</header>

<div class="mt-3 container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="text-bold">Class Records</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="records_subjects" data-year="<?= $data['school_year'] ;?>" data-section="<?= $data['section'] ;?>" data-grade="<?= $data['grade']; ?>" width="100%">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>