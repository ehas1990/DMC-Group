<?php
class Dashboard_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	public function selectAlloutlet()
	{
		$query = $this->db->get('outlet');
		
		$this->db->order_by('id', 'Asc');
		return $query->result(); 
	
	}
    public function GetSiteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_backendconfig');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_backendconfig', array('id' => $id));
			return $query->row_array();
		}
	public	function UpdateBackendSettings($data, $id)
		{
		 $this->db->where('id', $id);
		 $error=$this->db->update('site_backendconfig', $data);
		 return $error;
	}
	public function selectAllcustomers()
	{ 
		$table='res_reservation';
		$this->db->select('*');
		$this->db->group_by('email'); 
		$this->db->order_by('name', 'Asc');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();

	}
  
    public function GetMailapi($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('mailchip_api');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('mailchip_api', array('id' => $id));
			return $query->row_array();
		}
		public	function Updatemailchimpapi($data, $id)
		{
		 $this->db->where('id', $id);
		 $error=$this->db->update('mailchip_api', $data);
		 return $error;
	}
	function SaveDate($data){
		return $this->db->insert('program_dates', $data);
	}
	
		function SaveRoletype($data){
		return $this->db->insert('user_roletype', $data);
	}
	
	
	function SaveRate($data){
		return $this->db->insert('goldrate', $data);
	}
		public function AllorderStatus()
	{
		$query = $this->db->get('order_status');
		$this->db->order_by('id', 'DESC');
		return $query->result(); 

	}
	public function Getstaff()
	{
		$query = $this->db->get('delivery_login');

		$this->db->order_by('id', 'ASC');
		return $query->result(); 

	}
	public function AllRoleType()
	{
		$this->db->where('id !=', 1);
		$query = $this->db->get('user_roletype');
		
		$this->db->order_by('id', 'DESC');
		return $query->result(); 

	}
		public function Getgoldrate($id = FALSE)
	{

		$query = $this->db->get('goldrate');
		
		$this->db->order_by('id', 'Asc');
		return $query->result(); 
	
	}
	
	
		public	function Updategoldrate($data, $id)
	{
	 $this->db->where('id', $id);
	 $error=$this->db->update('goldrate', $data);
	 return $error;
    }
    
    
	public function GetRoletype($id = FALSE)
	{

		$query = $this->db->get('user_roletype');
		
		$this->db->order_by('id', 'Asc');
		return $query->result(); 
	
	}
	public	function UpdateRoletype($data, $id)
	{
	 $this->db->where('id', $id);
	 $error=$this->db->update('user_roletype', $data);
	 return $error;
    }
	public	function ChangeOrderstatus($data, $id)
	{
	 $this->db->where('id', $id);
	 $error=$this->db->update('orders', $data);
	 return $error;
}
	public	function ChangLoanDetails($data, $id)
	{
	 $this->db->where('id', $id);
	 $error=$this->db->update('loan_details', $data);
	 return $error;
}

public	function BlockedDatebyItem($data)
	{
	 
    $this->db->insert('blocked_product_date',$data);	
      $result=$this->db->insert_id();
   return True;

          
}
public function change_password($new_password){

	$data = array(
		'password' => password_hash($new_password,PASSWORD_DEFAULT)
		);
	$this->db->where('id', $this->session->userdata('admin_id'));
	return $this->db->update('users', $data);
}

public function match_old_password($password)
{
	$id = $this->session -> userdata('admin_id');
	//echo $id;
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$row=$query->result_array(); 
	//print_r($row);die;

	if (password_verify($password, $row[0]['password'])){
//
		return $row;
	}
	else
	{

		return false;
	}
}
public function enable($id,$table){
	$data = array(
		'status' => 0
		);
	$this->db->where('id', $id);
	return $this->db->update($table, $data);
}

public function desable($id,$table){
	$data = array(
		'status' => 1
		);
	$this->db->where('id', $id);
	return $this->db->update($table, $data);
}
public function closed($id,$table){
	$data = array(
		'status' => 2
		);
	$this->db->where('id', $id);
	return $this->db->update($table, $data);
}

function delete($id,$table){
	$this->db->where('id', $id);
	$this->db->delete($table);
	return true;
}
function SaveProjectType($data){
	return $this->db->insert('outlet', $data);
}

public	function UpdateDates($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('program_dates', $data);
 return $error;
}

public function Alldaetss()
{
	$query = $this->db->get('program_dates');
	$this->db->order_by('id', 'Asc');
	return $query->result_array(); 

}
public function AllProjectType()
{
	$query = $this->db->get('program_dates');
	$this->db->order_by('id', 'Asc');
	return $query->result(); 

}
public function GetProjectType($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('outlet');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('outlet', array('id' => $id));
	return $query->row_array();
}
public	function UpdateProjectType($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('outlet', $data);
 return $error;
}

