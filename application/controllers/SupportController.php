<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class SupportController extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Support_Model');
    $this->load->model("GenericModel");
  }
  public function index()
  {
    $data['template'] = 'index';
    $data['title'] = 'Dashboard';
    $data['tbl_mechanics'] = $this->db->query("select count(id) as total_count from tbl_mechanics")->row();
    $data['tbl_machine_cell'] = $this->db->query("select count(id) as total_count from tbl_machine_cell")->row();
    $data['tbl_owner'] = $this->db->query("select count(id) as total_count from tbl_owner")->row();
    $data['tbl_drivers'] = $this->db->query("select count(id) as total_count from tbl_drivers")->row();
    $data['tbl_civil'] = $this->db->query("select count(id) as total_count from tbl_civil")->row();
    $data['tbl_spare'] = $this->db->query("select count(id) as total_count from tbl_spare")->row();
    $data['page'] = 'Dashboard';
    $this->layout_admin($data);
  }
  public function login_admin()
  {
    $this->load->view('admin/site/login');
  }
  public function support_login()
  {
    $username = trim($this->input->post('username'));
    $password = trim($this->input->post('password'));
    $password = md5($password);
    $query = $this->db->query("select *from Users where (username='$username' or mobile_no='$username') and password='$password' and status='Active'")->result();
    $array = array();
    if (count($query) >= 1) {

      $session_data['ADMIN_ID'] = $query[0]->id;
      $session_data['USERNAME'] = $query[0]->username;
      $session_data['MOBILE'] = $query[0]->mobile_no;
      $session_data['EMAIL'] = $query[0]->email_id;
      $session_data['USERTYPE'] = $query[0]->user_type;
      $this->session->set_userdata($session_data);
      $array = array('code' => 200, 'message' => 'Redirecting Login Successfull...');
    } else {
      $array = array('code' => 400, 'message' => 'Username,Mobile No or Password Incorrect');
    }
    echo json_encode($array);
    //exit;
  }
  public function login_support_process()
  {
    echo $this->Support_Model->login_support_process($_POST);
  }
  public function support_user_logout()
  {
    session_destroy();
    redirect('admin-login');
  }
  public function getcities_address()
  {
    $state = $this->input->post('state');
    $tb_city = $this->db->query("select *from tb_city where state_id='$state'")->result();
    $data = '';

    $data = ' <div class="form-group">
     <label>Select City </label>
   <select type="text" class="form-control" name="city" id="city" onchange="cityr()">
    <option value=""> Select location</option>';
    if (count($tb_city) >= 1) {
      foreach ($tb_city as $row1) {
        $data .= '<option value="' . $row1->city_id . '">' . $row1->city . '</option>';
      }
      $data .= '<option value="other" >Other</option>';
    } else {
      $data .= '<option value="" >Not Found City</option>';
    }
    $data .= '</select></div>';
    echo $data;
  }
  public function viewMachinary()
  {
    $data['template'] = 'machinary';
    $data['title'] = 'View Machinary';
    $data['page'] = 'View Machinary';
    $date = date('Y-m-d');
    $this->layout_admin($data);
  }
  public function change_password()
  {
    $data['template'] = 'change_password';
    $data['title'] = 'Change Password';
    $data['page'] = 'Change Password';
    $this->layout_admin($data);
  }
  public function driver()
  {
    $data['template'] = 'driver';
    $data['title'] = 'Driver';
    $data['page'] = 'Driver';
    $this->layout_admin($data);
  }
  public function owner()
  {
    $data['template'] = 'owner';
    $data['title'] = 'Owener';
    $data['page'] = 'Owner';
    $this->layout_admin($data);
  }
  public function mechanics()
  {
    $data['template'] = 'mechanics';
    $data['title'] = 'Mechanics';
    $data['page'] = 'Mechanics';
    $this->layout_admin($data);
  }
  public function usersList()
  {
    $data['template'] = 'users';
    $data['title'] = 'Users List';
    $data['page'] = 'Users List';
    $this->layout_admin($data);
  }
  public function spareList()
  {
    $data['template'] = 'spare';
    $data['title'] = 'Spare List';
    $data['page'] = 'Spare List';
    $this->layout_admin($data);
  }
  public function civilList()
  {
    $data['template'] = 'civil';
    $data['title'] = 'Civil List';
    $data['page'] = 'Civil List';
    $this->layout_admin($data);
  }
  public function learningpath()
  {
    $data['template'] = 'learning';
    $data['title'] = 'Learning Path';
    $data['page'] = 'Learning Path';
    $this->layout_admin($data);
  }
  public function driverTypes()
  {
    $data['template'] = 'driverTypes';
    $data['title'] = 'Driver Types';
    $data['page'] = 'Driver Types';
    $this->layout_admin($data);
  }
  
  public function machineType()
  {
    $data['template'] = 'machineType';
    $data['title'] = 'Machine Type';
    $data['page'] = 'Machine Type';
    $this->layout_admin($data);
  }
  public function generic_status_changed()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_machine_cell set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }

  public function generic_delete()
  {
    $id = $this->input->post('id');
    $update = $this->db->query('delete from  tbl_machine_cell where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }

  public function generic_status_changed_driver()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_drivers set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }

  public function generic_delete_driver()
  {
    $id = $this->input->post('id');
    $update = $this->db->query('delete from  tbl_drivers where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }

  public function generic_status_changed_owner()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_owner set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }

  public function generic_delete_owner()
  {
    $id = $this->input->post('id');
    $update = $this->db->query('delete from  tbl_owner where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function generic_status_changed_mechanics()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_mechanics set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }

  public function generic_delete_mechanics()
  {
    $id = $this->input->post('id');
    $update = $this->db->query('delete from  tbl_mechanics where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function updatefavouritemachinary(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from tbl_machine_cell where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update tbl_machine_cell set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in machinary list');
    }
    echo json_encode($array);
  }
  public function updatefavouritedriver(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from tbl_drivers where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update tbl_drivers set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in driver list');
    }
    echo json_encode($array);
  }
  public function updatefavouriteowner(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from tbl_owner where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update tbl_owner set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in owner list');
    }
    echo json_encode($array);
  }
  public function updatefavouritemmechanics(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from tbl_mechanics where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update tbl_mechanics set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in mechanics list');
    }
    echo json_encode($array);
  }

  public function generic_delete_spare()
  {
    $id = $this->input->post('id');
    $update = $this->db->query('delete from tbl_spare where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function updatefavouritemspare(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from  tbl_spare where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update  tbl_spare set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in spare list');
    }
    echo json_encode($array);
  }
  public function generic_status_changed_spare()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_spare set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }

  public function generic_delete_civil()
  {
    $id = $this->input->post('id');
    $get_record = $this->db->query('select profile_image from tbl_civil where id ="' . $id . '"')->row();
    $update = $this->db->query('delete from tbl_civil where id ="' . $id . '"');
    if ($update == true) {
      $imgpath = "assets/learning/".$get_record->profile_image;
      unlink($imgpath);
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function updatefavouritemcivil(){
    $array =array();
    $favourite=$this->input->post('favourite');
    $id=$this->input->post('id');
    $product =$this->db->query("select id from  tbl_civil where favourite='".$favourite."'")->result();
    if(count($product)==0 || $favourite==0){
      $que=$this->db->query("update  tbl_civil set favourite='".$favourite."' where id='".$id."'");
      if($que==true){
        $this->session->set_userdata('success','Favourite list added successfully');
       $array=array('code'=>200,'message'=>'Favourite list added successfully');
       $this->session->set_userdata('success','Favourite list added successfully');
     }else{
       $array=array('code'=>400,'message'=>'Some thing went wrong while updating product'); 
     }
    }else{
      $array=array('code'=>400,'message'=>''.$favourite.' This sequance already added in civil list');
    }
    echo json_encode($array);
  }
  public function generic_status_changed_civil()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_civil set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }
  public function generic_delete_learning()
  {
    $id = $this->input->post('id');
    $get_record = $this->db->query('select image from tbl_learning where id ="' . $id . '"')->row();
    $update = $this->db->query('delete from tbl_learning where id ="' . $id . '"');
    if ($update == true) {
      $imgpath = "assets/learning/".$get_record->image;
       unlink($imgpath);
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function generic_status_changed_learning()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $update = $this->db->query('update tbl_learning set status="' . $status . '" where id ="' . $id . '"');
    if ($update == true) {
      echo json_encode(array('code' => 200, 'message' => 'Status updated successfully'));
      $this->session->set_userdata('success', 'Status updated successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Status updated successfully'));
    }
  }
public function submit_machinary_types(){
  $type = $this->input->post('type');
    $get_record = $this->db->query('select * from tbl_machinary_type where type ="' . $type . '"')->result();

    if (count($get_record)>=1) {
      echo json_encode(array('code' => 400, 'message' => '<b>' .$type. '</b>'. ' type machinary already exist'));
      exit;
    } else {
     $insertArray = array("type"=>$type);
     $this->db->insert('tbl_machinary_type',$insertArray);
     echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
     $this->session->set_userdata('success', 'Record Inserted successfully');
    }
}
  public function add_driver_types()
  {
    $type = $this->input->post('type');
    $get_record = $this->db->query('select * from tbl_driver_type where type ="' . $type . '"')->result();

    if (count($get_record)>=1) {
      echo json_encode(array('code' => 400, 'message' => '<b>' .$type. '</b>'. ' type operator already exist'));
      exit;
    } else {
     $insertArray = array("type"=>$type);
     $this->db->insert('tbl_driver_type',$insertArray);
     echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
     $this->session->set_userdata('success', 'Record Inserted successfully');
    }
  }
  public function generic_delete_driver_types(){
    $id = $this->input->post('id');
    $del = $this->db->query('delete from tbl_driver_type where id ="' . $id . '"');
    if ($del == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
  public function generic_delete_machinary_types(){
    $id = $this->input->post('id');
    $del = $this->db->query('delete from tbl_machinary_type where id ="' . $id . '"');
    if ($del == true) {
      echo json_encode(array('code' => 200, 'message' => 'Record deleted successfully'));
      $this->session->set_userdata('success', 'Deleted successfully');
      exit;
    } else {
      echo json_encode(array('code' => 400, 'message' => 'Unable to delete record'));
    }
  }
}
