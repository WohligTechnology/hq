<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class question_model extends CI_Model
{
public function create($pillar,$noofans,$order,$text)
{
$data=array("pillar" => $pillar,"noofans" => $noofans,"order" => $order,"text" => $text);
$query=$this->db->insert( "hq_question", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_question")->row();
return $query;
}
function getsinglequestion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_question")->row();
return $query;
}
public function edit($id,$pillar,$noofans,$order,$timestamp,$text)
{
$data=array("pillar" => $pillar,"noofans" => $noofans,"order" => $order,"timestamp" => $timestamp,"text" => $text);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_question", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_question` WHERE `id`='$id'");
return $query;
}
		public function getquestiondropdown()
	{
		$query=$this->db->query("SELECT * FROM `hq_question`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->text;
		}
		
		return $return;
	}
	public function getnoofansdropdown()
	{
		
		$return=array(
			"0"=>"Single",
			"1"=>"Multiple"
		);
		
		
		return $return;
	}
}
?>