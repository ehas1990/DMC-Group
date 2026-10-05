<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
       
	 
		$this->load->helper('file');
	}
	public function index($id=null)
	{
		$data['date_id'] = $this->uri->segment(4);
		if($this->session->userdata('admin_logged'))
		{
			$data['adminlogo']=$this->auth_model->selectbackendsettings();
			$data['readconunt']=$this->auth_model->Readmsgcount();
			$data['unreadconunt']=$this->auth_model->unReadmsgcount();
			$data['totalcount']=$this->auth_model->totalcountmsg();
			
			$data['title']="Kripa - Dashboard";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/dashboard.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Kripa - Login";
			redirect('admin');
		
	  }
  }
  public function Logout()
	{
		
		$array_items = array('admin_id','admin_name','admin_email','admin_logged');
		$this->session->unset_userdata($array_items);
		redirect('admin'); 
	}
  public function Siteconfiguration($id = NULL)
  {
	
	if($this->session->userdata('admin_logged'))
	{
	  $data['siteconfiguration'] = $this->dashboard_model->GetSiteconfiguration($id);
	 

	   $data['title'] = 'Admin - Site Configuration';

	   $this->load->view('admin/sections/header');
	   $this->load->view('admin/siteconfig/siteconfig.php', $data);
	   $this->load->view('admin/sections/footer');
	}
	else {
		$data['title']="Oottupura Restaurant - Login";
			redirect('admin');
	}
  }
  public function UpdateSiteconfiguration()
  {
	

	  if(!$this->session->userdata('admin_logged')) {
		$data['title']="Admin - Login";
		redirect('admin');
	  }
	  $data['title'] = 'Admin - Update Backend Configuration';

	  $this->form_validation->set_rules('site_email', 'Site Email', 'required');
	  $this->form_validation->set_rules('admin_pagetitle', 'Admin Page Title', 'required');
	  
	  if($this->form_validation->run() === FALSE){
		$data['title'] = 'Admin - Site Configuration';

		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/siteconfig.php', $data);
		$this->load->view('admin/sections/footer');
	  }else{

		
		  //Upload Image
		  $this->load->library('upload');
		  $config['upload_path'] = './assets/logo/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg';
		  $config['max_size'] = '2048';
		  $config['max_width'] = '2000';
		  $config['max_height'] = '2000';

		  $this->upload->initialize($config); 

  if(!$this->upload->do_upload('site_logo'))
   
               {
				// echo "hello";
				// exit;
			  $errors =  array('error' => $this->upload->display_errors());
			  $data['logo_imgs'] = $this->dashboard_model->GetSiteconfiguration($this->input->post('id'));
			  $post_image = $data['logo_imgs']['site_logo'];
		  }else{
			
			
			  $data =  array('upload_data' => $this->upload->data());
			  $post_image = $_FILES['site_logo']['name'];
			//   $post_image= preg_replace('/[^A-Za-z0-9]/', "", $post_image);
		  }

	
		  $id=$this->input->post('id');
		  $data=array(
			'site_email'		=> 	$this->input->post('site_email'),
		  'admin_pagetitle'		=> 	$this->input->post('admin_pagetitle'),
            'site_logo'=>       $post_image
			
               );
  
		  $result= $this->dashboard_model->UpdateBackendSettings($data,$id);
		  if($result==true)
		  {
		  $this->session->set_flashdata('success', 'Backend Settings has been Updated Successfull.');
		  redirect('admin/BackendSettings/'.$id);
		  }
	  }
  }
  public function Customers()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			$data['customers']=$this->dashboard_model->selectAllcustomers();
			$data['title']="Oottupura Restaurant - List all Customers";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/customers/customerslist.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Oottupura Restaurant - Login";
			redirect('admin');
		
	  }
  }


  
	public function AddRoleType()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - Role Type";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addrole.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
 
	public function ListRole()
	{

        $data['title'] = 'List of  User Role Type';
        $data['userrole'] = $this->dashboard_model->GetRoletype();
		
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/listrole.php', $data);
			$this->load->view('admin/sections/footer');
	}
	public function Savebranch()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  
			$id=$this->input->post('id');
			$data=array(
			  'role_type'		=> 	$this->input->post('role_type'),
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveRoletype($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Branch  has been Added Successfull.');
			redirect('admin/Settings/ListRole');
			}
	  }
	public   function EditRoletype($id){

		
		$data['roletype'] = $this->dashboard_model->GetRoletype($id);
		  
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/editrole.php', $data);
		$this->load->view('admin/sections/footer');

	}   
