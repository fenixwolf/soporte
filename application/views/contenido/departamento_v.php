
		<?php  //echo '<pre>',print_r($lista_departamentos),'</pre>';die;?>
		<div class="col-md-4 col-md-offset-1">
			<?php 
			/**/
			
			
			//*FIN DE LA ALERTA/

			$form = array(
				'rol' =>"form" ,
				'class' =>'form-horizontal', 
				);

			$nombre_departamento = array(
				'name' =>'nombre_departamento' ,
				'class'=>'form-control' );

			$detalles = array(
				'name' =>'detalles' ,
				'class'=>'form-control' );
			$direccion_departamento = array(
				'name' =>'direccion_departamento' ,
				'class'=>'form-control' );

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

			

			/**/

			/**FORMULARIO**/
			echo form_open('departamentos/registro',$form);

			echo $div_class;
			echo form_label('Nombre del Departamento u Oficina: ', 'nombre_departamento');
			echo form_input($nombre_departamento);
			echo $div_close;

			echo $div_class;
			echo form_label('Detallles: ', 'detalles');
			echo form_input($detalles);
			echo $div_close;

			echo $div_class;
			echo form_label('Dirección del Departamento u Oficina: ', 'direccion_departamento');
			echo form_textarea($direccion_departamento);
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
		<div class="col-md-5 col-md-offset-1 table-responsive">
			<table class="table table-hover table-bordered" id="tablas_estadisticas">
				<tr>
					<th>DEPARTAMENTO</th>
					<th>DIRECCIÓN</th>
					<th>ACCIÓN</th>
					
				</tr>
				<?php 
				foreach ($lista_departamentos as $key => $arrya_departamento) {
					$nombre_departamento=$arrya_departamento['nombre_departamento'];
					$direccion=$arrya_departamento['direccion_departamento'];
					echo "<tr><td>$nombre_departamento</td><td>$direccion</td><td>Accion</td>
					</tr>";
				}
				 ?>
				
			</table>
		</div>
