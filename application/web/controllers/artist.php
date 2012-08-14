<?php
class Artist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_artist");
        
	$name = $this->session->userdata('name');
	if (!$name) :
		header("Location: /construction");
	endif;
    }   

    function index()
    {
        
    }
    
    function add () {
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
    
    function update ($id) {
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
            redirect(BASE_URL."/admin/artist_edit/$id/success");
        } else {
            redirect(BASE_URL."/admin/artist_edit/$id/problem");
        }
    }
}
?>
