<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smart Hospital</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>/asset/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>/asset/plugins/iCheck/square/blue.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="icon" href="<?= base_url() ?>asset/image/download.jpg" type="image/x-icon"/>
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<img src="<?= base_url('asset/image/smart-hospital.jpeg') ?>" alt="" width="40%"><br>
		<a href="<?= base_url() ?>"><b>Smart Hospital </b></a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<?php if ($this->session->flashdata('alert') == 'gagalLogin') { ?>
				<div class="alert alert-danger animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
					Password / Username salah. Periksa kembali
				</div>
			<?php } elseif ($this->session->flashdata('alert') == 'upload_bukti') { ?>
				<div class="alert alert-primary animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
					Terima kasih telah mengupload bukti pelanggaran
				</div>
			<?php } ?>
			<p class="login-box-msg">Silahkan Login</p>

			<?php echo form_open('login', array('id' => 'formValidation')) ?>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Masukkan Username" name="username" autocomplete="off">
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Masukkan Password" name="password" autocomplete="off">
			</div>
			<div class="row">
				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Login</button>
				</div>
				<!-- /.col -->
			</div>
			</form>


			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>/asset/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url() ?>/asset/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			})
		})
	</script>
</body>
</html>


