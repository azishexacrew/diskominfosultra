<?php defined('BASEPATH') or exit('<h2>Access Denied</h2>Directory access is forbidden.'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Access Denied</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/core-admin/core-component/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/core-admin/core-component/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/core-admin/core-component/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/core-admin/core-dist/css/AdminLTE.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet">
	<style type="text/css">
		.fontQuicksand {
			font-family: 'Quicksand', sans-serif;
		}

		.fontPoppins {
			font-family: 'Poppins', sans-serif;
		}
	</style>
</head>

<body class="hold-transition login-page fontPoppins">
	<div class="error-page">

		<h2 class="headline text-red"><i class="fa fa-warning text-red"></i></h2>
		<div class="error-content" style="padding-top:30px">
			<h3>Access Denied</h3>
			<p>Request Not allowed</p>
		</div>
	</div>

	<script src="<?php echo base_url() ?>assets/core-admin/core-component/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>