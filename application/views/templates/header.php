<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smart Hospital</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables/dataTables.bootstrap4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/iCheck/flat/blue.css'">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="<?= base_url() ?>asset/dist/css/css.css" rel="stylesheet">
	<link href="<?= base_url() ?>asset/dist/css/select2.min.css" rel="stylesheet">
	<link rel="icon" href="<?= base_url() ?>asset/image/download.jpg" type="image/x-icon"/>
</head>
<body class="hold-transition sidebar-mini" style="margin: 0;">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>

		</ul>

		<!-- SEARCH FORM -->

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">

			<!-- Notifications Dropdown Menu -->

		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?= base_url() ?>" class="brand-link">
			<!--      <img src="-->
			<? //= base_url() ?><!--asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"-->
			<!--           style="opacity: .8">-->
			<span class="brand-text font-weight-light ml-4"><i class="fa fa-hospital-o"></i> &nbsp;Smart Hospital</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= base_url() ?>asset/image/profil-circle-512.png" class="img-circle elevation-2"
						 alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">
						<span><?= $this->session->userdata('session_name'); ?></span><br>
						<span style="font-size: 9px"><?= $this->session->userdata('session_level'); ?></span>
					</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?= base_url('') ?>" class="nav-link <?php if($this->uri->segment(1) == '') echo 'active'?>">
							<i class="nav-icon fa fa-home"></i>
							<p>
								Beranda
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<?php
					if($this->session->userdata('session_level') == 'Kepala Instalasi RM'):
					?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-database"></i>
							<p>
								Data Master
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('staff') ?>" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Staff</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('poli') ?>" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Poli</p>
								</a>
							</li>
						</ul>
					</li>
					<?php
					endif
					?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-address-book"></i>
							<p>
								Kunjungan
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('data-kunjungan') ?>" class="nav-link <?php if($this->uri->segment(1) == 'data-kunjungan') echo 'active'?>">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Kunjungan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('kunjungan') ?>" class="nav-link <?php if($this->uri->segment(2) == 'laporan') echo 'active'?>">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Laporan</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('prediksi') ?>" class="nav-link">
							<i class="nav-icon fa fa-line-chart"></i>
							<p>
								Prediksi
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('laporan') ?>" class="nav-link">
							<i class="nav-icon fa fa-files-o"></i>
							<p>
								Laporan
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('ganti-password') ?>" class="nav-link <?php if($this->uri->segment(1) == 'ganti-password') echo 'active'?>">
							<i class="nav-icon fa fa-lock"></i>
							<p>
								Ganti Password
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('logout') ?>" class="nav-link" onclick=" return confirm ('Apakah anda ingin keluar')">
							<i class="nav-icon fa fa-sign-out"></i>
							<p>
								Keluar
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
