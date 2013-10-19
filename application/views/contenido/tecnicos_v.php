	<?php //echo '<pre>',print_r($lista_tecnicos),'</pre>';die; ?>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<?php 
			
			$form = array(
				'rol' =>"form" ,
				'class' =>'form-horizontal', 
				);
			$correo = array(
				'name' =>"correo" ,
				"class" => 'form-control',
				'type'=>'email'
				);
			$pass = array(
				'name' =>"pass" ,
				"class" => 'form-control',

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
			$listatecnico[$arraytecnico['id_rol']] = $arraytecnico['rol'];
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};

			/**/
?>
<h3>Registro de nuevos usuarios/técnicos</h3>
<?php 			
			/**FORMULARIO**/
			echo form_open('seguridad/registro',$form);
			echo $div_class;
			echo form_label('Nombres: ', 'nombres_tecnico');
			echo form_input($nombres_tecnico);
			echo $div_close;

			echo $div_class;
			echo form_label('Apellidos: ', 'apellidos_tecnico');
			echo form_input($apellidos_tecnico);
			echo $div_close;

			echo $div_class;
			echo form_label('Correo Elecrónico: ', 'correo');
			echo form_input($correo);
			echo $div_close;

			echo $div_class;
			echo form_label('Contraseña: ', 'pass');
			echo form_password($pass);
			echo $div_close;

			echo $div_class;
			echo form_label('Tipo de Rol: ', 'tipo_rol');
			echo form_dropdown('tipo_rol', $listatecnico);
			echo $div_close;
			
			echo form_submit($enviar);
			echo form_reset($limpiar);
			
			echo form_close();


			 ?>
		</div>
		<div class="col-md-5 col-md-offset-1 table-responsive">
			<h3>Listado de usuarios/tecnicos registrados</h3>
			<table class="table table-hover table-bordered" id="tablas_estadisticas">
				<tr>
					<th>Nombres y Apellidos</th>
					<th>Correo Electrónico</th>
					<th>Rol</th>
					<th>Acción</th>
				</tr>
				<?php 
				foreach ($lista_tecnicos as $key => $array_datos_tecnico):?>
				<?php 
				$nombretecnico=$array_datos_tecnico['nombres_tecnico']." ".$array_datos_tecnico['apellidos_tecnico'];
				$correo=$array_datos_tecnico['correo_tecnico'];
				$rol=$array_datos_tecnico['rol']; 
				?>
					
				<tr>
					<td><?=$nombretecnico?></td>
					<td><?=$correo?></td>
					<td><?=$rol?></td>
					<td>Borrar</td>
				</tr>
				
				<?php endforeach;?>
				
			</table>
		</div>
	</div>