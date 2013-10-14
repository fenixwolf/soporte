<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportar extends CI_Controller {
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
			
			//'lista_tecnicos'=>$this->tecnicos_m->listar_tecnicos(),
			//"lista_incidencias"=>$this->incidencias_m->listar_incidencias(),
			//"lista_departamentos"=>$this->departamentos_m->listar_departamentos(),
			 );
			//echo '<pre>',print_r($data),'</pre>';die;
		$this->load->view('welcome', $data);
	}

}

/* End of file reporte.php */
/* Location: ./application/controllers/reporte.php */