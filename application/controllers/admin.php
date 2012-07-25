<?php
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Lang $lang
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 *
 *
 * **/

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $role =  $this->session->userdata('role');
        if ($role != 1) header("Location: /user");
    }   

    function index()
    {
        $role =  $this->session->userdata('role');
        $data['title'] = "Bemo - Admin";
        $data['user'] = $this->session->userdata('name');
        
        $this->load->view("admin/index", $data);
    }
    
    public function new_user () {
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $description = $_POST['description'];
        $role = 1; //for only admin user right now
        
        $data = array("name" => $name, "password" => $password, "email" => $email, "description" => $description, "role" => $role);
        $this->load->Model("Model_admin");
        $result = $this->Model_admin->insert_user($data);
        if ($result) {
            redirect("/admin");
        } else {
            redirect("/error/login");
        }
    }
    
    /*----------------------------Artist------------------------------------*/
    function artists ($var = FALSE) {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = $var;
        
        $this->load->view("/admin/artists", $data);
    }
    
    function artist_add ($success = "null") {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        $data['success'] = $success;
        
        $this->load->view("/admin/artist_add", $data);
    }
    
    function artist_edit ($id = FALSE) {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        
        $this->load->view("/admin/artist_edit", $data);
    }
    
    function artist_list () {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        
        $this->load->view("/admin/artist_list", $data);
    }
    /*-------------------------------------------------------------------------*/
    
    function payments () {
        $data['title'] = "Bemo Admin - Payments";
        $data['user'] = $this->session->userdata('name');
        
        $this->load->view("/admin/payments", $data);
    }
    
    function votes () {
        $data['title'] = "Bemo Admin - Votes";
        $data['user'] = $this->session->userdata('name');
        
        $this->load->view("/admin/votes", $data);
    }
    
    function reports () {
        $data['title'] = "Bemo Admin - Reports";
        $data['user'] = $this->session->userdata('name');
        
        $this->load->view("/admin/reports", $data);
    }
}
?>
