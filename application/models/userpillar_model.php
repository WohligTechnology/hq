<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class userpillar_model extends CI_Model
{
public function create($user,$pillar)
{
$data=array("user" => $user,"pillar" => $pillar);
$query=$this->db->insert( "hq_userpillar", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_userpillar")->row();
return $query;
}
function getsingleuserpillar($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_userpillar")->row();
return $query;
}
public function edit($id,$user,$pillar,$timestamp)
{
$data=array("user" => $user,"pillar" => $pillar,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_userpillar", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_userpillar` WHERE `id`='$id'");
return $query;
}
}
?>
