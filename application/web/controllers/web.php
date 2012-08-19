<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	
	function __construct()
	{
	    parent::__construct();
	}   

	public function index()
	{
	     $role =  $this->session->userdata('role');
		if ($role != 1) redirect(BASE_URL."/web/construction");
	    
		$data['title'] = "Bemo";
                $this->load->database("default", TRUE);
		
		$this->load->Model("Model_campaign");
		$latest = $this->Model_campaign->get_latest_active_campaign();
		$latest_artists = $this->Model_campaign->get_top_artists_campaign($latest->campaign_id, 10);
		$data['campaign'] = $latest;
		$data['campaign_artist'] = $latest_artists;
		$this->load->view("/web/index", $data);
	}
	
	function construction () {
		$data['title'] = "Bemo!fm";
		$this->load->view('construction');
	}
	
	function vote() {
		$artist_id = $_POST['artist_id'];
		$campaign_id = $_POST['campaign_id'];
		$round = $_POST['round_id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$this->load->Model("Model_vote");
		$result = $this->Model_vote->submit_vote($artist_id, $campaign_id, $round, $ip);
		if ($result) {
			echo "TRUE";
		} else {
			echo "FALSE";
		}
	}
}

/* End of file web.php */
/* Location: ./application/controllers/web.php */