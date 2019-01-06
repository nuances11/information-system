<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Class Records</h2>
    </div>
</header>

<div class="mt-3 container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="text-bold"><?= $section->section_name ?></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="student_grades" data-subject="<?= $data['subject'] ;?>" data-year="<?= $data['school_year'] ;?>" data-section="<?= $data['section'] ;?>" data-grade="<?= $data['grade']; ?>" width="100%">
                    <thead>
                        <tr>
                            <th width="250">Student Name</th>
                            <th>Q1</th>
                            <th>Q2</th>
                            <th>Q2</th>
                            <th>Q4</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                </table>
                <a href="<?php echo base_url() . 'registrar/records/sy/'.$data['school_year'].'/grade/'.$data['grade'].'/section/'.$data['section'].'/subject/'.$data['subject'].'/print';?>" class="btn btn-primary">Print Grades</a>
            </div>
        </div>
    </div>
</div>
