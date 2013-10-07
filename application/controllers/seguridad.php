<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('seguridad_m');
		$this->load->library('LibreriaSeguridad');
	}

	public function index(){
		
			$data = array(
			'titulo' =>'Seguridad del Sistema | Permisos',
			'seccion' =>'contenido/seguridad/permisos_v',
			'carga_exitosa' => '',
			'listar_permisos'=>$this->seguridad_m->listar_permisos(),
			//'listar_roles'=>$this->seguridad_m->listar_roles(),
			 );
		$this->load->view('welcome', $data);				
	}

	public function _borrado_exito(){
		
			$data = array(
			'titulo' =>'Seguridad del Sistema | Permisos',
			'seccion' =>'contenido/seguridad/permisos_v',
			'carga_exitosa' => 'si',
			'listar_permisos'=>$this->seguridad_m->listar_permisos(),
			'listar_roles'=>$this->seguridad_m->listar_roles(),
			 );
		$this->load->view('welcome', $data);				
	}

	public function editar_permiso(){
		$permisos=$this->input->post('permisos');
		$rol_editado=$this->seguridad_m->editar_permiso($permisos);
		//echo '<pre>',print_r($rol_editado),'</pre>';die;


	}
	public function borrar_permisos($id){
		$borrado=$this->seguridad_m->borrado_permiso($id);
		if ($borrado==true) {
			$this->_borrado_exito();
		}
		else{
			$this->index();
		}
	}


	public function seguridad_menu(){
		
			$data = array(
			'titulo' =>'Seguridad del Sistema | Permisologías en Menú',
			'seccion' =>'contenido/seguridad/menu_v',
			'carga_exitosa' => '',
			'listar_menu'=>$this->seguridad_m->listar_menu(),
			//'listar_permisos'=>$this->seguridad_m->listar_permisos(),
			//'listar_roles'=>$this->seguridad_m->listar_roles(),
			 );
		$this->load->view('welcome', $data);				
	}

	public function asignar_permisos_menu($id){

			//$nombre= $this->seguridad_m->listar_menu->find($id)->menu;
			$data = array(
			'titulo' =>'Seguridad del Sistema | Asignar Permisos al menú',
			'seccion' =>'contenido/seguridad/permisos_menu_v',
			'carga_exitosa' => '',
			
			$perfiles=$this->libreriaseguridad->perfiles_asignados_noasignados($id),

			//Carga de Arreglos para las tablas con permiso o sin él
			'con_permiso'=>$perfiles[0],
			'sin_permiso'=>$perfiles[1],
			//'listar_menu'=>$this->seguridad_m->listar_menu(),
			//'listar_permisos'=>$this->seguridad_m->listar_permisos(),
			//'listar_roles'=>$this->seguridad_m->listar_roles(),
			 );
		//echo '<pre>',print_r($perfiles ,true),'</pre>';die;	
		$this->load->view('welcome', $data);
	}


}