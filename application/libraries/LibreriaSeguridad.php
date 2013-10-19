<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LibreriaSeguridad
{
  protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('tecnicos_m');
        $this->ci->load->model('seguridad_m');
        
	}
	public function login($correo, $pass){

		$query=$this->ci->tecnicos_m->get_login($correo, $pass);
		//$query2= $query->result_array();
		//echo '<pre>',print_r($query2, true),'</pre>';die;
		
		if ($query->num_rows() > 0) {

			$datos = $query->row();

			$datos_sesion = array(
				'correo' => $datos->correo_tecnico,
				'usuario_id'=> $datos->id ,
				'rol_id'=> $datos->rol , 
				);
			//echo '<pre>',print_r($datos_sesion, true),'</pre>';die;
			$this->ci->session->set_userdata($datos_sesion);
			

			return TRUE;
		}
		else{
			$this->ci->session->sess_destroy();
			return FALSE;
			}
		
	}	

	public function perfiles_asignados_noasignados($id){
		$con_permiso=array();
		$sin_permiso=array();
		$perfiles = $this->ci->seguridad_m->listar_roles_registrados();

		//echo '<pre>',print_r($perfiles, true),'</pre>';die;
		foreach ($perfiles as $rol) {
			//echo '<pre>',print_r($perfil, true),'</pre>';die;


			$este_rol=$rol['id_rol'];
			$this->ci->db->where('id_menu =', $id);
			$this->ci->db->where('id_rol =', $este_rol);
			$query = $this->ci->db->get('seguridad.roles_menu_r');
			


			$existe= ($query->num_rows() >0);
			if ($existe) {
				$con_permiso[] =array($rol["id_rol"],$rol["rol"],$id);
			}
			else{
				$sin_permiso[] =array($rol["id_rol"],$rol["rol"],$id);
			}
		}	

		return array($con_permiso, $sin_permiso);
	}
	

	function buscar_lista_menu($controlador){
		$this->ci->db->where('controlador =', $controlador);
		return $this->ci->db->get('seguridad.menu_t')->row();
	}

	function buscar_menu_perfil($menu_id, $rol){
		$this->ci->db->where('id_menu =', $menu_id);
		$this->ci->db->where('id_rol =', $rol);
		return $this->ci->db->get('seguridad.roles_menu_r')->row();
	}
}

/* End of file LibreriaSeguridad.php */
/* Location: ./application/libraries/LibreriaSeguridad.php */
