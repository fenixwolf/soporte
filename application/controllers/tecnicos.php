<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecnicos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tecnicos_m');
	}

	public function index()
	{
		
		//echo '<pre>',print_r($data['tecnicos']),'</pre>';die;
		$data = array(
			'titulo' =>'Registro de Técnicos' ,
			'seccion'=>'contenido/tecnicos_v',
			'tecnicos'=>$this->tecnicos_m->lista_roles(),
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"carga_exitosa"=>"",
			
			 );
		
		$this->load->view('welcome', $data);		
	}
	public function registro()
	{
	//echo '<pre>',print_r($_POST),'</pre>';die;
	$data = array(
		'correo_tecnico' =>strtolower($this->input->post("correo")),
		'nombres_tecnico' =>ucwords(strtolower($this->input->post("nombres_tecnico"))),
		'apellidos_tecnico' =>ucwords(strtolower($this->input->post("apellidos_tecnico"))),
		//'tipo_rol' =>$this->input->post("tipo_rol"),

		);

	$registro_tecnico=$this->tecnicos_m->registrar_tecnico($data);

	if ($registro_tecnico<1) {
		echo "Error al registrar en Base de datos";
	} else {
		$this->_guardado();
	};
	

	}
	public function _guardado()
	{
		$exito="si";
		$data = array(
			'titulo' =>'Registro de Técnicos' ,
			'seccion'=>'contenido/tecnicos_v',
			'tecnicos'=>$this->tecnicos_m->lista_roles(),
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"carga_exitosa"=>$exito,
			//'carga_exitosa'=>$carga_exitosa,	
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);

	}
}

/* End of file tecnicos.php */
/* Location: ./application/controllers/tecnicos.php */