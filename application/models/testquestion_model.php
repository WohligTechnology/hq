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
$this->db->where("id",$id);
$query=$this->db->get("testquestion")->row();
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
}
?>
