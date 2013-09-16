<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logueo_c extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' =>'SGI | Sistema de Logueo' ,
			'seccion'=>'contenido/login_v',
			 );
		$this->load->view('welcome', $data);	 		
	}

}

/* End of file logueo_c.php */
/* Location: ./application/controllers/logueo_c.php */