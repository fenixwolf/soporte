<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidencias extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('incidencias_m');
		$this->load->model('tecnicos_m');
		$this->load->model('departamentos_m');
	}
	
	public function index(){
		//$lista_tecnicos=$this->tecnicos_m->listar_tecnicos();


			$data = array(
			'titulo' =>'SGI | Registro de Incidencias',
			'seccion' =>'contenido/incidencias_v',
			'carga_exitosa' => '',
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
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
		'id_departamento_incidencia' =>$this->input->post("departamento"),
		);

	$registro_incidencia= $this->incidencias_m->registrar_incidencia($data);

	if ($registro_incidencia < 1) {
		echo "Error al registrar en Base de datos";
	} else {
			//$this->_enviar_correo_usuario($data);
		$this->_enviar_correo_usuario($data);
		
		
	};
	

	}
	public function _enviar_correo_usuario($data)
	{
		$usuario_solicitante=$data['correo_solicitante'];
		$tecnico_asignado=$data['tecnico_asignado'];
		$incidente_reportado=$data['detalles'];
		$mensaje_correo="Se ha recibido una solicitud de Soporte Técnico con un incidente relacionado con $incidente_reportado desde el correo $usuario_solicitante , el mismo será atendido a la brevedad posible. Gracias por contactarnos";

		$this->load->library('email');
		$this->email->from('soporte@inn.gob.ve');
		$this->email->to($usuario_solicitante);
		$this->email->subject("Solicitud de Soporte Técnico al usuario $usuario_solicitante");
		$this->email->message($mensaje_correo);
		
		if ($this->email->send()) {
			$this->_enviar_correo_tecnico($data);
		} else {
			echo "Correo Usuario no enviado";
		}

	}

	public function _enviar_correo_tecnico($data)
	{	

		$departament_requiriente=$data['id_departamento_incidencia'];
		$usuario_solicitante=$data['correo_solicitante'];
		$incidente_reportado=$data['detalles'];
		$tecnico_asignado=$this->tecnicos_m->busqueda_tecnico_asignado($data);
		$departamento_solicitante=$this->tecnicos_m->busqueda_departamento($data);
		$tecnico=$tecnico_asignado['nombres_tecnico']." ".$tecnico_asignado['apellidos_tecnico'];
		$departamento=$departamento_solicitante['departamentos'];
		//$correo_tecnico=$data['correo_tecnico'];
		//$tecnico_asignado=$data['tecnico_asignado'];
		$incidente_reportado=$data['detalles'];
		$mensaje_correo="Se le informa que ha sido asignado a un nuevo servicio técnico del usuario $usuario_solicitante en la oficina $departamento, con los siguientes detalles: $incidente_reportado, su técnico asignado es $tecnico";
		//*FUNCION BUSCAR NOMBRE DEL TÉCNICO*///
		
		//echo '<pre>',print_r($tecnico_asignado),'</pre>';die;
		/***FUNCIÓN ENVIAR CORREO****/
		$this->load->library('email');
		$this->email->from('soporte@inn.gob.ve');
		$this->email->to("jyacot@inn.gob.ve"/*$correo_tecnico*/);
		$this->email->subject("Asignación de servicio técnico");
		$this->email->message($mensaje_correo);
		
		if ($this->email->send()) {
			$this->_guardado();
		} else {
			echo "Correo técnico no enviado";
		}

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
			"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			"carga_exitosa"=>$exito,
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);

	}



}

/* End of file incidencias.php */
/* Location: ./application/controllers/incidencias.php */