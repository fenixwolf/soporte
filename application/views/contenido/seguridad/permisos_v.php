<h3>Permisos Asignados</h3>
<div class="col-md-10 col-offset-1">

<table class="table table-hover table-bordered">
	<tr>	
	<th>ID</th>
	
	<th>MENU</th>
	<th>CONTROLADOR</th>
	<th>ROL</th>
	<th>FECHA DE CREACIÓN</th>
	<th>ACCIÓN</th>
	</tr>
	<?php 
	foreach ($listar_permisos as $key => $arraypermisos) {
		$id=$arraypermisos['id'];
		$rol=$arraypermisos['rol'];
		$controlador=$arraypermisos['controlador'];
		$fecha_creacion=$arraypermisos['fecha_creacion'];
		$menu=$arraypermisos['menu'];
	?>
	<tr>
		
		<td><?=$id?></td>
		
		<td><?=$menu?></td>
		<td><?=$controlador?></td>
		<td><?=$rol?></td>
		<td><?=$fecha_creacion?></td>
		
		<td><?=anchor('seguridad/borrar_permisos/'.$id, "<i class='icon-remove-circle'></i>" );  ?></td>
	</tr>
	<?php 	
	}

	 ?>
</table>	
</div>
