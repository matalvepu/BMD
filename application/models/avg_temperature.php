<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Avg_temperature  extends CI_Model
{
          
          function getTemp($did,$day,$month)
          {
                        $query="SELECT maxtemp,mintemp FROM avg_temperature WHERE did = ? AND tdate=? AND tmonth=?";
                        $q = $this->db->query($query,array($did,$day,$month));
                         $row = $q->row();

                         return $row;
                        //foreach ()
                        //print_r ($query->row(1));
          }
}



?>