<?php
class Model_artist extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("default", TRUE);
        $this->load->helper('form');
    }
    
    function save_artist ($data) {
        $result = $this->db->insert("artist", $data);
        return $result;
    }
    
    function upload() {
        //die(var_dump($picture);
            $config['upload_path'] = UPLOAD_PATH."artist/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '500';
            $config['max_width']  = '1920';
            $config['max_height']  = '1920';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("artist-picture"))
            {
                    $error = array('error' => $this->upload->display_errors());
                    die(var_dump($error));
                    return FALSE;
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    return $data;
            }
    }
    
}
?>
