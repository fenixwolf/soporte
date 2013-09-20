<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('departamentos_m');
	}

	public function index()
	{
		$data = array(
			'titulo' =>'Registro de Departamento u Oficinas',
			'seccion' =>'contenido/departamento_v',
			'carga_exitosa' => '',
			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
		$this->load->view('welcome', $data);		
	}
	public function registro()
	{
	//echo '<pre>',print_r($_POST),'</pre>';die;

	$data = array(
		'nombre_departamento' =>$this->input->post("nombre_departamento"),
		'detalles' =>$this->input->post("detalles"),
		'direccion_departamento' =>$this->input->post("direccion_departamento"),
		);
	//echo '<pre>',print_r($data),'</pre>';die;
	$registro_departamento= $this->departamentos_m->registrar_departamento($data);

	if ($registro_departamento < 1) {
		echo "Error al registrar en Base de datos";
	} else {
		$this->_guardado();
		//$this->_enviar_correo_usuario($data);
		
		
	};
	

	}
	public function _guardado()
	{
		$exito="si";
		$data = array(
			'titulo' =>'Registro de Departamento u Oficinas',
			'seccion' =>'contenido/departamento_v',
			"carga_exitosa"=>$exito,
			//'carga_exitosa'=>$carga_exitosa,	
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);

	}

}

/* End of file departamento.php */
/* Location: ./application/controllers/departamento.php */