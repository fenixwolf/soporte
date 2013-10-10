<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' =>'Sistema de Gestión de Incidencias' ,
			'seccion'=>'contenido/seguridad/login_v',
			 );
		$this->load->view('welcome', $data);	 		
	}

}

/* End of file logueo_c.php */
/* Location: ./application/controllers/logueo_c.php */