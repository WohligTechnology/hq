<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Menu_model extends CI_Model
{
	public function create($name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{ 
		date_default_timezone_set('Asia/Calcutta');
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		//print_r($data);
		
		$query=$this->db->insert( 'menu', $data );
		$menuid=$this->db->insert_id();
		if(! empty($menuaccess)) {
			foreach($menuaccess as $row)
			{
				$data  = array(
					'menu' => $menuid,
					'access' => $row,
				);
				$query=$this->db->insert( 'menuaccess', $data );
			}
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewmenu()
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon`,`menu`.`order` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent` 
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['menu']=$this->db->get( 'menu' )->row();
		$query['menuaccess']=array();
		$menu_arr=$this->db->query("SELECT `access` FROM `menuaccess` WHERE `menu`='$id' ")->result();
		foreach($menu_arr as $row)
		{
			$query['menuaccess'][]=$row->access;
	    }
		
		return $query;
	}
	
	public function edit($id,$name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'menu', $data );
		
		$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
		if(! empty($menuaccess)) {
		foreach($menuaccess as  $row)
		{
			$data  = array(
				'menu' => $id,
				'access' => $row,
			);
			$query=$this->db->insert( 'menuaccess', $data );
			
		} }
		return 1;
	}
	function deletemenu($id)
	{
		$query=$this->db->query("DELETE FROM `menu` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
	}
	public function getmenu()
	{
		$query=$this->db->query("SELECT * FROM `menu`  ORDER BY `id` ASC" )->result();
		$return=array(
		"" => ""
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	function viewmenus()
	{
        $accesslevel=$this->session->userdata( 'accesslevel' );
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent`  
        INNER  JOIN `menuaccess` ON  `menuaccess`.`menu`=`menu`.`id`
		WHERE `menu`.`parent`=0 AND `menuaccess`.`access`='$accesslevel'
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function getsubmenus($parent)
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function getpages($parent)
	{ 
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`url` as `url` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";
	   
		$query2=$this->db->query($query)->result();
		$url = array();
		foreach($query2 as $row)
		{
			$pieces = explode("/", $row->url);
					
			if(empty($pieces) || !isset($pieces[1]))
			{
				$page2="";
			}
			else
				$page2=$pieces[1];
				
			$url[]=$page2;
		}
		//print_r($url);
		return $url;
	}
    
    function sendquestiontousers($questionid)
    {
        $allusers=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=4")->result();
        foreach($allusers as $user)
        {
            $userid=$user->id;
            $email=$user->email;
            $hashvalue=base64_encode ($userid."&hq");
            $link="<a href='http://www.localhost/hq/index.php/user/ghghghh/$hashvalue'>Click here </a>";
               
            $this->load->library('email');
            $this->email->from('dhavalwohlig@gmail.com', 'HQ');
            $this->email->to($email);
            $this->email->subject('HQ');   

            $message = "<html>

                            <body>
                                <div style='text-align:center;   width: 50%; margin: 0 auto;'>
                                    <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>HQ</h4>
                                    <p style='font-size: 1em;padding-bottom: 10px;'>Click Link To Answer:</p>
                                    <p style='font-size: 1em;padding-bottom: 10px;'>$link</p>
                                </div>
                                <div style='text-align:center;position: relative;'>
                                    <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
                                        Thank You
                                    </p>
                                </div>
                            </body>

                        </html>";
            $this->email->message($message);
            $this->email->send();
        }
    }
    
    function getweightofpillarsbyuser($userid)
    {
        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragebyuserid=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`
			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`user`='$userid'")->row();
            $row->pillaraveragebyuserid=$pillaraveragebyuserid->totalweight;
        }
        
//        $teamquery=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
//        $teamid=$teamquery->team;
//        $allteamusers=$this->db->query("SELECT * FROM `user` WHERE `team`='$teamid'")->result();
//        $totalusersinteam=count($allteamusers);
//        
//        $alluseridsofteam="(";
//        foreach($allteamusers as $key=>$value)
//        {
//            if($key==0)
//            {
//                $alluseridsofteam.=$value->id;
//            }
//            else
//            {
//                $alluseridsofteam.=",".$value->id;
//            }
//        }
//        $alluseridsofteam=")";
//        
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyteam=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`user` IN $alluseridsofteam ")->row();
//            $totalweight=($pillaraveragebyteam->totalweight)/$totalusersinteam;
//            $row->pillaraveragebyteam=$totalweight;
//        }
//        
//        
//        $allorganizationusers=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=4")->result();
//        $totalusersinorganization=count($allorganizationusers);
//        
//        $alluseridsoforganization="(";
//        foreach($allorganizationusers as $key=>$value)
//        {
//            if($key==0)
//            {
//                $alluseridsoforganization.=$value->id;
//            }
//            else
//            {
//                $alluseridsoforganization.=",".$value->id;
//            }
//        }
//        $alluseridsoforganization=")";
//        
//        
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyorganization=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid'")->row();
//            $totalweight=($pillaraveragebyorganization->totalweight)/$totalusersinorganization;
//            $row->pillaraveragebyorganization=$totalweight;
//        }
        return $query;
    }
    
    
    function drawpillarjson($check,$departmentid,$teamid,$organization,$branchid)
    {
        if($check=="")
        {
        $check=3;
        }
        $where="";
        
        if($check==1)
        {
            $where=" AND `user`.`department`='$departmentid'";
        }
        else if($check==2)
        {
            $where=" AND `user`.`team`='$teamid'";
        }
        else if($check==3)
        {
            $where="";
        }
        else if($check==4)
        {
            $where=" AND `user`.`branch`='$branchid'";
        }
        
        
        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragevalues=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
			WHERE `hq_useranswer`.`pillar`='$pillarid' $where")->row();
            $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
        }
        
        return $query;
    }
    
    
    
    function drawpillarjsononhrdashboaard()
    {
        $arr = array();
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,2")->result();
        foreach($testquery as $row1)
        {
            $testid=$row1->id;
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();
                
                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
            array_push($arr,$query);
        }
        
        return $arr;
    }
    
    
    function drawpillarjsonold($check,$departmentid,$teamid,$organization,$branchid)
    {
        if($check=="")
        {
        $check=3;
        }
        $where="";
        $fromjoin="";
        $select="";
        if($check==1)
        {
            $select=",`hq_department`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_department` ON `hq_department`.`id`=`user`.`department`";
            $where=" AND `user`.`department`='$departmentid'";
        }
        else if($check==2)
        {
            $select=",`hq_team`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_team` ON `hq_team`.`id`=`user`.`team`";
            $where=" AND `user`.`team`='$teamid'";
        }
        else if($check==3)
        {
            $select=",`hq_pillar`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_useranswer`.`pillar`";
            $where="";
        }
        else if($check==4)
        {
            $select=",`hq_branch`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_branch` ON `hq_branch`.`id`=`user`.`branch`";
            $where=" AND `user`.`branch`='$branchid'";
        }
        
        
        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragevalues=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight` $select
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id` $fromjoin
			WHERE `hq_useranswer`.`pillar`='$pillarid' $where")->row();
            $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
        }
        
        return $query;
    }
    
    public function getoptionbyquestion($question) {
        $query=$this->db->query("SELECT `id`,`optiontext` as `name` FROM `hq_options` WHERE `question`='$question'")->result();
        return $query;
    }
    public function getquestionbytest($id,$pillar) {
        $query = "SELECT `testquestion`.`id` as `textquestionid`, `testquestion`.`test`,`testquestion`. `question` as `id` ,`hq_question`.`text` as `name`
FROM `testquestion` LEFT OUTER JOIN `hq_question` ON `hq_question`.`id`=`testquestion`.`question`
WHERE `testquestion`.`test`='$id' AND `hq_question`.`pillar`='$pillar' ";
        $question = $this->db->query($query)->result();
        return $question;
    }
    public function getpincodebyoption($option) {
        $query=$this->db->query("SELECT `id`,`optiontext` as `name` FROM `hq_option` WHERE `question`='$option'")->result();
        return $query;
    }
    
    
    
    
    function getgeneratedjsonold()
    {
        $jsondata=new stdClass();
        $jsondata->credits=new stdClass();
        $jsondata->credits->enabled=false;
        
        $arr = array();
//        $arr->credits=new stdClass();
//        $arr->credits->enabled=false;
        
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,2")->result();
        foreach($testquery as $row1)
        {
            $testid=$row1->id;
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();
                
                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
            array_push($arr,$query);
        }
//        print_r($arr);
        $categoryvalue="";
        $pillarvalue="";
        $expectedvalue="";
        $actualvalue="";
        foreach($arr as $value1)
                    {
                        foreach($value1 as $key=>$value)
                        {
                            if($key==0)
                            {
                                $categoryvalue.=$value->name;
                                $pillarvalue.=$value->weight;
                                $expectedvalue.=$value->testexpectedweight;
                                $actualvalue.=$value->pillaraveragevalues;
                            }
                            else
                            {
                                $categoryvalue.=",".$value->name;
                                $pillarvalue.=",".$value->weight;
                                $expectedvalue.=",".$value->testexpectedweight;
                                $actualvalue.=",".$value->pillaraveragevalues;
                            }
                        }
                    }
        echo $categoryvalue." <-cat<br>";
        echo $pillarvalue." <-pillar<br>";
        echo $expectedvalue." <-expected<br>";
        echo $actualvalue." <-actualt<br>";
        
        
//        $jsondata->chart=new stdClass();
//        $jsondata->chart->type='column';
//        
//        $jsondata->title=new stdClass();
//        $jsondata->title->text='Pillar Wise Average';
//        
//        $jsondata->xAxix=new stdClass();
//        $jsondata->xAxix->categories=[23,50,30];
//        $jsondata->xAxix->crosshair=true;
//        
//        $jsondata->yAxis=new stdClass();
//        $jsondata->yAxis->min=0;
//        $jsondata->yAxis->title=new stdClass();
//        $jsondata->yAxis->title->text='Score';
//        
//        $jsondata->tooltip=new stdClass();
//        $jsondata->tooltip->headerFormat='<span style="font-size:10px">{point.key}</span><table>';
//        $jsondata->tooltip->pointFormat='<tr><td style="color:{series.color};padding:0">{series.name}: + </td><td style="padding:0"><b>{point.y:.1f} </b></td></tr>';
//        $jsondata->tooltip->footerFormat='</table>';
//        $jsondata->tooltip->shared=true;
//        $jsondata->tooltip->useHTML=true;
//        
//        $jsondata->plotOptions=new stdClass();
//        $jsondata->plotOptions->column=new stdClass();
//        $jsondata->plotOptions->column->pointPadding=0.2;
//        $jsondata->plotOptions->column->borderWidth=0;
//        
//        $jsondata->series=array();
//        
//        $obj=new stdClass();
//        $obj->name="Pillar";
//        $obj->data=[10,20,30];
//        
//        array_push($jsondata->series,$obj);
//        
//        $obj=new stdClass();
//        $obj->name="Expected";
//        $obj->data=[22,33,44];
//        
//        array_push($jsondata->series,$obj);
//        
//        $obj=new stdClass();
//        $obj->name="Actual";
//        $obj->data=[11,22,33];
//        
//        array_push($jsondata->series,$obj);
        
//        return $jsondata;
    }
    
    
    
    
    
    
    function getgeneratedjson()
    {
        $arr = array();
//        $arr->credits=new stdClass();
//        $arr->credits->enabled=false;
        
//        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,1")->result();
//        foreach($testquery as $row1)
//        {
//            $testid=$row1->id;
//            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
//            foreach($query as $row)
//            {
//                $pillarid = $row->id;
//                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
//                $testexpectedweight=$testexpectedweights->weight;
//                $testname=$testexpectedweights->testname;
//                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
//    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
//                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();
//                
//                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
//                $row->testname=$testname;
//                $row->testexpectedweight=$testexpectedweight;
//            }
//            array_push($arr,$query);
//        }
        
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC")->row();
        
            $testid=$testquery->id;
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();
                
                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
        $arr=$query;
//            array_push($arr,$query);
//        }
//        print_r($arr);
        $categoryvalue=array();
        $pillarvalue=array();
        $expectedvalue=array();
        $actualvalue=array();
        foreach($arr as $key=>$value)
         {
                    array_push($categoryvalue,$value->name);
                    array_push($pillarvalue,floatval($value->weight));
                    array_push($expectedvalue,floatval($value->testexpectedweight));
                    array_push($actualvalue,floatval($value->pillaraveragevalues));
         }
        
        
                        $jsondata=new stdClass();
                        $jsondata->credits=new stdClass();
                        $jsondata->credits->enabled=false;
        
                        $jsondata->chart=new stdClass();
                        $jsondata->chart->type='column';

                        $jsondata->title=new stdClass();
                        $jsondata->title->text='Pillar Wise Average';

                        $jsondata->xAxis=new stdClass();
                        $jsondata->xAxis->categories=$categoryvalue;
                        $jsondata->xAxis->crosshair=true;

                        $jsondata->yAxis=new stdClass();
                        $jsondata->yAxis->min=0;
                        $jsondata->yAxis->title=new stdClass();
                        $jsondata->yAxis->title->text='Score';

                        $jsondata->tooltip=new stdClass();
                        $jsondata->tooltip->headerFormat='<span style="font-size:10px">{point.key}</span><table>';
                        $jsondata->tooltip->pointFormat='<tr><td style="color:{series.color};padding:0">{series.name}: + </td><td style="padding:0"><b>{point.y:.1f} </b></td></tr>';
                        $jsondata->tooltip->footerFormat='</table>';
                        $jsondata->tooltip->shared=true;
                        $jsondata->tooltip->useHTML=true;

                        $jsondata->plotOptions=new stdClass();
                        $jsondata->plotOptions->column=new stdClass();
                        $jsondata->plotOptions->column->pointPadding=0.2;
                        $jsondata->plotOptions->column->borderWidth=0;

                        $jsondata->series=array();

                        $obj=new stdClass();
                        $obj->name="Pillar";
                        $obj->data=$pillarvalue;

                        array_push($jsondata->series,$obj);

                        $obj=new stdClass();
                        $obj->name="Expected";
                        $obj->data=$expectedvalue;

                        array_push($jsondata->series,$obj);

                        $obj=new stdClass();
                        $obj->name="Actual";
                        $obj->data=$actualvalue;

                        array_push($jsondata->series,$obj);
        
            
//        echo $categoryvalue." <-cat<br>";
//        echo $pillarvalue." <-pillar<br>";
//        echo $expectedvalue." <-expected<br>";
//        echo $actualvalue." <-actualt<br>";
        
        return $jsondata;
    }
    
    
    
    
    
    
//    function getweightofpillarsbyteam($userid)
//    {
//        $teamquery=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
//        $teamid=$teamquery->team;
//        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyuserid=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `user`.`team`='$teamid'")->row();
//            $row->pillaraveragebyteam=$pillaraveragebyteam->totalweight;
//        }
//        return $query;
//    }
}
?>