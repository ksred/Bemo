<?php
class Helloworld extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
	 $role =  $this->session->userdata('role');
        if ($role != 1) redirect(BASE_URL);
    }   

    function index()
    {
        echo("Hello, World!");
        $this->load->model("world");
        $this->world->see();
    }
}
?>
