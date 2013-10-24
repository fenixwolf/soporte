<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_m extends CI_Model {

		public function listar_no_atendidos(){

        $this->db->where('detalles_reporte', null);
        $index_incidencias = $this->db->get("reporte_v"); //Obtengo los datos de la consulta
        $lista_incidencias = $index_incidencias->result_array(); //Con "result_array" lo transformo en array
        return $lista_incidencias; //Envío los datos de la consulta
        //echo '<pre>',print_r($lista_incidencias),'</pre>';die;
     }

     	public function lista_status(){
        //$this->db->where('id= ', '1');
     	$index_lista_estatus = $this->db->get("tipo_reporte_incidencia_t"); //Obtengo los datos de la consulta
        $lista_estatus = $index_lista_estatus->result_array(); //Con "result_array" lo transformo en array
        return $lista_estatus; //Envío los datos de la consulta
        //echo '<pre>',print_r($lista_estatus, true),'</pre>';die;
     	}

        public function insertar_reporte($data){
        //echo '<pre>',print_r($data, true),'</pre>';die;
        $this->db->insert('public.reporte_incidencia_t', $data);

        }				
	
	

}

/* End of file reporte_m.php */
/* Location: ./application/models/reporte_m.php */