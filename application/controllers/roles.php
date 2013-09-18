<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('roles_m');
	}
	
	public function index()
	{	
			$data = array(
			'titulo' =>'SGI | Registro de Roles' ,
			'seccion'=>'contenido/roles_v',
			'carga_exitosa'=>'',
				
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);				
	}

	public function registro()
	{
	//echo '<pre>',print_r($_POST),'</pre>';die;
	$data = array(
		'nombre_rol' =>$this->input->post("nombre_rol"),
		'rol_simple' =>$this->input->post("rol_simple"),
		
		//'tipo_rol' =>$this->input->post("tipo_rol"),

		);

	$registro_roles=$this->roles_m->registrar_roles($data);

	if ($registro_roles < 1) {
		echo "Error al registrar en Base de datos";
	} else {
		
		$this->_guardado();
		
	};
	

	}

	public function _guardado()
	{
		$exito="si";
		$data = array(
			'titulo' =>'SGI | Registro de Roles' ,
			'seccion'=>'contenido/roles_v',
			"carga_exitosa"=>$exito,
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);

	}


}

/* End of file roles.php */
/* Location: ./application/controllers/roles.php */