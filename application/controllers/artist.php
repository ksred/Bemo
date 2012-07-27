<?php
class Artist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model("Model_artist");
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
        die(var_dump($upload));
        
        if ($result == TRUE) {
            redirect("/admin/artist_add/success");
        } else {
            redirect("/admin/artist_add/problem");
        }
    }
}
?>
