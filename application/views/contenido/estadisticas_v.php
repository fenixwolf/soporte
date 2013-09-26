<?php 
			//echo '<pre>',print_r($lista_tecnicos),'</pre>';die;
			foreach ($lista_tecnicos as $indice=>$arraytecnico) {
			$dropdown_tecnico[$arraytecnico['id']] = $arraytecnico['nombres_tecnico']." ".$arraytecnico['apellidos_tecnico'];
			//echo '<pre>',print_r($dropdown_tecnico),'</pre>';die;
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};
			$meses = array(
				'1' =>'Enero' ,
				'2' =>'Febrero' ,
				'3' =>'Marzo' ,
				'4' =>'Abril' ,
				'5' =>'Mayo' ,
				'6' =>'Junio' ,
				'7' =>'Julio' ,
				'8' =>'Agosto' ,
				'9' =>'Septiembre' ,
				'10' =>'Octubre' ,
				'11' =>'Noviembre' ,
				'12' =>'Diciembre' ,


				);
			$form = array(
				'class' =>'form-inline' ,
				'role' =>'form' , 
				);

			$div_class='<div class="form-group">';
			$div_close='</div>';
		?>
		<!Formulario de estadísticas generales!>
		<div class="row">
			<div class="col-md-3">
				<?php
			echo form_open('estadisticas/globales',$form);
			echo form_label('Estadisticas Globales: ',"estadisticas_globales");
			echo form_submit('buscar', 'Buscar');
			echo form_close();
		?>
		</div>	

		<!Formulario de estadísticas por_mes!>
		
			<div class="col-md-3">
				<?php
			echo form_open('estadisticas/por_mes',$form);
			echo form_label('Busqueda por mes: ',"filtro_mes");
			echo form_dropdown('filtro_mes', $meses);
			echo form_submit('buscar', 'Buscar');
			echo form_close();
		?>
		</div>	
	
		<!Formulario de estadísticas por técnico!>	
			<div class="col-md-3">
				<?php
				
			echo form_open('estadisticas/por_tecnicos',$form);
			echo form_label('Técnico Asignado: ',"tecnico_asignado");
			echo form_dropdown('tecnico_asignado', $dropdown_tecnico);
			echo form_submit('buscar', 'Buscar');
			echo form_reset("limpiar",'Limpiar');
	
			form_close();	?>
		
			</div>
			<div class="col-md-5"></div>
		</div>

		

			 
		</div>
</div>
