<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {


	public function index()
	{

		$this->load->model('tecnicos_m');
		$tecnicos_resultado=$this->tecnicos_m->buscartecnico();
		//echo '<pre>',print_r($tecnicos_resultado),'</pre>';die;
		$data = array(
			'titulo' =>'SGI' ,
			'seccion' => 'contenidos/login' ,
			"tecnicos_resultado"=> $this->tecnicos_m->buscartecnico(),
			);
		$this->load->view('welcome',$data);
	}
	public function _ingreso(){
		echo "perfecto";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */