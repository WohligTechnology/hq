<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $username=$this->input->post('username');
            $gender=$this->input->post('gender');
            $age=$this->input->post('age');
            $maritalstatus=$this->input->post('maritalstatus');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $noofyearsinorganization=$this->input->post('noofyearsinorganization');
            $spanofcontrol=$this->input->post('spanofcontrol');
            $description=$this->input->post('description');
            $employeeid=$this->input->post('employeeid');
            $branch=$this->input->post('branch');
            $language=$this->input->post('language');
//            $category=$this->input->post('category');
            
             $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$username,$gender,$age,$maritalstatus,$designation,$department,$noofyearsinorganization,$spanofcontrol,$description,$employeeid,$branch,$language)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
			$username=$this->input->post('username');
            $gender=$this->input->post('gender');
            $age=$this->input->post('age');
            $maritalstatus=$this->input->post('maritalstatus');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $noofyearsinorganization=$this->input->post('noofyearsinorganization');
            $spanofcontrol=$this->input->post('spanofcontrol');
            $description=$this->input->post('description');
            $employeeid=$this->input->post('employeeid');
            $branch=$this->input->post('branch');
            $timestamp=$this->input->post('timestamp');
            $language=$this->input->post('language');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$username,$gender,$age,$maritalstatus,$designation,$department,$noofyearsinorganization,$spanofcontrol,$description,$employeeid,$branch,$timestamp,$language)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewbranch()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewbranch";
$data["base_url"]=site_url("site/viewbranchjson");
$data["title"]="View branch";
$this->load->view("template",$data);
}
function viewbranchjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_branch`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_branch`.`language`";
$elements[1]->sort="1";
$elements[1]->header="Language";
$elements[1]->alias="language";
$elements[2]=new stdClass();
$elements[2]->field="`hq_branch`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";
$elements[3]=new stdClass();
$elements[3]->field="`hq_branch`.`branchid`";
$elements[3]->sort="1";
$elements[3]->header="Branch Id";
$elements[3]->alias="branchid";
$elements[4]=new stdClass();
$elements[4]->field="`hq_branch`.`address`";
$elements[4]->sort="1";
$elements[4]->header="Address";
$elements[4]->alias="address";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_branch`");
$this->load->view("json",$data);
}

public function createbranch()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createbranch";
$data["title"]="Create branch";
$this->load->view("template",$data);
}
public function createbranchsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("language","Language","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("branchid","Branch Id","trim");
$this->form_validation->set_rules("address","Address","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbranch";
$data["title"]="Create branch";
$this->load->view("template",$data);
}
else
{
$language=$this->input->get_post("language");
$name=$this->input->get_post("name");
$branchid=$this->input->get_post("branchid");
$address=$this->input->get_post("address");
if($this->branch_model->create($language,$name,$branchid,$address)==0)
$data["alerterror"]="New branch could not be created.";
else
$data["alertsuccess"]="branch created Successfully.";
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
}
public function editbranch()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editbranch";
$data["title"]="Edit branch";
$data["before"]=$this->branch_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editbranchsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("language","Language","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("branchid","Branch Id","trim");
$this->form_validation->set_rules("address","Address","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbranch";
$data["title"]="Edit branch";
$data["before"]=$this->branch_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$language=$this->input->get_post("language");
$name=$this->input->get_post("name");
$branchid=$this->input->get_post("branchid");
$address=$this->input->get_post("address");
if($this->branch_model->edit($id,$language,$name,$branchid,$address)==0)
$data["alerterror"]="New branch could not be Updated.";
else
$data["alertsuccess"]="branch Updated Successfully.";
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
}
public function deletebranch()
{
$access=array("1");
$this->checkaccess($access);
$this->branch_model->delete($this->input->get("id"));
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
public function viewdepartment()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewdepartment";
$data["base_url"]=site_url("site/viewdepartmentjson");
$data["title"]="View department";
$this->load->view("template",$data);
}
function viewdepartmentjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_department`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_department`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`hq_department`.`deptid`";
$elements[2]->sort="1";
$elements[2]->header="Dept id";
$elements[2]->alias="deptid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_department`");
$this->load->view("json",$data);
}

