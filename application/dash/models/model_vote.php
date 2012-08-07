<?php
class Model_vote extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }
    
    function submit_vote ($artist_id, $campaign_id) {
        $artist_id = "";
        $round = $this->get_round_campaign($campaign_id);
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $has_voted = $this->check_voted();
        if (!$has_voted) {
            
        }
    }
    
    function check_voted($artist_id, $campaign_id, $round, $ip) {
        $this->db->select("*");
        $this->db->from("vote");
        $this->db->where("artist_id", $artist_id);
        $this->db->where("campaign_id", $campaign_id);
        $this->db->where("round", $round);
        $this->db->where("ip", $ip);
        $result = $this->db->get()->result();
        
        return $result[0];
    }
    
    function get_round_campaign($campaign_id) {
        $this->db->select("round");
        $this->db->from("campaign");
        $this->db->where("active", "1");
        $this->db->where("campaign_id", $campaign_id);
        $result = $this->db->get()->result();
        
        return $result[0]->round;
    }
    
}
?>
