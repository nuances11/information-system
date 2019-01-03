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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/<?php echo base_url() . $css ;?>">
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
							<!-- Navbar Brand --><a href="<?php echo base_url(); ?>assets/index.html" class="navbar-brand d-none d-sm-inline-block">
								<div class="brand-text d-none d-lg-inline-block"><span>Information System</span></div>
								<div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
							</a>
							<!-- Toggle Button--><a id="toggle-btn" href="<?php echo base_url(); ?>assets/#" class="menu-btn active"><span></span><span></span><span></span></a>
						</div>
						<!-- Navbar Menu -->
						<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
							<!-- Search-->
							<li class="nav-item d-flex align-items-center"><a id="search" href="<?php echo base_url(); ?>assets/#"><i class="icon-search"></i></a></li>
							<!-- Notifications-->
							<li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="<?php echo base_url(); ?>assets/#"
								 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span
									 class="badge bg-red badge-corner">12</span></a>
								<ul aria-labelledby="notifications" class="dropdown-menu">
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item">
											<div class="notification">
												<div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
												<div class="notification-time"><small>4 minutes ago</small></div>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item">
											<div class="notification">
												<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
												<div class="notification-time"><small>4 minutes ago</small></div>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item">
											<div class="notification">
												<div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
												<div class="notification-time"><small>4 minutes ago</small></div>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item">
											<div class="notification">
												<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
												<div class="notification-time"><small>10 minutes ago</small></div>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item all-notifications text-center">
											<strong>view all notifications </strong></a></li>
								</ul>
							</li>
							<!-- Messages                        -->
							<li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="<?php echo base_url(); ?>assets/#"
								 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span
									 class="badge bg-orange badge-corner">10</span></a>
								<ul aria-labelledby="notifications" class="dropdown-menu">
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item d-flex">
											<div class="msg-profile"> <img src="<?php echo base_url(); ?>assets/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
											<div class="msg-body">
												<h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item d-flex">
											<div class="msg-profile"> <img src="<?php echo base_url(); ?>assets/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
											<div class="msg-body">
												<h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item d-flex">
											<div class="msg-profile"> <img src="<?php echo base_url(); ?>assets/img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
											<div class="msg-body">
												<h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
											</div>
										</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item all-notifications text-center">
											<strong>Read all messages </strong></a></li>
								</ul>
							</li>
							<!-- Languages dropdown    -->
							<li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="<?php echo base_url(); ?>assets/#"
								 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img
									 src="<?php echo base_url(); ?>assets/img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
								<ul aria-labelledby="languages" class="dropdown-menu">
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item"> <img src="<?php echo base_url(); ?>assets/img/flags/16/DE.png"
											 alt="English" class="mr-2">German</a></li>
									<li><a rel="nofollow" href="<?php echo base_url(); ?>assets/#" class="dropdown-item"> <img src="<?php echo base_url(); ?>assets/img/flags/16/FR.png"
											 alt="English" class="mr-2">French </a></li>
								</ul>
							</li>
							<!-- Logout    -->
							<li class="nav-item"><a href="<?php echo base_url(); ?>assets/login.html" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i
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
					<li><a href="<?php echo base_url(); ?>registrar/class"> <i class="icon-grid"></i>Class Record</a></li>
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" class="collapsed"> <i class="icon-interface-windows"></i>Forms</a>
						<ul id="exampledropdownDropdown" class="list-unstyled collapse" style="">
							<li><a href="<?php echo base_url(); ?>registrar/sf10">SF10-ES Form</a></li>
							<li><a href="<?php echo base_url(); ?>print/section-id/student-id/card'">Progress Report Card</a></li>
							<li><a href="#">Subjects</a></li>
						</ul>
					</li>
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
	<script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
	<!-- Main File-->
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	<script src="<?php echo base_url(); ?>assets/"></script>

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
