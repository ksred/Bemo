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

    function index()
    {
        
    }
    
    function add () {
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
            redirect(BASE_URL."/admin/campaign_add/success");
        } else {
            redirect(BASE_URL."/admin/campaign_add/problem");
        }
    }
    
    function update ($id) {
        //die(var_dump($_FILES["campaign-picture"]["error"]));
        $title = $_POST['campaign-title'];
        $desc = $_POST['campaign-desc'];
        $picture = basename($_FILES['campaign-picture']['name']);
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
                            "id" => $id,
                            "title" => $title,
                            "desc" => $desc,
                            "picture" => $picture
                      );
        $result = $this->Model_campaign->update_campaign($data);
        
        if (($result == TRUE)&&($upload != FALSE)) {
            redirect(BASE_URL."/admin/campaign_edit/$id/success");
        } else {
            redirect(BASE_URL."/admin/campaign_edit/$id/problem");
        }
    }
    
    function add_artist () {
        $campaign = $_POST['campaign'];
        $artist = $_POST['artist'];
        $data = array(
            "campaign_id" => $campaign,
            "artist_id" => $artist
        );
        $result = $this->Model_campaign->add_artist_campaign($data);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/admin/campaign_add_artist/success");
        } else {
            redirect(BASE_URL."/admin/campaign_add_artist/problem");
        }
    }
    
    function remove_artist () {
        $campaign = $_POST['campaign'];
        $artist = $_POST['artist'];
        $data = array(
            "campaign_id" => $campaign,
            "artist_id" => $artist
        );
        $result = $this->Model_campaign->remove_artist_campaign($data);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/admin/campaign_add_artist/success");
        } else {
            redirect(BASE_URL."/admin/campaign_add_artist/problem");
        }
    }
    
    function all_artists ($id) {
        $result = $this->Model_campaign->list_artists_campaign($id);
        
        if ($result == TRUE) {
            redirect(BASE_URL."/admin/campaign_add_artist/success");
        } else {
            redirect(BASE_URL."/admin/campaign_add_artist/problem");
        }
    }
}