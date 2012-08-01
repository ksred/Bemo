<?php
class Campaign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_campaign");
        $role =  $this->session->userdata('role');
        if ($role != 1) redirect(BASE_URL);
    }   

    function index ($var = FALSE) {
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = $var;
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/index", $data);
    }
    
    function add ($success = "null") {
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        $data['success'] = $success;
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/add", $data);
    }
    
    function edit ($id = FALSE, $success = "null") {
         $this->load->Model("Model_campaign");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        $data['campaign_id'] = $id;
        $data['success'] = $success;
        $data['section'] = "campaign";
        
        if ($id != FALSE) {
            $data['campaign'] = $this->Model_campaign->list_single_campaign($id);
            $this->load->view("/campaign/edit", $data);
        } else {
            $data['all_campaigns'] = $this->Model_campaign->list_campaigns();
            $this->load->view("/campaign/list", $data);
        }
    }
    
    function add_artist ($success = "null") {
        $this->load->Model("Model_campaign");
        $this->load->Model("Model_artist");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['all_campaigns'] = $this->Model_campaign->list_campaigns();
        $data['all_artists'] = $this->Model_artist->list_artists();
        $data['success'] = $success;
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/add_artist", $data);
    }
    
    function remove_artist ($success = "null") {
        $this->load->Model("Model_campaign");
        $this->load->Model("Model_artist");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['all_campaigns'] = $this->Model_campaign->list_campaigns();
        $data['all_artists'] = $this->Model_artist->list_artists();
        $data['success'] = $success;
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/remove_artist", $data);
    }
    
    function close () {
        $data['section'] = "campaign";
    }
    
    function list_all () {
        $this->load->Model("Model_campaign");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['all_campaigns'] = $this->Model_campaign->list_campaigns();
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/list", $data);
    }
    
    function artists_per () {
        $this->load->Model("Model_campaign");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['all_campaigns'] = $this->Model_campaign->list_campaigns();
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/artists_per", $data);
    }
    
    function list_artists_per ($id) {
        $this->load->Model("Model_campaign");
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['campaign'] = $this->Model_campaign->get_campaign_from_id($id);
        $data['all_artists'] = $this->Model_campaign->list_artists_campaign($id);
        $data['section'] = "campaign";
        
        $this->load->view("/campaign/list_artists_per", $data);
    }
    
    function campaign_add () {
        $title = $_POST['campaign-title'];
        $desc = $_POST['campaign-desc'];
        $picture = basename($_FILES['campaign-picture']['name']);
        $upload = $this->Model_campaign->upload();
        $picture = UPLOAD_PATH."campaign/".$upload["upload_data"]["file_name"];
        $picture = substr($picture, 1);
        
        $data = array(
                            "title" => $title,
                            "desc" => $desc,
                            "picture" => $picture
                      );
        $result = $this->Model_campaign->insert_campaign($data);
        
        if (($result == TRUE)&&($upload != FALSE)) {
            redirect(BASE_URL."/campaign/add/success");
        } else {
            redirect(BASE_URL."/campaign/add/problem");
        }
    }
    
    function campaign_update ($id) {
        //die(var_dump($_FILES["campaign-picture"]["error"]));
        $title = $_POST['campaign-title'];
        $desc = $_POST['campaign-desc'];
        $picture = basename($_FILES['campaign-picture']['name']);
        $round = $_POST['campaign-round'];
        $active = $_POST['campaign-active'];
        if (strlen($picture) > 0) {
            if ((substr($picture, 0, strlen(UPLOAD_PATH)) != UPLOAD_PATH) || ($_FILES["campaign-picture"]["error"] != 0)) {
                $upload = $this->Model_campaign->upload();
                $picture = UPLOAD_PATH."campaign/".$upload["upload_data"]["file_name"];
                $picture = substr($picture, 1);
            } 
        } else {
            $picture = $this->Model_campaign->get_campaign_picture($id);
            $upload = TRUE;
        }
        
        $data = array(
                            "campaign_id" => $id,
                            "title" => $title,
                            "desc" => $desc,
                            "picture" => $picture,
                            "round" => $round,
                            "active" => $active
                      );
        $result = $this->Model_campaign->update_campaign($data);
        
        if (($result == TRUE)&&($upload != FALSE)) {
            redirect(BASE_URL."/campaign/edit/$id/success");
        } else {
            redirect(BASE_URL."/campaign/edit/$id/problem");
        }
    }
    
    function campaign_add_artist () {
        $campaign = $_POST['campaign'];
        $artist = $_POST['artist'];
        $data = array(
            "campaign_id" => $campaign,
            "artist_id" => $artist
        );
        $result = $this->Model_campaign->add_artist_campaign($data);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/campaign/add_artist/success");
        } else {
            redirect(BASE_URL."/campaign/add_artist/problem");
        }
    }
    
    function campaign_remove_artist () {
        $campaign = $_POST['campaign'];
        $artist = $_POST['artist'];
        $data = array(
            "campaign_id" => $campaign,
            "artist_id" => $artist
        );
        $result = $this->Model_campaign->remove_artist_campaign($data);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/campaign/add_artist/success");
        } else {
            redirect(BASE_URL."/campaign/add_artist/problem");
        }
    }
    
    function all_artists ($id) {
        $result = $this->Model_campaign->list_artists_campaign($id);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/campaign/add_artist/success");
        } else {
            redirect(BASE_URL."/campaign/add_artist/problem");
        }
    }
}