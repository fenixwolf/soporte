<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas_m extends CI_Model {

	public function listar_tecnicos(){
        
        $index_tecnicos = $this->db->get("tecnicos_t"); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     }
     public function buscar_estadisticas($data){

        $this->db->select('tecnicos_t.nombres_tecnico, tecnicos_t.apellidos_tecnico, 
            count(incidencia_t.id) FROM tecnicos_t INNER JOIN incidencia_t ON tecnicos_t.id
            = incidencia_t.tecnico_asignado GROUP BY tecnicos_t.nombres_tecnico,tecnicos_t.apellidos_tecnico');
        //echo '<pre>',print_r($id_tecnico),'</pre>';die;
        
        
     
        //$this->db->limit(1);
        $index_tecnicos = $this->db->get();
        //echo '<pre>',print_r($index_tecnicos),'</pre>';die; 
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
		//echo '<pre>',print_r($tecnicos),'</pre>';die;
     }
     public function estadistica_por_tecnico($data){

        
        $this->db->select('tecnicos_t.nombres_tecnico, tecnicos_t.apellidos_tecnico, 
            count(incidencia_t.id) FROM tecnicos_t INNER JOIN incidencia_t ON tecnicos_t.id
            = incidencia_t.tecnico_asignado GROUP BY tecnicos_t.nombres_tecnico,tecnicos_t.apellidos_tecnico');
        //echo '<pre>',print_r($id_tecnico),'</pre>';die;
        
        
     
        //$this->db->limit(1);
        $index_tecnicos = $this->db->get();
        //echo '<pre>',print_r($index_tecnicos),'</pre>';die; 
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     }

     public function estadistica_por_mes($data){

        
        $sql="count(incidencia_t.id)AS numero_incidencias, date(incidencia_t.fecha_solicitud) AS fechas, tecnicos_t.nombres_tecnico, tecnicos_t.apellidos_tecnico FROM incidencia_t INNER JOIN tecnicos_t ON tecnicos_t.id = incidencia_t.tecnico_asignado GROUP BY tecnicos_t.nombres_tecnico, tecnicos_t.apellidos_tecnico,fechas";
        $this->db->select($sql);
        //echo '<pre>',print_r($filtro_mes),'</pre>';die;
        
        
     
        //$this->db->limit(1);
        $index_meses = $this->db->get();
        //echo '<pre>',print_r($index_tecnicos),'</pre>';die; 
        $meses = $index_meses->result_array(); //Con "result_array" lo transformo en array
        //echo '<pre>',print_r($meses),'</pre>';die;
        return $meses; //Envío los datos de la consulta
        //echo '<pre>',print_r($meses),'</pre>';die;
     }

	

}

/* End of file estadisticas_m.php */
/* Location: ./application/models/estadisticas_m.php */