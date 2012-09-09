<?php
class Forecast_img_Wcountry_upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
    function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
                    echo "YOU ARE NOT LOGGED IN !! PLEASE LOGIN IN!!";
                    redirect('adminArea', 'refresh');
		}
	}

	function index()
	{
		/*$this->load->view('eng_segments/normal_head');
		$this->load->view('eng_segments/logo');
		$this->load->view('eng_segments/top_navigation');
		$this->load->view('adminBodies/forecast_img_Wcountry_form');
		$this->load->view('eng_segments/footer');*/
		$this->load->view('eng_segments/normal_head');
		$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
		$this->load->view('eng_segments/logo',$logodata);
		$this->load->view('adminBodies/top_navigation');
		$this->load->view('adminBodies/forecast_img_Wcountry_form');
		$this->load->view('eng_segments/footer');
	}

   function uploadfile()
	{
		
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'date', 'required');
		$date=$this->input->post('date');
		if(($this->form_validation->run()==False)|| empty($_FILES['wholecountry']['name']))
		{
			
			$data['msg']="সবগুলো ফিল্ড পূর্ণ করুন";
			/*$this->load->view('eng_segments/normal_head');
			$this->load->view('eng_segments/logo');
			$this->load->view('eng_segments/top_navigation');
			$this->load->view('adminBodies/forecast_img_Wcountry_form',$data);
			$this->load->view('eng_segments/footer');*/
			$this->load->view('eng_segments/normal_head');
			$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
			$this->load->view('eng_segments/logo',$logodata);
			$this->load->view('adminBodies/top_navigation');
			$this->load->view('adminBodies/forecast_img_Wcountry_form',$data);
			$this->load->view('eng_segments/footer');
				
		}
		
		else
		{
			if (isset($_POST['submit']))
			{
				
				
				$this->load->library('upload');
				if (!empty($_FILES['wholecountry']['name']))
					{
						
						$config=array(
							  'allowed_types'=>'jpg|jpeg|png|gif',
							  'overwrite'=>true,
							  'file_name'=>'WholeCountry '.$date,
							  'upload_path'=>realpath(APPPATH.'../Forecast_img')."/".'WholeCountry'		  		
							);
		    
			 
						// Initialize config for File 1
						$this->upload->initialize($config);
			 
						// Upload file 1
						if ($this->upload->do_upload('wholecountry'))
						{
							$data = $this->upload->data();
						}
						else
						{
							echo $this->upload->display_errors();
						}
					}
				
				
		 
			}
			
			else
			{
				/*$this->load->view('eng_segments/normal_head');
				$this->load->view('eng_segments/logo');
				$this->load->view('eng_segments/top_navigation');
				$this->load->view('adminBodies/forecast_img_Wcountry_form');
				$this->load->view('eng_segments/footer');*/
				$this->load->view('eng_segments/normal_head');
				$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
				$this->load->view('eng_segments/logo',$logodata);
				$this->load->view('adminBodies/top_navigation');
				$this->load->view('adminBodies/forecast_img_Wcountry_form');
				$this->load->view('eng_segments/footer');
			
		
			}
			
			
		}
		
		
	}

}