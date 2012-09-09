<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gmap extends CI_Controller {

	public function index()
	{
            $this->load->view('eng_segments/normal_head');
            $this->load->view('eng_segments/logo');
            $this->load->view('eng_segments/top_navigation');
            $this->load->view('eng_bodies/gmap_view');
            $this->load->view('eng_segments/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */