<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Forms</h2>
    </div>
</header>

<div class="mt-3 container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="text-bold">SF10 Print</h3>
        </div>
        <div class="card-body">
            <form id="check_lrn_form">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Learner Reference Number (LRN)</label>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="input_lrn" id="input_lrn">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Check Records</button>
            </form>
            <!-- <a class="btn btn-primary" href="<?php echo base_url(); ?>print/section-id/student-id/sf10-front" target="_blank">SF10 Front</a> -->
            <!-- <a class="btn btn-primary" href="<?php echo base_url(); ?>print/section-id/student-id/sf10-back" target="_blank">SF10 Back</a> -->
        </div>
    </div>
</div>