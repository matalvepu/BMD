<?php
class Welcome_msg extends CI_Controller
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
		$this->load->model('welcome_msg_model');
		$msg=$this->welcome_msg_model->getall();
		$data['firstname']=$msg['0']->firstname;
		$data['lastname']=$msg['0']->lastname;
		$data['designation']=$msg['0']->designation;
		$data['message']=$msg['0']->message;
		$data['main_content']='welcome_msg_form';
		
		/*$this->load->view('eng_segments/normal_head');
		$this->load->view('eng_segments/logo');
		$this->load->view('eng_segments/top_navigation');
		$this->load->view('adminBodies/welcome_msg_form',$data);
		$this->load->view('eng_segments/footer');*/
		
		 $this->load->view('eng_segments/normal_head');
		$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
		$this->load->view('eng_segments/logo',$logodata);
		$this->load->view('adminBodies/top_navigation');
		$this->load->view('adminBodies/welcome_msg_form',$data);
		$this->load->view('eng_segments/footer');

		
	}
	
	function show_welcomemsg()
	{
		$this->load->model('welcome_msg_model');
		$msg=$this->welcome_msg_model->getall();
		$data['firstname']=$msg['0']->firstname;
		$data['lastname']=$msg['0']->lastname;
		$data['designation']=$msg['0']->designation;
		$data['message']=$msg['0']->message;
		
		$data['images']=$this->welcome_msg_model->get_image();
		
		
		/*$this->load->view('eng_segments/normal_head');
		$this->load->view('eng_segments/logo');
		$this->load->view('eng_segments/top_navigation');
		$this->load->view('bng_bodies/show_welcome_msg',$data);
		$this->load->view('eng_segments/footer');*/
		
		$this->load->view('eng_segments/normal_head');
		$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
		$this->load->view('eng_segments/logo',$logodata);
		$this->load->view('adminBodies/top_navigation');
		$this->load->view('bng_bodies/show_welcome_msg',$data);
		$this->load->view('eng_segments/footer');

		
	}
	
	
	function insert_msg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','Firstname required','trim|required');
		$this->form_validation->set_rules('lastname','Lastname required','trim|required');
		$this->form_validation->set_rules('designation','Designation required','trim|required');
		$this->form_validation->set_rules('message','Message required','trim|required');
		if($this->form_validation->run()==False)
		{
			
			$this->load->view('eng_segments/normal_head');
			$logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
			$this->load->view('eng_segments/logo',$logodata);
			$this->load->view('adminBodies/top_navigation');
			$this->load->view('adminBodies/welcome_msg_form',$data);
			$this->load->view('eng_segments/footer');
		}
		else
		{
			
			$this->load->model('welcome_msg_model');
			if($this->input->post('upload'))
			{
			
			 $this->welcome_msg_model->do_upload();
			}
			$this->welcome_msg_model->insertmsg();
			$this->show_welcomemsg();
		}
	}
	
}