public function createdepartment()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createdepartment";
$data["title"]="Create department";
$this->load->view("template",$data);
}
public function createdepartmentsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("deptid","Dept id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createdepartment";
$data["title"]="Create department";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$deptid=$this->input->get_post("deptid");
if($this->department_model->create($name,$deptid)==0)
$data["alerterror"]="New department could not be created.";
else
$data["alertsuccess"]="department created Successfully.";
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}
}
public function editdepartment()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editdepartment";
$data["title"]="Edit department";
$data["before"]=$this->department_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editdepartmentsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("deptid","Dept id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editdepartment";
$data["title"]="Edit department";
$data["before"]=$this->department_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$deptid=$this->input->get_post("deptid");
if($this->department_model->edit($id,$name,$deptid)==0)
$data["alerterror"]="New department could not be Updated.";
else
$data["alertsuccess"]="department Updated Successfully.";
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}
}
public function deletedepartment()
{
$access=array("1");
$this->checkaccess($access);
$this->department_model->delete($this->input->get("id"));
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}
public function viewdesignation()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewdesignation";
$data["base_url"]=site_url("site/viewdesignationjson");
$data["title"]="View designation";
$this->load->view("template",$data);
}
function viewdesignationjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_designation`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_designation`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`hq_designation`.`language`";
$elements[2]->sort="1";
$elements[2]->header="Language";
$elements[2]->alias="language";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_designation`");
$this->load->view("json",$data);
}

public function createdesignation()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createdesignation";
$data["title"]="Create designation";
$this->load->view("template",$data);
}
public function createdesignationsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("language","Language","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createdesignation";
$data["title"]="Create designation";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$language=$this->input->get_post("language");
if($this->designation_model->create($name,$language)==0)
$data["alerterror"]="New designation could not be created.";
else
$data["alertsuccess"]="designation created Successfully.";
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
}
public function editdesignation()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editdesignation";
$data["title"]="Edit designation";
$data["before"]=$this->designation_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editdesignationsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("language","Language","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editdesignation";
$data["title"]="Edit designation";
$data["before"]=$this->designation_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$language=$this->input->get_post("language");
if($this->designation_model->edit($id,$name,$language)==0)
$data["alerterror"]="New designation could not be Updated.";
else
$data["alertsuccess"]="designation Updated Successfully.";
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
}
public function deletedesignation()
{
$access=array("1");
$this->checkaccess($access);
$this->designation_model->delete($this->input->get("id"));
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
public function viewpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewpillar";
$data["base_url"]=site_url("site/viewpillarjson");
$data["title"]="View pillar";
$this->load->view("template",$data);
}
function viewpillarjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_pillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`weight`";
$elements[2]->sort="1";
$elements[2]->header="Weight";
$elements[2]->alias="weight";
$elements[3]=new stdClass();
$elements[3]->field="`hq_pillar`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_pillar`");
$this->load->view("json",$data);
}

public function createpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createpillar";
$data["title"]="Create pillar";
$this->load->view("template",$data);
}
public function createpillarsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createpillar";
$data["title"]="Create pillar";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$weight=$this->input->get_post("weight");
$order=$this->input->get_post("order");
if($this->pillar_model->create($name,$weight,$order)==0)
$data["alerterror"]="New pillar could not be created.";
else
$data["alertsuccess"]="pillar created Successfully.";
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}
}
public function editpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editpillar";
$data["title"]="Edit pillar";
$data["before"]=$this->pillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editpillarsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editpillar";
$data["title"]="Edit pillar";
$data["before"]=$this->pillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$weight=$this->input->get_post("weight");
$order=$this->input->get_post("order");
if($this->pillar_model->edit($id,$name,$weight,$order)==0)
$data["alerterror"]="New pillar could not be Updated.";
else
$data["alertsuccess"]="pillar Updated Successfully.";
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}
}
public function deletepillar()
{
$access=array("1");
$this->checkaccess($access);
$this->pillar_model->delete($this->input->get("id"));
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}
public function viewquestion()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewquestion";
$data["base_url"]=site_url("site/viewquestionjson");
$data["title"]="View question";
$this->load->view("template",$data);
}
function viewquestionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_question`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_question`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`noofans`";
$elements[2]->sort="1";
$elements[2]->header="Number of answer";
$elements[2]->alias="noofans";
$elements[3]=new stdClass();
$elements[3]->field="`hq_question`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`hq_question`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Time stamp";
$elements[4]->alias="timestamp";
$elements[5]=new stdClass();
$elements[5]->field="`hq_question`.`text`";
$elements[5]->sort="1";
$elements[5]->header="Text";
$elements[5]->alias="text";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_question`");
$this->load->view("json",$data);
}

public function createquestion()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createquestion";
$data["title"]="Create question";
$this->load->view("template",$data);
}
public function createquestionsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("noofans","Number of answer","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createquestion";
$data["title"]="Create question";
$this->load->view("template",$data);
}
else
{
$pillar=$this->input->get_post("pillar");
$noofans=$this->input->get_post("noofans");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
if($this->question_model->create($pillar,$noofans,$order,$timestamp,$text)==0)
$data["alerterror"]="New question could not be created.";
else
$data["alertsuccess"]="question created Successfully.";
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
}
public function editquestion()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editquestion";
$data["title"]="Edit question";
$data["before"]=$this->question_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editquestionsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("noofans","Number of answer","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editquestion";
$data["title"]="Edit question";
$data["before"]=$this->question_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$pillar=$this->input->get_post("pillar");
$noofans=$this->input->get_post("noofans");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
if($this->question_model->edit($id,$pillar,$noofans,$order,$timestamp,$text)==0)
$data["alerterror"]="New question could not be Updated.";
else
$data["alertsuccess"]="question Updated Successfully.";
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
}
public function deletequestion()
{
$access=array("1");
$this->checkaccess($access);
$this->question_model->delete($this->input->get("id"));
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
public function viewoptions()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewoptions";
$data["base_url"]=site_url("site/viewoptionsjson");
$data["title"]="View options";
$this->load->view("template",$data);
}
function viewoptionsjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_options`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_options`.`question`";
$elements[1]->sort="1";
$elements[1]->header="Question";
$elements[1]->alias="question";
$elements[2]=new stdClass();
$elements[2]->field="`hq_options`.`representation`";
$elements[2]->sort="1";
$elements[2]->header="Representation";
$elements[2]->alias="representation";
$elements[3]=new stdClass();
$elements[3]->field="`hq_options`.`actualorder`";
$elements[3]->sort="1";
$elements[3]->header="Actual Order";
$elements[3]->alias="actualorder";
$elements[4]=new stdClass();
$elements[4]->field="`hq_options`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$elements[5]=new stdClass();
$elements[5]->field="`hq_options`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";
$elements[6]=new stdClass();
$elements[6]->field="`hq_options`.`weight`";
$elements[6]->sort="1";
$elements[6]->header="Weight";
$elements[6]->alias="weight";
$elements[7]=new stdClass();
$elements[7]->field="`hq_options`.`optiontext`";
$elements[7]->sort="1";
$elements[7]->header="Option Text";
$elements[7]->alias="optiontext";
$elements[8]=new stdClass();
$elements[8]->field="`hq_options`.`text`";
$elements[8]->sort="1";
$elements[8]->header="Text";
$elements[8]->alias="text";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_options`");
$this->load->view("json",$data);
}

