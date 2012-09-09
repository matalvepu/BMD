<?php
class Forecast extends CI_Controller
{
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
function index()
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
                     $this->load->view('eng_segments/top_navigation',nav_load('bangla','forecast'));

                 }
                 else
                 {
                     $logodata['title']='Bangladesh Agrometeorology Department';
                     $this->load->view('eng_segments/logo',$logodata);
                     $this->load->view('eng_segments/top_navigation',nav_load('english','forecast'));


                 }


                 $this->load->view('eng_bodies/show_forecast');
		$this->load->view('eng_segments/footer');


}


function success_view($data)
{
     $this->load->view('eng_segments/color_head');


                if( $this->session->userdata('language')=='bangla')
                 {
                        $logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
                     $this->load->view('eng_segments/logo',$logodata);

                     $this->load->view('eng_segments/top_navigation',nav_load('bangla','forecast'));

                     }
                 else
                 {
                     $logodata['title']='Bangladesh Agrometeorology Department';
                     $this->load->view('eng_segments/logo',$logodata);

                                  $this->load->view('eng_segments/top_navigation',nav_load('english','forecast'));


                 }

    $this->load->view('eng_bodies/view_forecast_img',$data);
		$this->load->view('eng_segments/footer');


}


function submit()
{
	

	$this->load->library('form_validation');
	$this->form_validation->set_rules('division', 'division', 'required');
	$this->form_validation->set_rules('date', 'date', 'required');
	$date=$this->input->post('date');
	$division=$this->input->post('division');

	if(($this->form_validation->run()==False))
	{
            $this->view();
         }
	else
	{

                if($division=="WholeCountry")
                {
                         $data['path']="Forecast_img/".$division."/".$division."_".str_replace("/", "",$date).".jpg";
                         $data['wc']=TRUE;
                         
                         if(file_exists($data['path']) == TRUE)
                            {
                             $data['nf'] = false;
                            }
                         else
                            {
                                                    $data['nf'] = true;
                            }
                }
                else
                {
                            $data['path1']="Forecast_img/".$division."/".$division."_day_1_".str_replace("/", "",$date).".jpg";
                            $data['path2']="Forecast_img/".$division."/".$division."_day_2_".str_replace("/", "",$date).".jpg";
                            $data['path3']="Forecast_img/".$division."/".$division."_day_3_".str_replace("/", "",$date).".jpg";

                         if(!file_exists($data['path1']))
                            $data['nf'] = TRUE;
                          
                }

                $this->success_view($data);
               }
}


}