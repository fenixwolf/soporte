<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo_log_m extends CI_Model {
	public function envio_correo_usuario($correo_log){

		$salida=$this->db->insert('correo_log_tabla', $correo_log);
	

    	//echo '<pre>',print_r($salida),'</pre>';die;
    //return $salida;
	}
		

}

/* End of file correo_log.php */
/* Location: ./application/models/correo_log.php */