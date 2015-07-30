<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class content_model extends CI_Model
{
public function create($pillar,$image,$text)
{
$data=array("pillar" => $pillar,"image" => $image,"text" => $text);
$query=$this->db->insert( "hq_content", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_content")->row();
return $query;
}
function getsinglecontent($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_content")->row();
return $query;
}
public function edit($id,$pillar,$image,$timestamp,$text)
{
$data=array("pillar" => $pillar,"image" => $image,"timestamp" => $timestamp,"text" => $text);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_content", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_content` WHERE `id`='$id'");
return $query;
}
	public function getimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `hq_content` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
