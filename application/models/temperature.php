<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Temperature  extends CI_Model
{
            /*GET LAST WEEK DATA*/
          function glwd($did)
          {
                        $query="SELECT tdate,maxtemp,mintemp FROM temperature WHERE did = ? ORDER BY tdate DESC LIMIT 0,7";
                        $q = $this->db->query($query,$did);
                        //return $query->result();
                        if($q->num_rows() > 0) // data available
                        {
                                foreach($q->result() as $row)
                                {
                                        //foreach ($row as $col)
                                        $rdata[] = $row;
                                }
                                //print_r()

                                //array_reverse($rdata);
                                return array_reverse($rdata);
                        }
                        else
                        {
                            return NULL;
                        }
                        //foreach ()
                        //print_r ($query->row(1));
          }
}



?>