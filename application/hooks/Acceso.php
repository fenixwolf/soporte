<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('Autenticar'))
{
	function Autenticar()
	{
		$ci =& get_instance();
		$ci->load->library('LibreriaSeguridad');
		$controlador = $ci->uri->segment(1);
		$accion= $ci->uri->segment(2);
		$url = $controlador.'/'.$accion;
		//echo '<pre>',print_r($controlador, true),'<pre>';die;


		$libres = array(
			'/',
			'principal/denegado',
			'principal/index',
			'seguridad',
			'seguridad/login',
			'seguridad/fin_sesion',
			'seguridad/login_consulta'
			);

		if(in_array($url, $libres)){
			echo $ci->output->get_output();
		}
		else{
			if ($ci->session->userdata['correo']) {
				if (autorizar()) {
					echo $ci->output->get_output();
				} else {
					redirect('principal/denegado');
				}
				
			}
			else{
			redirect('principal/denegado');	
			} 
		}
	}

}

function autorizar(){
	$ci =& get_instance();

	//Rol del usuario
	$rol= $ci->session->userdata('rol_id');	
	//Controlador
	$controlador = $ci->uri->segment(1);
	$menu_id = $ci->libreriaseguridad->buscar_lista_menu($controlador)->id_menu;
	//echo '<pre>',print_r($rol, true),'<pre>';die;

	if (!$menu_id) {
		return FALSE;
	}

	//Recuperando la combinación de Menu - Rol
	$acceso = $ci->libreriaseguridad->buscar_menu_perfil($menu_id, $rol);
	if (!$acceso) {
		return FALSE;
	}
	return TRUE;
//EUREKA!!	
} 
