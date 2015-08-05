<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class designation_model extends CI_Model
{
public function create($name,$language)
{
$data=array("name" => $name,"language" => $language);
$query=$this->db->insert( "hq_designation", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_designation")->row();
return $query;
}
function getsingledesignation($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_designation")->row();
return $query;
}
public function edit($id,$name,$language)
{
$data=array("name" => $name,"language" => $language);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_designation", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_designation` WHERE `id`='$id'");
return $query;
}
     
    //functions by avinash
    
	public function createbycsv($file)
	{
        foreach ($file as $row)
        {
            $name=$row['name'];
            
		$data  = array(
			'name' => $name
		);
		$query=$this->db->insert( 'hq_designation', $data );
		$id=$this->db->insert_id();
         
            
        }
			return  1;
	}
    
    
    
    //avinash functions end
}
?>
