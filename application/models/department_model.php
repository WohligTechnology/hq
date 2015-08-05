<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class department_model extends CI_Model
{
public function create($name,$deptid)
{
$data=array("name" => $name,"deptid" => $deptid);
$query=$this->db->insert( "hq_department", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_department")->row();
return $query;
}
function getsingledepartment($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_department")->row();
return $query;
}
public function edit($id,$name,$deptid)
{
$data=array("name" => $name,"deptid" => $deptid);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_department", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_department` WHERE `id`='$id'");
return $query;
}
     
    //functions by avinash
    
	public function createbycsv($file)
	{
        foreach ($file as $row)
        {
            $name=$row['name'];
            $departmentid=$row['departmentid'];
            
		$data  = array(
			'name' => $name,
			'deptid' => $departmentid
		);
		$query=$this->db->insert( 'hq_department', $data );
		$id=$this->db->insert_id();
         
            
        }
			return  1;
	}
    
    
    
    //avinash functions end
}
?>
