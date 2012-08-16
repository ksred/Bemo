<?php
class Model_vote extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }
    
    function submit_vote ($artist_id, $campaign_id, $round, $ip) {
        $has_voted = $this->check_voted($artist_id, $campaign_id, $round, $ip);
        if (!$has_voted) {
            $this->insert_vote($artist_id, $campaign_id, $round, $ip);
            return TRUE;
        } else {
            return FALSE;
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
        
        return $result;
    }
    
    function get_round_campaign($campaign_id) {
        $this->db->select("round");
        $this->db->from("campaign");
        $this->db->where("active", "1");
        $this->db->where("campaign_id", $campaign_id);
        $result = $this->db->get()->result();
        
        return $result[0]->round;
    }
    
    function insert_vote($a_id, $c_id, $r, $ip) {
        $data = array("artist_id" => $a_id, "campaign_id" => $c_id, "round" => $r, "ip" => $ip);
        $this->db->insert("vote", $data);
    }
    
}
?>
