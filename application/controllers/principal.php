<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' =>'Sistema de Gestión de Incidencias' ,
			'seccion'=>'contenido/inicio_v',
			 );
		$this->load->view('welcome', $data);	 		
	}
	public function denegado()
	{
		$data = array(
			'titulo' =>'Acceso Denegado' ,
			'seccion'=>'contenido/seguridad/denegado_v',
			 );
		$this->load->view('welcome', $data);	 		
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */