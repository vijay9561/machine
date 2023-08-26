<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
error_reporting(0);
class Users_controller  extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['template'] = 'index';
        $data['title'] = 'Home';
        $data['page'] = 'Home';
        $this->layout_users($data);
    }
    public function drivers()
    {
        $data['template'] = 'drivers';
        $data['title'] = 'Drivers';
        $data['fetchDrivers'] =$this->db->query("select *from tbl_drivers where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_drivers where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Drivers';
        $this->layout_users($data);
    }
    public function sale_machine()
    {
        $data['template'] = 'saleMachine';
        $data['title'] = 'Sell Machine';
        $data['page'] = 'Sell Machine';
        $this->layout_users($data);
    }
    public function machineDetails()
    {
        $data['template'] = 'machineDetails';
        $data['title'] = 'Machine Details';
        $data['page'] = 'Machine Details';
        $this->layout_users($data);
    }
    public function addNewDrivers()
    {
        $data['template'] = 'addNewDrivers';
        $data['fetchData'] = $this->db->query("select *from tbl_driver_type")->result();
        $data['title'] = 'Add new Driver';
        $data['page'] = 'Add new Driver';
        $this->layout_users($data);
    }
    public function owner()
    {
        $data['template'] = 'owner';
        $data['title'] = 'Owner';
        $data['fetchDrivers'] =$this->db->query("select *from tbl_owner where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_owner where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Owner';
        $this->layout_users($data);
    }
    public function addNewOwner()
    {
        $data['template'] = 'addNewOwner';
        $data['fetchData'] = $this->db->query("select *from tbl_driver_type")->result();
        $data['title'] = 'Add new Owner';
        $data['page'] = 'Add new Owner';
        $this->layout_users($data);
    }
    public function addNewMechanics()
    {
        $data['template'] = 'addNewOwnerMechanics';
        $data['title'] = 'Add New Mechanics';
        $data['page'] = 'Add New Mechanics';
        $this->layout_users($data);
    }
    public function mechanics()
    {
        $data['template'] = 'mechanics';
        $data['title'] = 'Mechanics';
       $data['fetchMechanics'] =$this->db->query("select *from tbl_mechanics where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_mechanics where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Mechanics';
        $this->layout_users($data);
    }
    
    public function sparePart()
    {
        $data['template'] = 'spareParth';
        $data['title'] = 'Spare Part';
       $data['fetchMechanics'] =$this->db->query("select *from tbl_spare where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_spare where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Spare Part';
        $this->layout_users($data);
    }
    public function addNewSparePart()
    {
        $data['template'] = 'addNewSparePart';
        $data['title'] = 'Add New Spare Part';
        $data['page'] = 'Add New Spare Part';
        $this->layout_users($data);
    }
   
    public function engineerOrSupervisor()
    {
        $data['template'] = 'engineerOrSupervisor';
        $data['title'] = 'Engineer Or Supervisor';
       $data['fetchMechanics'] =$this->db->query("select *from tbl_civil where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_civil where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Engineer Or Supervisor';
        $this->layout_users($data);
    }
    public function addNewEngineerAndSupervisor()
    {
        $data['template'] = 'addNewEngineerAndSupervisor';
        $data['title'] = 'Add New Engineer And Supervisor';
        $data['page'] = 'Add New Engineer And Supervisor';
        $this->layout_users($data);
    }

    public function sellBuyMachine()
    {
        $data['template'] = 'sellBuyMachine';
        $data['title'] = 'Buy Machine';
        $data['fetchMechanics'] =$this->db->query("select *from tbl_machine_cell where favourite=0 and status='active' ORDER BY rand()")->result(); 
        $data['favourite'] =$this->db->query("select *from tbl_machine_cell where favourite<>0 order by favourite asc")->result(); 
        $data['page'] = 'Buy Machine';
        $this->layout_users($data);
    }
    public function about()
    {
        $data['template'] = 'about';
        $data['title'] = 'About Us';
        $data['page'] = 'About Us';
        $this->layout_users($data);
    }

    public function contact()
    {
        $data['template'] = 'contact';
        $data['title'] = 'Contact Us';
        $data['page'] = 'Contact Us';
        $this->layout_users($data);
    }
    public function termsAndCondition()
    {
        $data['template'] = 'terms_and_condition';
        $data['title'] = 'Terms & Condition';
        $data['page'] = 'Terms & Condition';
        $this->layout_users($data);
    }
    
    public function privacy_policy()
    {
        $data['template'] = 'privacy_policy';
        $data['title'] = 'Privacy Policy';
        $data['page'] = 'Privacy Policy';
        $this->layout_users($data);
    }
    public function spareDetails()
    {
        $data['template'] = 'spareDetails';
        $data['title'] = 'Spare Details';
        $data['page'] = 'Spare Details';
        $this->layout_users($data);
    }
    public function learningPath()
    {
        $data['template'] = 'learningPath';
        $data['title'] = 'Learning Path';
        $data['page'] = 'Learning Path';
        $data['learningPath'] =$this->db->query("select *from tbl_learning order by id desc")->result();
        $this->layout_users($data);
    }
}
