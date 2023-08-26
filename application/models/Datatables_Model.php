<?php
class Datatables_Model extends CI_Model
{
    var $table_cell = 'tbl_machine_cell';
    var $column_order_cell = array(null, 'id', 'owner_name', 'mobile_number', 'machine_location', 'created_date', 'status','favourite');
    var $column_search_cell = array('id', 'owner_name', 'mobile_number', 'machine_location', 'created_date', 'status','favourite');
    var $order_cell = array('id' => 'desc');

    var $table_driver = 'tbl_drivers';
    var $column_order_driver = array(null, 'id', 'full_name', 'mobile_no', 'operator_type', 'created_date', 'status','favourite');
    var $column_search_driver = array('id', 'full_name', 'mobile_no', 'operator_type', 'created_date', 'status','favourite');
    var $order_driver = array('id' => 'desc');

    var $table_owner = 'tbl_owner';
    var $column_order_owner = array(null, 'id', 'owner_full_name', 'mobile_no', 'address', 'create_date', 'status','favourite');
    var $column_search_owner = array('id','owner_full_name', 'mobile_no', 'address', 'create_date', 'status','favourite');
    var $order_owner = array('id' => 'desc');

    var $table_mechanics = 'tbl_mechanics';
    var $column_order_mechanics = array(null, 'id', 'full_name', 'mobile_no', 'address', 'create_date', 'status','favourite');
    var $column_search_mechanics = array('id', 'full_name', 'mobile_no', 'address', 'create_date', 'status','favourite');
    var $order_mechanics = array('id' => 'desc');

    var $table_users = 'tbl_users';
    var $column_order_users = array(null, 'id', 'login_name', 'mobile_no', 'created_at', 'status','referral_code');
    var $column_search_users = array('id', 'login_name', 'mobile_no', 'created_at', 'status','referral_code');
    var $order_users = array('id' => 'desc');

    var $table_spare = 'tbl_spare';
    var $column_order_spare = array(null, 'id', 'full_name', 'mobile_no', 'shop_address', 'create_at', 'status','favourite');
    var $column_search_spare = array('id', 'full_name', 'mobile_no', 'shop_address', 'create_at', 'status','favourite');
    var $order_spare = array('id' => 'desc');

    var $table_civil = 'tbl_civil';
    var $column_order_civil = array(null, 'id', 'full_name', 'mobile_no', 'address', 'create_at', 'status','favourite');
    var $column_search_civil = array('id', 'full_name', 'mobile_no', 'address', 'create_at', 'status','favourite');
    var $order_civil= array('id' => 'desc');

    var $table_learning = 'tbl_learning';
    var $column_order_learning = array(null, 'id', 'title', 'description', 'image', 'url', 'status','created_at');
    var $column_search_learning = array('id', 'title', 'description', 'image', 'url', 'status','created_at');
    var $order_learning= array('id' => 'desc');

    var $table_ref = 'tbl_referral';
    var $column_order_ref = array(null, 'id', 'forum_type', 'by_full_name', 'by_mobile_no', 'created_at', 'to_mobile_no','to_full_name','forum_id','user_id');
    var $column_search_ref = array('id', 'forum_type', 'by_full_name', 'by_mobile_no', 'created_at', 'to_mobile_no','to_full_name','forum_id','user_id');
    var $order_ref= array('id' => 'desc');


    var $table_type = 'tbl_driver_type';
    var $column_order_type= array(null, 'id', 'type');
    var $column_search_type = array('id', 'type');
    var $order_type= array('id' => 'desc');

    var $table_machinary = 'tbl_machinary_type';
    var $column_order_machinary= array(null, 'id', 'type');
    var $column_search_machinary = array('id', 'type');
    var $order_machinary= array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

