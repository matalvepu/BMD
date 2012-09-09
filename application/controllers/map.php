<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {


        function __construct()
	{
		parent::__construct();
		$this->init();
	}
        function init()
	{
		if( $this->session->userdata('language') ==FALSE)
                     $this->session->set_userdata('language', 'bangla');
	}

        
	public function index()
	{

            $this->view();
  	}

function view()
{
    	        $this->load->view('eng_segments/normal_head');
                if( $this->session->userdata('language')=='bangla')
                 {
                        $logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
                     $this->load->view('eng_segments/logo',$logodata);

                     $this->load->view('eng_segments/top_navigation',nav_load('bangla','map'));
                                     $this->load->view('bng_bodies/map_view');
                     }
                 else
                 {
                     $logodata['title']='Bangladesh Agrometeorology Department';
                     $this->load->view('eng_segments/logo',$logodata);

                                  $this->load->view('eng_segments/top_navigation',nav_load('english','map'));

                $this->load->view('eng_bodies/map_view');
                 }
		$this->load->view('eng_segments/footer');


}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */