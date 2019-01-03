<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"> -->

       <!-- AdditionalCSS -->
	<?php if(isset($additional_css)) : ?>
	    <?php foreach($additional_css as $css): ?>
	        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/<?php echo base_url() . $css ;?>">
        <?php endforeach; ?>
	<?php endif; ?>
    
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Information System</h1>
                  </div>
                  <p>Little Angel Study Center, Inc.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
                <?php echo $content ?>
          </div>
        </div>
      </div>
      
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>

    <!-- Additional Scripts -->
	<?php if(isset($add_js)) : ?>
	    <?php foreach($add_js as $js): ?>
	        <script src="<?php echo base_url(); ?>assets/<?php echo base_url() . $js; ?>"></script>
	    <?php endforeach; ?>
	<?php endif; ?>

    <!-- Inline Scripts  -->
	<?php if(isset($extra_js)) : ?>
	<script>
		<?php echo $extra_js; ?>

	</script>
	<?php endif; ?>

  </body>
</html>