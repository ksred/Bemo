<?php
class Model_vote extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
    }
   
    function get_all_totals() {
        $this->db->select("artist.name, campaign.title, count(*) as votes");
        $this->db->from("vote, artist, campaign");
        $this->db->where("vote.artist_id = artist.id");
        $this->db->where("vote.campaign_id = campaign.id");
        $this->db->order_by("votes", "desc");
        $this->db->group_by("artist_id");
        $result = $this->db->get();
        
        return $result;
    }
    
}
?>
