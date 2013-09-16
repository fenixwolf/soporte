<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	public function index()
	{
		
		//$this->load->view('email');
		$this->_sendmail();
	}
	//*FINCIÓN PARA ENVIAR CORREOS ELECTRÓNICOS*//
	public function _sendmail(){
		$this->load->library('email');
	$config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://correo.inn.gob.ve';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '5';
    $config['smtp_user']    = 'prueba@inn.gob.ve';
    $config['smtp_pass']    = '';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
    $config['validation'] = TRUE; 

		$this->email->initialize($config);
		
		$this->email->from('jyacot@inn.gob.ve');
		$this->email->to('jyacot@inn.gob.ve');
		
		
		
		$this->email->subject('Mensaje de Prueba Correo');
		$this->email->message('Este es un mensaje de prueba de correo');
		
		if ($this->email->send()) {
			echo "Correo enviado";
		} else {
			echo "Correo no enviado";
		}

		//echo $this->email->print_debugger();

	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */