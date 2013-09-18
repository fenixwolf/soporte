<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos_m extends CI_Model {

	public function listar_departamentos(){
        
        $index_departamentos = $this->db->get("departamento_t"); //Obtengo los datos de la consulta
        $departamentos = $index_departamentos->result_array(); //Con "result_array" lo transformo en array
        return $departamentos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     } 

}

/* End of file departamento_m.php */
/* Location: ./application/models/departamento_m.php */