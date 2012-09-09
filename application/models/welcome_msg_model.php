<?php
class Welcome_msg_model extends CI_Model
{
	var $gallery_path;
	
        function __construct()
        {
            parent::__construct();
                    $this->gallery_path=realpath(APPPATH.'../welcomeimg');
                    $this->gallery_path_url=base_url().'welcomeimg/';

        }
		
		
	function getall()
	{
		$q=$this->db->query("SELECT * From wcmessage where id=2");
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				
				$data[]=$row;
				
				
			}
			
		 return $data;	
		}
	}
	
	
	function do_upload()
	{
		$config=array(
		  'allowed_types'=>'jpg|jpeg|png|gif',
		  'overwrite'=>true,
		  'file_name'=>'welcome',
		  'upload_path'=>$this->gallery_path		  		
		);
		
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data=$this->upload->data();
		
		$config=array(
		'source_image'=>$image_data['full_path'],
		'new_image'=>$this->gallery_path . '/thumb',
		'maintain_ration'=>true,
		'width'=>150,
		'height'=>100
		);
		$this->load->library('image_lib',$config);
		
		
		$this->image_lib->resize();
		
		
		
	}
	function insertmsg()
	{
		$q=$this->db->query("SELECT * From wcmessage where id=2");
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				
				$temp[]=$row;
				
				
			}
			
		 
		}
		
			
	   
	    $data = array(
               'firstname' =>$this->input->post('firstname') ,
               'lastname' => $this->input->post('lastname'),
               'designation' => $this->input->post('designation'),
			   'message'=>$this->input->post('message')
            );

		$this->db->where('id', $temp['0']->id);
		$this->db->update('wcmessage', $data); 
	   
	   
	}
	
	function get_image()
	{
		
		
		
		$files=scandir($this->gallery_path);
		$files=array_diff($files,array('.','..','thumb'));
		$images=array();
		foreach($files as $file)
		{
			$images[]=array(
			   'url'=>$this->gallery_path.$file,
			   'thumb_url'=> $this->gallery_path_url.'thumb/'.$file
			);
			
		}
		return $images;
	}
	
}