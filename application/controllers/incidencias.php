<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidencias extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('incidencias_m');
		$this->load->model('tecnicos_m');
	}
	
	public function index(){
		//$lista_tecnicos=$this->tecnicos_m->listar_tecnicos();


			$data = array(
			'titulo' =>'SGI | Registro de Incidencias',
			'seccion' =>'contenido/incidencias_v',
			'carga_exitosa' => '',
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			 );
		//echo '<pre>',print_r($data),'</pre>';die;	
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);				
	}

	public function registro()
	{
	//echo '<pre>',print_r($_POST),'</pre>';die;
	$data = array(
		'fecha_solicitud' =>$this->input->post("fecha_solicitud"),
		'correo_solicitante' =>$this->input->post("correo_solicitante"),
		'detalles' =>$this->input->post("detalles"),
		'tecnico_asignado' =>$this->input->post("tecnico_asignado"),
		'tipo_incidencia' =>$this->input->post("tipo_incidencia"),


		);

	$registro_incidencia= $this->incidencias_m->registrar_incidencia($data);

	if ($registro_incidencia < 1) {
		echo "Error al registrar en Base de datos";
	} else {
		
		$this->_guardado();
		
	};
	

	}

	public function _guardado()
	{
		$exito="si";
		$data = array(
			'titulo' =>'SGI | Registro de Incidencias',
			'seccion' =>'contenido/incidencias_v',
			'carga_exitosa' => '',
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			"carga_exitosa"=>$exito,
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);

	}



}

/* End of file incidencias.php */
/* Location: ./application/controllers/incidencias.php */