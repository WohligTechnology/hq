<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class branch_model extends CI_Model
{
public function create($language,$name,$branchid,$address)
{
$data=array("language" => $language,"name" => $name,"branchid" => $branchid,"address" => $address);
$query=$this->db->insert( "hq_branch", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_branch")->row();
return $query;
}
function getsinglebranch($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_branch")->row();
return $query;
}
public function edit($id,$language,$name,$branchid,$address)
{
$data=array("language" => $language,"name" => $name,"branchid" => $branchid,"address" => $address);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_branch", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_branch` WHERE `id`='$id'");
return $query;
}
     
    //functions by avinash
    
	public function createbycsv($file)
	{
        foreach ($file as $row)
        {
            $name=$row['name'];
            $branchid=$row['branchid'];
            $address=$row['address'];
            
		$data  = array(
			'name' => $name,
			'branchid' => $branchid,
			'address' => $address
		);
		$query=$this->db->insert( 'hq_branch', $data );
		$id=$this->db->insert_id();
         
            
        }
			return  1;
	}
    
    
    
    //avinash functions end
}
?>
