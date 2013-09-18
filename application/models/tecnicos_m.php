<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecnicos_m extends CI_Model {
		

	public function buscartecnico(){		
        $this->db->select('correo_tecnico , administracion');
        $this->db->from('tecnicos_t');
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;

        }
    public function lista_roles(){		
        $this->db->select('nombre_rol , rol_simple, id');
        $this->db->from('tipo_rol_t');
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;

        }
    public function registrar_tecnico($data){
    	
    	$salida=$this->db->insert('tecnicos_t', $data);

    	//echo '<pre>',print_r($salida),'</pre>';die;
    	return $salida;
        }
     public function listar_tecnicos(){
        
        $index_tecnicos = $this->db->get("tecnicos_t"); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     }       
	

}

/* End of file tecnicos_m.php */
/* Location: ./application/models/tecnicos_m.php */