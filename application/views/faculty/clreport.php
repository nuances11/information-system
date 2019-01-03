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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Grade Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample</td>
                            <td>9</td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>faculty/class-subjects">
                                    Update
                                </a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deletesubjmodal">
                                    Delete  
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Modal Delete-->
<div class="modal fade" id="deletesubjmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Section <!--lagay mo dito username--> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>