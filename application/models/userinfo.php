<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserInfo  extends CI_Model
{
   
    private function process($str)
    {
         return sha1($str.$this->config->item('encryption_key'));
    }

    function validate($id,$pass)
    {

                $this->db->where('id', $id);
		$this->db->where('password',  $this->process($pass));
		$query = $this->db->get('userInfo');

		if($query->num_rows == 1)
		{
			return true;
		}
                return FALSE;
    }
 
}



?>