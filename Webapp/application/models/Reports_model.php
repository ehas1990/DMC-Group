<?php
class Reports_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
        public function getCustomerDetails($shipping_id)
{ 
    $table='customer_billing_details';
    $this->db->select($table.'.*,');
    
   
    $this->db->where('id=',$shipping_id);
    $this->db->from($table);
    $query = $this->db->get();
    return $query->row_array();

}
    public function getorderdetails($orderid)
{ 
    $table='orders';
    $this->db->select($table.'.*,');
    
   
    $this->db->where('id=',$orderid);
    $this->db->from($table);
    $query = $this->db->get();
    return $query->row_array();

}
    public function getcoupn($coupon_code_id)
{ 
    $table='coupons';
    $this->db->select($table.'.*,');
    
   
    $this->db->where('id=',$coupon_code_id);
    $this->db->from($table);
    $query = $this->db->get();
    return $query->row_array();

}
public	function updateCoupon($total_count, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('coupons', $total_count);
 return $error;
}
 public function selectAllUsers()
{ 
    $table='users';
    $this->db->select($table.'.* ,user_roletype.role_type as roletype_name');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.role');
    $this->db->order_by('name', 'Asc');
    $this->db->where('role!=', 1);
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}
public function allProject()
{
	$table='project';
    $this->db->select($table.'.*');
    $this->db->where('pro_status!=', 2);
    if($this->session->userdata('role') != 1){
        $this->db->join('project_assigned_staff','project_assigned_staff.pro_id='.$table.'.id');
        $this->db->where("project_assigned_staff.user_id = '" . $this->session->userdata('admin_id'). "'");
    }

    $this->db->from($table);
   
    $query = $this->db->get();
	return $query->result(); 

}
public function allTask()
{
    $table='task';
    $this->db->select('*');
    if($this->session->userdata('role') != 1){
        $this->db->join('task_assigined_staff','task_assigined_staff.task_id='.$table.'.id');
        $this->db->where("task_assigined_staff.users_id = '" . $this->session->userdata('admin_id'). "'");
    }
    $this->db->from($table);
    $query = $this->db->get();
	return $query->result(); 

}
public function GetActivityLogs($filter)
{
    $table='loan';
    $table1='loan_details';
    $this->db->select($table1.'.*,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');

    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('admin_id');
        $this->db->where("loan_details.created_by = '" . $filter['created_by'] . "'");
    }
  
    if(isset($filter['task_start_date']) && isset($filter['task_end_date'])){
        $start_date=$filter['task_start_date'];
                       
        $this->db->where("loan_details.created_date >= '" . date('Y-m-d', strtotime($filter['task_start_date'])) ."'");
        $this->db->where("loan_details.created_date <= '" . date('Y-m-d', strtotime($filter['task_end_date'] .'+1 day')) ."'");
    }
    
    $this->db->from($table);
    $query = $this->db->get();
     
    $row= $query->result_array();
    return $row;
}

public function Filterbank($filter)
{
    
    $table='bank_details';
    $this->db->select($table.'.* ,users.name as created_by,user_roletype.role_type as branch');

    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    $this->db->order_by('bank_details.id', 'desc');


    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('admin_id');
        $this->db->where("bank_details.created_by = '" . $filter['created_by'] . "'");
    }
    if(isset($filter['task_start_date']) && isset($filter['task_end_date'])){
        $start_date=$filter['task_start_date'];
                       
        $this->db->where("bank_details.created_date >= '" . date('Y-m-d', strtotime($filter['task_start_date'])) ."'");
        $this->db->where("bank_details.created_date <= '" . date('Y-m-d', strtotime($filter['task_end_date'] .'+1 day')) ."'");
    }
    
       if(isset($filter['loanstatus'])){
            if($filter['loanstatus']!='All')
            {
                 $this->db->where("bank_details.status = '" . $filter['loanstatus'] . "'");
            }
       
       
    }
  
    $this->db->from($table);
    $query = $this->db->get();
    
    return $query->result_array(); 
    
    
    
}


