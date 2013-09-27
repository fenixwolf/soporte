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
			"estadistica_hoy"=>$this->estadisticas_m->estadistica_hoy(),


			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
		$this->load->view('welcome', $data);	
	}


	public function globales()
	{

		$data = array(
		'tecnico_asignado' =>$this->input->post("tecnico_asignado"),
		);
	
	$busqueda_servicios_tecnico= $this->estadisticas_m->buscar_estadisticas($data); 
	
	if ($busqueda_servicios_tecnico<1) {
		echo "Se falló al buscar en la base de datos";
	} else {
	
		//$this->_grafico($busqueda_servicios_tecnico);
		$this->_grafico_tecnico($busqueda_servicios_tecnico);
	};	

	}

	public function por_tecnico()
	{

		$data = array(
		'tecnico_asignado' =>$this->input->post("tecnico_asignado"),
		);
	
	$busqueda_servicios_tecnico= $this->estadisticas_m->estadisticas_por_tecnico($data); 
	
	if ($busqueda_servicios_tecnico<1) {
		echo "Se falló al buscar en la base de datos";
	} else {
	
		//$this->_grafico($busqueda_servicios_tecnico);
		$this->_grafico_tecnico($busqueda_mes);
	};
	}


	public function _grafico_tecnico($busqueda_servicios_tecnico)
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




	public function por_mes()
	{
	
		$data = array(
		'filtro_mes' =>$this->input->post("filtro_mes"),
		);

	//echo '<pre>',print_r($data),'</pre>';die();
	$busqueda_mes= $this->estadisticas_m->estadistica_por_mes($data); 
	//echo '<pre>',print_r($busqueda_mes),'</pre>';die;

	if ($busqueda_mes<1) {
		echo "Se falló al buscar en la base de datos";
	} else {
	
		//$this->_grafico($busqueda_servicios_tecnico);
		$this->_grafico_tecnico_mes($busqueda_mes);
	};	
	
	}
	public function _grafico_tecnico_mes($busqueda_mes)
	{
		//echo '<pre>',print_r($busqueda_mes),'</pre>';die;
		

		$data = array(
			'titulo' =>'Gráficas Estadísticas| Mes-Técnico',
			'seccion' =>'contenido/grafica_tecnico_mes',
			'carga_exitosa' => '',
			'mes'=>$busqueda_mes,
			 );
		//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->view('welcome', $data);
	}
	


}

/* End of file estadisticas.php */
/* Location: ./application/controllers/estadisticas.php */