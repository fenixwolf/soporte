<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php 
			foreach ($lista_tecnicos as $indice=>$arraytecnico) {
			$dropdown_tecnico[$arraytecnico['id']] = $arraytecnico['nombres_tecnico']." ".$arraytecnico['apellidos_tecnico'];
			//echo '<pre>',print_r($dropdown_tecnico),'</pre>';die;
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};
			$div_class='<div class="form-group">';
			$div_close='</div>';		
			echo form_open('estadisticas/por_tecnicos');
			echo form_label('Técnico Asignado: ',"tecnico_asignado");
			echo form_dropdown('tecnico_asignado', $dropdown_tecnico);
			echo form_submit('buscar', 'Buscar');
			echo form_reset("limpiar",'Limpiar');
	
			form_close();	

			 ?>
		</div>
	</div>