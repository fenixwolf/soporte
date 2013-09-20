	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<?php 
			
			$form = array(
				'rol' =>"form" ,
				'class' =>'form-horizontal', 
				);
			$correo = array(
				'name' =>"correo" ,
				"class" => 'form-control'
				);
			$nombres_tecnico = array(
				'name' =>"nombres_tecnico" ,
				"class" => 'form-control'
				);
			$apellidos_tecnico = array(
				'name' =>"apellidos_tecnico" ,
				"class" => 'form-control'
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
			//echo '<pre>',print_r($tecnicos),'</pre>';die;

			/**Función para Dropdown----> Lsitado a partir de consulta query**/
			foreach ($tecnicos as $indice=>$arraytecnico) {
			$listatecnico[$arraytecnico['id']] = $arraytecnico['nombre_rol'];
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};

			/**/

			/**FORMULARIO**/
			echo form_open('tecnicos/registro',$form);

			echo $div_class;
			echo form_label('Correo Elecrónico: ', 'correo');
			echo form_input($correo);
			echo $div_close;

			echo $div_class;
			echo form_label('Nombres: ', 'nombres_tecnico');
			echo form_input($nombres_tecnico);
			echo $div_close;

			echo $div_class;
			echo form_label('Apellidos: ', 'apellidos_tecnico');
			echo form_input($apellidos_tecnico);
			echo $div_close;

			/*echo $div_class;
			echo form_label('Tipo de Rol: ', 'tipo_rol');
			echo form_dropdown('tipo_rol', $listatecnico,"2");
			echo $div_close;*/
			
			echo form_submit($enviar);
			echo form_reset($limpiar);
			
			echo form_close();


			 ?>
		</div>
	</div>