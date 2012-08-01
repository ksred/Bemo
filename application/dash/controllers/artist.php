<?php
class Artist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_artist");
        $role =  $this->session->userdata('role');
        if ($role != 1) redirect(BASE_URL);
    }   

    function index($var = FALSE)
    {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = $var;
        $data['section'] = "artist";
        
        $this->load->view("/artist/index", $data);
    }
    
    /*----------------------------Artist------------------------------------*/
    function add ($success = "null") {
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        $data['success'] = $success;
        $data['section'] = "artist";
        
        $this->load->view("/artist/add", $data);
    }
    
    function edit ($id = FALSE, $success = "null") {
        $this->load->Model("Model_artist");
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "edit";
        $data['id'] = $id;
        $data['success'] = $success;
        $data['section'] = "artist";
        
        if ($id != FALSE) {
            $data['artist'] = $this->Model_artist->list_single_artist($id);
            $this->load->view("/artist/edit", $data);
        } else {
            $data['all_artists'] = $this->Model_artist->list_artists();
            $this->load->view("/artist/list", $data);
        }
        
    }
    
    function list_all () {
        $this->load->Model("Model_artist");
        $data['title'] = "Bemo Admin - Artists";
        $data['user'] = $this->session->userdata('name');
        $data['var'] = "list";
        $data['all_artists'] = $this->Model_artist->list_artists();
        $data['section'] = "artist";
        
        $this->load->view("/artist/list", $data);
    }
    
    function artist_add () {
        //die(var_dump($_FILES));
        $name = $_POST['artist-name'];
        $desc = $_POST['artist-desc'];
        $picture = basename($_FILES['artist-picture']['name']);
        $social_yt = (isset($_POST['artist-social-yt'])) ? $_POST['artist-social-yt'] : "";
        $social_lf = (isset($_POST['artist-social-lf'])) ? $_POST['artist-social-lf'] : "";
        $social_vi = (isset($_POST['artist-social-vi'])) ? $_POST['artist-social-vi'] : "";
        $social_sc = (isset($_POST['artist-social-sc'])) ? $_POST['artist-social-sc'] : "";
        $social_bc = (isset($_POST['artist-social-bc'])) ? $_POST['artist-social-bc'] : "";
        $social_fb = (isset($_POST['artist-social-fb'])) ? $_POST['artist-social-fb'] : "";
        $social_tw = (isset($_POST['artist-social-tw'])) ? $_POST['artist-social-tw'] : "";
        $upload = $this->Model_artist->upload();
        $picture = UPLOAD_PATH."artist/".$upload["upload_data"]["file_name"];
        $picture = substr($picture, 1);
        
        $data = array(
                            "name" => $name,
                            "desc" => $desc,
                            "picture" => $picture,
                            "social_lastfm" => $social_lf,
                            "social_youtube" => $social_yt,
                            "social_vimeo" => $social_vi,
                            "social_soundcloud" => $social_sc,
                            "social_bandcamp" => $social_bc,
                            "social_facebook" => $social_fb,
                            "social_twitter" => $social_tw
                      );
        $result = $this->Model_artist->save_artist($data);
        
        if (($result == TRUE)&&($upload != FALSE)) {
            redirect(BASE_URL."/admin/artist_add/success");
        } else {
            redirect(BASE_URL."/admin/artist_add/problem");
        }
    }
    
    function artist_update ($id) {
        //die(var_dump($_FILES["artist-picture"]["error"]));
        $name = $_POST['artist-name'];
        $desc = $_POST['artist-desc'];
        $picture = basename($_FILES['artist-picture']['name']);
        $social_yt = (isset($_POST['artist-social-yt'])) ? $_POST['artist-social-yt'] : "";
        $social_lf = (isset($_POST['artist-social-lf'])) ? $_POST['artist-social-lf'] : "";
        $social_vi = (isset($_POST['artist-social-vi'])) ? $_POST['artist-social-vi'] : "";
        $social_sc = (isset($_POST['artist-social-sc'])) ? $_POST['artist-social-sc'] : "";
        $social_bc = (isset($_POST['artist-social-bc'])) ? $_POST['artist-social-bc'] : "";
        $social_fb = (isset($_POST['artist-social-fb'])) ? $_POST['artist-social-fb'] : "";
        $social_tw = (isset($_POST['artist-social-tw'])) ? $_POST['artist-social-tw'] : "";
        if (strlen($picture) > 0) {
            if ((substr($picture, 0, strlen(UPLOAD_PATH)) != UPLOAD_PATH) || ($_FILES["artist-picture"]["error"] != 0)) {
                $upload = $this->Model_artist->upload();
                $picture = UPLOAD_PATH."artist/".$upload["upload_data"]["file_name"];
                $picture = substr($picture, 1);
            } 
        } else {
            $picture = $this->Model_artist->get_artist_picture($id);
            $upload = TRUE;
        }
        
        
        $data = array(
                            "id" => $id,
                            "name" => $name,
                            "desc" => $desc,
                            "picture" => $picture,
                            "social_lastfm" => $social_lf,
                            "social_youtube" => $social_yt,
                            "social_vimeo" => $social_vi,
                            "social_soundcloud" => $social_sc,
                            "social_bandcamp" => $social_bc,
                            "social_facebook" => $social_fb,
                            "social_twitter" => $social_tw
                      );
        $result = $this->Model_artist->update_artist($data);
        
        if (($result == TRUE)&&($upload != FALSE)) {
            redirect(BASE_URL."/artist/edit/$id/success");
        } else {
            redirect(BASE_URL."/artist/edit/$id/problem");
        }
    }
}
?>