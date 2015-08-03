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
$query['selectedquestion']=array();
foreach($selectedquestion as $que)
{
$query['selectedquestion'][]=$que->question;
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
    $query=$this->db->query("SELECT `testquestion`.`id`,`testquestion`.`test`,`testquestion`.`question`,`hq_question`.`text` as `text` FROM `testquestion` LEFT OUTER JOIN `hq_question` ON `hq_question`.`id`=`testquestion`.`question`")->result();
return $query;
    }
}

function edittestquestion($id,$test,$question)
	{
		$this->db->query("DELETE FROM `testquestion` WHERE `product`='$id'");

		if(!empty($relatedproduct))
		{
			foreach($relatedproduct as $key => $pro)
			{
				$data2  = array(
					'product' => $id,
					'relatedproduct' => $pro,
				);
				$query=$this->db->insert( 'relatedproduct', $data2 );
			}
		}

		{
			$this->saveproductlog($id,"Related Product updated");
		}
		return 1;
	}
?>
