<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" href="<?=base_url()?>dist/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/js/bootstrap.js" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/styles.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/header.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/font-awesome.min.css">
	<script src="<?=base_url()?>dist/js/jquery-2.0.3.min.js"></script>
</head>

<body>
<div class="row">
	<div class="col-md-12" id='header'>
		<?php $this->load->view('template/header'); ?>
	</div>
</div>	
<div class="row">
	<div class="col-md-12">
		<?php $this->load->view('template/article'); ?>
	</div>
</div>
<div class="row">
	<div class="col md-12">
		<?php $this->load->view('template/footer'); ?>
	</div>
</div>

</body>
</html>