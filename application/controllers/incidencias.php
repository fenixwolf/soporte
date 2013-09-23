<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidencias extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('incidencias_m');
		$this->load->model('tecnicos_m');
		$this->load->model('departamentos_m');
		$this->load->model('correo_log_m');
	}
	
	public function index(){
		//$lista_tecnicos=$this->tecnicos_m->listar_tecnicos();


			$data = array(
			'titulo' =>'Registro de Incidencias',
			'seccion' =>'contenido/incidencias_v',
			'carga_exitosa' => '',
			'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
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
	//echo '<pre>',print_r($data),'</pre>';die;
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

		$usuario_solicitante = $data['correo_solicitante'];
		$tecnico_asignado = $data['tecnico_asignado'];
		$incidente_reportado = $data['detalles'];
		$remitente='soporte@inn.gob.ve';
		$asunto="Solicitud de Soporte Técnico al usuario $usuario_solicitante";
		$fecha_ahora=time();

		$mensaje_correo = "Se ha recibido una solicitud de Soporte Técnico con un incidente relacionado con $incidente_reportado desde el correo $usuario_solicitante , el mismo será atendido a la brevedad posible. Gracias por contactarnos";
		//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->library('email');
		$this->email->from($remitente);
		$this->email->to($usuario_solicitante);
		$this->email->subject($asunto);
		$this->email->message($mensaje_correo);

		$correo_log = array(
			'remitente' =>$remitente ,
			"destinatario"=>$usuario_solicitante,
			
			"detalles"=>$data['detalles'],
			"fecha_envio"=> unix_to_human($fecha_ahora,TRUE,'eu'),
			 );
		
		if ($this->email->send()) {
			$this->correo_log_m->envio_correo_usuario($correo_log);
			$this->_enviar_correo_tecnico($data);
		} else {
			echo "Correo Usuario no enviado";
		}

	}

	public function _enviar_correo_tecnico($data)
	{	

		$departament_requiriente = $data['id_departamento_incidencia'];
		$usuario_solicitante = $data['correo_solicitante'];
		$incidente_reportado = $data['detalles'];
		$tecnico_asignado = $this->tecnicos_m->busqueda_tecnico_asignado($data);
		$departamento_solicitante = $this->tecnicos_m->busqueda_departamento($data);
		$correo_tecnico = $this->tecnicos_m->extraer_correo_tecnico($data);
		
		$tecnico = $tecnico_asignado['nombres_tecnico']." ".$tecnico_asignado['apellidos_tecnico'];
		$departamento = $departamento_solicitante['nombre_departamento'];	
		$incidente_reportado=$data['detalles'];
		$mensaje_correo="Se le informa que ha sido asignado a un nuevo servicio técnico del usuario $usuario_solicitante en la oficina $departamento, con los siguientes detalles: $incidente_reportado, su técnico asignado es $tecnico";
		//*FUNCION BUSCAR NOMBRE DEL TÉCNICO*///

		
		
		/***FUNCIÓN ENVIAR CORREO****/
		$remitente='soporte@inn.gob.ve';
		$destinatario=$correo_tecnico["correo_tecnico"];
		$detalles="Asignación de servicio técnico";
		

		$this->load->library('email');
		$this->email->from($remitente);
		$this->email->to($destinatario);
		$this->email->subject($detalles);
		$this->email->message($mensaje_correo);

		$correo_log = array(
			'remitente' =>$remitente ,
			"destinatario"=>$usuario_solicitante,
			"detalles"=>$detalles,
			"fecha_envio"=> unix_to_human(time(),TRUE,'eu'),
			 );
		
		if ($this->email->send()) {
			$this->correo_log_m->envio_correo_usuario($correo_log);
			$this->_guardado();
		} else {
			echo "Correo técnico no enviado";
		}

	}

	public function _guardado()
	{
		$exito="si";
		$data = array(
			'titulo' =>'Registro de Incidencias',
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