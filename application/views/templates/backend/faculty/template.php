<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="base_url" content="<?php echo BASE_URL() ;?>">
	<title>
		<?= $title ;?>
	</title>

	<!-- Theme CSS -->
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Bootstrap Datepicker CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap-datepicker.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
	<!-- Google fonts - Poppins -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	<!-- Favicon-->
	<!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

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
	<div class="page">
		<!-- Main Navbar-->
		<header class="header">
			<nav class="navbar">
				<!-- Search Box-->
				<div class="search-box">
					<button class="dismiss"><i class="icon-close"></i></button>
					<form id="searchForm" action="#" role="search">
						<input type="search" placeholder="What are you looking for..." class="form-control">
					</form>
				</div>
				<div class="container-fluid">
					<div class="navbar-holder d-flex align-items-center justify-content-between">
						<!-- Navbar Header-->
						<div class="navbar-header">
							<!-- Navbar Brand --><a href="<?php echo base_url(); ?>faculty" class="navbar-brand d-none d-sm-inline-block">
								<div class="brand-text d-none d-lg-inline-block"><span>Information System</span></div>
								<div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
							</a>
							<!-- Toggle Button--><a id="toggle-btn" href="javascript:void(0);" class="menu-btn active"><span></span><span></span><span></span></a>
						</div>
						<!-- Navbar Menu -->
						<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
							<!-- Logout    -->
							<li class="nav-item"><a href="<?php echo base_url(); ?>logout" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i
									 class="fa fa-sign-out"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div class="page-content d-flex align-items-stretch">
			<!-- Side Navbar -->
			<nav class="side-navbar">
				<!-- Sidebar Header-->
				<div class="sidebar-header d-flex align-items-center">
					<div class="avatar"><img src="<?php echo base_url(); ?>assets/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
					<div class="title">
						<h1 class="h4">Mark Stephen</h1>
						<p>Web Designer</p>
					</div>
				</div>
				<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
				<ul class="list-unstyled">
					<li class="active"><a href="<?php echo base_url(); ?>assets/index.html"> <i class="icon-home"></i>Home </a></li>
					<!-- <li><a href="<?php echo base_url(); ?>faculty/student"> <i class="icon-grid"></i>Student</a></li> -->
					<li><a href="#studentdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Sections</a>
						<ul id="studentdropdownDropdown" class="collapse list-unstyled ">
							<li><a href="<?php echo base_url(); ?>faculty/student/list">List</a></li>
						</ul>
					</li>
					<!-- <li><a href="<?php echo base_url(); ?>faculty/class"> <i class="fa fa-bar-chart"></i>Class Report</a></li> -->


				</ul>
			</nav>


			<div class="content-inner">
				<?php echo $content ?>
			</div>
		</div>
	</div>
	<!-- Dynamic Content -->


	<!-- Theme Script -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<!-- Main File-->
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	<script src="<?php echo base_url(); ?>assets/"></script>

	<!-- Additional Scripts -->
	<?php if(isset($add_js)) : ?>
	<?php foreach($add_js as $js): ?>
		<script src="<?php echo base_url() . $js; ?>"></script>
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
