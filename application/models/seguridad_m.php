<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad_m extends CI_Model {

	public function listar_permisos(){

		//$this->db->select('id, menu, rol, controlador, fecha_creacion');		
		$index_permisos = $this->db->get('seguridad.relacion_menu_rol_v'); //Obtengo los datos de la consulta
        $permisos = $index_permisos->result_array(); //Con "result_array" lo transformo en array
        return $permisos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
	}
	public function listar_roles(){

		$this->db->select('id, rol');
		$this->db->group_by('id, rol');		
		$index_rol = $this->db->get('seguridad.relacion_menu_rol_v'); //Obtengo los datos de la consulta
        $rol = $index_rol->result_array(); //Con "result_array" lo transformo en array
        return $rol; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
	}
	





	public function editar_permisos($permisos){
		$rol=$permisos;
		$this->db->where('rol =', $rol);
		$index_rol=$this->db->get('seguridad.relacion_menu_rol_v');
		$rol = $index_rol->result_array(); //Con "result_array" lo transformo en array
        return $rol; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;


	}

	public function borrado_permiso($id){
		
		$a_borrar = array('id =' =>$id , );
		$index_borrar=$this->db->delete('seguridad.roles_menu_r',$a_borrar );
		//Con "result_array" lo transformo en array
        return $index_borrar; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;


	}

	public function listar_menu(){

		$index_menu=$this->db->get('seguridad.menu_t');
		$menu = $index_menu->result_array(); //Con "result_array" lo transformo en array
        return $menu; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
	}

	public function listar_roles_registrados(){

		$index_roles=$this->db->get('seguridad.roles_t');
		$roles = $index_roles->result_array(); //Con "result_array" lo transformo en array
        return $roles; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
	}
	public function agregar_permiso($rol_id, $menu_id){
		$registro = array();
        $registro['id_menu'] = $menu_id;
        $registro['id_rol'] = $rol_id;
        $registro['fecha_creacion'] = date('Y/m/d H:i');        
        $this->db->insert('seguridad.roles_menu_r',$registro);


	}
	public function eliminar_permiso($rol_id, $menu_id){
		$this->db->where('id_rol', $rol_id);
        $this->db->where('id_menu', $menu_id);
        $this->db->delete('seguridad.roles_menu_r');
	}
	

}

/* End of file seguridad_m.php */
/* Location: ./application/models/seguridad_m.php */