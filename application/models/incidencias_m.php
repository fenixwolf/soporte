<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidencias_m extends CI_Model {

	
	public function index()
	{	
			$data = array(
			'titulo' =>'SGI | Registro de Incidencias' ,
			'seccion'=>'contenido/incidencias_v',
			'carga_exitosa'=>'',

				
			 );
		//$data['tecnicos']=$this->tecnicos_m->lista_roles();
		$this->load->view('welcome', $data);				
	}
	public function registrar_incidencia($data)
	{
	
	$salida=$this->db->insert('incidencia_t', $data);
	

    	//echo '<pre>',print_r($salida),'</pre>';die;
    return $salida;

	}
	public function listar_incidencias(){
        
        $index_tecnicos = $this->db->get("tipo_incidencia_t"); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
     } 

	

}

/* End of file incidencias_m.php */
/* Location: ./application/models/incidencias_m.php */