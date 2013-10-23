<div class="col-md-6 col-md-offset-1">
	<?php
	//echo '<pre>',print_r($_POST, true),'</pre>';die;
	$form = array(
		'role' =>'form' ,
		'class'=>'form-horizontal' 
		);
	$nombre_departamento = array(
		'value' =>$this->input->post('nombre_departamento') ,
		'name'=>'nombre_departamento',
		'class'=>'form-control' 
		);
	$detalles = array(
		'value' =>$this->input->post('detalles') ,
		'name'=>'detalles',
		'class'=>'form-control' 
	);
	$direccion_departamento = array(
		'value' =>$this->input->post('direccion_departamento') ,
		'name'=>'direccion_departamento',
		'class'=>'form-control' 
	);
	$enviar = array(
				'name' =>"enviar" ,
				"value"=>'Enviar',
				'class'=>"btn btn-default" );

	$limpiar = array(
				'name' =>"limpiar" ,
				"value"=>'Limpiar',
				'class'=>"btn btn-default" );

	$div_class='<div class="form-group">';
	$div_close='</div>';	

	//echo '<pre>',print_r($_POST, true),'</pre>';die;
	echo form_open('departamentos/finalizar_actualizacion');
	echo form_hidden('id',$this->input->post('id'));
	echo $div_class;
	echo form_label('Nombre del Departamento u oficina', 'nombre_departamento');
	echo form_input($nombre_departamento);
	echo $div_close;

	echo $div_class;
	echo form_label('Detalles', 'detalles');
	echo form_input($detalles);
	echo $div_close;

	echo $div_class;
	echo form_label('Ubicación Física', 'direccion_departamento');
	echo form_textarea($direccion_departamento);
	echo $div_close;

	echo $div_class;
	echo form_submit($enviar);
	echo form_reset($limpiar);
	echo $div_close;

	echo form_close();


	 ?>
</div>