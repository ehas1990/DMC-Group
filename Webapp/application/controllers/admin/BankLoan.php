<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankLoan extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
		$this->load->model('users_model');
        $this->load->model('Loam_Model');
		$this->load->model('Client_model');
		$this->load->helper('file');
	}

	public function index()
	{
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->selectAllloan();
			$data['loanadd']=$this->Loam_Model->selectAllloan();
            $data['bankloan']=$this->Loam_Model->selectAllbankloan();
            $data['customer']=$this->Client_model->selectAll();
		
			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/bank/listall.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
			redirect('admin');
		
	  }
	}
	public function Editbankloan($id=null)
	{
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->Editbanklaon($id);
            $data['customer']=$this->Client_model->selectAll();
		
			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/editbankloan.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Kripa - Login";
			redirect('admin');
		
	  }
	}

    public function SaveLoandetails()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';

		
			date_default_timezone_set('Asia/Kolkata');
			$created_date = date("Y-m-d H:i:s");
			$loan_id=$this->input->post('loan_id');
			$loan_details_id=$this->input->post('loan_details_id');
			
			$bdate=$this->input->post('date');
			$duedate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($bdate)) . " + 365 day"));

			$loan_number=$this->input->post('loan_number');
			$data=array(   'date'		=> 	$this->input->post('date'),
                'name_of_bank'		=> 	$this->input->post('name_of_bank'),
                'name'		=> 	$this->input->post('name'),
                'loan_number'		=> 	$this->input->post('loan_number'),
            'bank_loan_number'		=> 	$this->input->post('bank_loan_number'),
				'loan_id'		=> 	$this->input->post('loan_id'),
				'loan_details_id'		=> 	$this->input->post('loan_details_id'),
			  'gram'		=> 	$this->input->post('gram'),
			  'details_of_gold'		=> 	$this->input->post('details_of_gold'),
			  'amount_in_bank'		=> 	$this->input->post('loan_amount'),
			  'no_of_days'		=> 	$this->input->post('no_of_days'),
			  'interest_in_bank'		=> 	$this->input->post('interst_rate'),
			  'excess_amount_in_bank'		=> 	$this->input->post('excess_amount_in_bank'),
              'addition_amount_in_bank'		=> 	$this->input->post('addition_amount_in_bank'),
              'due_date'		=> 	$duedate,
			  'closing_date'		=> 	$this->input->post('closing_date'),
			  'remark'		=> 	$this->input->post('remark'),
			  'created_date' =>$created_date,
			  'created_by'		=> $this->session->userdata('admin_id'),
			  'status'		=> 	1
		  
				 );
			$result= $this->Loam_Model->SavebankLoandetails($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New Bank Loan has been Added Successfull.');
			redirect('admin/GoldLoan/Goldloandetails/'.$loan_id.'/'.$loan_number);
			}
	  }

      public function UpdateLoandetails(){

		$id=$this->input->post('bank_id');
		$loan_number=$this->input->post('loan_number');

		$loan_id=$this->input->post('loan_id');

		$data=array(
            'date'		=> 	$this->input->post('date'),
            'name_of_bank'		=> 	$this->input->post('name_of_bank'),
            'name'		=> 	$this->input->post('name'),
           
          'gram'		=> 	$this->input->post('gram'),
          'details_of_gold'		=> 	$this->input->post('details_of_gold'),
          'amount_in_bank'		=> 	$this->input->post('loan_amount'),
          'no_of_days'		=> 	$this->input->post('no_of_days'),
          'interest_in_bank'		=> 	$this->input->post('interst_rate'),
          'excess_amount_in_bank'		=> 	$this->input->post('excess_amount_in_bank'),
          'addition_amount_in_bank'		=> 	$this->input->post('addition_amount_in_bank'),
          'due_date'		=> 	$this->input->post('due_date'),
          'closing_date'		=> 	$this->input->post('closing_date'),
          'remark'		=> 	$this->input->post('remark'),
		  'status'		=> 	$this->input->post('status'),
          'created_date' =>$created_date,
			   );
		   
		$this->Loam_Model->UpdatebankLoandetails($data,$id);
	 
		$this->session->set_flashdata('success', 'Loan details has been updated successfully.');
		redirect('admin/GoldLoan/Goldloandetails/'.$loan_id.'/'.$loan_number);
	}  

	public function gettotalamount($loan_number){
          
		$totalamount=$this->Loam_Model->Gettotalamount($loan_number);
		$totalamount=$totalamount->loan_amount;
		 echo $totalamount;
	
		
	}

		
}