<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('reporte_m');
		$this->load->model('correo_log_m');
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
	public function actualizar_reporte(){
		//echo '<pre>',print_r($_POST),'</pre>';die;

		$data = array(
			'id_reportado'=>$this->input->post('id_seleccionado'),
			'titulo' =>"Reporte de Estatus | Caso ".$this->input->post('id_seleccionado'),
			'seccion' =>'contenido/actualizacion_reporte_v',
			'id_seleccionado' =>$this->input->post('id_seleccionado'), 
			'correo_solicitante'=>$this->input->post('correo_solicitante'),
			'tipo_incidencia'=>$this->input->post('tipo_incidencia'),
			'tecnico_asignado'=>$this->input->post('tecnico_asignado'),
			'lista_status'=>$this->reporte_m->lista_status(),
			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
			//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->view('welcome', $data);
	}


	//Registro de Reporte:

	public function registrar_reporte(){
		$data = array(
			'id_incidencia' =>$this->input->post('id_seleccionado') , 
			'estatus_incidencia'=>$this->input->post('status_incidencia'),
			'detalles'=>$this->input->post('tipo_incidencia'),
			'detalles_resolucion'=>$this->input->post('detalles_resolucion'),
			);

		$reporte_exito=$this->reporte_m->insertar_reporte($data);
		//echo '<pre>',print_r($reporte_exito),'</pre>';die;
		if ($reporte_exito=1) {
			$data = array(
				'correo_solicitante' =>$this->input->post('correo_solicitante') ,
				 'detalles'=>$this->input->post('tipo_incidencia'),
				 'detalles_resolucion'=>$this->input->post('detalles_resolucion'),
				);
			$this->_enviar_correo_usuario($data);
			$this->index();
		}
		else {
			echo "Error al reportar, por favor contacte al administrador del sistema";
		}
	
		

	}
	public function _enviar_correo_usuario($data)
	{

		$usuario_solicitante = $data['correo_solicitante'];
		$detalles = $data['detalles'];
		$detalles_reporte = $data['detalles_resolucion'];
		$remitente='soporte@inn.gob.ve';
		$asunto="Reporte de finalización de Soporte a $usuario_solicitante";
		$fecha_ahora=time();

		$mensaje_correo ="El técnico asignado para su solicitud de soporte en $detalles ha reportado que: $detalles_reporte\n\nSi posee algún comentario o sugerencia le rogamos nos escriba a la dirección soporte@inn.gob.ve.\nNuevamente gracias por contactarnos, estamos a su orden.\n\n\nSistema de Seguimiento a Incidencias S.I.G.\nDirección de Sistemas y Tecnología de la Información\nInstituto Nacional de Nutrición ";
		//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->library('email');
		$this->email->from($remitente);
		$this->email->to($usuario_solicitante);
		$this->email->subject($asunto);
		$this->email->message($mensaje_correo);

		$correo_log = array(
			'remitente' =>$remitente ,
			"destinatario"=>$usuario_solicitante,
			
			"detalles"=>'Reporte de cierre de caso: '.$data['detalles'],
			"fecha_envio"=> unix_to_human($fecha_ahora,TRUE,'eu'),
			 );
		
		if ($this->email->send()) {
			$this->correo_log_m->envio_correo_usuario($correo_log);		
		} else {
			echo "Correo de reporte a $usuario_solicitante no enviado, por favor contacte a un administrador del sistema";
		}

	}
}

/* End of file reporte.php */
/* Location: ./application/controllers/reporte.php */