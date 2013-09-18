<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php 
			/**/
			
			
			//*FIN DE LA ALERTA/

			$form = array(
				'role' =>"form" ,
				//'class' =>'form-horizontal', 
				);
			$hora_exacta=time();

			$div_class='<div class="form-group">';
			$div_close='</div>';

			$hora_exacta= unix_to_human($hora_exacta,TRUE,'eu');
			$fecha = array(
				"name"=>"fecha_solicitud",
				//'id' =>"fecha" ,
				"value"=>$hora_exacta, 

				);
		
			/**Función para Dropdown----> Lsitado a partir de consulta query**/
			foreach ($lista_tecnicos as $indice=>$arraytecnico) {
			$dropdown_tecnico[$arraytecnico['id']] = $arraytecnico['nombres_tecnico']." ".$arraytecnico['apellidos_tecnico'];
			//echo '<pre>',print_r($dropdown_tecnico),'</pre>';die;
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};

			foreach ($lista_incidencias as $indice=>$arrayincidencias) {
			$dropdown_incidencias[$arrayincidencias['id']] = $arrayincidencias['tipo_incidencia'];
			};

			foreach ($lista_departamentos as $indice=>$arraydepartamento) {
			$dropdown_departamento[$arraydepartamento['id']] = $arraydepartamento['nombre_departamento'];
			};
		

			

			/**/

			/**FORMULARIO**/
			echo form_open('incidencias/registro',$form);
			echo $div_class;
			echo form_label('Fecha de la Solicitud: ', 'fecha_');
			echo form_input($fecha);
			echo $div_close;
			echo $div_class;
			echo form_label('Correo Electrónico del Solicitante: ', "correo_solicitante");
			echo form_input("correo_solicitante");
			echo $div_close;
			echo $div_class;
			echo form_label('Departamento: ',"departamento");
			echo form_dropdown('departamento', $dropdown_departamento);
			echo $div_close;
			echo $div_class;
			echo form_label('Detalles de la Incidencia: ',"detalles");
			echo form_textarea('detalles');
			echo $div_close;
			echo $div_class;
			echo form_label('Incidencia de Tipo: ',"tipo_incidencia");
			echo form_dropdown('tipo_incidencia', $dropdown_incidencias);
			echo $div_close;
			echo $div_class;
			echo form_label('Técnico Asignado: ',"tecnico_asignado");
			echo form_dropdown('tecnico_asignado', $dropdown_tecnico);
			echo $div_close;
			echo form_submit('enviar', 'Reportar');
			echo form_reset("limpiar",'Limpiar');
			echo form_close();


			 ?>
		</div>
	</div>