<?php
class Vote extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_vote");
    }   

    function index()
    {
        $data['title'] = "Bemo Admin - Votes";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "votes";
        
        $this->load->view("/vote/index", $data);
    }
    
    function total () {
        $data['title'] = "Bemo Admin - Votes";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "votes";
        $total = $this->Model_vote->get_all_totals();
        $data['total'] = $total->result();
        
        $this->load->view("/vote/total", $data);
    }
}
?>
