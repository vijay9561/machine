<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Datatables_Controller  extends MY_Controller
{
    private $arradata;
    public function __construct()
    {
        parent::__construct();
        $this->arradata = array(1, 2, 3, 4, 5, 6);
    }
    public function cell_machine_list()
    {
        $list = $this->Datatables_Model->get_datatables_cell();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $favourite = '';
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_record(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'viewMachinary?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';
            $favourite .= '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouritemachinary(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouritemachinary(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }

            $favourite .= '</ul></div>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->owner_name;
            $row[] = $rows->mobile_number;
            $row[] = $rows->machine_location;
            $row[] = date('d-m-Y', strtotime($rows->created_date));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_cell(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_cll(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function driver_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_driver();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $favourite = '';
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_driver(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_driver(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_record_driver(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'driver-list?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';

            $favourite .= '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouritedriver(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouritedriver(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }
            $favourite .= '</ul></div>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->full_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->operator_type;
            $row[] = date('d-m-Y', strtotime($rows->created_date));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_driver(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_driver(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function owner_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_owner();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_owner(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_owner(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_record_owner(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'owner-list?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';
            $favourite = '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouriteowner(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouriteowner(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }
            $favourite .= '</ul></div>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->owner_full_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->address;
            $row[] = date('d-m-Y', strtotime($rows->create_date));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_owner(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_owner(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function mechanics_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_mechanics();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_mechanics(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_mechanics(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_record_mechanics(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'mechanics-list?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';

            $favourite = '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouritemmechanics(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouritemmechanics(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->full_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->address;
            $row[] = date('d-m-Y', strtotime($rows->create_date));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_mechanics(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_mechanics(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function spare_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_spare();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_spare(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_spare(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_spare_details(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'spareList?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';

            $favourite = '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouritemspare(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouritemspare(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }
            $favourite .= '</ul></div>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->full_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->shop_address;
            $row[] = date('d-m-Y', strtotime($rows->create_at));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatables_Model->count_all_spare(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_spare(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    public function civil_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_civil();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_civil(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_civil(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_civil_details(' . $rows->id . ')"><i class="fa fa-trash"></i> Delete</a>';
            $view = '<a class="btn btn-gradient-success btn-rounded btn-fw btn-sm"  href="' . site_url() . 'civilList?view=' . base64_encode($rows->id) . '"><i class="fa fa-eye"></i> view</a>';

            $favourite = '<div class="dropdown" style="display: initial;">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"> ' . $rows->favourite . '
            <span class="caret"></span></button>
            <ul class="dropdown-menu">';
            if ($rows->favourite != 0) {
                $favourite .= '<li><a href="#" onclick="updatefavouritemcivil(' . $rows->id . ',0)">0</a></li>';
            }
            foreach ($this->arradata as $val) {
                if ($val != $rows->favourite) {
                    $favourite .= '<li><a href="#" onclick="updatefavouritemcivil(' . $rows->id . ',' . $val . ')">' . $val . '</a></li>';
                }
            }
            $favourite .= '</ul></div>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->full_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->address;
            $row[] = date('d-m-Y', strtotime($rows->create_at));
            $row[] = $status . '&nbsp;' . $favourite;
            $row[] = $delete . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatables_Model->count_all_civil(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_civil(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function learning_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_learning();
        $data = array();
        $no = $_POST['start'];
        $status = '';

        foreach ($list as $rows) {
            $status = '';
            if ($rows->status == 'active') {
                $status = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" title="Active" onclick="category_Status_Changed_learning(' . $rows->id . ',0)"><i class="mdi mdi-check-circle"></i></a>';
            } else {
                $status = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#"  title="Inactive" onclick="category_Status_Changed_learning(' . $rows->id . ',1)"><i class="mdi mdi-window-close"></i></a>';
            }
            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_learning_details(' . $rows->id . ')" title="Delete"><i class="fa fa-trash"></i></a>';
            $view = '<a class="btn btn-gradient-info btn-rounded btn-fw btn-sm"  href="' . site_url() . 'learningpath?view=' . base64_encode($rows->id) . '" title="View"><i class="fa fa-eye"></i></a>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->title;
            $row[] = $rows->url;
            $row[] = date('d-m-Y', strtotime($rows->created_at));
            $row[] = $delete . '&nbsp;' . $status . '&nbsp;' . $view;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatables_Model->count_all_learning(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_learning(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function users_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_users();
        $data = array();
        $no = $_POST['start'];
        $status = '';



        foreach ($list as $rows) {

            $referal = $this->db->query("select count(id)  as total_count from tbl_referral where user_id='" . $rows->id . "'")->result();
            $ref = '';
            if ($referal[0]->total_count >= 1) {
                $ref = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="' . site_url() . 'usersList?view=' . base64_encode($rows->id) . '" title="View Referral">View Referral (' . $referal[0]->total_count . ')</a>';
            } else {
                $ref = 'No Referral';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->login_name;
            $row[] = $rows->mobile_no;
            $row[] = $rows->referral_code;
            $row[] = date('d-m-Y', strtotime($rows->created_at));
            $row[] = $ref;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_users(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_users(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function referral_table_list()
    {
        $id =  base64_decode($this->input->post('referral_ids'));
        $list = $this->Datatables_Model->get_datatables_ref($id);
        $data = array();
        $no = $_POST['start'];
      
        foreach ($list as $rows) {
            $viewAction =''; 
            switch ($rows->forum_type) {
                case 'driver':
                    $viewAction = 'driver-list';
                    break;
                case 'owner':
                    $viewAction = 'owner-list';
                    break;
                case 'mechanics':
                    $viewAction = 'mechanics-list';
                    break;
                case 'machinary':
                    $viewAction = 'viewMachinary';
                    break;
                case 'spare':
                    $viewAction = 'spareList';
                    break;
                case 'civil':
                    $viewAction = 'civilList';
                    break; 
                default:
                $viewAction = '';
            }
         $button = '<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="' . site_url().$viewAction.'?view=' . base64_encode($rows->forum_id) . '" title="View Referral">View Forum</a>';                    
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->by_full_name;
            $row[] = $rows->by_mobile_no;
            $row[] = $rows->to_full_name;
            $row[] = $rows->to_mobile_no;
            $row[] = $rows->forum_type;
            $row[] = date('d-m-Y', strtotime($rows->created_at));
            $row[] =$button;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_ref($id),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_ref($id), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function driveType_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_type();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {

            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_driver_types(' . $rows->id . ')" title="Delete"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->type;
            $row[] = $delete;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_type(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_type(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function machinaryType_table_list()
    {
        $list = $this->Datatables_Model->get_datatables_machinary();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {

            $delete = '<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"  href="#" onclick="delete_machinary_types(' . $rows->id . ')" title="Delete"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->type;
            $row[] = $delete;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'], "recordsTotal" => $this->Datatables_Model->count_all_machinary(),
            "recordsFiltered" => $this->Datatables_Model->count_filtered_machinary(), "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
