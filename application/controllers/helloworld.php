<?php
class Helloworld extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }   

    function index()
    {
        echo("Hello, World!");
        $this->load->model("world");
        $this->world->see();
    }
}
?>
