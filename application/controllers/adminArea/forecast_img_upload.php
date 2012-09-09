<?php
class Forecast_img_upload extends CI_Controller
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
	
    // Has the form been posted?
	  /* $this->load->view('eng_segments/normal_head');
		$this->load->view('eng_segments/logo');
		$this->load->view('eng_segments/top_navigation');
		$this->load->view('adminBodies/forecast_img_upload_form');
		$this->load->view('eng_segments/footer');*/
		
		$this->load->view('eng_segments/normal_head');
		$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
		$this->load->view('eng_segments/logo',$logodata);
		$this->load->view('adminBodies/top_navigation');
		$this->load->view('adminBodies/forecast_img_upload_form');
		$this->load->view('eng_segments/footer');
	
}

function multiplefile()
{
	

	$this->load->library('form_validation');
	$this->form_validation->set_rules('division', 'division', 'required');
	$this->form_validation->set_rules('date', 'date', 'required');
	$date=$this->input->post('date');
	$division=$this->input->post('division');
	
	

	if(($this->form_validation->run()==False)|| empty($_FILES['day1']['name'])
	||empty($_FILES['day2']['name'])||empty($_FILES['day3']['name']) )
	{
		$data['msg']="সবগুলো ফিল্ড পূর্ণ করুন";
		/*$this->load->view('eng_segments/normal_head');
		$this->load->view('eng_segments/logo');
		$this->load->view('eng_segments/top_navigation');
		$this->load->view('adminBodies/forecast_img_upload_form',$data);
		$this->load->view('eng_segments/footer');*/
		$this->load->view('eng_segments/normal_head');
		$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
		$this->load->view('eng_segments/logo',$logodata);
		$this->load->view('adminBodies/top_navigation');
		$this->load->view('adminBodies/forecast_img_upload_form',$data);
		$this->load->view('eng_segments/footer');
		
	
	}
	else
	{
	
			if (isset($_POST['submit']))
			{
				
				
				$this->load->library('upload');
		 
				// Check if there was a file uploaded - there are other ways to
				// check this such as checking the 'error' for the file - if error
				// is 0, you are good to code
				for($i=1;$i<4;$i++)
				{
				
					if (!empty($_FILES['day'.$i]['name']))
					{
						
						$config=array(
							  'allowed_types'=>'jpg|jpeg|png|gif',
							  'overwrite'=>true,
							  'file_name'=>$division.' day '.$i.' '.$date,
							  'upload_path'=>realpath(APPPATH.'../Forecast_img')."/".$division		  		
							);
		    
			 
						// Initialize config for File 1
						$this->upload->initialize($config);
			 
						// Upload file 1
						if ($this->upload->do_upload('day'.$i))
						{
							$data = $this->upload->data();
						}
						else
						{
							echo $this->upload->display_errors();
						}
			 
					}
					
				}
		 
			  
			}
			else
			{
				/*$this->load->view('eng_segments/normal_head');
				$this->load->view('eng_segments/logo');
				$this->load->view('eng_segments/top_navigation');
				$this->load->view('adminBodies/forecast_img_upload_form');
				$this->load->view('eng_segments/footer');*/
				$this->load->view('eng_segments/normal_head');
				$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
				$this->load->view('eng_segments/logo',$logodata);
				$this->load->view('adminBodies/top_navigation');
				$this->load->view('adminBodies/forecast_img_upload_form');
				$this->load->view('eng_segments/footer');
			}
	}
}

}