<div class="col-lg-6 bg-white">
    <div class="form d-flex align-items-center">
        
    <div class="content">
    <h1>Login</h1>
        <?php echo ($this->session->flashdata('login_error')) ? $this->session->flashdata('login_error') : '' ;?>
		<?php echo form_open('login/login_check', array('id' => 'login_form')) ;?>
        <div class="form-group">
            <input id="login-userid" type="text" name="username" class="input-material">
            <label for="login-userid" class="label-material">User ID</label>
        </div>
        <div class="form-group">
            <input id="login-password" type="password" name="password" class="input-material">
            <label for="login-password" class="label-material">Password</label>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
        <?php echo form_close();?>
    </div>
    </div>
</div>