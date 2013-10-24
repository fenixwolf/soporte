<div class="col-md-5 col-md-offset-1">
	<h3>Resolución de Incidencias</h3>

<?php
//echo '<pre>',print_r($_POST, true),'</pre>';die;
	$form = array(		
		"class"=>"form-horizontal",
		"role"=>"form",
		);

	$hidden = array(
		'id_seleccionado' =>$this->input->post('id_seleccionado') ,	
		'fecha_reporte'=>unix_to_human(time(),TRUE,'eu') ,			
		);
	

	$correo_solicitante = array(
		'value' =>$this->input->post('correo_solicitante') ,
		'id'=>'correo_solicitante',
		'class'=>'form-control',
		'name'=>'correo_solicitante',
		'readonly'=>'readonly'
		);

	$tipo_incidencia = array(
		'value' =>$this->input->post('tipo_incidencia') ,
		'id'=>'tipo_incidencia',
		'name'=>'tipo_incidencia',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);

	$tecnico_asignado = array(
		'value' =>$this->input->post('tecnico_asignado') ,
		'id'=>'tecnico_asignado',
		'name'=>'tecnico_asignado',
		'class'=>'form-control',
		'readonly'=>'readonly'
		);

	$submit = array(
		'class' =>'btn btn-primary' ,
		'value'=>'Reporte',				
		'name'=>"reporte",								
		);

	$form_group='<div class="form-group">';
	$form_group_close='</div>';

	/**Función para Dropdown----> Lsitado a partir de consulta query**/
	foreach ($lista_status as $indice=>$arraystatus) {
	$listastatus[$arraystatus['id']] = $arraystatus['nombre_tipo_incidencia'];
	// Creación de una arreglo a partir de los datos traído para el dropdown!!
	};

	/**/


	//echo '<pre>',print_r($id_reportado, true),'</pre>';die;


	echo form_open('reportar/registrar_reporte',$form);

	
	echo form_hidden($hidden);

	echo $form_group;
	echo form_label('Correo del Solicitante: ', 'correo_solicitante');
	echo form_input($correo_solicitante);
	echo $form_group_close;

	echo $form_group;
	echo form_label('Incidencia de tipo: ', 'tipo_incidencia');
	echo form_input($tipo_incidencia);
	echo $form_group_close;

	echo $form_group;	
	echo form_label('Técnico Asignado', 'tecnico_asignado');
	echo form_input($tecnico_asignado);	
	echo $form_group_close;

	echo $form_group;	
	echo form_label('Estatus Incidencia', 'status_incidencia');
	echo form_dropdown('status_incidencia', $listastatus, '1');
	echo $form_group_close;

	echo form_submit($submit);
	echo form_close();

 ?>

		
</div>