public function UpdateRoletype(){

		$id=$this->input->post('id');
		$data=array(
		 'role_type'		=> 	$this->input->post('role_type'),
		
			   );
		   
		$this->dashboard_model->UpdateRoletype($data,$id);
	 
		$this->session->set_flashdata('success', 'Branch has been updated successfully.');
		redirect('admin/Settings/ListRole');
	}  
public function ChangeOrderstatus(){
// var_dump($this->input->post('order_status'));
// exit;
		$id=$this->input->post('id');
		$data=array(
		 'status'		=> 	$this->input->post('order_status'),
		 'payment_status'		=> 	$this->input->post('payment_status'),
	
			   );
		   
		$this->dashboard_model->ChangeOrderstatus($data,$id);
	 
		$this->session->set_flashdata('success', 'Order/Payment Status has been Changed successfully.');
		redirect('admin/dashboard');
	} 
	public function ChangeOrderstatus_s(){
// var_dump($this->input->post('order_status'));
// exit;
		$id=$this->input->post('id');
		$data=array(
		 'status'		=> 	$this->input->post('order_status'),
		 'payment_status'		=> 	$this->input->post('payment_status'),
	
			   );
		   
		$this->dashboard_model->ChangeOrderstatus($data,$id);
	 
		$this->session->set_flashdata('success', 'Order/Payment Status has been Changed successfully.');
		redirect('admin/Reports/ListAllOrders');
	} 
	
	
		public function BlockedDatebyItem(){
		    
$this->db->where('date_id', $this->input->post('id'));
	$deleteAbility=$this->db->delete('blocked_product_date');


 $itemCount = count($_POST["blocked_product"]);
				for ($i = 0; $i < $itemCount; $i ++) {
					$data = array(
					'date_id' => $this->input->post('id'), 
					'product_id' => $this->input->post('blocked_product')[$i],
					'status'		=> 	1
						);

						$results= $this->dashboard_model->BlockedDatebyItem($data);
				}
				
		$data=array(
		 'status'		=> 	1
		 
	
			   );
		   
	
	 
		$this->session->set_flashdata('success', 'Item has been Blocked .');
		redirect('admin/Settings/Dates');
	} 
	
		public function Reschedule(){
// var_dump($this->input->post('order_status'));
// exit;
		$id=$this->input->post('id');
		$data=array(
	
		 'delivery_date'		=> 	$this->input->post('delivery_date'),
	
			   );
		   
		$this->dashboard_model->ChangeOrderstatus($data,$id);
	 
		$this->session->set_flashdata('success', 'Delivery Date  has been Reschedule successfully.');
		redirect('admin/Reports/ListAllOrders');
	} 
	
	
			public function deletePayment($id,$loan_detailsid,$loan_date,$loan_amount){

             $table="payment_history";
             

			
				$data=array(
		 'loan_date'		=> 	$loan_date,
		 'loan_amount'		=> 	$loan_amount,
	
			   );
		   
		$this->dashboard_model->ChangLoanDetails($data,$loan_detailsid);
		
		
		
			
			$this->dashboard_model->delete($id,$table);    
			//update loan details
			
			
			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
	} 
	
	
	
	public function ChangeOrderstatusBydeliverypersn(){

		$id=$this->input->post('id');
		$data=array(
		 'status'		=> 	$this->input->post('order_status'),
		
			   );
		   
		$this->dashboard_model->ChangeOrderstatus($data,$id);
	 
		$this->session->set_flashdata('success', 'Order Status has been Changed successfully.');
		redirect('admin/dashboard');
	} 
	public function changePassword()
	{
	
		$data['title']="Admin- Change Password";

			 $this->form_validation->set_rules('new_pass', 'New Password Field', 'required');

			if($this->form_validation->run() === FALSE){
				
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/changePassword.php', $data);
			$this->load->view('admin/sections/footer');
			}else{
			
				$r=$this->match_old_password($this->input->post('old_pass'));
				
				if($r)
				{
				

				$this->dashboard_model->change_password($this->input->post('new_pass'));

				//Set Message
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('admin/ChangePassword');
			}
			else
			{
				// echo "hello";
				// exit;
				
				$this->session->set_flashdata('danger', 'Old Password Wrong.');
				redirect('admin/ChangePassword');
			}
			}

	}

	public function match_old_password($old_password){
			
			
			$que = $this->dashboard_model->match_old_password($old_password);
			//echo $que; die;
			if (!empty($que)) {
				return true; 
			}else{
				return false;
			}
		}
		public function delete($id){
			$table = base64_decode($this->input->get('table'));
			$this->dashboard_model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}  
				public function closed($id)
			{
				$table = base64_decode($this->input->get('table'));
				$this->dashboard_model->closed($id,$table);       
				$this->session->set_flashdata('success', 'Disabled Successfully.');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			public function enable($id)
			{
				$table = base64_decode($this->input->get('table'));
				$this->dashboard_model->enable($id,$table);       
				$this->session->set_flashdata('success', 'Disabled Successfully.');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			
			public function desable($id)
			{
				$table = base64_decode($this->input->get('table'));
				$this->dashboard_model->desable($id,$table);   
				$this->session->set_flashdata('success', 'Enabled Successfully.');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			} 

			public function AddProjectType()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - Role Type";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addprotype.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
 
	public function ListOutlet()
	{

        $data['title'] = 'List of  User Role Type';
        $data['userrole'] = $this->dashboard_model->AllProjectType();
		$data['listproducts']=$this->Product_Model->selectAllProducts();
			
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/listoutlet.php', $data);
			$this->load->view('admin/sections/footer');
	}	
	
	public function SaveDate()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  
			$id=$this->input->post('id');
			$data=array(
			  'date'		=> 	$this->input->post('date'),
			 
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveDate($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New date has been Added Successfull.');
			redirect('admin/Settings/Dates');
			}
	  }
	  public function UpdateDates(){

		$id=$this->input->post('id');
		$data=array(
			'date'		=> 	$this->input->post('date'),
		
		
			   );
		   
		$this->dashboard_model->UpdateDates($data,$id);
	 
		$this->session->set_flashdata('success', 'Program Date been updated successfully.');
		redirect('admin/Settings/Dates');
	  }
		
		
	public function SaveProjectType()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  
			$id=$this->input->post('id');
			$data=array(
			  'name'		=> 	$this->input->post('name'),
			  'latitude'		=> 	$this->input->post('latitude'),
			  'longitude'		=> 	$this->input->post('longitude'),
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveProjectType($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Outlet has been Added Successfull.');
			redirect('admin/Settings/Outlets');
			}
	  }
	 
public function UpdateProjectType(){

		$id=$this->input->post('id');
		$data=array(
			'name'		=> 	$this->input->post('name'),
			'latitude'		=> 	$this->input->post('latitude'),
			'longitude'		=> 	$this->input->post('longitude'),
		
			   );
		   
		$this->dashboard_model->UpdateProjectType($data,$id);
	 
		$this->session->set_flashdata('success', 'Outlet has been updated successfully.');
		redirect('admin/Settings/Outlets');
	}  
	public function AddProjectStatus()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - Role Type";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addprostatus.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
 
	public function ListProjectStatus()
	{

        $data['title'] = 'List of Project Types';
        $data['userrole'] = $this->dashboard_model->Allchurches();

		$data['locationadd'] = $this->dashboard_model->AllCity();
		$data['locationedit'] = $this->dashboard_model->AllCity();
	
		$data['state1'] = $this->dashboard_model->AllProjectType();
		$data['states'] = $this->dashboard_model->AllProjectType();
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/listprostatus.php', $data);
			$this->load->view('admin/sections/footer');
	}
	public function SaveProjectStatus()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';

		date_default_timezone_set('Asia/Kolkata');
        $created_on = date("Y-m-d H:i:s");
  
			$id=$this->input->post('id');
			$data=array(
			  'name'		=> 	$this->input->post('name'),
			  'address'		=> 	$this->input->post('address'),
			  'state_id'		=> 	$this->input->post('state_id'),
			  'location_id'		=> 	$this->input->post('location_id'),
			  'created_at'		=> $created_on,
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveProjectStatus($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Church has been Added Successfull.');
			redirect('admin/Settings/ListChurch');
			}
	  }
	public   function EditProjectStatus($id){

		
		$data['roletype'] = $this->dashboard_model->GetProjectStatus($id);
		  
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/editprostatus.php', $data);
		$this->load->view('admin/sections/footer');

	}   
public function UpdateProjectStatus(){

		$id=$this->input->post('id');

		date_default_timezone_set('Asia/Kolkata');
        $created_on = date("Y-m-d H:i:s");

		$data=array(
			'name'		=> 	$this->input->post('name'),
			'address'		=> 	$this->input->post('address'),
			'state_id'		=> 	$this->input->post('state_id'),
			'location_id'		=> 	$this->input->post('location_id'),
			'updated_at'		=> $created_on,
		
			   );
		   
		$this->dashboard_model->UpdateProjectStatus($data,$id);
	 
		$this->session->set_flashdata('success', 'Data has been  successfully updated.');
		redirect('admin/Settings/ListChurch');
	}  

	public function AddCity()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - City";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addcity.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
 
	public function ListCity()
	{

        $data['title'] = 'List of City';
        $data['userrole'] = $this->dashboard_model->AllCity();
		$data['state1'] = $this->dashboard_model->AllProjectType();
		$data['states'] = $this->dashboard_model->AllProjectType();
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/listcity.php', $data);
			$this->load->view('admin/sections/footer');
	}
	public function SaveCity()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-City';
  
			$id=$this->input->post('id');
			$data=array(  
			  'city_name'		=> 	$this->input->post('city_name'),
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveCity($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Pickup Points has been Added Successfull.');
			redirect('admin/Settings/ListLocation');
			}
	  }
	public   function EditCity($id){

		
		$data['roletype'] = $this->dashboard_model->GetCity($id);
		  
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/editcity.php', $data);
		$this->load->view('admin/sections/footer');

	}   
public function UpdateCity(){

		$id=$this->input->post('id');
		$data=array( 
			'city_name'		=> 	$this->input->post('city_name'),
		
			   );
		   
		$this->dashboard_model->UpdateCity($data,$id);
	 
		$this->session->set_flashdata('success', 'Pickup Points  has been updated successfully.');
		redirect('admin/Settings/ListLocation');
	}  
	public function AddServices()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - New Services";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addservices.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
 
	public function ListServices()
	{

        $data['title'] = 'List of Services';
        $data['userrole'] = $this->dashboard_model->AllServices();
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/listservices.php', $data);
			$this->load->view('admin/sections/footer');
	}
	public function SaveServices()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Project Services';
		$table2="service_type";
		
			$data=array(
			  'service_type'		=> 	$this->input->post('service_type'),
			  'status'		=> 	1
		  
				 );
			$resultId= $this->dashboard_model->insert($table2,$data);


			if($resultId)
			{
				if(!empty($_POST["name"]))
		{
				$count=count($this->input->post('name'));
				$table="services_type_cat";
            if($count>1)
              {
				for($i=0;$i<$count;$i++)
				{
					$data=array('services_type_id'		=> 	$resultId,
								'name' => $this->input->post('name')[$i],
								'status' =>1
							);
		
					$r=$this->dashboard_model->insert($table,$data);
				}
			  }
			}


			$this->session->set_flashdata('success', 'New Services has been Added Successfull.');
			redirect('admin/Settings/ListServices');
			}
	  }
	public   function EditServices($id){

		
		$data['roletype'] = $this->dashboard_model->GetServices($id);
		$data['servicescategory'] = $this->dashboard_model->ServicesCategory($id);
		  
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/editservices.php', $data);
		$this->load->view('admin/sections/footer');

	}   
public function UpdateServices(){

		$id=$this->input->post('id');
		$data=array(
			'service_type'		=> 	$this->input->post('service_type'),
		
			   );
		   
		$this->dashboard_model->UpdateServices($data,$id);
		if(!empty($_POST["name"]))
		{
		$count=count($this->input->post('name'));
				$table="services_type_cat";
            if($count>1)
              {
				for($i=0;$i<$count;$i++)
				{
					$data=array('services_type_id' => $this->input->post('id'),
								'name' => $this->input->post('name')[$i],
								'status' =>1
							);
		
					$r=$this->dashboard_model->insert($table,$data);
				}
			  }
			}
	 
		$this->session->set_flashdata('success', 'Services  has been updated successfully.');
		redirect('admin/Settings/ListServices');
	}  		
	
	public function UpdateMenuCategory()
	{
		$id=$this->input->post('id');
		$service_type_id=$this->input->post('service_type_id');

		$data=array('name' => $this->input->post('name'),
		'services_type_id' => $service_type_id,
		
		 );
		 $results= $this->dashboard_model->UpdateServiceTypeCategory($data,$id);

	if($results=='true')
		{
			$this->session->set_flashdata('success', 'Service-Category  been Updated Successfull.');
			redirect('admin/Dashboard/EditServices/'.$service_type_id);
		}
		else
		{

			$this->session->set_flashdata('danger', 'Something went Wrong.');
			redirect('admin/Dashboard/EditServices/'.$service_type_id);
		}
	}
	public function ListExpenseType()
	{

        $data['title'] = 'List of  Signatures';
        $data['userrole'] = $this->dashboard_model->AllExpensetType();
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/expensetype.php', $data);
			$this->load->view('admin/sections/footer');
	}
	public function SaveExpenseType()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  

		if(!empty($_FILES['files']['name'])){
				
			// Define new $_FILES array - $_FILES['file']
			$_FILES['file']['name'] = $_FILES['files']['name'];
			$_FILES['file']['type'] = $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['files']['error'];
			$_FILES['file']['size'] = $_FILES['files']['size'];
   
			// Set preference
			$config['upload_path'] = './uploads/signature/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		   //  $config['max_size'] = '500000'; // max_size in kb
			$config['file_name'] = $_FILES['files']['name'];
		   
			//Load upload library
			$this->load->library('upload',$config); 
		   
		   
			if($this->upload->do_upload('file')){
			   
			 $data = $this->upload->data(); 
			 $filename = $data['file_name'];

			}
	   
			 }
			

			$id=$this->input->post('id');
			$data=array(
				'signatures' =>$filename,
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveExpensetType($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Signatures has been Added Successfull.');
			redirect('admin/Settings/Signatures');
			}
	  }
	public   function EditExpenseType($id){

		
		$data['roletype'] = $this->dashboard_model->GetExpensetType($id);
		  
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/editexpense.php', $data);
		$this->load->view('admin/sections/footer');

	}   
public function UpdateExpenseType(){

		$id=$this->input->post('id');
		$data['roletype'] = $this->dashboard_model->GetExpensetType($id);

		if(!empty($_FILES['files']['name'])){
				
			// Define new $_FILES array - $_FILES['file']
			$_FILES['file']['name'] = $_FILES['files']['name'];
			$_FILES['file']['type'] = $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['files']['error'];
			$_FILES['file']['size'] = $_FILES['files']['size'];
   
			// Set preference
			$config['upload_path'] = './uploads/signature/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		   //  $config['max_size'] = '500000'; // max_size in kb
			$config['file_name'] = $_FILES['files']['name'];
		   
			//Load upload library
			$this->load->library('upload',$config); 
		   
		   
			if($this->upload->do_upload('file')){
			   
			 $data = $this->upload->data(); 
			 $filename = $data['file_name'];

		   }
	   
			}
			else
			{
			   
				if($this->input->post('imagechk'))
				{
				   
				$filename = '';
				}
				else
				{
			   
				$filename = @$data['roletype']['signatures'];
			   
				}
			}

		$data=array(
			'signatures' =>$filename,
		
			   );
		   
		$this->dashboard_model->UpdateExpensetType($data,$id);
	 
		$this->session->set_flashdata('success', 'Signatures has been updated successfully.');
		redirect('admin/Settings/Signatures');
	}  
	public function AddExpenseType()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			
			
			$data['title']="Add - Expense Type";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/addexpense.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }

  public function ListIncomeType()
  {

	  $data['title'] = 'List of  Income';
	  $data['userrole'] = $this->dashboard_model->AllIncomeType();
	  
		  $this->load->view('admin/sections/header');
		  $this->load->view('admin/siteconfig/income_type.php', $data);
		  $this->load->view('admin/sections/footer');
  }
  public function SaveIncomeType()
  {
	
	  if(!$this->session->userdata('admin_logged')) {
		$data['title']="Admin - Login";
		redirect('admin');
	  }
	  $data['title'] = 'Admin-Role Type';

		  $id=$this->input->post('id');
		  $data=array(
			'income_type'		=> 	$this->input->post('income_type'),
			'status'		=> 	1
		
			   );
		  $result= $this->dashboard_model->SaveIncomeType($data);
		  if($result==true)
		  {
		  $this->session->set_flashdata('success', 'Income  Type has been Added Successfull.');
		  redirect('admin/Settings/ListIncomeType');
		  }
	}
  public   function EditIncomeType($id){

	  
	  $data['roletype'] = $this->dashboard_model->GetIncometType($id);
		
	  $this->load->view('admin/sections/header');
	  $this->load->view('admin/siteconfig/editincome.php', $data);
	  $this->load->view('admin/sections/footer');

  }   