public function Filtercustomer($filter)
{ 
   
    $table='loan';
    $table1='loan_details';
    $this->db->select($table1.'.*,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');


    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('role');
       
        $this->db->where("loan.branch_id = '" . $filter['created_by'] . "'");
    }
        if(isset($filter['loanstatus'])){
            if($filter['loanstatus']!='All')
            {
                 $this->db->where("loan_details.status = '" . $filter['loanstatus'] . "'");
            }
       
       
    }
  
    if(isset($filter['task_start_date']) && isset($filter['task_end_date'])){
        $start_date=$filter['task_start_date'];
                       
        $this->db->where("loan_details.loan_date >= '" . date('Y-m-d', strtotime($filter['task_start_date'])) ."'");
        $this->db->where("loan_details.loan_date <= '" . date('Y-m-d', strtotime($filter['task_end_date'] .'+1 day')) ."'");
    }



 
    $this->db->from($table);
    $query = $this->db->get();
    
    return $query->result_array();

}


public function Filterpayment($filter)
{ 
    $table='payment_history';
    $table2='loan';
    $table1='loan_details';
    $this->db->select($table.'.*,loan_details.gram as gram,loan_details.remark as remark,loan_details.details_of_gold as details_of_gold,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('loan','loan.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table2.'.customer_id');
    $this->db->join('users','users.id='.$table2.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table2.'.branch_id','left');


      if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('role');
       
        $this->db->where("loan.branch_id = '" . $filter['created_by'] . "'");
    }
  
    if(isset($filter['task_start_date']) && isset($filter['task_end_date'])){
        $start_date=$filter['task_start_date'];
                       
        $this->db->where("payment_history.payment_date >= '" . date('Y-m-d', strtotime($filter['task_start_date'])) ."'");
        $this->db->where("payment_history.payment_date <= '" . date('Y-m-d', strtotime($filter['task_end_date'] .'+1 day')) ."'");
    }



 
    $this->db->from($table);
    $query = $this->db->get();
        
    return $query->result_array();

}
 public function Onlinepaymentfilter($filter)
{ 
    $table='ccavenue_transaction_details';
    $this->db->select($table.'.* ,orders.order_id  as order_id ');
    $this->db->join('orders','orders.id='.$table.'.order_id');
  $this->db->where('orders.status !=','8');
    if(isset($filter['order_status'])){
       
    $this->db->where("orders.status = '" . $filter['order_status'] . "'");
}
    if(isset($filter['task_start_date']) && isset($filter['task_end_date'])){
        $start_date=$filter['task_start_date'];
                       
        $this->db->where("orders.delivery_date >= '" . date('Y-m-d', strtotime($filter['task_start_date'])) ."'");
        $this->db->where("orders.delivery_date <= '" . date('Y-m-d', strtotime($filter['task_end_date'] .'+1 day')) ."'");
    }
    
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result_array();

}

public function getPrice($produt_id)
{
	$this->db->select('products.base_price as base_price');
	$this->db->from('products');
$this->db->where('products.id =',$produt_id);
	$query = $this->db->get();
// 	var_dump($this->db->last_query());
//              exit;
  return $query->row();

	
}
public function getsumPrice($order_id)
{
$this->db->select('order_details.price as base_price,order_details.qutantity as qutantity');
	$this->db->from('order_details');
$this->db->where('order_details.order_id =',$order_id);
	$query = $this->db->get();
// 	var_dump($this->db->last_query());
//              exit;
  return $query->result();

	
}
public function getsumQuantity($order_id)
{
	$this->db->select('sum(qutantity) as qutantity');
	$this->db->from('order_details');
$this->db->where('order_details.order_id =',$order_id);
	$query = $this->db->get();
//  	var_dump($this->db->last_query());
//               exit;
  return $query->row();

	
}

function UpdateOrder($data,$id){
    $this->db->where('id',$id);
     $this->db->update('orders', $data);
     return true;

}



}