<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class team_model extends CI_Model
{
public function create($name,$teamid)
{
$data=array("name" => $name,"teamid" => $teamid);
$query=$this->db->insert( "hq_team", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_team")->row();
return $query;
}
function getsingledepartment($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_team")->row();
return $query;
}
public function edit($id,$name,$deptid)
{
$data=array("name" => $name,"teamid" => $teamid);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_team", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_team` WHERE `id`='$id'");
return $query;
}
    
    //functions by avinash
    
	public function createbycsv($file)
	{
        foreach ($file as $row)
        {
            $name=$row['name'];
            $teamid=$row['teamid'];
            
		$data  = array(
			'name' => $name,
			'teamid' => $teamid
		);
		$query=$this->db->insert( 'hq_team', $data );
		$id=$this->db->insert_id();
         
            
        }
			return  1;
	}
    
    
    
    //avinash functions end
}
?>
