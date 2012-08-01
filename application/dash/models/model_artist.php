<?php
class Model_artist extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
        $this->load->helper('form');
    }
    
    function save_artist ($data) {
        $result = $this->db->insert("artist", $data);
        return $result;
    }
    
    function upload() {
            $config['upload_path'] = UPLOAD_PATH."artist/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '500';
            $config['max_width']  = '1920';
            $config['max_height']  = '1920';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("artist-picture"))
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
    
    function list_artists () {
        $this->db->select("*");
        $this->db->from("artist");
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        return $result;
    }
    
    function list_single_artist ($id) {
        $this->db->select("*");
        $this->db->from("artist");
        $this->db->where("id", $id);
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        $result = $result->result();
        return $result[0];
    }
    
    function update_artist ($data) {
        $this->db->where("id", $data['id']);
        $result = $this->db->update("artist", $data);
        //die($this->db->last_query());
        return $result;
    }
    
    function get_artist_picture($id) {
        $this->db->select("picture");
        $this->db->from("artist");
        $this->db->where("id", $id);
       // $this->db->order_by("name", "desc");
        $result = $this->db->get();
        $result = $result->result();
        return $result[0]->picture;
    }
    
}
?>
