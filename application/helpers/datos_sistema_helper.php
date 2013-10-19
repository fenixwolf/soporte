<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Datos generales del sistema

if ( ! function_exists('datos_sistema'))
{
	function datos_sistema()
	{
		$datos_sistema = array(
			'nombre' =>"Sistema de Gestión de incidencias" ,
			'version'=>'1.05',
			'autor'=>'Julio Yacot',
			'empresa'=>'INN' 
			);
			
		return datos_sistema();
	}
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */