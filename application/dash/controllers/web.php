<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	
	function __construct()
	{
	    parent::__construct();
		$role =  $this->session->userdata('role');
		//if (!isset($role) && ($role != 1)) redirect(BASE_URL."/login");
	}   

	public function index()
	{
		$data['title'] = "Bemo";
                $this->load->database("default", TRUE);
		$this->load->view('index', $data);
	}
}

/* End of file web.php */
/* Location: ./application/controllers/web.php */