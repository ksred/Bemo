<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
	$user = $this->session->userdata('name');
	//if (isset($user)) redirect("/");
    }   

    	public function index () {
		$data["title"] = "Bemo - Login";
		$this->load->view("login", $data);
	}
        
        public function error () {
            $data['error'] = "Sorry, please try again";
            $data["title"] = "Bemo - Login";
	    $this->load->view("login", $data);
        }
}
?>