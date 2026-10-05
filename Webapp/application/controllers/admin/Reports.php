<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
		$this->load->model('users_model');
     
        $this->load->model('Reports_model');
		$this->load->helper('file');
	}
    public function GoldLoan()
      {
  
       if($this->session->userdata('admin_logged'))
       {

        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data = $this->FilterActivityLogs($_POST);
        }
        else
        {
            $filter = [];
            if($this->session->userdata('role') != 1){
                $filter['users_id'] = $this->session->userdata('admin_id');
            }
      
           
            $data['GetUserActivityLogs'] = $this->Reports_model->GetActivityLogs($filter);
        }

    
   

           $data['title']="View Offer";
           $this->load->view('admin/sections/header');
           $this->load->view('admin/reports/shop.php', $data);
          $this->load->view('admin/sections/footer');
         
          
           
       }
       else
       {
  
           $data['title']="Admin - Login";

          


           redirect('admin');
       
     }
      }
      public function FilterActivityLogs($post)
    {
       
        if($this->session->userdata('role') != 1){
            $filter['users_id'] = $this->session->userdata('admin_id');
        }
        if(!empty($post['outlet_id'])){
            $filter['outlet_id'] = $post['outlet_id'];
        }
        if(!empty($post['datefilter'])){
           $taskdate= $post['datefilter'];
         
        $taskdate = explode('-', $taskdate);
       
        $filter['task_start_date'] = trim($taskdate[0]);
     
        $filter['task_end_date'] = trim($taskdate[1]);
       
      
        }
    
  
        $data['GetUserActivityLogs'] = $this->Reports_model->GetActivityLogs($filter);

        return $data;
    }



    public function BankLoan()
    {

     if($this->session->userdata('admin_logged'))
     {

      if($this->input->server('REQUEST_METHOD') == 'POST'){
          $data = $this->Filterbank($_POST);
      }
      else
      {
          $filter = [];
          if($this->session->userdata('role') != 1){
              $filter['users_id'] = $this->session->userdata('admin_id');
          }

          $data['GetUserActivityLogs'] = $this->Reports_model->Filterbank($filter);
      }

   
         $data['title']="View Offer";
         $this->load->view('admin/sections/header');
         $this->load->view('admin/reports/bank.php', $data);
        $this->load->view('admin/sections/footer');
       
        
         
     }
     else
     {

         $data['title']="Admin - Login";

        


         redirect('admin');
     
   }
    }
    public function Filterbank($post)
  {

    if($this->session->userdata('role') != 1){
        $filter['users_id'] = $this->session->userdata('admin_id');
    }
    
      if(!empty($post['datefilter'])){
         $taskdate= $post['datefilter'];
       
      $taskdate = explode('-', $taskdate);
     
      $filter['task_start_date'] = trim($taskdate[0]);
   
      $filter['task_end_date'] = trim($taskdate[1]);
     
    

      }
    //   if(!empty($post['delivery_persn'])){
    //     $filter['delivery_persn'] = $post['delivery_persn'];
    // }
      $data['GetUserActivityLogs'] = $this->Reports_model->Filterbank($filter);

      return $data;
  }
  
      public function Customer()
    {

     if($this->session->userdata('admin_logged'))
     {

      if($this->input->server('REQUEST_METHOD') == 'POST'){
          $data = $this->Filtercustomer($_POST);
      }
      else
      {
          $filter = [];
          if($this->session->userdata('role') != 1){
              $filter['users_id'] = $this->session->userdata('admin_id');
          }

          $data['GetUserActivityLogs'] = $this->Reports_model->Filtercustomer($filter);
      }

   
         $data['title']="View Offer";
         $this->load->view('admin/sections/header');
         $this->load->view('admin/reports/customer.php', $data);
        $this->load->view('admin/sections/footer');
       
        
         
     }
     else
     {

         $data['title']="Admin - Login";

        


         redirect('admin');
     
   }
    }
    
      public function Filtercustomer($post)
  {

    if($this->session->userdata('role') != 1){
        $filter['users_id'] = $this->session->userdata('admin_id');
    }
    
      if(!empty($post['datefilter'])){
         $taskdate= $post['datefilter'];
       
      $taskdate = explode('-', $taskdate);
     
      $filter['task_start_date'] = trim($taskdate[0]);
   
      $filter['task_end_date'] = trim($taskdate[1]);
     
    

      }
      
      
      if(!empty($post['statusid'])){
        $filter['loanstatus']= $post['statusid'];
      }
  
      $data['GetUserActivityLogs'] = $this->Reports_model->Filtercustomer($filter);

      return $data;
  }
  	

  public function paymentReport()
  {

   if($this->session->userdata('admin_logged'))
   {

    if($this->input->server('REQUEST_METHOD') == 'POST'){
        $data = $this->Filterpayment($_POST);
    }
    else
    {
        $filter = [];
        if($this->session->userdata('role') != 1){
            $filter['users_id'] = $this->session->userdata('admin_id');
        }

        $data['GetUserActivityLogs'] = $this->Reports_model->Filterpayment($filter);
    }

 
       $data['title']="View Offer";
       $this->load->view('admin/sections/header');
       $this->load->view('admin/reports/payment.php', $data);
      $this->load->view('admin/sections/footer');
     
      
       
   }
   else
   {

       $data['title']="Admin - Login";

      


       redirect('admin');
   
 }
  }
  
    public function Filterpayment($post)
{

  if($this->session->userdata('role') != 1){
      $filter['users_id'] = $this->session->userdata('admin_id');
  }
  
    if(!empty($post['datefilter'])){
       $taskdate= $post['datefilter'];
     
    $taskdate = explode('-', $taskdate);
   
    $filter['task_start_date'] = trim($taskdate[0]);
 
    $filter['task_end_date'] = trim($taskdate[1]);
   
  

    }

    $data['GetUserActivityLogs'] = $this->Reports_model->Filterpayment($filter);

    return $data;
}
    
}