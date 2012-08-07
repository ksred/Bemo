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
        if (!isset($role) && ($role != 1)) redirect(BASE_URL);
    }   

    function index()
    {
        $this->load->Model("Model_vote");
        $this->load->Model("Model_campaign");
        $id = $this->Model_campaign->get_max_campaign_no();
        $round = $this->Model_vote->get_round_campaign($id);
        die(var_dump($round));
        
        $data['title'] = "Bemo - Admin";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "admin";
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
    
    function payments () {
        $data['title'] = "Bemo Admin - Payments";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "payments";
        
        $this->load->view("/admin/payments", $data);
    }
    
    function votes () {
        $data['title'] = "Bemo Admin - Votes";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "votes";
        
        $this->load->view("/admin/votes", $data);
    }
    
    function reports () {
        $data['title'] = "Bemo Admin - Reports";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "reports";
        
        $this->load->view("/admin/reports", $data);
    }
}
?>
