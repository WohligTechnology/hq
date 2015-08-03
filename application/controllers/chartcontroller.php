<?php 
if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Chartcontroller extends CI_Controller 
{
    
    
    public function barchartjsononhrdashboaard()
    {
        $pillarsdata=$this->menu_model->drawpillarjsononhrdashboaard();
        $data['weightgraph']=$pillarsdata;
//        print_r($pillarsdata);
//        $pillarsdataofteam=$this->menu_model->getweightofpillarsbyteam($userid);
//        $data['weightgraphbyteam']=$pillarsdataofteam;
        
        $this->load->view('hrchartondashboard',$data);
        
    }
    
    public function barchartjson()
    {
//        $userid=7;
        $check=$this->input->get_post('check');
        $departmentid=$this->input->get_post('departmentid');
        $teamid=$this->input->get_post('teamid');
        $organization=$this->input->get_post('organization');
        $branchid=$this->input->get_post('branchid');
        
        $pillarsdata=$this->menu_model->drawpillarjson($check,$departmentid,$teamid,$organization,$branchid);
        $data['weightgraph']=$pillarsdata;
        print_r($pillarsdata);
//        $pillarsdataofteam=$this->menu_model->getweightofpillarsbyteam($userid);
//        $data['weightgraphbyteam']=$pillarsdataofteam;
        
        $this->load->view('hrchart',$data);
        
    }
    
 public function forgotpassword()
    {
        
        //set POST variables
        $email=$this->input->get_post('email');
        $userid=$this->user_model->getidbyemail($email);
        if($userid=="")
        {
            $data['message']="Not A Valid Email.";
            $this->load->view("json",$data);
        }
        else
        {
            $hashvalue=base64_encode ($userid."&hq");
            $link="<a href='http://www.localhost/hq/index.php/user/ghghghh/$hashvalue'>Click here </a>";

            $data['message']=$result;
            $this->load->view("json",$data);
        }
    }
    
    public function sendquestion()
    {
        $questionid=$this->input->get('question');
        $this->menu_model->sendquestiontousers($questionid);
    }
    
    
    
    
    
    //charts
    public function barchart()
    {
        $userid=7;
        $pillarsdata=$this->menu_model->getweightofpillarsbyuser($userid);
        $data['weightgraphbyuser']=$pillarsdata;
        print_r($pillarsdata);
//        $pillarsdataofteam=$this->menu_model->getweightofpillarsbyteam($userid);
//        $data['weightgraphbyteam']=$pillarsdataofteam;
        
        $this->load->view('chartshow',$data);
        
//        $query=$this->db->query("select * from `category` LIMIT 0,10")->result();
////    print_r($query);
//        $array=array();
//        foreach ($query as $row)
//        {
//            $id=$row->id;
////            echo $id;
//            array_push($array,$id);
//        }
//        $data['category']=$array;
////    print_r($data);
//        $this->load->view('pichart3d',$data);
    }

   
} 
?>