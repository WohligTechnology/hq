<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class useranswer_model extends CI_Model
{
public function create($user,$pillar,$question,$option,$order,$test)
{
$data=array("user" => $user,"pillar" => $pillar,"question" => $question,"option" => $option,"order" => $order,"test" => $test);
$query=$this->db->insert( "hq_useranswer", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_useranswer")->row();
return $query;
}
function getsingleuseranswer($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_useranswer")->row();
return $query;
}
public function edit($id,$user,$pillar,$question,$option,$order,$timestamp,$test)
{
$data=array("user" => $user,"pillar" => $pillar,"question" => $question,"option" => $option,"order" => $order,"timestamp" => $timestamp,"test" => $test);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_useranswer", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_useranswer` WHERE `id`='$id'");
return $query;
}
}
?>
