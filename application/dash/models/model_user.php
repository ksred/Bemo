<?php
class Model_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
        $this->db = $this->load->database("default", TRUE);
    }
    
    function login ($data) {
        $this->db->select('*');
        $this->db->from("user");
        $this->db->where("name", $data["name"]);
        $this->db->where("password", $data["password"]);
        $result = $this->db->get();
        return $result;
    }
    
}
?>
