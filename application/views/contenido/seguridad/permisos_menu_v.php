<h2>Asignación de permisos</h2>
<div class="col-md-6">
	<h3>Sin Acceso</h3>
<table class="table table-striped">
	<tr>
	
	<th>ID</th>
	<th>ROL</th>
	<th></th>
	</tr>
	
	<?php 
	//echo '<pre>',print_r($sin_permiso, true),'</pre>';die;
	foreach ($sin_permiso as $key => $array_permiso) {
		//echo '<pre>',print_r($array_permiso, true),'</pre>';die;
		$id =$array_permiso[0];
		
		$rol =$array_permiso[1];
		
		echo "<tr><td> $id </td><td> $rol </td><td> <i class='icon-arrow-right'><i> </td></tr>";
		
			
	}
	 ?>
	
	
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
	
	<?php 
	foreach ($con_permiso as $key => $array_permiso) {
		$id =$array_permiso[0];
		
		$rol =$array_permiso[1];
		
		echo "<tr><td> <i class='icon-arrow-left'><i> </td><td></td><td> $id </td><td> $rol </td></tr>";
		
		
			
	}
	 ?>
	
	
</table>
</div>