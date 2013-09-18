<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_m extends CI_Model {
		public function index(){

		}
		public function registrar_roles($data){
    	//echo '<pre>',print_r($data),'</pre>';die;
    	$salida=$this->db->insert('tipo_rol_t', $data);

    	
    	return $salida;
        }

        
	

}

/* End of file roles_m.php */
/* Location: ./application/models/roles_m.php */