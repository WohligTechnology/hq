<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallbranch()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_branch`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_branch`.`language`";
$elements[1]->sort="1";
$elements[1]->header="Language";
$elements[1]->alias="language";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_branch`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_branch`.`branchid`";
$elements[3]->sort="1";
$elements[3]->header="Branch Id";
$elements[3]->alias="branchid";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_branch`");
$this->load->view("json",$data);
}
public function getsinglebranch()
{
$id=$this->input->get_post("id");
$data["message"]=$this->branch_model->getsinglebranch($id);
$this->load->view("json",$data);
}
function getalldepartment()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_department`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_department`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_department`");
$this->load->view("json",$data);
}
public function getsingledepartment()
{
$id=$this->input->get_post("id");
$data["message"]=$this->department_model->getsingledepartment($id);
$this->load->view("json",$data);
}
function getalldesignation()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_designation`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_designation`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_designation`");
$this->load->view("json",$data);
}
public function getsingledesignation()
{
$id=$this->input->get_post("id");
$data["message"]=$this->designation_model->getsingledesignation($id);
$this->load->view("json",$data);
}
function getallpillar()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_pillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`weight`";
$elements[2]->sort="1";
$elements[2]->header="Weight";
$elements[2]->alias="weight";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_pillar`");
$this->load->view("json",$data);
}
public function getsinglepillar()
{
$id=$this->input->get_post("id");
$data["message"]=$this->pillar_model->getsinglepillar($id);
$this->load->view("json",$data);
}
function getallquestion()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_question`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_question`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`noofans`";
$elements[2]->sort="1";
$elements[2]->header="Number of answer";
$elements[2]->alias="noofans";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_question`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_question`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Time stamp";
$elements[4]->alias="timestamp";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_question`");
$this->load->view("json",$data);
}
public function getsinglequestion()
{
$id=$this->input->get_post("id");
$data["message"]=$this->question_model->getsinglequestion($id);
$this->load->view("json",$data);
}
function getalloptions()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_options`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_options`.`question`";
$elements[1]->sort="1";
$elements[1]->header="Question";
$elements[1]->alias="question";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_options`.`representation`";
$elements[2]->sort="1";
$elements[2]->header="Representation";
$elements[2]->alias="representation";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_options`.`actualorder`";
$elements[3]->sort="1";
$elements[3]->header="Actual Order";
$elements[3]->alias="actualorder";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_options`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`hq_options`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`hq_options`.`weight`";
$elements[6]->sort="1";
$elements[6]->header="Weight";
$elements[6]->alias="weight";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`hq_options`.`optiontext`";
$elements[7]->sort="1";
$elements[7]->header="Option Text";
$elements[7]->alias="optiontext";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_options`");
$this->load->view("json",$data);
}
public function getsingleoptions()
{
$id=$this->input->get_post("id");
$data["message"]=$this->options_model->getsingleoptions($id);
$this->load->view("json",$data);
}
function getalluseranswer()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_useranswer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_useranswer`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_useranswer`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_useranswer`.`question`";
$elements[3]->sort="1";
$elements[3]->header="Question";
$elements[3]->alias="question";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_useranswer`.`option`";
$elements[4]->sort="1";
$elements[4]->header="Option";
$elements[4]->alias="option";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`hq_useranswer`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_useranswer`");
$this->load->view("json",$data);
}
public function getsingleuseranswer()
{
$id=$this->input->get_post("id");
$data["message"]=$this->useranswer_model->getsingleuseranswer($id);
$this->load->view("json",$data);
}
function getalluserpillar()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_userpillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_userpillar`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_userpillar`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_userpillar`");
$this->load->view("json",$data);
}
public function getsingleuserpillar()
{
$id=$this->input->get_post("id");
$data["message"]=$this->userpillar_model->getsingleuserpillar($id);
$this->load->view("json",$data);
}
function getallcontent()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_content`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_content`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_content`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_content`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_content`");
$this->load->view("json",$data);
}
public function getsinglecontent()
{
$id=$this->input->get_post("id");
$data["message"]=$this->content_model->getsinglecontent($id);
$this->load->view("json",$data);
}
 
 //functions by avinash
 
     public function generatejson()
     {
         $data1=$this->menu_model->getgeneratedjson();
         $data['message']=$data1;
         $this->load->view('json',$data);
     }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
} ?>