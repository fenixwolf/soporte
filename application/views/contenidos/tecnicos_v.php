<article>
	<?php 
	echo form_open('tecnicos_c/registro', 'registro');
	echo form_label('Correo Electrónico', 'correo');
	echo form_input('correo');
	echo form_label('Nombres del Técnico', 'nombres');
	echo form_input('nombres');
	echo form_label('Apellidos del Técnico', 'apellidos');
	echo form_input('apellidos');
	echo form_label('¿Es administrador?', 'administracion');
	echo form_checkbox("administracion", "administracion", "t");
	echo form_reset("limpiar","Limpiar");
	echo form_submit('enviar', 'Registrar');
	echo form_close();
	 ?>
</article>