public function createoptions()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createoptions";
$data["title"]="Create options";
$this->load->view("template",$data);
}
public function createoptionssubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("representation","Representation","trim");
$this->form_validation->set_rules("actualorder","Actual Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("optiontext","Option Text","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createoptions";
$data["title"]="Create options";
$this->load->view("template",$data);
}
else
{
$question=$this->input->get_post("question");
$representation=$this->input->get_post("representation");
$actualorder=$this->input->get_post("actualorder");
//$image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$weight=$this->input->get_post("weight");
$optiontext=$this->input->get_post("optiontext");
$text=$this->input->get_post("text");
	  $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->options_model->create($question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)==0)
$data["alerterror"]="New options could not be created.";
else
$data["alertsuccess"]="options created Successfully.";
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
}
public function editoptions()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editoptions";
$data["title"]="Edit options";
$data["before"]=$this->options_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editoptionssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("representation","Representation","trim");
$this->form_validation->set_rules("actualorder","Actual Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("optiontext","Option Text","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editoptions";
$data["title"]="Edit options";
$data["before"]=$this->options_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$question=$this->input->get_post("question");
$representation=$this->input->get_post("representation");
$actualorder=$this->input->get_post("actualorder");
//$image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$weight=$this->input->get_post("weight");
$optiontext=$this->input->get_post("optiontext");
$text=$this->input->get_post("text");
	 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->options_model->getimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
if($this->options_model->edit($id,$question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)==0)
$data["alerterror"]="New options could not be Updated.";
else
$data["alertsuccess"]="options Updated Successfully.";
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
}
public function deleteoptions()
{
$access=array("1");
$this->checkaccess($access);
$this->options_model->delete($this->input->get("id"));
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
public function viewuseranswer()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewuseranswer";
$data["base_url"]=site_url("site/viewuseranswerjson");
$data["title"]="View useranswer";
$this->load->view("template",$data);
}
function viewuseranswerjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_useranswer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_useranswer`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`hq_useranswer`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";
$elements[3]=new stdClass();
$elements[3]->field="`hq_useranswer`.`question`";
$elements[3]->sort="1";
$elements[3]->header="Question";
$elements[3]->alias="question";
$elements[4]=new stdClass();
$elements[4]->field="`hq_useranswer`.`option`";
$elements[4]->sort="1";
$elements[4]->header="Option";
$elements[4]->alias="option";
$elements[5]=new stdClass();
$elements[5]->field="`hq_useranswer`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";
$elements[6]=new stdClass();
$elements[6]->field="`hq_useranswer`.`timestamp`";
$elements[6]->sort="1";
$elements[6]->header="Time stamp";
$elements[6]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_useranswer`");
$this->load->view("json",$data);
}

