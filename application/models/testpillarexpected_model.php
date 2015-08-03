<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class testpillarexpected_model extends CI_Model
{
public function create($test,$pillar,$expectedvalue)
{
$data=array("test" => $test,"pillar" => $pillar,"expectedvalue" => $expectedvalue);
$query=$this->db->insert( "testpillarexpected", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("testpillarexpected")->row();
return $query;
}

public function edit($id,$test,$pillar,$expectedvalue)
{
$data=array("test" => $test,"pillar" => $pillar,"expectedvalue" => $expectedvalue);
$this->db->where( "id", $id );
$query=$this->db->update( "testpillarexpected", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `testpillarexpected` WHERE `id`='$id'");
return $query;
}
}
?>
