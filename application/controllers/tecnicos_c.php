<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecnicos_c extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tecnicos_m');
	}
	public function index()
	{
		$data = array(

			'titulo' =>'SGI| Gestión de Técnicos' ,
			'seccion' => 'contenidos/tecnicos_v' ,
			"tecnicos_resultado"=> $this->tecnicos_m->buscartecnico(),
			
			);
		$this->load->view('welcome',$data);		
	}
	public function registro()
	{
		

	}
}

/* End of file tecnicos_c.php */
/* Location: ./application/controllers/tecnicos_c.php */