<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('Autenticar'))
{
	function Autenticar()
	{
		$CI =& get_instance();
		$controlador = $CI->uri->segment(1);
		$accion= $CI->uri->segment(2);
		$url = $controlador.'/'.$accion;


		$libres = array(
			'/',
			'principal/index',
			'principal/denegado',
			'login/index',
			'login'
			);

		if(in_array($url, $libres)){
			echo $CI->output->get_output();
		}
		else{
			redirect('principal/denegado');
		}
	}
}
