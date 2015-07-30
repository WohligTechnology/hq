<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class options_model extends CI_Model
{
public function create($question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)
{
$data=array("question" => $question,"representation" => $representation,"actualorder" => $actualorder,"image" => $image,"order" => $order,"weight" => $weight,"optiontext" => $optiontext,"text" => $text);
$query=$this->db->insert( "hq_options", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_options")->row();
return $query;
}
function getsingleoptions($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_options")->row();
return $query;
}
public function edit($id,$question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)
{
$data=array("question" => $question,"representation" => $representation,"actualorder" => $actualorder,"image" => $image,"order" => $order,"weight" => $weight,"optiontext" => $optiontext,"text" => $text);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_options", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_options` WHERE `id`='$id'");
return $query;
}
	public function getimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `hq_options` WHERE `id`='$id'")->row();
		return $query;
	}
		public function getoptionsdropdown()
	{
		$query=$this->db->query("SELECT * FROM `hq_options`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->text;
		}
		
		return $return;
	}
	public function getrepresentationdropdown()
	{

		$representation=array(
			"0"=>"Pictorial",
			"1"=>"Text"
		);
		
		
		return $representation;
	}
}
?>
