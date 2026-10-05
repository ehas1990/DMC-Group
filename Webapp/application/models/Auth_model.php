<?php
class Auth_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


 public function Readmsgcount()
    { 
     
        $table='customers';
        $this->db->select('*');
          $this->db->where('customers.status =',2);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function unReadmsgcount()
    { 
     
        $table='customers';
        $this->db->select('*');
          $this->db->where('customers.status =',1);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function totalcountmsg()
    { 
     
        $table='customers';
        $this->db->select('*');
      
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }


    public function admin_login($data)
    {
        $query = $this->db->get_where('users', array('email' => $data['email'], 'status' => 1));
        $result = $query->row_array();

        if($result )
        {
            if (password_verify($this->input->post('password'), $result['password'])){

            $sessdata = array(
                'admin_id'     => $result['id'],
                'admin_name'   => $result['name'],
                'admin_lastname'   => $result['last_name'],
                'admin_email'  => $result['email'],
                'role'         => $result['role'],
                'last_login'         => $result['last_login'],
                'admin_logged' => TRUE
            );

            $this->session->set_userdata($sessdata);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
        return FALSE;
    }

    public function register($data)
    {
        $query = $this->db->insert('ci_users', $data);
        $result = $this->db->affected_rows();

        if($result)
        {
			return TRUE;
        }
        return FALSE;
    }
    public function selectbackendsettings()
    { 
     
        $table='site_backendconfig';
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->row_array();

    }
     public function countactiveloanbybank()
    { 
     
        $table='bank_details';
        $this->db->select('*');
          $this->db->where('bank_details.status =',1);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
        public function countactiveloanbyshop1()
    { 
     
         $table='loan_details';
          $table1='loan';
         
        $this->db->select('*');
         $this->db->join('loan','loan.id='.$table.'.loan_id');
          $this->db->where('loan_details.status =',1);
            $this->db->where('loan.branch_id =',12);
            $this->db->group_by('loan_details.loan_number');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
       public function countactiveloanbyshop2()
    { 
     
           $table='loan_details';
          $table1='loan';
         
        $this->db->select('*');
         $this->db->join('loan','loan.id='.$table.'.loan_id');
          $this->db->where('loan_details.status =',1);
            $this->db->where('loan.branch_id =',13);
             $this->db->group_by('loan_details.loan_number');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function countcloseloan1()
    { 
        
          $table='loan_details';
          $table1='loan';
         
        $this->db->select('*');
         $this->db->join('loan','loan.id='.$table.'.loan_id');
          $this->db->where('loan_details.status =',2);
            $this->db->where('loan.branch_id =',12);
             $this->db->group_by('loan_details.loan_number');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
        
     
        // $table='loan';
        // $this->db->select('*');
        //   $this->db->where('loan.status =',2);
        //   $this->db->where('loan_details.branch_id =',12);
        // $this->db->from($table);
        // $query = $this->db->get();
        // return $query->num_rows();

    }
        public function countcloseloan2()
    { 
     
         $table='loan_details';
          $table1='loan';
         
        $this->db->select('*');
         $this->db->join('loan','loan.id='.$table.'.loan_id');
          $this->db->where('loan_details.status =',2);
            $this->db->where('loan.branch_id =',13);
             $this->db->group_by('loan_details.loan_number');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
     public function countcloseloanbybank()
    { 
     
        $table='bank_details';
        $this->db->select('*');
          $this->db->where('bank_details.status =',2);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
     public function countactiveloan()
    { 
     
        $table='loan';
        $this->db->select('*');
          $this->db->where('loan.status =',1);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }
     public function countcloseloan()
    { 
     
       $table='loan_details';
          $table1='loan';
         
        $this->db->select('*');
         $this->db->join('loan','loan.id='.$table.'.loan_id');
          $this->db->where('loan_details.status =',2);
         
             $this->db->group_by('loan_details.loan_number');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
        
        // $table='loan';
        // $this->db->select('*');
        //   $this->db->where('loan.status =',2);
        // $this->db->from($table);
        // $query = $this->db->get();
        // return $query->num_rows();

    }
    public function updateLastLogin($user_id)
    {

        $this->db->where('id', $user_id);
        $result = $this->db->update('users', ['last_login' => date('Y-m-d H:i:s')]);

        if($result){    
            return true;
        }
        else
        {
            return $this->db->error();
        }
    }
    public function todayStock()
{ 
    $date = date("Y-m-d");
    $table='product_inventory';
    $this->db->select($table.'.* ,products.product_name as pro_name,category.cat_name as cat_name,outlet.name as outlet_name');
    $this->db->join('products','products.id='.$table.'.product_id');
    $this->db->join('category','category.id='.$table.'.cat_id');
    $this->db->join('outlet','outlet.id='.$table.'.outlet_id');
    if($this->session->userdata('role') != 1){
        $filter['outlet_id']= $this->session->userdata('admin_id');
        $this->db->where("product_inventory.outlet_id = '" . $filter['outlet_id'] . "'");
    }
    $this->db->where('product_inventory.date =', $date);
   
    $this->db->order_by('product_inventory.id', 'DSCE');
    $this->db->from($table);
    $query = $this->db->get();
    // var_dump($this->db->last_query());
    //        exit;
    return $query->result_array();

}
public function todayOrder()
{ 
     $date = date("Y-m-d");
  
				$table="orders";
				
				// $table3="products";
   	 $this->db->select('orders.*,customer_billing_details.*,orders.id as id,city.city_name as pickup_loactions_name, orders.order_id as orderId,ccavenue_transaction_details.status_message as payment_status_online');
// 			$this->db->join('order_details','order_details.order_id='.$table.'.id');
// 			$this->db->join('products','products.id='.$table2.'.produt_id','left');
// 			$this->db->join('category','category.id='.$table3.'.cat_id','left');
            $this->db->join('city','city.id='.$table.'.pickup_loactions','left');
			$this->db->join('customer_billing_details','customer_billing_details.id='.$table.'.shipping_id');
			 $this->db->join('ccavenue_transaction_details','ccavenue_transaction_details.order_id='.$table.'.id','left');
            $this->db->where('orders.delivery_date =', $date);
    $this->db->where('orders.status = 1');
   
    $this->db->order_by('orders.id', 'DSCE');
    // $this->db->group_by('orders.id');
    $this->db->from($table);
    $query = $this->db->get();
    //  var_dump($this->db->last_query());
    //         exit;
    return $query->result_array();

}
}