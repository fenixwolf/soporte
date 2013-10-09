<h3>Permisos en Menú</h3>
<div class="col-md-10 col-offset-1">

<table class="table table-hover table-bordered">
	<tr>	
	<th>ID</th>	
	<th>MENU</th>
	<th>CONTROLADOR</th>
	<th>FECHA DE CREACIÓN</th>
	<th>ACCIÓN</th>
	</tr>
	<?php 
	foreach ($listar_menu as $key => $arraymenu) {
		$id=$arraymenu['id_menu'];
		
		$controlador=$arraymenu['controlador'];
		$fecha_creacion=$arraymenu['fecha_creacion'];
		$menu=$arraymenu['menu'];
	?>
	<tr>
		
		<td><?=$id?></td>
		
		<td><?=$menu?></td>
		<td><?=$controlador?></td>
		
		<td><?=$fecha_creacion?></td>
		
		<td><?=anchor('seguridad/asignar_permisos_menu/'.$id, "<i class='icon-wrench'></i>" );  ?></td>
	</tr>
	<?php 	
	}

	 ?>
</table>	
</div>