
<h2>Asignación de permisos</h2>
<div class="col-md-6">
	<h3>Sin Acceso</h3>
<table class="table table-striped">
	<tr>
	
	<th>ID</th>
	<th>ROL</th>
	<th></th>
	</tr>
	
	<?php foreach ($sin_permiso as $key => $array_permiso):?>
	<?php 
		$id =$array_permiso[0];		
		$rol =$array_permiso[1];
		$id_menu=$array_permiso[2];
 	?>
	<tr>
		<td> <?=$id?> </td>
		<td> <?=$rol?> </td>
		<td> <?=anchor('seguridad/noasignado_asignado/'.$id.'/'.$id_menu , '<i class="icon-arrow-right"><i>')?></td>
	</tr>	
	<?php endforeach; ?>
	
	
</table>

</div>

<div class="col-md-6">
	<h3>Con Acceso</h3>
	<table class="table table-striped">
	<tr>
	<th></th>
	<th>ID</th>
	<th>ROL</th>
	</tr>
	
	<?php foreach ($con_permiso as $key => $array_permiso):?>
	<?php 
		$id =$array_permiso[0];		
		$rol =$array_permiso[1];
		$id_menu=$array_permiso[2];
 	?>
	<tr>
		<td> <?=anchor('seguridad/asignado_noasignado/'.$id.'/'.$id_menu , '<i class="icon-arrow-left"><i>')?></td>
		<td> <?=$id?> </td>
		<td> <?=$rol?> </td>
		
	</tr>	
	<?php endforeach; ?>
	
	
</table>
</div>