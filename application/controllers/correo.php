<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	public function index()
	{
		$this->load->view('View File', $data, FALSE);		
	}

}

/* End of file correo.php */
/* Location: ./application/controllers/correo.php */