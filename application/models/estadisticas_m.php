<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas_m extends CI_Model {

	public function listar_tecnicos(){
        
        $index_tecnicos = $this->db->get("tecnicos_t"); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     }
     public function buscar_estadisticas($data){

        
        $id_tecnico=$data["tecnico_asignado"];
        //echo '<pre>',print_r($id_tecnico),'</pre>';die;
        $this->db->select('id , tecnico_asignado, fecha_solicitud');
        $this->db->from('public.incidencia_t');
        $this->db->where('tecnico_asignado',$id_tecnico);
        //$this->db->limit(1);
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
		//echo '<pre>',print_r($tecnicos),'</pre>';die;
     }

	

}

/* End of file estadisticas_m.php */
/* Location: ./application/models/estadisticas_m.php */