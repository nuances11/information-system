<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		<?= $title ;?>
	</title>

	<!-- Theme CSS -->
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

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user.css">

	<!-- AdditionalCSS -->
	<?php if(isset($additional_css)) : ?>
	<?php foreach($additional_css as $css): ?>
	<link rel="stylesheet" href="<?php echo base_url() . $css ;?>">
	<?php endforeach; ?>
	<?php endif; ?>

</head>

<body>
	<div>
		<?php echo $content ?>
	</div>
	<!-- Dynamic Content -->


	<!-- Theme Script -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<!-- Main File-->
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	<script src="<?php echo base_url(); ?>assets/"></script>

	<!-- Additional Scripts -->
	<?php if(isset($add_js)) : ?>
	<?php foreach($add_js as $js): ?>
	<!-- <script src="<?php echo base_url() . $js; ?>"></script> -->
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
