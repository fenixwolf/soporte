<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecnicos_m extends CI_Model {
		

	public function buscartecnico(){		
        $this->db->select('correo_tecnico , administracion');
        $this->db->from('tecnicos_t');
        $this->db->where('id', $Value);
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;

        }
    public function lista_roles(){		
        $this->db->select('rol, id_rol');
        $this->db->from('seguridad.roles_t');
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
        $this->db->join('seguridad.roles_t', 'public.tecnicos_t.rol = seguridad.roles_t.id_rol');
        $index_tecnicos = $this->db->get('public.tecnicos_t'); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->result_array(); //Con "result_array" lo transformo en array
        
        return $tecnicos; //Envío los datos de la consulta
 
     }
     public function busqueda_tecnico_asignado($data){
        $id_tecnico=$data["tecnico_asignado"];
        $this->db->select('id , nombres_tecnico, apellidos_tecnico');
        $this->db->from('public.tecnicos_t');
        $this->db->where('id =',$id_tecnico);
        $this->db->limit(1);
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $tecnicos = $index_tecnicos->row_array(); //Con "result_array" lo transformo en array
        return $tecnicos; //Envío los datos de la consulta
  
  
     }
     public function busqueda_departamento($data){
        $id_tecnico=$data["id_departamento_incidencia"];
        //echo '<pre>',print_r($id_tecnico),'</pre>';die;
        $this->db->select('id , nombre_departamento, detalles, direccion_departamento');
        $this->db->from('public.departamento_t');
        $this->db->where('id',$id_tecnico);
        //$this->db->limit(1);
        $index_tecnicos = $this->db->get(); //Obtengo los datos de la consulta
        $departamentos = $index_tecnicos->row_array(); //Con "result_array" lo transformo en array
        return $departamentos; //Envío los datos de la consulta
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
  
     }
     public function extraer_correo_tecnico($data){
        $id_tecnico=$data["tecnico_asignado"];
        $this->db->select('id , correo_tecnico');
        $this->db->from('public.tecnicos_t');
        $this->db->where('id =',$id_tecnico);
        $this->db->limit(1);
        $index_tecnicos = $this->db->get(); 
        $tecnicos = $index_tecnicos->row_array(); //Con "row_array" lo transformo en array de una linea
        return $tecnicos; 
        //echo '<pre>',print_r($tecnicos),'</pre>';die;
  
     }
     public function get_login($correo, $pass){
        $this->db->where('correo_tecnico', $correo);
        $this->db->where('pass', $pass);
        //$android=$this->db->get('tecnicos_t');
        //$arduino=$android->result_array();
        //echo '<pre>',print_r($arduino),'</pre>';die;
        return $this->db->get('tecnicos_t');
     
     }                  
	

}

/* End of file tecnicos_m.php */
/* Location: ./application/models/tecnicos_m.php */