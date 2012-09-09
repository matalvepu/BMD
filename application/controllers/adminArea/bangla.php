<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bangla extends CI_Controller
{

 public function index()
 {
     $this->session->set_userdata('language', 'bangla');
     //echo $this->session->userdata('language');
     redirect(base_url());
 }
}
?>
