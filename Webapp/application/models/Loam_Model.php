<?php
class Loam_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function selectAllloan()
{ 
    $table='loan';
    
    $this->db->select($table.'.* ,loan.status as loanstatus,loan_details.status as status,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('admin_id');
        $this->db->where("loan.created_by = '" . $filter['created_by'] . "'");
    }
    $this->db->order_by('loan.id', 'desc');
    $this->db->group_by('loan.loan_number');
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}


public function Goldloandetails($loan_number)
{ 
    $table='loan';
    $table1='loan_details';
    $this->db->select($table1.'.*,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    $this->db->where('loan_details.loan_number', $loan_number);
    $this->db->order_by('loan_details.id', 'asc');
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}
public function Editlaon($loan_number,$id)
{ 
    $table='loan';
    $table1='loan_details';
    $this->db->select($table1.'.*,loan.gram as gram,loan.details_of_gold as details_of_gold,loan.photo as photo,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address,loan_details.status as statusdetails');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    $this->db->where('loan_details.loan_number', $loan_number);
    $this->db->where('loan_details.id', $id);
    $this->db->order_by('loan_details.id', 'desc');
    $this->db->from($table);
    $query = $this->db->get();
    
    return $query->row();


}
public function Editbanklaon($id)
{ 
    $table='bank_details';
    $this->db->select($table.'.*');

    $this->db->where('bank_details.id', $id);
    $this->db->from($table);
    $query = $this->db->get();
   
    return $query->row();


}
public function GetBankAmount($id)
{ 
    $table='bank_details';
    $this->db->select($table.'.*');

    $this->db->where('bank_details.loan_id', $id);
    $this->db->from($table);
    $query = $this->db->get();
   
    return $query->row();


}
public function CustomerAboutLoan($loan_number)
{ 
    $table='customers';
    $table1='loan_details';
    $table2='loan';
    $this->db->select($table1.'.*,loan.gram as gram,loan.details_of_gold as details_of_gold,loan.photo as photo,loan.loan_number as loan_number,customers.first_name as first_name,customers.id as customerid');
    $this->db->join('loan','loan.customer_id='.$table.'.id');
    $this->db->join('loan_details','loan_details.loan_number='.$table2.'.loan_number','left');
    $this->db->where('loan.loan_number', $loan_number);
    $this->db->from($table);
    $query = $this->db->get();
  
    return $query->row();


}
public function ListPayments($loan_number,$id)
{ 
    $table='payment_history';
  
    $this->db->select($table.'.*,');
  
    $this->db->where('payment_history.loan_number', $loan_number);
    $this->db->where('payment_history.loan_details_id', $id);
  
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}
function SaveLoandetails($data){
	return $this->db->insert('loan_details', $data);
}
function Savepayment($data){
	return $this->db->insert('payment_history', $data);
}

public function Selectbyid($table,$id)
{
    $this->db->where('id',$id);
    $query = $this->db->get($table);
    return $query->row_array();
}
function UpdateLoandetails($data,$id){
    $this->db->where('id',$id);
     $this->db->update('loan_details', $data);
     return true;

}
public function selectAllbankloan($loan_number)
{ 
    $table='bank_details';
    $this->db->select($table.'.* ,users.name as created_by,user_roletype.role_type as branch');

    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    
    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('admin_id');
        $this->db->where("bank_details.created_by = '" . $filter['created_by'] . "'");
    }
    $this->db->where('bank_details.loan_number', $loan_number);
    $this->db->order_by('bank_details.id', 'desc');
    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}
public function selectViewAllbankloan($id)
{ 
    $table='bank_details';
    $this->db->select($table.'.* ,users.name as created_by,user_roletype.role_type as branch');

    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    
    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('admin_id');
        $this->db->where("bank_details.created_by = '" . $filter['created_by'] . "'");
    }
    $this->db->where('bank_details.loan_id', $id);
    $this->db->order_by('bank_details.id', 'desc');
    $this->db->from($table);
    $query = $this->db->get();
    // var_dump($this->db->last_query());
    // exit;
    return $query->row();

}
function SavebankLoandetails($data){
	return $this->db->insert('bank_details', $data);
}
function UpdatebankLoandetails($data,$id){
    $this->db->where('id',$id);
     $this->db->update('bank_details', $data);
     return true;

}
function UpdateAmount($data,$id){
    $this->db->where('loan_id',$id);
     $this->db->update('bank_details', $data);
     return true;

}
public function Gettotalamount($loan_number)
{ 
   
    $table='loan_details';
    $this->db->select('sum(loan_details.loan_amount) as loan_amount');
   
  
    $this->db->where('loan_details.loan_number', $loan_number);
  
   
    $this->db->from($table);
    $query = $this->db->get();
    return $query->row();


}

public function FindPL()
{ 
   
    $table='loan';
    $table1='loan_details';
    $status='1';
    $this->db->select($table1.'.*,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
  
    if($this->session->userdata('role') != 1){
        $filter['created_by']= $this->session->userdata('role');
       
        $this->db->where("loan.branch_id = '" . $filter['created_by'] . "'");
    }
$this->db->where('loan_details.status =', 1);
 $this->db->where('loan_details.closing_date =', null);
   $this->db->group_by('loan_details.loan_number');
    $this->db->from($table);
    $query = $this->db->get();
    
    return $query->result_array();

}
public function Getlastgoldrate()
{ 
    $table='goldrate';
    $this->db->select($table.'.*');
     $this->db->order_by('goldrate.id', 'desc');
    $this->db->from($table);
    $query = $this->db->get();
    return $query->row();


}
public function Getnoofloan($loannumber)
{ 
    $table='loan_details';
    $this->db->select($table.'.*');
    $this->db->where('loan_details.loan_number', $loannumber);
    $this->db->from($table);
    $query = $this->db->get();
    return $query->num_rows();


}

public function Getsameloandetails($loannumber)
{ 
   
    $table='loan';
    $table1='loan_details';
    $status='1';
    $this->db->select($table1.'.*,users.name as created_by,user_roletype.role_type as branch,customers.first_name as first_name,customers.last_name as last_name,customers.phoneno as phoneno,customers.email as email,customers.address as address');
    $this->db->join('loan_details','loan_details.loan_number='.$table.'.loan_number');
    $this->db->join('customers','customers.id='.$table.'.customer_id');
    $this->db->join('users','users.id='.$table.'.created_by','left');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.branch_id','left');
    $this->db->where('loan_details.status !=', 2);
    $this->db->where('loan_details.loan_number', $loannumber);
  
    $this->db->from($table);
    $query = $this->db->get();
    
    return $query->result_array();

}

}