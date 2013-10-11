<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LibreriaSeguridad
{
  protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        
	}

	public function perfiles_asignados_noasignados($id){
		$con_permiso=array();
		$sin_permiso=array();
		$this->ci->load->model('seguridad_m');
		$perfiles = $this->ci->seguridad_m->listar_roles_registrados();

		//echo '<pre>',print_r($perfiles, true),'</pre>';die;
		foreach ($perfiles as $rol) {
			//echo '<pre>',print_r($perfil, true),'</pre>';die;


			$este_rol=$rol['id_rol'];
			

			$this->ci->db->where('id_menu =', $id);
			$this->ci->db->where('id_rol =', $este_rol);
			

			$query = $this->ci->db->get('seguridad.roles_menu_r');
			//echo '<pre>',print_r($query, true),'</pre>';


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
	
	public function login(){

	}
}

/* End of file LibreriaSeguridad.php */
/* Location: ./application/libraries/LibreriaSeguridad.php */
