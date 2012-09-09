<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Division_info  extends CI_Model
{
    function get_did($division)
    {
        $query = "SELECT did FROM division_info WHERE name=?";

       $query = $this->db->query($query,$division);
         $row = $query->row();
        return $row->did;
    }
}
?>
