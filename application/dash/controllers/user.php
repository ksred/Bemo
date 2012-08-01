<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $role =  $this->session->userdata('role');
        if (!isset($role) && ($role != 1)) redirect(BASE_URL);
    }   

    function index()
    {
        
    }
    
    public function login () {
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        
        $data = array("name" => $name, "password" => $password);
        $this->load->Model("Model_user");
        $result = $this->Model_user->login($data);
        $result = $result->result();
        if (count($result) > 0) {
            //set user object stuff here
            echo ($result[0]->id);
            $data = array("id" => $result[0]->id,
                "name" => $result[0]->name,
                "role" => $result[0]->role);
            $this->session->set_userdata($data);
            header("Location: /admin");
        } else {
            header("Location: /login/error");
        }
    }
}
?>
