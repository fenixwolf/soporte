<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logueo extends CI_Controller {

	public function index()
	{

		$login=$this->input->post('login');
		$pass=$this->input->post('pass');
		$login_validado="jyacot";
		$pass_validado="123456";
		//echo $login.$pass;die;
		$data = array('activo' =>"yes" , );

		if ($login==$login_validado) {
			if ($pass==$pass_validado) {
				echo "validado";die;
			}
			else{
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}

	}

}

/* End of file logueo.php */
/* Location: ./application/controllers/logueo.php */