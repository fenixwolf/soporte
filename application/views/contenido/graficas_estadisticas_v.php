<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php 
			//echo '<pre>',print_r($mes),'</pre>';die;
			foreach ($mes as $indice=>$arraytecnico) {
			$dropdown_tecnico= $arraytecnico['fecha_solicitud'];
			echo strto(mdate($dropdown_tecnico));}
			die;
			 ?>
		</div>
</div>