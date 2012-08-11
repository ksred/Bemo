<?php
class Campaign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_campaign");
    }   

    function index()
    {
        $data['title'] = "Bemo Admin - Campaigns";
        $data['user'] = $this->session->userdata('name');
        $data['section'] = "campaign";
        $data['campaigns'] = $this->Model_campaign->get_active_campaigns();
        
        $latest = $this->Model_campaign->get_latest_active_campaign();
        $latest_artists = $this->Model_campaign->get_top_artists_campaign($latest->campaign_id, 5);
        var_dump($latest_artists);
        
        $this->load->view("/campaign/index", $data);
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