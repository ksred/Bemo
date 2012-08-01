<?php
class Model_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
        $this->db = $this->load->database("default", TRUE);
    }
    
    function insert_user ($data) {
        $result = $this->db->insert("user", $data);
        return $result;
    }
    
}
?>
