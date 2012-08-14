<?php
class Campaign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_campaign");
    }   

    function index()
    {
        $data['title'] = "Bemo!fm - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "campaign";
        $data['campaigns'] = $this->Model_campaign->get_active_campaigns();
        
        $latest = $this->Model_campaign->get_latest_active_campaign();
        $latest_artists = $this->Model_campaign->get_top_artists_campaign($latest->campaign_id, 5);
        $data['campaign_artist'] = $latest_artists;
        
        $this->load->view("/campaign/index", $data);
    }
    
    function view ($title) {
        $data['title'] = "Bemo!fm - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "campaign";
        $data['campaigns'] = $this->Model_campaign->get_active_campaigns();
    }
}