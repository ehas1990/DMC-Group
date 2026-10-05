<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
		$this->load->model('users_model');
		$this->load->helper('file');
	}
	public function index()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			$data['listallusers']=$this->users_model->selectAllUsers();
			// $data['branch'] = $this->dashboard_model->AllRoleType();
		
			$data['title']="Admin - List all Users";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/users/listusers.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
	}
	  
	public function AddUsers()
	{
		
		if($this->session->userdata('admin_logged'))
		{
			$data['branch'] = $this->dashboard_model->AllRoleType();
			
			
			$data['title']="Add - Users";
			$this->load->view('admin/sections/header');
			$this->load->view('admin/users/addusers.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Admin - Login";
			redirect('admin');
		
	  }
  }
  public function SaveUsers()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Save-Users';
  
			$id=$this->input->post('id');
			$data=array(
			  'name'		=> 	$this->input->post('name'),
			  'last_name'		=> 	$this->input->post('last_name'),
			  'email'		=> 	$this->input->post('email'),
			  'role'		=> 	$this->input->post('role'),
			  'password' =>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			  'status'		=> 	$this->input->post('status')
		  
				 );
			$result= $this->users_model->SaveUsers($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New User has been Added Successfull.');
			redirect('admin/Users/index');
			}
	  }
	  public   function EditUsers($id){

		
		$data['users'] = $this->users_model->GetUsers($id);
		$data['roletype'] = $this->dashboard_model->AllRoleType();

		$this->load->view('admin/sections/header');
		$this->load->view('admin/users/edituser.php', $data);
		$this->load->view('admin/sections/footer');

	}  
	public function UpdateUsers(){

		$id=$this->input->post('id');
		$data=array(
			'name'		=> 	$this->input->post('name'),
			'last_name'		=> 	$this->input->post('last_name'),
			'email'		=> 	$this->input->post('email'),
			'role'		=> 	$this->input->post('role'),
			'password' =>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'status'		=> 	$this->input->post('status')
		
			   );
		$this->users_model->UpdateUsers($data,$id);
	 
		$this->session->set_flashdata('success', 'User has been updated successfully.');
		redirect('admin/Users/index');
	}
  }