<?php

class Pages extends CI_Controller {

public function view($page = 'home')
{
	$role =  $this->session->userdata('role');
        if ($role != 1) redirect(BASE_URL);
			
	if ( ! file_exists('application/views/pages/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
	$data['title'] = ucfirst($page); // Capitalize the first letter
	
	$this->load->view('pages/'.$page, $data);

}

}

