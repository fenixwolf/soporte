<div class="col-md-5 col-md-offset-1">
<?php 
	echo form_open();
	echo form_input('id_reportado', $id_reportado);
	echo form_input('fecha_reporte', unix_to_human(time(),TRUE,'eu'));
	echo form_close();

 ?>

		
</div>