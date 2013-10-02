<table class="table table-hover table-bordered" id="tablas_estadisticas">
				<tr>
					<th>CORREO SOLICITANTE</th>
					<th>DEPARTAMENTO U OFICINA</th>
					<th>TIPO DE INCIDENCIA</th>					
					<th>TECNICO ASIGNADO</th>
					<th>TIEMPO TRANSCURRIDO</th>
					<th>ACCIÓN</th>
					
				</tr>
				<?php 

				foreach ($lista_incidencias as $key => $array_lista_incidencias) {
					//print_r($array_lista_incidencias);
			$id=$array_lista_incidencias['id'];
			$departamento=$array_lista_incidencias['nombre_departamento'];
			$correo_solicitante=$array_lista_incidencias['correo_solicitante'];
			$tipo_incidencia=$array_lista_incidencias['tipo_incidencia'];
				$fecha_solicitud=human_to_unix($array_lista_incidencias['fecha_solicitud']);
				$ahora=now();
			$tiempo_transcurrido=timespan($fecha_solicitud,$ahora);
			$tecnico_asignado=$array_lista_incidencias['nombres_tecnico']." ".$array_lista_incidencias['apellidos_tecnico'] ;
			$form = array('id' =>'form_'.$id ,);
			$hidden = array('id_seleccionado' =>$id, );
					echo "<tr>
					<td>$correo_solicitante</td>
					<td>$departamento</td>
					<td>$tipo_incidencia</td>
					<td>$tecnico_asignado</td>
					<td>$tiempo_transcurrido</td>
					<td>";			
					echo form_open('reporte/actualizar_reporte',$form);
					echo form_hidden($hidden);
					?>
					<a href='javascript:enviar_reporte_id(<?=$id?>)' class="btn btn-small btn-primary">
						<i class='icon-expand'></i> <b>Reportar</b>
					</a>
						
					<?php
					echo form_close();
					//echo $id;
					echo "
					</td>

					</tr>";
				};
				 ?>
<script type="text/javascript">
function enviar_reporte_id(id){

	$('#form_'+id).submit();
}		
	
</script>				
</table>