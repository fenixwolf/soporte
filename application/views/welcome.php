<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title><?=$titulo?></title>

	<!--Carga de Bootstrap, Font Awesome, Estilos CSS y Apis-->
	<link rel="stylesheet" href="<?=base_url()?>dist/css/bootstrap.css" media="screen">	
	<link rel="stylesheet" href="<?=base_url()?>dist/css/styles.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/header.css" media="screen">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/bootstrap-theme.css" type="text/css" media="screen">

	<!--Responsivo!-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!---->
	<link rel="stylesheet" href="<?=base_url()?>dist/font-awesome/css/font-awesome.css">
	<script src="<?=base_url()?>/dist/js/jquery-2.0.3.min.js"></script>
	<script src="<?=base_url()?>/dist/js/bootstrap.js"></script>
	<script src="<?=base_url()?>/dist/js/fechajquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/dist/js/jsapi"></script>
	<link href="<?=base_url()?>/dist/img/favicon.ico" rel="icon" type="image/x-icon" />
	





<?php 
if (@$carga_exitosa=="si") {
	$carga_exito='<div class="alert alert-success" id="alerta" >Datos guardados con <b>Éxito<b></div>';	
}

 ?>


<body>
<div class="row">
	<div class="col-md-12" id="header">
		
		<?php $this->load->view('template/header'); ?>
	</div>
</div>	
<div class="row">

		<div class="col-md-12">
		<?php echo @$carga_exito ?>
		<?php $this->load->view('template/article'); ?>
		</div>


	
</div>

<div class="row">
	<div class="col md-12 hidden-xs">
		<?php $this->load->view('template/footer'); ?>

	</div>
</div>

<script type="text/javascript">


	$(document).ready(function() {
    setTimeout(function() {$("#alerta").fadeOut(500);},1500);
    $("select").addClass('form-control');
    //$("#fecha_disabled").attr("disabled", true);    
    //$(".collapse").collapse();    
    });

    $('a').click(function(){
    	//alert("alerta");
    	$('i.icon-cog').addClass('icon-spin');
    });   	
	jQuery(function($){
   $("#fecha").mask("99-99-9999");
   
   //$('#monto').mask('99999,99');
  	});

</script>
</body>
</html>