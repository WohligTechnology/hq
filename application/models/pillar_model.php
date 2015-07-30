<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class pillar_model extends CI_Model
{
public function create($name,$weight,$order)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order);
$query=$this->db->insert( "hq_pillar", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
function getsinglepillar($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
public function edit($id,$name,$weight,$order)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_pillar", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_pillar` WHERE `id`='$id'");
return $query;
}
	public function getpillardropdown()
	{
		$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
