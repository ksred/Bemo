<?php
class Artist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_artist");
    }   

    function index()
    {
        
    }
    
    function vote() {
        $artist_id = $_POST['artist_id'];
        $campaign_id = $_POST['campaign_id'];
        $round = $_POST['round'];
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $this->load>Model("Model_vote");
        $this->Model_vote->submit_vote($artist_id, $campaign_id, $round, $ip);
        echo "<script>console.log($artist_id, $campaign_id, $round, $ip)</script>";
    }
}
?>