public function createuseranswer()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createuseranswer";
$data["title"]="Create useranswer";
$this->load->view("template",$data);
}
public function createuseranswersubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createuseranswer";
$data["title"]="Create useranswer";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
if($this->useranswer_model->create($user,$pillar,$question,$option,$order,$timestamp)==0)
$data["alerterror"]="New useranswer could not be created.";
else
$data["alertsuccess"]="useranswer created Successfully.";
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
}
public function edituseranswer()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="edituseranswer";
$data["title"]="Edit useranswer";
$data["before"]=$this->useranswer_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edituseranswersubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="edituseranswer";
$data["title"]="Edit useranswer";
$data["before"]=$this->useranswer_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
if($this->useranswer_model->edit($id,$user,$pillar,$question,$option,$order,$timestamp)==0)
$data["alerterror"]="New useranswer could not be Updated.";
else
$data["alertsuccess"]="useranswer Updated Successfully.";
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
}
public function deleteuseranswer()
{
$access=array("1");
$this->checkaccess($access);
$this->useranswer_model->delete($this->input->get("id"));
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
public function viewuserpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewuserpillar";
$data["base_url"]=site_url("site/viewuserpillarjson");
$data["title"]="View userpillar";
$this->load->view("template",$data);
}
function viewuserpillarjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_userpillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_userpillar`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`hq_userpillar`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";
$elements[3]=new stdClass();
$elements[3]->field="`hq_userpillar`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_userpillar`");
$this->load->view("json",$data);
}

public function createuserpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createuserpillar";
$data["title"]="Create userpillar";
$this->load->view("template",$data);
}
public function createuserpillarsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createuserpillar";
$data["title"]="Create userpillar";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$timestamp=$this->input->get_post("timestamp");
if($this->userpillar_model->create($user,$pillar,$timestamp)==0)
$data["alerterror"]="New userpillar could not be created.";
else
$data["alertsuccess"]="userpillar created Successfully.";
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
}
public function edituserpillar()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="edituserpillar";
$data["title"]="Edit userpillar";
$data["before"]=$this->userpillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edituserpillarsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="edituserpillar";
$data["title"]="Edit userpillar";
$data["before"]=$this->userpillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$timestamp=$this->input->get_post("timestamp");
if($this->userpillar_model->edit($id,$user,$pillar,$timestamp)==0)
$data["alerterror"]="New userpillar could not be Updated.";
else
$data["alertsuccess"]="userpillar Updated Successfully.";
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
}
public function deleteuserpillar()
{
$access=array("1");
$this->checkaccess($access);
$this->userpillar_model->delete($this->input->get("id"));
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
public function viewcontent()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcontent";
$data["base_url"]=site_url("site/viewcontentjson");
$data["title"]="View content";
$this->load->view("template",$data);
}
function viewcontentjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_content`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_content`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";
$elements[2]=new stdClass();
$elements[2]->field="`hq_content`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";
$elements[3]=new stdClass();
$elements[3]->field="`hq_content`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";
$elements[4]=new stdClass();
$elements[4]->field="`hq_content`.`text`";
$elements[4]->sort="1";
$elements[4]->header="Text";
$elements[4]->alias="text";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_content`");
$this->load->view("json",$data);
}

public function createcontent()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createcontent";
$data["title"]="Create content";
$this->load->view("template",$data);
}
public function createcontentsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createcontent";
$data["title"]="Create content";
$this->load->view("template",$data);
}
else
{
$pillar=$this->input->get_post("pillar");
//$image=$this->input->get_post("image");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
	  $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->content_model->create($pillar,$image,$timestamp,$text)==0)
$data["alerterror"]="New content could not be created.";
else
$data["alertsuccess"]="content created Successfully.";
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}
}
public function editcontent()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editcontent";
$data["title"]="Edit content";
$data["before"]=$this->content_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcontentsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editcontent";
$data["title"]="Edit content";
$data["before"]=$this->content_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$pillar=$this->input->get_post("pillar");
//$image=$this->input->get_post("image");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
	 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->content_model->getimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
if($this->content_model->edit($id,$pillar,$image,$timestamp,$text)==0)
$data["alerterror"]="New content could not be Updated.";
else
$data["alertsuccess"]="content Updated Successfully.";
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}
}
public function deletecontent()
{
$access=array("1");
$this->checkaccess($access);
$this->content_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}

}
?>
