	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<?php 
			/**/
			
			
			//*FIN DE LA ALERTA/

			$form = array(
				'rol' =>"form" ,
				'class' =>'form-horizontal', 
				);
			$div_class='<div class="form-group">';
			$div_close='</div>';
			//echo '<pre>',print_r($tecnicos),'</pre>';die;

			

			/**/

			/**FORMULARIO**/
			echo form_open('roles/registro',$form);

			echo $div_class;
			echo form_label('Nombre del Rol: ', 'nombre_rol');
			echo form_input('nombre_rol');
			echo $div_close;

			echo $div_class;
			echo form_label('Simplificado: ', 'rol_simple');
			echo form_input('rol_simple');
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