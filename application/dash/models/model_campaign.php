<?php
class Model_campaign extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
        $this->db = $this->load->database("default", TRUE);
    }
    
    function insert_campaign ($data) {
        $campaign_id = $this->get_max_campaign_no() + 1;
        $data["campaign_id"] = $campaign_id;
        $result = $this->db->insert("campaign", $data);
        $data["round"] = 2;
        $data["active"] = 0;
        $result = $this->db->insert("campaign", $data);
        $data["round"] = 3;
        $data["active"] = 0;
        $result = $this->db->insert("campaign", $data);
        return $result;
    }
    
    function get_max_campaign_no() {
        $this->db->select("campaign_id");
        $this->db->from("campaign");
        $this->db->limit(1);
        $this->db->order_by("campaign_id", "desc");
        $result = $this->db->get()->result();
        
        return $result[0]->campaign_id;
    }
    
    function upload() {
            $config['upload_path'] = UPLOAD_PATH."campaign/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '500';
            $config['max_width']  = '1920';
            $config['max_height']  = '1920';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("campaign-picture"))
            {
                    $error = array('error' => $this->upload->display_errors());
                    return FALSE;
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    return $data;
            }
    }
    
    function list_campaigns () {
        $this->db->select("*");
        $this->db->from("campaign");
        $this->db->where("active", "1");
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        return $result;
    }
    
    function list_single_campaign ($id) {
        $this->db->select("*");
        $this->db->from("campaign");
        $this->db->where("campaign_id", $id);
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        $result = $result->result();
        return $result[0];
    }
    
    function update_campaign ($data) {
        //Make all other rounds inactive
        $this->db->where("campaign_id", $data["campaign_id"]);
        $all_inactive = array("active" => "0");
        $this->db->update("campaign", $all_inactive);
        $array = array ("campaign_id" => $data["campaign_id"], "round" => $data["round"]);
        $this->db->where($array);
        $result = $this->db->update("campaign", $data);
        //die($this->db->last_query());
        return $result;
    }
    
    function get_campaign_picture($id) {
        $this->db->select("picture");
        $this->db->from("campaign");
        $this->db->where("campaign_id", $id);
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        $result = $result->result();
        return $result[0]->picture;
    }
    
    function add_artist_campaign ($data) {
        $this->db->select('*');
        $this->db->from("campaign_artists");
        $this->db->where($data);
        $already_added = $this->db->get();
        //die(var_dump($already_added));
        if ($already_added->num_rows == 0) {
            $this->db->insert("campaign_artists", $data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function remove_artist_campaign ($data) {
        $this->db->where($data);
        $result = $this->db->delete("campaign_artists");
        return $result;
    }
    
    function get_campaign_from_id ($id) {
        $this->db->select('*');
        $this->db->from("campaign");
        $this->db->where("id", $id);
        $result = $this->db->get();
        return $result->result();
    }
    
    function list_artists_campaign ($id) {
        $this->db->select('*');
        $this->db->from("campaign_artists, artist");
        $this->db->where("campaign_artists.campaign_id", $id);
        $this->db->where("campaign_artists.artist_id = artist.id");
        $result = $this->db->get();
        //die($this->db->last_query());
        return $result;
    }
    
}
?>
