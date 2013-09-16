<section>
<div class="row">
	<div class="col-md-8 col-md-offset-1">
		<?php 

		echo form_open('logueo');
		echo form_label('Login', 'login');
		echo form_input('login');
		echo form_label('Contraseña', 'pass');
		echo form_password('pass');
		echo form_submit('entrar', 'Entrar');
		echo form_close();

		 ?>
	</div>


</div>	

</section>