public function UpdateIncomeType(){

	  $id=$this->input->post('id');
	  $data=array(
		  'income_type'		=> 	$this->input->post('income_type'),
	  
			 );
		 
	  $this->dashboard_model->UpdateIncomeType($data,$id);
   
	  $this->session->set_flashdata('success', 'Income Type has been updated successfully.');
	  redirect('admin/Settings/ListIncomeType');
  }  
  public function AddIncomeType()
  {
	  
	  if($this->session->userdata('admin_logged'))
	  {
		  
		  
		  $data['title']="Add - Income Type";
		  $this->load->view('admin/sections/header');
		  $this->load->view('admin/siteconfig/addincometype.php', $data);
		  $this->load->view('admin/sections/footer');
		  
	  }
	  else
	  {

		  $data['title']="Admin - Login";
		  redirect('admin');
	  
	}
}

public function ListPaymentMethods()
  {

	  $data['title'] = 'Mode Of Payments';
	  $data['userrole'] = $this->dashboard_model->Allpaymenttype();
	  
		  $this->load->view('admin/sections/header');
		  $this->load->view('admin/siteconfig/modeofpayment.php', $data);
		  $this->load->view('admin/sections/footer');
  }
  public function SavePaymentMethod()
  {
	
	  if(!$this->session->userdata('admin_logged')) {
		$data['title']="Admin - Login";
		redirect('admin');
	  }
	  $data['title'] = 'Admin-Role Type';

		  $id=$this->input->post('id');
		  $data=array(
			'method'		=> 	$this->input->post('method'),
			'status'		=> 	1
		
			   );
		  $result= $this->dashboard_model->SavePaymentMethod($data);
		  if($result==true)
		  {
		  $this->session->set_flashdata('success', 'Payment Method has been Added Successfull.');
		  redirect('admin/Settings/ListPaymentMethods');
		  }
	}
  public   function EditPaymentMethod($id){

	  
	  $data['roletype'] = $this->dashboard_model->GetPaymentType($id);
		
	  $this->load->view('admin/sections/header');
	  $this->load->view('admin/siteconfig/editpaymentmethod.php', $data);
	  $this->load->view('admin/sections/footer');

  }   
