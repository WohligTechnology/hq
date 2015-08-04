<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class testquestion_model extends CI_Model
{
public function create($test,$question)
{
$data=array("test" => $test,"question" => $question);
$query=$this->db->insert( "testquestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$selectedquestion=$this->db->query("SELECT `id`,`question`,`test` FROM `testquestion` WHERE `test`='$id'")->result();
//    print_r($selectedquestion);
$query=array();
foreach($selectedquestion as $que)
{
$query[]=$que->question;
}
return $query;
}

public function edit($id,$test,$question)
{
$data=array("test" => $test,"question" => $question);
$this->db->where( "id", $id );
$query=$this->db->update( "testquestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `testquestion` WHERE `id`='$id'");
return $query;
}
    public function getallquestion(){
    $query=$this->db->query("SELECT `id`,`text` FROM `hq_question`")->result();
return $query;
    }
    
    
public function edittestquestion($id,$question)
	{
		$this->db->query("DELETE FROM `testquestion` WHERE `test`='$id'");

		if(!empty($question))
		{
			foreach($question as $key => $pro)
			{
				$data2  = array(
					'test' => $id,
					'question' => $pro,
				);
				$query=$this->db->insert( 'testquestion', $data2 );
			}
		}

		return 1;
	}
}

?>
