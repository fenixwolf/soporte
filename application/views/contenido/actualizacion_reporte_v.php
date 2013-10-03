<div class="col-md-5 col-md-offset-1">
	<h3>Resolución de Incidencias</h3>
<?php 
//echo '<pre>',print_r($_POST),'</pre>';die;
	$id_reportado = array(
		'value' =>$this->input->post('id_seleccionado') ,
		'id'=>'id_reportado',
		'class'=>'form-control',
		'readonly'=>'readonly'		
		);
	$fecha_reporte = array(
		'value' =>unix_to_human(time(),TRUE,'eu') ,
		'id'=>'fecha_reporte',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);
	$correo_solicitante = array(
		'value' =>$this->input->post('correo_solicitante') ,
		'id'=>'correo_solicitante',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);
	$tipo_incidencia = array(
		'value' =>$this->input->post('tipo_incidencia') ,
		'id'=>'tipo_incidencia',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);
	$tecnico_asignado = array(
		'value' =>$this->input->post('tecnico_asignado') ,
		'id'=>'tecnico_asignado',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);




	echo form_open();
	echo form_hidden($id_reportado);
	echo form_hidden($fecha_reporte);
	echo form_input($correo_solicitante);
	echo form_input($tipo_incidencia);
	echo form_input($tecnico_asignado);	
	echo form_close();

 ?>

		
</div>