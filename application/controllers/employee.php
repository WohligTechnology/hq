<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Employee extends CI_Controller 
{
    
//	public function __construct( )
//	{
//		parent::__construct();
//		
//	}
    public function setDateOfQuestionTobeSend()
    {
        $testdata=$this->db->query("SELECT * FROM `test`")->result();
        if(empty($testdata))
        {
            foreach($testdata as $key=>$value)
            {
                $testid=$value->id;
                $unit=$value->unit;
                $check=$value->check;
                $startdate=$value->startdate;
                
                $testquestiondata=$this->db->query("SELECT * FROM `testquestion` WHERE `test`='$testid' AND `sendstatus`=0")->result();
                if(empty($testquestiondata))
                {
                }
                else
                {
                    foreach($testquestiondata as $row)
                    {
                        
                        $updatequery=$this->db->query("UPDATE `testquestion` SET");
                    }
                }
            }
        }
        else
        {
            return 0;
        }
    
    }
    public function sendquestion()
    {
        echo "in send";
//        $today=date("Y-m-d");
        
        $todaydate=date("Y-m-d");    
        $todaydatetime=date("Y-m-d h:i:s");    
        $date = new DateTime($todaydatetime);
//        $date->add(new DateInterval('PT48H'));
//        echo $todaydate."\n";
//        echo $date->format('Y-m-d H:i:s') . "\n";
        
        echo $todaydatetime;
        $q="SELECT * FROM `test` WHERE `startdate`>='$todaydatetime' AND `enddate`<='$todaydatetime'";
//        echo $q;
        $testdata=$this->db->query("SELECT * FROM `test` WHERE `startdate`<='$todaydatetime' AND `enddate`>='$todaydatetime'")->result();
//        print_r($testdata);
        if(!empty($testdata))
        {
            echo "not empty";
            foreach($testdata as $key=>$value)
            {
                $testid=$value->id;
                $unit=$value->units;
                $check=$value->check;
                $startdate=$value->startdate;
                $schedule=$value->schedule;
                
                $totalhours=$schedule*24;
                $calculatedhour=intval($totalhours/$unit);
                $qq="SELECT * FROM `testquestion` WHERE `test`='$testid' AND `datetimestatus`=0";
//                echo $qq;
                $selecttestquestion=$this->db->query("SELECT * FROM `testquestion` WHERE `test`='$testid' AND `datetimestatus`=0")->result();
                if(!empty($selecttestquestion))
                {
//                    $changeddate=$date;
                    $updateddate=$startdate." 00:00:00";
                    foreach($selecttestquestion as $row1)
                    {
                        echo $updateddate;
                        $questionid=$row1->question;
                        $testid=$row1->test;
                        $updatequery=$this->db->query("UPDATE `testquestion` SET `dateandtime`='$updateddate',`datetimestatus`=1 WHERE `datetimestatus`=0 AND `test`='$testid' AND `question`='$questionid'");
                        $updateddate=date('Y-m-d H:i:s',strtotime("+$calculatedhour hour",strtotime($updateddate)));
                        echo $updatedate."\n";
//                    $date = new DateTime($updateddate);
//                        $updateddate=$date->add(new DateInterval("PT".$calculatedhour."H"));
                        
                    }
                }
//                $alreadysendquestion=$this->db->quertion("SELECT * FROM `testquestion` WHERE `test`='$testid' AND `sendstatus`=1 ORDER BY `id` DESC")->row();
                $todaysdatetime=date("Y-m-d h:i:s");
                $sendq=$this->db->query("SELECT * FROM `testquestion` WHERE `test`='$testid' AND `sendstatus`=0 AND `dateandtime`<='$todaysdatetime'")->row();
                if(!empty($sendq))
                {
                    echo "SELECTED ATLEAST ONE QUESTION ";
                    $testquestionid=$sendq->id;
                    $question=$sendq->question;
                    $test=$sendq->test;
                    $questiondata=$this->db->query("SELECT * FROM `hq_question` WHERE `id`='$question'")->row();
                    echo "Check-".$check;
                    $userwhere="";
                    if($check==1)
                    {
                        $userwhere="";
                    }
                    else if($check==2)
                    {
                        $branchid=$value->branch;
                        $userwhere=" AND `user`.`branch`='$branchid' ";
                    }
                    else if($check==3)
                    {
                        $departmentid=$value->department;
                        $userwhere=" AND `user`.`department`='$departmentid' ";
                    }
                    else if($check==4)
                    {
                        $teamid=$value->team;
                        $userwhere=" AND `user`.`team`='$teamid' ";
                    }
                    else
                    {
                        $userwhere="";
                    }

                    $userdata=$this->db->query("SELECT * FROM `user` WHERE `user`.`accesslevel`=4 $userwhere")->result();

                    foreach($userdata as $key=>$userval)
                    {
                        $userid=$userval->id;
                        $useremail=$userval->email;



                        $this->load->library('email');
                        $this->email->from('avinash@wohlig.com', 'HQ');
                        $this->email->to($useremail);
                        $this->email->subject('Welcome to HQ');   

                        $hashvalue=base64_encode ($userid."&".$testid."&".$question."&hq");
                        $link="<a href='http://localhost/hq/index.php/employee/answerquestion?asqy=$hashvalue'>Click here </a> To Answer the Question.";

                        $message = "Hello Please Answer the question.<br> $link";
                        $this->email->message($message);
                        if($this->email->send())
                        {
                            $addtouserquestionsend=$this->db->query("INSERT INTO `userquestionsend`(`user`, `test`, `question`, `timestamp`) VALUES ('$userid','$testid','$question',NULL)");
                        }

                    }

                    $updatequery=$this->db->query("UPDATE `testquestion` SET `sendstatus`=1 WHERE `id`='$testquestionid'");
                }
                else
                {
                    echo "SELECTED 0 QUESTION";
                    return 0;
                }
                print_r($userdata);
//                $testquestiondata=$this->db->query("SELECT * FROM `testquestion` WHERE `test`='$testid' AND `sendstatus`=0");
            }
        }
        else
        {
            
            echo "empty";
            return 0;
        }
    }
    
    public function answerquestion()
    {
        $hash=$this->input->get('asqy');
        $normalfromhash=base64_decode ($hash);
        $returnvalue=explode("&",$normalfromhash);
        $userid=$returnvalue[0];
        $testid=$returnvalue[1];
        $questionid=$returnvalue[2];
        
        $userdata=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
        $username=$userdata->name;
        $useremail=$userdata->email;
        
            $newdata = array(
                'email'     => $useremail,
                'logged_in' => true,
                'id'=> $userid
            );

            $this->session->set_userdata($newdata);
        $data['testdata']=$this->test_model->gettestdatabyid($testid);
        $data['questiondata']=$this->question_model->getquestiondatabyid($questionid);
        
//        $data["user"]=$this->user_model->getuserdropdown();
//        $data["pillar"]=$this->pillar_model->getpillardropdown();
//        
//        $data['test'] = $this->test_model->gettestdropdown();
//        $data['question'] = $this->menu_model->getquestionbytest($testid,$data['questiondata']->pillar);
//        $data['question'] = $this->chintantable->todropdown($data['question']);
//        $data['option'] = $this->menu_model->getoptionbyquestion($data['before']->option);
//        $data['option'] = $this->chintantable->todropdown($data['option']);
//        $data['userid']=$userid; 
//        $data["page"]="edituseranswerbyemployee";
//        $this->load->view("template",$data);
//        $data['options']=$this->options_model->getoptionsbyquestionid($optionsid);
        print_r($data);
    }
    
    public function sendquestionsss()
    {
        $calculatedhour=20;
    $todaydate=date("Y-m-d h:i:s");    
$date = new DateTime($todaydate);
$date->add(new DateInterval("PT".$calculatedhour."H"));
        echo $todaydate."\n";
echo $date->format('Y-m-d H:i:s') . "\n";
        $updateddate=date('Y-m-d H:i',strtotime("+$calculatedhour hour",strtotime($todaydate)));
        echo "hello".$updateddate;
//        $this->load->helper('date');
//        echo "in send";
////        date_default_timezone_set('UTC + 5:30');
//        $today=date("Y-m-d h:i:s");
//        echo $today;
    }
    
    
    
}
?>