public function UpdatePaymentMethod(){

	  $id=$this->input->post('id');
	  $data=array(
		  'method'		=> 	$this->input->post('method'),
	  
			 );
		 
	  $this->dashboard_model->UpdatePaymentMethod($data,$id);
   
	  $this->session->set_flashdata('success', 'Payment Method  has been updated successfully.');
	  redirect('admin/Settings/ListPaymentMethods');
  }  
  public function AddPaymentMethod()
  {
	  
	  if($this->session->userdata('admin_logged'))
	  {
		  
		  
		  $data['title']="Add - Income Type";
		  $this->load->view('admin/sections/header');
		  $this->load->view('admin/siteconfig/addpaymentmethod.php', $data);
		  $this->load->view('admin/sections/footer');
		  
	  }
	  else
	  {

		  $data['title']="Admin - Login";
		  redirect('admin');
	  
	}
}
public function Department()
{

	$data['title'] = 'List of  Income';
	$data['userrole'] = $this->dashboard_model->AllDepartment();
	
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/department.php', $data);
		$this->load->view('admin/sections/footer');
}
public function SaveDepartment()
{
  
	if(!$this->session->userdata('admin_logged')) {
	  $data['title']="Admin - Login";
	  redirect('admin');
	}
	$data['title'] = 'Admin-Role Type';

		$id=$this->input->post('id');
		$data=array(
		  'department'		=> 	$this->input->post('department'),
		  'status'		=> 	1
	  
			 );
		$result= $this->dashboard_model->SaveDepartment($data);
		if($result==true)
		{
		$this->session->set_flashdata('success', 'Department  Type has been Added Successfull.');
		redirect('admin/Settings/Department');
		}
  }
