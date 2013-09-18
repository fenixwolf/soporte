	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<?php 
			
			$form = array(
				'rol' =>"form" ,
				'class' =>'form-horizontal', 
				);
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
			echo form_input('correo');
			echo $div_close;

			echo $div_class;
			echo form_label('Nombres: ', 'nombres_tecnico');
			echo form_input('nombres_tecnico');
			echo $div_close;

			echo $div_class;
			echo form_label('Apellidos: ', 'apellidos_tecnico');
			echo form_input('apellidos_tecnico');
			echo $div_close;

			/*echo $div_class;
			echo form_label('Tipo de Rol: ', 'tipo_rol');
			echo form_dropdown('tipo_rol', $listatecnico,"2");
			echo $div_close;*/
			
			echo form_submit('enviar', 'Enviar');
			echo form_reset("limpiar","Limpiar");
			
			echo form_close();


			 ?>
		</div>
	</div>