<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comparison extends CI_Controller {

	public function index()
	{
            $this->view();
	}

        function view()
        {
                      $this->prepare();
    	         if( $this->session->userdata('language')=='bangla')
                 {

                     $logodata['title']="বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস";
                     $this->load->view('eng_segments/logo',$logodata);
                     $this->load->view('eng_segments/top_navigation',nav_load('bangla','map'));

                     }
                 else
                 {
                     $logodata['title']='Bangladesh Agrometeorology Department';
                     $this->load->view('eng_segments/logo',$logodata);
                     $this->load->view('eng_segments/top_navigation',nav_load('english','map'));

                 }


            $this->load->view('eng_bodies/comparison_view');
            $this->load->view('eng_segments/footer');

        }

        function prepare()
        {
            $this->load->model('division_info');


            if ($this->input->post('division')==NULL)
                    $division="Dhaka";
            else 
                $division= $this->input->post('division');

            $did = $this->division_info->get_did($division);

if( $this->session->userdata('language')=='bangla')
    $table = "[['তারিখ', 'সর্বোচ্চ তাপমাত্রা', 'গড় সর্বোচ্চ তাপমাত্রা','গড় সর্বনিম্ন তাপমাত্রা','সর্বনিম্ন তাপমাত্রা']" ;
else
    $table = "[['Date', 'Maximum', 'Avg. Maximum','Minimum','Avg. Minimum']" ;

            $this->load->model('temperature');
            $this->load->model('avg_temperature');

            //last week data
            $res= $this->temperature->glwd($did);

            $count =  count($res);

            for($i=0;$i<$count;$i++)
            {
                 //[2004,  1000,      400,  1000,      400],
                $atoms = explode('-',$res[$i]->tdate);
                $year = $atoms[0];
                $month = $atoms[1];
                $day = $atoms[2];

                $row =  $this->avg_temperature->getTemp($did,$day,$month);

                $table.=",[";

                $table .=  "'".date("M-d",  mktime(0,0,0,$month,$day,$year))."'";

                $table.=",";

                $table .=   $res[$i]->maxtemp;

                $table.=",";

                $table.= $row->maxtemp;

                $table.=",";

                $table .=  $res[$i]->mintemp;

                $table.=",";

               $table.= $row->mintemp;
                           $table .= "]";

                }
            $table .= "]";

            $data['table']=$table;
            $data['title']="Comparison of temperature in $division";

$this->load->view('eng_segments/chart',  $data);
        }


        function prepareBN()
        {
            $this->load->model('division_info');


            if ($this->input->post('division')==NULL)
                    $division="Dhaka";
            else
                $division= $this->input->post('division');

            $did = $this->division_info->get_did($division);
            $table = "[['তারিখ', 'সর্বোচ্চ', 'গড় Maxmum','Minimum','Avg. Minimum']" ;


            $this->load->model('temperature');
            $this->load->model('avg_temperature');

            $res= $this->temperature->glwd($did);

            $count =  count($res);

            for($i=0;$i<$count;$i++)
            {
                 //[2004,  1000,      400,  1000,      400],
                $atoms = explode('-',$res[$i]->tdate);
                $year = $atoms[0];
                $month = $atoms[1];
                $day = $atoms[2];

                $row =  $this->avg_temperature->getTemp($did,$day,$month);

                $table.=",[";

                $table .=  "' বাংলা".date("M-d",  mktime(0,0,0,$month,$day,$year))."'";

                $table.=",";

                $table .=   $res[$i]->maxtemp;

                $table.=",";

                $table.= $row->maxtemp;

                $table.=",";

                $table .=  $res[$i]->mintemp;

                $table.=",";

               $table.= $row->mintemp;
                           $table .= "]";

                }
            $table .= "]";

            $data['table']=$table;
            $data['title']="তাপমাত্রা তুলনা";

            return $data;
        }
}