function SaveProjectStatus($data){
	return $this->db->insert('churches', $data);
}
public function Allchurches()
{

	$table='churches';
	$this->db->select('churches.status as status,churches.name as name,churches.id as id,churches.address as address,state.id as state_id,city.id as city_id,state.name as state_name,city.city_name as city_name');
	$this->db->from('churches');
	$this->db->join('state','state.id='.$table.'.state_id');
	$this->db->join('city','city.id='.$table.'.location_id');
	$query = $this->db->get();
	return $query->result(); 
	


}
public function GetProjectStatus($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('project_status');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('project_status', array('id' => $id));
	return $query->row_array();
}
public	function UpdateProjectStatus($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('churches', $data);
 return $error;
}
function SaveCity($data){
	return $this->db->insert('city', $data);
}
public function AllCity()
{
	$query = $this->db->get('city');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
public function GetCity($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('city');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('city', array('id' => $id));
	return $query->row_array();
}
public	function UpdateCity($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('city', $data);
 return $error;
}
public function AllServices()
{
	$query = $this->db->get('service_type');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
function SaveServices($data){
	return $this->db->insert('service_type', $data);
}
public function insert($table,$data)
{
	$this->db->insert($table,$data);
	return $this->db->insert_id();
}
public function GetServices($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('service_type');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('service_type', array('id' => $id));
	return $query->row_array();
}
public function ServicesCategory($id)
{
	$table="services_type_cat";
	$this->db->select($table.'.* ,service_type.id as service_type_id');
	$this->db->from($table);
	$this->db->join('service_type','service_type.id='.$table.'.services_type_id');
	$this->db->where('service_type.id', $id);
	$query = $this->db->get();

	 return $query->result();
	//  var_dump($this->db->last_query());
	//  exit;


  }
  function UpdateServiceTypeCategory($data,$id){
	$this->db->where('id',$id);
	 $this->db->update('services_type_cat', $data);
	 return true;

}
public	function UpdateServices($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('service_type', $data);
 return $error;
}
public function AllExpensetType()
{
	$query = $this->db->get('signatures');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
public function GetExpensetType($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('signatures');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('signatures', array('id' => $id));
	return $query->row_array();
}
public	function UpdateExpensetType($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('signatures', $data);
 return $error;
}
function SaveExpensetType($data){
	return $this->db->insert('signatures', $data);
}

public function AllIncomeType()
{
	$query = $this->db->get('income_type');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
public function GetIncometType($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('income_type');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('income_type', array('id' => $id));
	return $query->row_array();
}
public	function UpdateIncomeType($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('income_type', $data);
 return $error;
}
function SaveIncomeType($data){
	return $this->db->insert('income_type', $data);
}


public function Allpaymenttype()
{
	$query = $this->db->get('payment_methods');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
public function GetPaymentType($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('payment_methods');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('payment_methods', array('id' => $id));
	return $query->row_array();
}
public	function UpdatePaymentMethod($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('payment_methods', $data);
 return $error;
}
function SavePaymentMethod($data){
	return $this->db->insert('payment_methods', $data);
}



public function GetMemberDetails($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('humans');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('humans', array('id' => $id));
	return $query->row_array();
}

public function Getpriests($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('priests');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('priests', array('id' => $id));
	return $query->row_array();
}

public function AllDepartment()
{
	$query = $this->db->get('department');
	$this->db->order_by('id', 'DESC');
	return $query->result(); 

}
public function GetDepartment($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('department');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('department', array('id' => $id));
	return $query->row_array();
}
public	function UpdateDepartment($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('department', $data);
 return $error;
}
function SaveDepartment($data){
	return $this->db->insert('department', $data);
}

public function CityList($state)
{
	$this->db->select('city.name as name,city.id as city_id');
	$this->db->from('city');
	$this->db->join('state','state.state_id=city.state_id');
	$this->db->where('city.state_id =',$state);
  $this->db->order_by('city.name','ASC');
	$query = $this->db->get();
  return $query->result();

	
}
public function GetdateById($date_id)
{
	$this->db->select('program_dates.date as date');
	$this->db->from('program_dates');

	$this->db->where('program_dates.id =',$date_id);

	$query = $this->db->get();
  return $query->row();

	
}
public function selectTableViewbyResajax($delivery_date)
{
   
    $table2="order_details";
    $table3="products";
    // $table3="ccavenue_transaction_details";
$this->db->select('products.*,sum(order_details.qutantity) as total_count');
$this->db->join('order_details','order_details.produt_id='.$table3.'.id');

$this->db->join('orders','orders.id='.$table2.'.order_id');

    $this->db->from($table3);
     $this->db->where('orders.status !=','8');
    $this->db->where('orders.delivery_date =',$delivery_date);
    $this->db->where('orders.save_as =','Pickup');
      $this->db->group_by('order_details.produt_id');
    $query = $this->db->get();
    //   var_dump($this->db->last_query());
    //         exit;
    return $query->result();
}
public function selectTableViewbyResajaxtwo($delivery_date)
{
   
    $table2="order_details";
    $table3="products";
    // $table3="ccavenue_transaction_details";
$this->db->select('products.*,sum(order_details.qutantity) as total_count');
$this->db->join('order_details','order_details.produt_id='.$table3.'.id');

$this->db->join('orders','orders.id='.$table2.'.order_id');

    $this->db->from($table3);
     $this->db->where('orders.status !=','8');
    $this->db->where('orders.delivery_date =',$delivery_date);
     $this->db->where('orders.save_as =','Dinning');
      $this->db->group_by('order_details.produt_id');
    $query = $this->db->get();
    //   var_dump($this->db->last_query());
    //         exit;
    return $query->result();
}
   public function SelectChekedList($id,$date_id)
 {
   
   $table='blocked_product_date';
   $this->db->select('product_id');
   $this->db->where('product_id', $id);
  $this->db->where('date_id', $date_id);
   $this->db->from($table);
   $query = $this->db->get();
    
     return $query->row_array();
   }
   
   public function Allcoupons()
	{
		$query = $this->db->get('coupons');
		$this->db->order_by('id', 'ASC');
		return $query->result(); 

	}
	function SaveCoupons($data){
	return $this->db->insert('coupons', $data);
}
public	function UpdatCoupons($data, $id)
{
 $this->db->where('id', $id);
 $error=$this->db->update('coupons', $data);
 return $error;
}
	
}