public   function EditDepartment($id){

	
	$data['roletype'] = $this->dashboard_model->GetDepartment($id);
	  
	$this->load->view('admin/sections/header');
	$this->load->view('admin/siteconfig/editdepartment.php', $data);
	$this->load->view('admin/sections/footer');

}   
public function UpdateDepartment(){

	$id=$this->input->post('id');
	$data=array(
		'department'		=> 	$this->input->post('department'),
	
		   );
	   
	$this->dashboard_model->UpdateDepartment($data,$id);
 
	$this->session->set_flashdata('success', 'Department Type has been updated successfully.');
	redirect('admin/Settings/Department');
}  
public function AddDepartment()
{
	
	if($this->session->userdata('admin_logged'))
	{
		
		
		$data['title']="Add - Income Type";
		$this->load->view('admin/sections/header');
		$this->load->view('admin/siteconfig/adddepartment.php', $data);
		$this->load->view('admin/sections/footer');
		
	}
	else
	{

		$data['title']="Admin - Login";
		redirect('admin');
	
  }
}
public function getCityList($state){
          
	$citylist=$this->dashboard_model->CityList($state);
 echo "<option  value=''>Select City</option>";
 foreach($citylist as $item)
 {
 
 echo "<option value='".$item->city_id."'>".$item->name."</option>";
 }

 }
 
 public function LiveView($id=null)
	{
	
		
      if($this->session->userdata('admin_logged'))
		{
			$data['adminlogo']=$this->auth_model->selectbackendsettings();
			$data['todayStock']=$this->auth_model->todayStock();
			$data['todayOrder']=$this->auth_model->todayOrder();
				$data['todayOrders']=$this->auth_model->todayOrder();
		$data['allstatus']=$this->dashboard_model->AllorderStatus();		$data['staff']=$this->dashboard_model->Getstaff();
		
			$data['listproducts']=$this->dashboard_model->Alldaetss();
			
				
	$data['products']=$this->Product_Model->selectAllProductsLiveCount($id);
			
			$data['title']="Freshpot - Dashboard";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/dashboard.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Oottupura Restaurant - Login";
			redirect('admin');
		
	  }
      
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/tableview/tableview.php', $data);
			$this->load->view('admin/sections/footer');
	}
	
	
	public function getTableCountList($date_id){
		$date_id=$date_id;
		$datesss=$this->dashboard_model->GetdateById($date_id);
		$delivery_date=$datesss->date;
	
		$tableview=$this->dashboard_model->selectTableViewbyResajax($delivery_date);
if(!empty($tableview))
{
	 foreach($tableview as $item)
	 {
	     
	     if($item->id==1)
		{
		    	$color="#3f51b5";
		}
		else if($item->id==2)
		{
		    	$color="#00bcd4";
		}
			else if($item->id==3)
		{
		    	$color="#795548";
		}
			else if($item->id==4)
		{
		    	$color="#607d8b";
		}
			else if($item->id==5)
		{
		    	$color="#4caf50";
		}
			else if($item->id==6)
		{
		    	$color="#00bcd4";
		}
			else if($item->id==7)
		{
		    	$color="#af4c66";
		}
			else if($item->id==8)
		{
		    	$color="#e91e63";
		}
			else if($item->id==9)
		{
		    	$color="#e9521ec7";
		}
		else
		
		{
		$color="#5f675f";
		}
		


	 echo "<div class='squ-box' style='background-color: ".$color.";'>
	
	 ".$item->product_name." <br>
	 
	   ".$item->total_count." 
	 
	 </div>";

	 }
}
else

{
    echo "No Order Found";
}

	 }
	 
	 
	 	public function getTableCountListTwo($date_id){
		$date_id=$date_id;
		$datesss=$this->dashboard_model->GetdateById($date_id);
		$delivery_date=$datesss->date;
	
		$tableview=$this->dashboard_model->selectTableViewbyResajaxtwo($delivery_date);
if(!empty($tableview))
{
	 foreach($tableview as $item)
	 {
	     
	     if($item->id==1)
		{
		    	$color="#3f51b5";
		}
		else if($item->id==2)
		{
		    	$color="#00bcd4";
		}
			else if($item->id==3)
		{
		    	$color="#795548";
		}
			else if($item->id==4)
		{
		    	$color="#607d8b";
		}
			else if($item->id==5)
		{
		    	$color="#4caf50";
		}
			else if($item->id==6)
		{
		    	$color="#00bcd4";
		}
			else if($item->id==7)
		{
		    	$color="#af4c66";
		}
			else if($item->id==8)
		{
		    	$color="#e91e63";
		}
			else if($item->id==9)
		{
		    	$color="#e9521ec7";
		}
		else
		
		{
		$color="#5f675f";
		}
		


	 echo "<div class='squ-box' style='background-color: ".$color.";'>
	
	 ".$item->product_name." <br>
	 
	   ".$item->total_count." 
	 
	 </div>";

	 }
}
else

{
    echo "No Order Found";
}

	 }
	 
	 	public function Coupons()
	{

        $data['title'] = 'List of  User Role Type';
        $data['userrole'] = $this->dashboard_model->Allcoupons();
		
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/siteconfig/coupons.php', $data);
			$this->load->view('admin/sections/footer');
	}
	
	public function SaveCoupons()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  
			$id=$this->input->post('id');
			$data=array(
			  'coupons_code'		=> 	$this->input->post('coupons_code'),
			   'count'		=> 	$this->input->post('count'), 
			   'discount'		=> 	$this->input->post('discount'),
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveCoupons($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Coupons  has been Added Successfull.');
			redirect('admin/Settings/Coupons');
			}
	  }
	  
	  public function UpdatCoupons(){

		$id=$this->input->post('id');
		$data=array(
	'coupons_code'		=> 	$this->input->post('coupons_code'),
			   'count'		=> 	$this->input->post('count'), 
			   'discount'		=> 	$this->input->post('discount'),
		
			   );
		   
		$this->dashboard_model->UpdatCoupons($data,$id);
	 
		$this->session->set_flashdata('success', 'Coupon code has been updated successfully.');
		redirect('admin/Settings/Coupons');
	
}
}
