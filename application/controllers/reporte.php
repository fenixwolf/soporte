<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('reporte_m');
		

	}

	public function index()
	{
		$data = array(
			'titulo' =>'Reporte de Estatus',
			'seccion' =>'contenido/reporte_v',
			'lista_incidencias'=>$this->reporte_m->listar_no_atendidos(),
			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
			//echo '<pre>',print_r($data["lista_incidencias"]),'</pre>';die;
		$this->load->view('welcome', $data);
	}

}

/* End of file reporte.php */
/* Location: ./application/controllers/reporte.php */