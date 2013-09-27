<div class="col-md-3 col-md-offset-2">
		<?php 
		$label_abre='<div class="form-group">';
		$label_cierra='</div>';
		$form = array(
			'class' =>'form-horizontal'
			, );
		$usuario = array(
			'name' =>'usuario' ,
			'class' => 'form-control'

			);
		$pass = array(
			'name' =>'pass' , 
			'class' => 'form-control'

			);
		$entrar = array(
			'name' =>'entrar' ,
			'value'=> 'Entrar al Sistema',
			'class' => 'btn btn-default' 
			);

			echo form_open('logueo_c',$form);
			echo $label_abre;
			echo form_label('Usuario: ');
			echo form_input($usuario);
			echo $label_cierra;
			echo $label_abre;
			echo form_label('Contraseña: ');			
			echo form_password($pass);
			echo $label_cierra;
			echo $label_abre;
			echo form_submit($entrar);			
			echo $label_cierra;
			echo form_close();

		 ?>
	</div>
