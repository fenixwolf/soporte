
<div class="col-md-4 col-md-offset-1">
			<?php 
			/**/
			
			//echo '<pre>',print_r($lista_departamentos, true),'</pre>';die;

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
			$enviar2 = array(
				'name' =>"actualizar" ,
				"value"=>'Actualizar',
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
			echo form_hidden('id',$this->input->post('id'));

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

					
			echo form_submit($enviar);
			echo form_reset($limpiar);
			
			echo form_close();


			 ?>
</div>
		<div class="col-md-6 col-md-offset-1 table-responsive">
			<table class="table table-hover table-bordered" id="tablas_estadisticas">
				<tr>
					<th>DEPARTAMENTO</th>
					<th>DIRECCIÓN</th>
					<th>ACCIÓN</th>
					
				</tr>
				<?php foreach ($lista_departamentos as $key => $array_departamento):?>

					<?php $nombre_departamento= $array_departamento['nombre_departamento'];?>
					<?php $direccion= $array_departamento['direccion_departamento'];?>
					<?php
					
					echo form_open('departamentos/editar', 'editar_departamentos');
					echo form_hidden($array_departamento);
					

					 ?>
					<tr>
						<td><?=$nombre_departamento?></td>
						<td><?=$direccion?></td>
						<td>
							<?php
							echo form_submit($enviar2); 
							echo form_close();
							 ?>
						</td>	
					</tr>	
				
				<?php endforeach; ?>	

			</table>
		</div>
