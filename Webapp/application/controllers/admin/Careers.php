<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
		$this->load->model('users_model');
        $this->load->model('client_model');
		$this->load->helper('file');
	}
	public function index()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			$data['listallclients']=$this->client_model->selectAll();
		
			$data['title']="TimeManagement - List all Clients";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/clients/listclients.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="TimeManagement - Login";
			redirect('admin');
		
	  }
	}
	  
	public function AddClient()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			// $data['city'] = $this->dashboard_model->AllCity();
			
			
			$data['title']="Add - Users";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/clients/addclientt.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
  public function SaveClients()
  {
    
      if(!$this->session->userdata('admin_logged')) {
        $data['title']="Admin - Login";
        redirect('admin');
      }
      $data['title'] = 'Save-customers';

      $table2='customers';
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d H:i:s");

          $id=$this->input->post('id');
          $data=array(
            'first_name'		=> 	$this->input->post('first_name'),
            'last_name'		=> 	$this->input->post('last_name'),
            'phoneno'		=> 	$this->input->post('phoneno'),
            'email'		=> 	$this->input->post('email'),
            'address' =>$this->input->post('address'),
            'created_by'		=> $this->session->userdata('admin_id'),
            'branch_id'		=>$this->session->userdata('role'),
            'created_date'		=> $date,
            'status'		=> 	1
               );
        $resultId= $this->dashboard_model->insert($table2,$data);

          if($resultId)
          {

           

          $this->session->set_flashdata('success', 'New Customer has been Added Successfull.');
          redirect('admin/Clients/index');
          }
    }
	  public   function EditClient($id){

		
		$data['clients'] = $this->client_model->GetClients($id);
		
		$this->load->view('admin/sections/header');
		$this->load->view('admin/clients/editclient.php', $data);
		$this->load->view('admin/sections/footer');

	}  
	public function UpdateClients(){

		$id=$this->input->post('id');

        $data=array(
          'first_name'		=> 	$this->input->post('first_name'),
          'last_name'		=> 	$this->input->post('last_name'),
          'phoneno'		=> 	$this->input->post('phoneno'),
          'email'		=> 	$this->input->post('email'),
          'address' =>$this->input->post('address')
          
               );
		$this->client_model->UpdateClients($data,$id);
	 
		$this->session->set_flashdata('success', 'Customer Details has been updated successfully.');
		redirect('admin/Clients/index');
	}
    public function UpdateClientContact()
	{
		$id=$this->input->post('id');
		$client_id=$this->input->post('client_id');

        $data=array('client_id'		=> 	$client_id,
        'contact_name' => $this->input->post('contact_name'),
        'contact_phone' => $this->input->post('contact_phone'),
        'contact_email' => $this->input->post('contact_email'),
        'contact_desigination' => $this->input->post('contact_desigination'),
       
    );
		 $results= $this->client_model->UpdateClientContact($data,$id);

	if($results=='true')
		{
			$this->session->set_flashdata('success', 'Client-Contact details been Updated Successfull.');
			redirect('admin/Clients/EditClient/'.$client_id);
		}
		else
		{

			$this->session->set_flashdata('danger', 'Something went Wrong.');
			redirect('admin/Clients/EditClient/'.$client_id);
		}
	}
	
	function UpdateStatus($query_id)
 {
   
	$data = array(
		'status'  => 2,
	  );

   $this->client_model->UpdateStatus($data, $query_id);
  
 }
  }