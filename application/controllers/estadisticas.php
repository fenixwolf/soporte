<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('estadisticas_m');
		$this->load->model('tecnicos_m');
		$this->load->model('incidencias_m');
	}


	public function index()
	{
			$data = array(
			'titulo' =>'Estadísticas',
			'seccion' =>'contenido/estadisticas_v',
			'carga_exitosa' => '',
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
		$this->load->view('welcome', $data);	
	}


	public function por_tecnicos()
	{
		$data = array(
		'tecnico_asignado' =>$this->input->post("tecnico_asignado"),
		);
	
	$busqueda_servicios_tecnico= $this->estadisticas_m->buscar_estadisticas($data); 
	
	if ($busqueda_servicios_tecnico<1) {
		echo "Se falló al buscar en la base de datos";
	} else {
	
		//$this->_grafico($busqueda_servicios_tecnico);
		$this->_grafico($busqueda_servicios_tecnico);
	};	
	}


	public function _grafico($busqueda_servicios_tecnico)
	{
		//echo '<pre>',print_r($busqueda_servicios_tecnico),'</pre>';die;
		

		$data = array(
			'titulo' =>'Gráficas Estadísticas',
			'seccion' =>'contenido/graficas_estadisticas_v',
			'carga_exitosa' => '',
			'mes'=>$busqueda_servicios_tecnico,
			 );
		//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->view('welcome', $data);
	}


}

/* End of file estadisticas.php */
/* Location: ./application/controllers/estadisticas.php */