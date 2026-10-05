<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
		$this->load->model('Users_model');
	
	}

	public function index()
	{
		// echo "hello";
		// exit;
         $data['adminlogo']=$this->auth_model->selectbackendsettings();

	    $data['title']="Administration - Login";
        $this->load->view('admin/login.php', $data);
		
	
    }

	public function admin_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

	    if ($this->form_validation->run() === FALSE)
	    { 
			
		

	
			$data['title']="TimeManagement - Login";
	        $this->load->view('admin/login.php', $data);
	    }
	    else
	    {
			
	    	$data = array(
	    		'email' => $this->input->post('email'),
	    		'password' => $this->input->post('password')
	    	 );

	        $is_login = $this->auth_model->admin_login($data);
			
	        if($is_login)
	        {
				
				$this->auth_model->updateLastLogin($this->session->userdata('admin_id'));

	        	redirect('admin/dashboard', 'refresh');
	        }
	        else{
				
	        	$this->session->set_flashdata('danger','Error!   Login Credential is invalid!');
	        	$this->load->view('admin/login.php', $data);
	        }
	    }
	}

	public   function EditProfile($id){
   
         $data['get_profile'] = $this->Users_model->get_profile($id);
       
      
        $data['title']  = 'Edit Profile';
		$this->load->view('admin/sections/header');
		$this->load->view('admin/users/editprofile.php', $data);
		$this->load->view('admin/sections/footer');
		
    }  
    public function UpdateProfile()
    {
       
	 $id=$this->input->post('id');
	 if(!empty($id))
	 {
		

        $get_profile = $this->Users_model->get_profile($id);
      
	
		   if(!empty($_FILES['files']['name'])){
	 
			 // Define new $_FILES array - $_FILES['file']
			 $_FILES['file']['name'] = $_FILES['files']['name'];
			 $_FILES['file']['type'] = $_FILES['files']['type'];
			 $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			 $_FILES['file']['error'] = $_FILES['files']['error'];
			 $_FILES['file']['size'] = $_FILES['files']['size'];
	
			 // Set preference
			 $config['upload_path'] = './uploads/userprofile/'; 
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
				
				 $filename =$get_profile['profile_photo'];
				
				 }
			 }


			 if(!empty($_FILES['cover_photo']['name'])){
	 
				// Define new $_FILES array - $_FILES['file']
				$_FILES['file']['name'] = $_FILES['cover_photo']['name'];
				$_FILES['file']['type'] = $_FILES['cover_photo']['type'];
				$_FILES['file']['tmp_name'] = $_FILES['cover_photo']['tmp_name'];
				$_FILES['file']['error'] = $_FILES['cover_photo']['error'];
				$_FILES['file']['size'] = $_FILES['cover_photo']['size'];
	   
				// Set preference
				$config['upload_path'] = './uploads/userprofile/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
			   //  $config['max_size'] = '500000'; // max_size in kb
				$config['file_name'] = $_FILES['cover_photo']['name'];
			   
				//Load upload library
				$this->load->library('upload',$config); 
			   
			   
				if($this->upload->do_upload('file')){
				   
				 $data = $this->upload->data(); 
				 $bannername = $data['file_name'];
               
			   }
		   
				}
				else
				{
				   
					if($this->input->post('imagechk'))
					{
					   
					$bannername = '';
					}
					else
					{
				   
					$bannername =$get_profile['cover_photo'];
                
				   
					}
				}

			 //save or update to database


			 $data=array('profile_photo' =>$filename,
			'cover_photo' =>$bannername,
			'name'  => $this->input->post('name'),
			'last_name'  => $this->input->post('last_name'),
		  );

			  $results= $this->Users_model->updateProfileUser($id,$data);
              if($results=="True")
			  {

				$this->session->set_flashdata('success', 'Profile Updated Sucessfully');
				redirect('admin/Auth/EditProfile/'.$id);
			  }
			  else
			  {
				
				$this->session->set_flashdata('success', 'Something went Wrong.');
				redirect('admin/Auth/EditProfile/'.$id);
			  }

			}
        } 
}
