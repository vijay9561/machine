<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
error_reporting(0);
class Api_Controller  extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function add_new_machine_cell()
  {
    $array = array();
    $info = $this->input->post();
    $owner_name = $info['owner_name'];
    $mobile_number = $info['mobile_number'];
    $machine_company_name = $info['machine_company_name'];
    $machine_model_name = $info['machine_model_name'];
    $model_year = $info['model_year'];
    $machine_location = $info['machine_location'];
    $machine_description = $info['machine_description'];
    $state = $info['state'];
    $district = $info['district'];
    $referral_code = $info['referral_code'];
    $file_info = pathinfo($_FILES["prod_image1"]["name"]);
    $file_directory = "assets/upload/";
    $first_images_name = date("d-m-Y ") . rand(000000, 999999) . "." . $file_info["extension"];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $maxsize    = 4194304;
    $file_type = $_FILES['prod_image1']['type'];
    $second_images_name = '';
    if (!empty($_FILES["prod_image2"]["name"])) {
      if (!in_array($file_type, $allowed) || $_FILES['prod_image2']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'image 2 Only jpg, gif and png image files are allowed. OR File too large. File must be less than 4 MB.');
        echo json_encode($array);
        exit;
      } else {
        $second_image_info1 = pathinfo($_FILES['prod_image2']['name']);
        $second_images_name = date("d-m-Y ") . rand(000000, 999999) . "." . $second_image_info1["extension"];
        move_uploaded_file($_FILES["prod_image2"]["tmp_name"], $file_directory . $second_images_name);
      }
    }

    $first_images_name = '';
    if (!empty($_FILES["prod_image1"]["name"])) {
      if (!in_array($file_type, $allowed) || $_FILES['prod_image1']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'image 1 Only jpg, gif and png image files are allowed. OR File too large. File must be less than 4 MB.');
        echo json_encode($array);
        exit;
      } else {
        $fourth_image_info1 = pathinfo($_FILES['prod_image1']['name']);
        $first_images_name = date("d-m-Y ") . rand(000000, 999999) . "." . $fourth_image_info1["extension"];
        move_uploaded_file($_FILES["prod_image1"]["tmp_name"], $file_directory . $first_images_name);
      }
    }

    $insert_data = array('owner_name' => $owner_name, 'mobile_number' => $mobile_number, 'machine_company_name' => $machine_company_name, 'machine_model_name' => $machine_model_name, 'machine_location' => $machine_location, 'machine_description' => $machine_description, 'prod_image1' => $first_images_name, 'prod_image2' => $second_images_name, 'created_date' => date('Y-m-d H:i:s'), 'status' => 'inactive', 'model_year' => $model_year, 'district' => $district, 'state' => $state);
    $this->db->insert('tbl_machine_cell', $insert_data);

    $last_id = $this->db->insert_id();
    if (!empty($referral_code)) {
      $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
      $by_full_name = $get_usersInformation->login_name;
      $by_mobile_no = $get_usersInformation->mobile_no;
      $to_mobile_no = $mobile_number;
      $to_full_name = $owner_name;
      $user_id = $get_usersInformation->id;
      $forum_id =  $last_id;
      $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'machinary');
      $this->db->insert('tbl_referral', $tbl_referral);
    }


    $array = array('code' => 200, 'message' => 'Record added successfully');
    $_SESSION['successmsg']  = 'Record added successfully';
    $this->session->set_userdata('success', 'Your information added successfully and your machine details shortly verify to our team');
    echo json_encode($array);
    exit;
  }
  public function add_new_drivers()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $operator_type = $field['operator_type'];
    $full_name = $field['full_name'];
    $mobile_number = $field['mobile_number'];
    $age = $field['age'];
    $state = $field['state'];
    $district = $field['district'];
    $license = $field['license'];
    $about_you = $field['about_you'];
    $your_experience = $field['your_experience'];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $referral_code = $field['referral_code'];
    $maxsize    = 4194304;
    $file_type = $_FILES['profile_image']['type'];
    $duplicate_check = $this->db->query("select id from tbl_drivers where mobile_no='" . $mobile_number . "'")->result();
    if (count($duplicate_check) >= 4) {
      $array = array('code' => 400, 'message' => 'You have registered the driver 4 times with this mobile number. Please register with another number');
      echo json_encode($array);
      exit;
    }
    $profile_image ='';
    if(!empty($_FILES['profile_image']['size'])){
    if (!in_array($file_type, $allowed) || $_FILES['profile_image']['size'] >= $maxsize) {
      $array = array('code' => 400, 'message' => 'profile image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.');
      echo json_encode($array);
      exit;
    }
    $profile_image_info = pathinfo($_FILES['profile_image']['name']);
      $profile_image = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
      move_uploaded_file($_FILES["profile_image"]["tmp_name"], "assets/driver/" . $profile_image);
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/driver/' . $profile_image;
      $config['wm_text'] = $operator_type . ' ' . 'Operator';
      $config['wm_type'] = 'text';
      $config['wm_font_path'] = './system/fonts/texb.ttf';
      $config['wm_font_size'] = '20';
      $config['wm_font_color'] = 'ffffff';
      $config['wm_vrt_alignment'] = 'bottom';
      $config['wm_hor_alignment'] = 'center';
      $config['wm_padding'] = '20';
      $config['wm_vrt_offset'] = '70';
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
        $array = array('code' => 400, 'message' => 'Error while uploading image');
        echo json_encode($array);
        exit;
      }  
  } 
  $inserArray = array("full_name" => $full_name, 'mobile_no' => $mobile_number, 'age' => $age, 'state' => $state, 'district' => $district, 'license' => $license, 'about_you' => $about_you, 'your_experience' => $your_experience, 'profile_image' => $profile_image, 'status' => 'inactive', 'created_date' => date('Y-m-d H:i:s'), 'operator_type' => $operator_type);
     
      $this->db->insert('tbl_drivers', $inserArray);

      $last_id = $this->db->insert_id();
      if (!empty($referral_code)) {
        $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
        $by_full_name = $get_usersInformation->login_name;
        $by_mobile_no = $get_usersInformation->mobile_no;
        $to_mobile_no = $mobile_number;
        $to_full_name = $full_name;
        $user_id = $get_usersInformation->id;
        $forum_id =  $last_id;
        $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'driver');
        $this->db->insert('tbl_referral', $tbl_referral);
      }
      $array = array('code' => 200, 'message' => 'Driver information added successfully');
      $this->session->set_userdata('success', 'Your information added successfully and your profile shortly verify to our team');
      echo json_encode($array);
      exit;
  
  }
  public function login_users()
  {
    $field = $this->input->post();
    $login_name = $field['login_name'];
    $mobile_no = $field['login_mobile'];
    $referral_code = mt_rand(000000, 999999);
    $checkingUsers = $this->db->query("select *from tbl_users where mobile_no='" . $mobile_no . "'")->result();

    if (count($checkingUsers) >= 1) {
      $this->session->set_userdata('user_id', $checkingUsers[0]->id);
      $this->session->set_userdata('login_name', $checkingUsers[0]->login_name);
      $this->session->set_userdata('mobile_no', $checkingUsers[0]->mobile_no);
      $this->session->set_userdata('referral_code', $checkingUsers[0]->referral_code);
      $array = array('code' => 200, 'message' => 'Login sucessfully');
      echo json_encode($array);
      exit;
    } else {
      $this->db->insert('tbl_users', array('mobile_no' => $mobile_no, 'login_name' => $login_name, 'referral_code' => $referral_code));
      $id = $this->db->insert_id();
      $this->session->set_userdata('user_id', $id);
      $this->session->set_userdata('login_name', $login_name);
      $this->session->set_userdata('mobile_no', $mobile_no);
      $this->session->set_userdata('referral_code', $referral_code);
      $array = array('code' => 200, 'message' => 'Login sucessfully');
      echo json_encode($array);
      exit;
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('login_name');
    $this->session->unset_userdata('mobile_no');
    redirect(site_url());
  }
  public function viewInformationForDriver()
  {
    $id = $this->input->post('id');
    $users = $this->db->query("select *from tbl_drivers where id='" . $id . "'")->row();
    $array = array(
      'code' => 200, 'message' => 'view sucessfully', 'full_name' => $users->full_name, 'age' => $users->age, 'mobile_no' => $users->mobile_no,
      'operator_type' => $users->operator_type, 'profile_image' => $users->profile_image, 'district' => $users->district, 'state' => $users->state, 'your_experience' => $users->your_experience, 'license' => $users->license,
      'about_you' => $users->about_you
    );
    echo json_encode($array);
    exit;
  }
  public function viewInformationForOwner()
  {
    $id = $this->input->post('id');
    $users = $this->db->query("select *from tbl_owner where id='" . $id . "'")->row();
    $array = array(
      'code' => 200, 'message' => 'view sucessfully', 'owner_farm' => $users->owner_farm, 'age' => $users->age, 'mobile_no' => $users->mobile_no,
      'owner_full_name' => $users->owner_full_name, 'profile_image' => $users->profile_image, 'district' => $users->district, 'state' => $users->state, 'address' => $users->address, 'machine_name' => $users->machine_name,
      'more_details' => $users->more_details
    );
    echo json_encode($array);
    exit;
  }
  public function viewInformationForMchanics()
  {
    $id = $this->input->post('id');
    $users = $this->db->query("select *from tbl_mechanics where id='" . $id . "'")->row();
    $array = array(
      'code' => 200, 'message' => 'view sucessfully', 'full_name' => $users->full_name, 'mobile_no' => $users->mobile_no,
      'shop_name' => $users->shop_name, 'profile_image' => $users->profile_image, 'district' => $users->district, 'state' => $users->state, 'address' => $users->address, 'machine_details' => $users->machine_details
    );
    echo json_encode($array);
    exit;
  }
  public function add_new_owners()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $owner_farm = $field['owner_farm'];
    $mobile_no = $field['mobile_no'];
    $machine_name = $field['machine_name'];
    $state = $field['state'];
    $district = $field['district'];
    $address = $field['address'];
    $more_details = $field['more_details'];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $maxsize    = 4194304;
    $file_type = $_FILES['profile_image']['type'];
    $referral_code = $field['referral_code'];

    $duplicate_check = $this->db->query("select id from tbl_owner where mobile_no='" . $mobile_no . "'")->result();
    if (count($duplicate_check) >= 4) {
      $array = array('code' => 400, 'message' => 'You have registered the owner 4 times with this mobile number. Please register with another number');
      echo json_encode($array);
      exit;
    }
    $profile_image ='';
    if (!empty($_FILES['profile_image']['name'])) {
      if (!in_array($file_type, $allowed) || $_FILES['profile_image']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'profile image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.', 'mg' => $_FILES['profile_image']['name']);
        echo json_encode($array);
        exit;
      }
      $profile_image_info = pathinfo($_FILES['profile_image']['name']);
      $profile_image = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
      move_uploaded_file($_FILES["profile_image"]["tmp_name"], "assets/owner/" . $profile_image);
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/owner/' . $profile_image;
      $config['wm_text'] = 'MeraMachine';
      $config['wm_type'] = 'text';
      $config['wm_font_path'] = './system/fonts/texb.ttf';
      $config['wm_font_size'] = '30';
      $config['wm_font_color'] = 'ffffff';
      $config['wm_vrt_alignment'] = 'bottom';
      $config['wm_hor_alignment'] = 'center';
      $config['wm_padding'] = '20';
      $config['wm_vrt_offset'] = '70';
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
        $array = array('code' => 400, 'message' => 'Error while uploading image');
        echo json_encode($array);
        exit;
      }
    } 
      $inserArray = array("owner_farm" => $owner_farm, 'mobile_no' => $mobile_no, 'state' => $state, 'district' => $district, 'machine_name' => $machine_name, 'address' => $address, 'more_details' => $more_details, 'profile_image' => $profile_image, 'status' => 'inactive', 'create_date' => date('Y-m-d H:i:s'));
      $this->db->insert('tbl_owner', $inserArray);

      $last_id = $this->db->insert_id();
      if (!empty($referral_code)) {
        $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
        $by_full_name = $get_usersInformation->login_name;
        $by_mobile_no = $get_usersInformation->mobile_no;
        $to_mobile_no = $mobile_no;
        $to_full_name = $owner_full_name;
        $user_id = $get_usersInformation->id;
        $forum_id =  $last_id;
        $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'owner');
        $this->db->insert('tbl_referral', $tbl_referral);
      }
      $array = array('code' => 200, 'message' => 'Owner information added successfully');
      $this->session->set_userdata('success', 'Your information added successfully and your profile shortly verify to our team');
      echo json_encode($array);
      exit;
    }
  public function add_new_mechanics()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $full_name = $field['full_name'];
    $mobile_number = $field['mobile_no'];
    $state = $field['state'];
    $district = $field['district'];
    $address = $field['address'];
    $machine_details = $field['machine_details'];
    $referral_code = $field['referral_code'];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $maxsize    = 4194304;
    $file_type = $_FILES['profile_image']['type'];
    $duplicate_check = $this->db->query("select id from  tbl_mechanics where mobile_no='" . $mobile_number . "'")->result();
    if (count($duplicate_check) >= 4) {
      $array = array('code' => 400, 'message' => 'You have registered the mechanics 4 times with this mobile number. Please register with another number');
      echo json_encode($array);
      exit;
    }
    $profile_image ='';
    if(!empty($_FILES['profile_image']['size'])){
    if (!in_array($file_type, $allowed) || $_FILES['profile_image']['size'] >= $maxsize) {
      $array = array('code' => 400, 'message' => 'profile image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.');
      echo json_encode($array);
      exit;
      $profile_image_info = pathinfo($_FILES['profile_image']['name']);
      $profile_image = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
      move_uploaded_file($_FILES["profile_image"]["tmp_name"], "assets/mechanics/" . $profile_image);
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/mechanics/' . $profile_image;
      $config['wm_text'] = 'MeraMachine';
      $config['wm_type'] = 'text';
      $config['wm_font_path'] = './system/fonts/texb.ttf';
      $config['wm_font_size'] = '30';
      $config['wm_font_color'] = 'ffffff';
      $config['wm_vrt_alignment'] = 'bottom';
      $config['wm_hor_alignment'] = 'center';
      $config['wm_padding'] = '20';
      $config['wm_vrt_offset'] = '70';
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
        $array = array('code' => 400, 'message' => 'Error while uploading image');
        echo json_encode($array);
        exit;
      }
    } 
  } 
      $inserArray = array("full_name" => $full_name, 'mobile_no' => $mobile_number, 'state' => $state, 'district' => $district, 'address' => $address, 'machine_details' => $machine_details, 'profile_image' => $profile_image, 'status' => 'inactive', 'create_date' => date('Y-m-d H:i:s'));
  
      $this->db->insert('tbl_mechanics', $inserArray);
      $last_id = $this->db->insert_id();
      if (!empty($referral_code)) {
        $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
        $by_full_name = $get_usersInformation->login_name;
        $by_mobile_no = $get_usersInformation->mobile_no;
        $to_mobile_no = $mobile_number;
        $to_full_name = $full_name;
        $user_id = $get_usersInformation->id;
        $forum_id =  $last_id;
        $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'mechanics');
        $this->db->insert('tbl_referral', $tbl_referral);
      }

      $array = array('code' => 200, 'message' => 'Mechanics information added successfully');
      $this->session->set_userdata('success', 'Your information added successfully and your profile shortly verify to our team');
      echo json_encode($array);
      exit;
    
  }
  public function add_new_shop()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $full_name = $field['full_name'];
    $mobile_number = $field['mobile_no'];
    $state = $field['state'];
    $district = $field['district'];
    $shop_address = $field['shop_address'];
    $about_your_shop = $field['about_your_shop'];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $maxsize    = 4194304;
    $file_type = $_FILES['images_shop']['type'];
    $referral_code = $field['referral_code'];
    $duplicate_check = $this->db->query("select id from  tbl_spare where mobile_no='" . $mobile_number . "'")->result();
    if (count($duplicate_check) >= 4) {
      $array = array('code' => 400, 'message' => 'You have registered the spare part 4 times with this mobile number. Please register with another number');
      echo json_encode($array);
      exit;
    }
    $file_directory = 'assets/spare/';

    $second_images_name = '';
    if (!empty($_FILES["prod_image2"]["name"])) {
      if (!in_array($file_type, $allowed) || $_FILES['prod_image2']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'image 2 Only jpg, gif and png image files are allowed. OR File too large. File must be less than 4 MB.');
        echo json_encode($array);
        exit;
      } else {
        $second_image_info1 = pathinfo($_FILES['prod_image2']['name']);
        $second_images_name = date("d-m-Y ") . rand(000000, 999999) . "." . $second_image_info1["extension"];
        move_uploaded_file($_FILES["prod_image2"]["tmp_name"], $file_directory . $second_images_name);
      }
    }
    $third_image_name = '';
    if (!empty($_FILES["prod_image3"]["name"])) {
      if (!in_array($file_type, $allowed) || $_FILES['prod_image3']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'image 3 Only jpg, gif and png image files are allowed. OR File too large. File must be less than 4 MB.');
        echo json_encode($array);
        exit;
      } else {
        $third_image_info1 = pathinfo($_FILES['prod_image3']['name']);
        $third_image_name = date("d-m-Y ") . rand(000000, 999999) . "." . $third_image_info1["extension"];
        move_uploaded_file($_FILES["prod_image3"]["tmp_name"], $file_directory . $third_image_name);
      }
    }
    $fourth_image_name = '';
    if (!empty($_FILES["prod_image4"]["name"])) {
      if (!in_array($file_type, $allowed) || $_FILES['prod_image4']['size'] >= $maxsize) {
        $array = array('code' => 400, 'message' => 'image 4 Only jpg, gif and png image files are allowed. OR File too large. File must be less than 4 MB.');
        echo json_encode($array);
        exit;
      } else {
        $fourth_image_info1 = pathinfo($_FILES['prod_image4']['name']);
        $fourth_image_name = date("d-m-Y ") . rand(000000, 999999) . "." . $fourth_image_info1["extension"];
        move_uploaded_file($_FILES["prod_image4"]["tmp_name"], $file_directory . $fourth_image_name);
      }
    }

    if (!in_array($file_type, $allowed) || $_FILES['profile_image']['size'] >= $maxsize) {
      $array = array('code' => 400, 'message' => 'profile image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.');
      echo json_encode($array);
      exit;
    } else {
      $profile_image_info = pathinfo($_FILES['images_shop']['name']);
      $images_shop = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
      move_uploaded_file($_FILES["images_shop"]["tmp_name"], "assets/spare/" . $images_shop);
      $inserArray = array("full_name" => $full_name, 'mobile_no' => $mobile_number, 'state' => $state, 'district' => $district, 'shop_address' => $shop_address,'images_shop' => $images_shop, 'status' => 'inactive', 'create_at' => date('Y-m-d H:i:s'), 'about_your_shop' => $about_your_shop, 'prod_image2' => $second_images_name, 'prod_image3' => $third_image_name, 'prod_image4' => $fourth_image_name);
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/spare/' . $images_shop;
      $config['wm_text'] = 'MeraMachine';
      $config['wm_type'] = 'text';
      $config['wm_font_path'] = './system/fonts/texb.ttf';
      $config['wm_font_size'] = '30';
      $config['wm_font_color'] = 'ffffff';
      $config['wm_vrt_alignment'] = 'bottom';
      $config['wm_hor_alignment'] = 'center';
      $config['wm_padding'] = '20';
      $config['wm_vrt_offset'] = '70';
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
        $array = array('code' => 400, 'message' => 'Error while uploading image');
        echo json_encode($array);
        exit;
      }
      $this->db->insert('tbl_spare', $inserArray);
      $last_id = $this->db->insert_id();
      if (!empty($referral_code)) {
        $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
        $by_full_name = $get_usersInformation->login_name;
        $by_mobile_no = $get_usersInformation->mobile_no;
        $to_mobile_no = $mobile_number;
        $to_full_name = $full_name;
        $user_id = $get_usersInformation->id;
        $forum_id =  $last_id;
        $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'spare');
        $this->db->insert('tbl_referral', $tbl_referral);
      }

      $array = array('code' => 200, 'message' => 'spare part information added successfully');
      $this->session->set_userdata('success', 'Your information added successfully and your shope or dealer shortly verify to our team');
      echo json_encode($array);
      exit;
    }
  }

  public function submit_learning_path()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $title = $field['title'];
    $description = $field['description'];
    $url = $field['url'];


    $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");
    $maxsize    = 4194304;
    $file_type = $_FILES['images']['type'];
    if (!in_array($file_type, $allowed) || $_FILES['images']['size'] >= $maxsize) {
      $array = array('code' => 400, 'message' => 'image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.');
      echo json_encode($array);
      exit;
    } else {
      $profile_image_info = pathinfo($_FILES['images']['name']);
      $image = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
      move_uploaded_file($_FILES["images"]["tmp_name"], "assets/learning/" . $image);
      $inserArray = array("title" => $title, 'description' => $description, 'url' => $url, 'image' => $image, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s'));
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/learning/' . $image;
      $config['wm_text'] = 'MeraMachine';
      $config['wm_type'] = 'text';
      $config['wm_font_path'] = './system/fonts/texb.ttf';
      $config['wm_font_size'] = '20';
      $config['wm_font_color'] = 'ffffff';
      $config['wm_vrt_alignment'] = 'bottom';
      $config['wm_hor_alignment'] = 'center';
      $config['wm_padding'] = '20';
      $config['wm_vrt_offset'] = '70';
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
        $array = array('code' => 400, 'message' => 'Error while uploading image');
        echo json_encode($array);
        exit;
      }
      $this->db->insert('tbl_learning', $inserArray);
      $array = array('code' => 200, 'message' => 'Learning information added successfully');
      $this->session->set_userdata('success', 'Learning information added successfully');
      echo json_encode($array);
      exit;
    }
  }
  public function add_new_engineer()
  {
    $this->load->library('image_lib');
    $array = array();
    $field = $this->input->post();
    $full_name = $field['full_name'];
    $mobile_number = $field['mobile_no'];
    $qualification = $field['qualification'];
    $state = $field['state'];
    $district = $field['district'];
    $address = $field['address'];
    $age = $field['age'];
    $your_experience = $field['your_experience'];
    $allowed = array("image/jpeg", "image/gif", "image/png");
    $maxsize    = 4194304;
    $file_type = $_FILES['profile_image']['type'];
    $referral_code = $field['referral_code'];
    $duplicate_check = $this->db->query("select id from  tbl_civil where mobile_no='" . $mobile_number . "'")->result();
    if (count($duplicate_check) >= 4) {
      $array = array('code' => 400, 'message' => 'You have registered the engineer 4 times with this mobile number. Please register with another number');
      echo json_encode($array);
      exit;
    }
    $profile_image='';
    if(!empty($_FILES['profile_image']['size'])){
    if (!in_array($file_type, $allowed) || $_FILES['profile_image']['size'] >= $maxsize) {
      $array = array('code' => 400, 'message' => 'profile image Only jpg, gif and png image files are allowed. OR profile images too large.  profile images must be less than 4 MB.');
      echo json_encode($array);
      exit;
    }
    $profile_image_info = pathinfo($_FILES['profile_image']['name']);
    $profile_image = date("d-m-Y ") . rand(000000, 999999) . "." . $profile_image_info["extension"];
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], "assets/civil/" . $profile_image);
    
    $config['image_library'] = 'gd2';
    $config['source_image'] = './assets/civil/' . $profile_image;
    $config['wm_text'] = 'MeraMachine';
    $config['wm_type'] = 'text';
    $config['wm_font_path'] = './system/fonts/texb.ttf';
    $config['wm_font_size'] = '30';
    $config['wm_font_color'] = 'ffffff';
    $config['wm_vrt_alignment'] = 'bottom';
    $config['wm_hor_alignment'] = 'center';
    $config['wm_padding'] = '20';
    $config['wm_vrt_offset'] = '70';
    $this->image_lib->initialize($config);
    $this->image_lib->watermark();

    if (!$this->image_lib->watermark()) {
      echo $this->image_lib->display_errors();
      $array = array('code' => 400, 'message' => 'Error while uploading image');
      echo json_encode($array);
      exit;
    }
    } 

    $inserArray = array("full_name" => $full_name, 'mobile_no' => $mobile_number, 'state' => $state, 'district' => $district, 'address' => $address, 'age' => $age, 'profile_image' => $profile_image, 'status' => 'inactive', 'create_at' => date('Y-m-d H:i:s'), 'qualification' => $qualification, 'your_experience' => $your_experience);
     
      $this->db->insert('tbl_civil', $inserArray);
      $last_id = $this->db->insert_id();
      if (!empty($referral_code)) {
        $get_usersInformation = $this->db->query("select *from tbl_users where referral_code='" . $referral_code . "'")->row();
        $by_full_name = $get_usersInformation->login_name;
        $by_mobile_no = $get_usersInformation->mobile_no;
        $to_mobile_no = $mobile_number;
        $to_full_name = $full_name;
        $user_id = $get_usersInformation->id;
        $forum_id =  $last_id;
        $tbl_referral = array('by_full_name' => $by_full_name, 'by_mobile_no' => $by_mobile_no, 'to_mobile_no' => $to_mobile_no, 'to_full_name' => $to_full_name, 'user_id' => $user_id, 'forum_id' => $forum_id, 'referral_code' => $referral_code, 'created_at' => date('Y-m-d H:i:s'), 'forum_type' => 'civil');
        $this->db->insert('tbl_referral', $tbl_referral);
      }
      $array = array('code' => 200, 'message' => 'engineer information added successfully');
      $this->session->set_userdata('success', 'Your information added successfully and your engineer or supervisor shortly verify to our team');
      echo json_encode($array);
      exit;
    
  }
  public function viewInformationForCivil()
  {
    $id = $this->input->post('id');
    $users = $this->db->query("select *from tbl_civil where id='" . $id . "'")->row();
    $array = array(
      'code' => 200, 'message' => 'view sucessfully', 'full_name' => $users->full_name, 'age' => $users->age, 'mobile_no' => $users->mobile_no,
      'profile_image' => $users->profile_image, 'district' => $users->district, 'state' => $users->state, 'address' => $users->address, 'your_experience' => $users->your_experience,
      'qualification' => $users->qualification, 'about_you' => $users->about_you
    );
    echo json_encode($array);
    exit;
  }
  public function viewInformationForSpare()
  {
    $id = $this->input->post('id');
    $users = $this->db->query("select *from tbl_spare where id='" . $id . "'")->row();
    $array = array(
      'code' => 200, 'message' => 'view sucessfully', 'full_name' => $users->full_name, 'shop_mobile_no' => $users->shop_mobile_no, 'mobile_no' => $users->mobile_no,
      'shop_address' => $users->shop_address, 'images_shop' => $users->images_shop, 'district' => $users->district, 'state' => $users->state, 'dealer_name' => $users->dealer_name,
      'about_your_shop' => $users->about_your_shop
    );
    echo json_encode($array);
    exit;
  }
}