    // Machinary Types

private function geting_datatables_machinary()
{
    $this->db->select($this->column_order_type);
    $this->db->from($this->table_machinary);
    $i = 0;
    foreach ($this->column_search_machinary as $item) // loop column 
    {
        if ($_POST['search']['value']) // if datatable send POST for search
        {
            if ($i === 0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            } else {
                $this->db->or_like($item, $_POST['search']['value']);
            }
            if (count($this->column_search_machinary) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
    }
    if (isset($_POST['order'])) // here order processing
    {
        $this->db->order_by($this->column_order_machinary[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order_machinary)) {
        $order = $this->order_machinary;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}
function get_datatables_machinary()
{
    $this->geting_datatables_machinary();
    if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}
function count_filtered_machinary()
{
    $this->geting_datatables_machinary();
    $query = $this->db->get();
    return $query->num_rows();
}
public function count_all_machinary()
{
    $this->db->from($this->table_machinary);
    return $this->db->count_all_results();
}

// Drivers Types

private function geting_datatables_type()
{
    $this->db->select($this->column_order_type);
    $this->db->from($this->table_type);
    $i = 0;
    foreach ($this->column_search_type as $item) // loop column 
    {
        if ($_POST['search']['value']) // if datatable send POST for search
        {
            if ($i === 0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            } else {
                $this->db->or_like($item, $_POST['search']['value']);
            }
            if (count($this->column_search_type) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
    }
    if (isset($_POST['order'])) // here order processing
    {
        $this->db->order_by($this->column_order_type[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order_type)) {
        $order = $this->order_type;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}
function get_datatables_type()
{
    $this->geting_datatables_type();
    if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}
function count_filtered_type()
{
    $this->geting_datatables_type();
    $query = $this->db->get();
    return $query->num_rows();
}
public function count_all_type()
{
    $this->db->from($this->table_type);
    return $this->db->count_all_results();
}

        // Ref Details

        private function geting_datatables_ref($id)
        {
            $this->db->select($this->column_order_ref);
            $this->db->from($this->table_ref);
            $this->db->where('user_id',$id);
            $i = 0;
            foreach ($this->column_search_ref as $item) // loop column 
            {
                if ($_POST['search']['value']) // if datatable send POST for search
                {
                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
                    if (count($this->column_search_ref) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
            if (isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_ref[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else if (isset($this->order_ref)) {
                $order = $this->order_ref;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
        function get_datatables_ref($id)
        {
            $this->geting_datatables_ref($id);
            if ($_POST['length'] != -1)
                $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }
        function count_filtered_ref($id)
        {
            $this->geting_datatables_ref($id);
            $query = $this->db->get();
            return $query->num_rows();
        }
        public function count_all_ref($id)
        {
            $this->db->from($this->table_ref);
            $this->db->where('user_id',$id);
            return $this->db->count_all_results();
        }
    // Learning Details

    private function geting_datatables_learning()
    {
        $this->db->select($this->column_order_learning);
        $this->db->from($this->table_learning);
        $i = 0;
        foreach ($this->column_search_learning as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_learning) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_learning[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_learning)) {
            $order = $this->order_learning;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_learning()
    {
        $this->geting_datatables_learning();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_learning()
    {
        $this->geting_datatables_learning();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_learning()
    {
        $this->db->from($this->table_learning);
        return $this->db->count_all_results();
    }
    // Civil Details Listing
    private function geting_datatables_civil()
    {
        $this->db->select($this->column_order_civil);
        $this->db->from($this->table_civil);
        $i = 0;
        foreach ($this->column_search_civil as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_civil) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_civil[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_civil)) {
            $order = $this->order_civil;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_civil()
    {
        $this->geting_datatables_civil();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_civil()
    {
        $this->geting_datatables_civil();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_civil()
    {
        $this->db->from($this->table_civil);
        return $this->db->count_all_results();
    }
    // Spare Details Listing
    private function geting_datatables_spare()
    {
        $this->db->select($this->column_order_spare);
        $this->db->from($this->table_spare);
        $i = 0;
        foreach ($this->column_search_spare as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_spare) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_spare[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_spare)) {
            $order = $this->order_spare;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_spare()
    {
        $this->geting_datatables_spare();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_spare()
    {
        $this->geting_datatables_spare();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_spare()
    {
        $this->db->from($this->table_spare);
        return $this->db->count_all_results();
    }
    // User Details

    private function geting_datatables_users()
    {
        $this->db->select($this->column_order_users);
        $this->db->from($this->table_users);
        $i = 0;
        foreach ($this->column_search_users as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_users) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_users[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_users)) {
            $order = $this->order_users;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_users()
    {
        $this->geting_datatables_users();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_users()
    {
        $this->geting_datatables_users();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_users()
    {
        $this->db->from($this->table_users);
        return $this->db->count_all_results();
    }

    // Mechanics Details
    private function geting_datatables_mechanics()
    {
        $this->db->select($this->column_order_mechanics);
        $this->db->from($this->table_mechanics);
        $i = 0;
        foreach ($this->column_search_mechanics as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_mechanics) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_mechanics[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_mechanics)) {
            $order = $this->order_mechanics;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_mechanics()
    {
        $this->geting_datatables_mechanics();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_mechanics()
    {
        $this->geting_datatables_owner();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_mechanics()
    {
        $this->db->from($this->table_mechanics);
        return $this->db->count_all_results();
    }


    // Owner Details
    private function geting_datatables_owner()
    {
        $this->db->select($this->column_order_owner);
        $this->db->from($this->table_owner);
        $i = 0;
        foreach ($this->column_search_owner as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_owner) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_owner[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_owner)) {
            $order = $this->order_owner;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_owner()
    {
        $this->geting_datatables_owner();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_owner()
    {
        $this->geting_datatables_owner();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_owner()
    {
        $this->db->from($this->table_owner);
        return $this->db->count_all_results();
    }

    // Order Log
    private function geting_datatables_cell()
    {
        $this->db->select($this->column_order_cell);
        $this->db->from($this->table_cell);
        $i = 0;
        foreach ($this->column_search_cell as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_cell) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_cell[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_cell)) {
            $order = $this->order_cell;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_cell()
    {
        $this->geting_datatables_cell();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_cll()
    {
        $this->geting_datatables_cell();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_cell()
    {
        $this->db->from($this->table_cell);
        return $this->db->count_all_results();
    }

    private function geting_datatables_driver()
    {
        $this->db->select($this->column_order_driver);
        $this->db->from($this->table_driver);
        $i = 0;
        foreach ($this->column_search_driver as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_driver) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_driver[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_driver)) {
            $order = $this->order_driver;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_driver()
    {
        $this->geting_datatables_driver();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_driver()
    {
        $this->geting_datatables_driver();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_driver()
    {
        $this->db->from($this->table_driver);
        return $this->db->count_all_results();
    }  
}
