<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_m extends CI_Model {

		public function listar_no_atendidos(){

        $this->db->where('id_reporte', null);
        $index_incidencias = $this->db->get("incidencia_reporte_v"); //Obtengo los datos de la consulta
        $lista_incidencias = $index_incidencias->result_array(); //Con "result_array" lo transformo en array
        return $lista_incidencias; //Envío los datos de la consulta
        //echo '<pre>',print_r($lista_incidencias),'</pre>';die;
     }				
	
	

}

/* End of file reporte_m.php */
/* Location: ./application/models/reporte_m.php */