<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goldloan extends CI_Controller {

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
            $data['customer']=$this->Client_model->selectAll();
			$data['loanadd']=$this->Loam_Model->selectAllloan();
            // $data['bankloan']=$this->Loam_Model->selectAllbankloan();


			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/listall.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
			redirect('admin');
		
	  }
	}
	public function Goldloandetails($id=null,$loan_number=null)
	{
		
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->Goldloandetails($loan_number);
			$data['customerloan']=$this->Loam_Model->CustomerAboutLoan($loan_number);
			$data['bkdetails']=$this->Loam_Model->selectViewAllbankloan($id);
            $data['customer']=$this->Client_model->selectAll();
		$data['loanadd']=$this->Loam_Model->selectAllloan();
            $data['bankloan']=$this->Loam_Model->selectAllbankloan($loan_number);


			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/listgoldloan.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
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

		
		if(!empty($_FILES['files']['name'])){
				
			// Define new $_FILES array - $_FILES['file']
			$_FILES['file']['name'] = $_FILES['files']['name'];
			$_FILES['file']['type'] = $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['files']['error'];
			$_FILES['file']['size'] = $_FILES['files']['size'];
   
			// Set preference
			$config['upload_path'] = './uploads/documents/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		     $config['max_size'] = '500000000000'; // max_size in kb
			$config['file_name'] = $_FILES['files']['name'];
		   
			//Load upload library
			$this->load->library('upload',$config); 
		   
		   
			if($this->upload->do_upload('file')){
			   
			 $data = $this->upload->data(); 
			 $filename = $data['file_name'];

		   }
	   
			}
			date_default_timezone_set('Asia/Kolkata');
			$updated_on = date("Y-m-d H:i:s");
			$id=$this->input->post('loan_id');
			$loan_number=$this->input->post('loan_number');

			$loan_amount=$this->input->post('loan_amount');

			//get bank loan details

			$GetBankAmount=$this->Loam_Model->GetBankAmount($id);
			if(!empty($GetBankAmount))
			{
				$excess_amount=$GetBankAmount->excess_amount_in_bank;
				$additional_amount=$GetBankAmount->addition_amount_in_bank;
				if($excess_amount!=0)
				{
					if($excess_amount>$loan_amount)
					{
					$excess_amount=$excess_amount-$loan_amount;
					$addition_amount_in_bank=0;
					}
					else if($loan_amount>$excess_amount)
					{
						
						$minusexcess=$loan_amount-$excess_amount;
						$excess_amount=0;
						$addition_amount_in_bank=$additional_amount+$minusexcess;

					}
					else if($loan_amount==$excess_amount)
					{
						$excess_amount=0;
						$addition_amount_in_bank=$additional_amount;
					}
						else if($additional_amount==0 && $excess_amount==0)
					{
						$excess_amount=$loan_amount;
						$addition_amount_in_bank=$loan_amount;
					}
				}
				else
				{
				    	$excess_amount=0;
						$addition_amount_in_bank=$loan_amount;
				}
				
				
				if($additional_amount!=0)
				{
					if($additional_amount>$loan_amount)
					{
					$addition_amount_in_bank=$excess_amount+$loan_amount;
					$excess_amount=0;
					}
					else if($loan_amount>$additional_amount)
					{
						
						$addition_amount_in_bank=$excess_amount+$loan_amount;
						$excess_amount=0;
					}
					else if($loan_amount==$additional_amount)
					{
						$excess_amount=$excess_amount;
						$addition_amount_in_bank=$additional_amount;
					}
					else if($additional_amount==0 && $excess_amount==0)
					{
						$excess_amount=$loan_amount;
						$addition_amount_in_bank=$loan_amount;
					}
				}
				else
{
   
					
						$excess_amount=0;
						$addition_amount_in_bank=$loan_amount;
					
					
				    	$addition_amount_in_bank=$loan_amount;
				}

				$data=array(
					'addition_amount_in_bank'		=> 	$addition_amount_in_bank,
					'excess_amount_in_bank'		=> 	$excess_amount,
				
				
					   );
				   
				$this->Loam_Model->UpdateAmount($data,$id);


			}
			

			$data=array(  'loan_id'		=> 	$this->input->post('loan_id'),
			'loan_number'		=> 	$this->input->post('loan_number'),
			  'loan_date'		=> 	$this->input->post('date'),
			  'gram'		=> 	$this->input->post('gram'),
			  'details_of_gold'		=> 	$this->input->post('details_of_gold'),
			  'loan_amount'		=> 	$this->input->post('loan_amount'),
			  'no_of_days'		=> 	$this->input->post('no_of_days'),
			  'interst_rate'		=> 	$this->input->post('interst_rate'),
			  'tota_pay_amount'		=> 	$this->input->post('tota_pay_amount'),
			  'closing_date'		=> 	$this->input->post('closing_date'),
			  'remark'		=> 	$this->input->post('remark'),
			  'created_date' =>$updated_on,
			  'photo' =>$filename,
			  'status'		=> 	1,
			  'created_by'		=> $this->session->userdata('admin_id')
				 );
			$result= $this->Loam_Model->SaveLoandetails($data);
			if($result==true)
			{
			    
			    
			    
			$this->session->set_flashdata('success', 'New Loan has been Added Successfull.');
			redirect('admin/GoldLoan/Goldloandetails/'.$id.'/'.$loan_number);
			}
	  }

	  public function SaveLoan()
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
			$config['upload_path'] = './uploads/documents/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		     $config['max_size'] = '500000000000'; // max_size in kb
			$config['file_name'] = $_FILES['files']['name'];
		   
			//Load upload library
			$this->load->library('upload',$config); 
		   
		   
			if($this->upload->do_upload('file')){
			   
			 $data = $this->upload->data(); 
			 $filename = $data['file_name'];

		   }
	   
			}


			$six_digit_random_number = random_int(100000, 999999);
// 			$loan_number ='LN-'.$six_digit_random_number;
	$loan_number =$this->input->post('loan_number');
			

			$table2='loan';
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d H:i:s");

          $id=$this->input->post('id');
          $data=array(
            'customer_id'		=> 	$this->input->post('customer_id'),
            'loan_number'		=> 	$loan_number,
             'gram'		=> 	$this->input->post('gram'),
			  'details_of_gold'		=> 	$this->input->post('details_of_gold'),
            'created_by'		=> $this->session->userdata('admin_id'),
            'branch_id'		=>$this->session->userdata('role'),
            'created_date'		=> $date,
             'photo' =>$filename,
            'status'		=> 	1
               );
        $resultId= $this->dashboard_model->insert($table2,$data);

		if($resultId)
		{
			date_default_timezone_set('Asia/Kolkata');
			$updated_on = date("Y-m-d H:i:s");
			
			$data=array(  'loan_id'		=> 	$resultId,
			'loan_number'		=> 	$loan_number,
			  'loan_date'		=> 	$this->input->post('date'),
			  'gram'		=> 	$this->input->post('gram'),
			  'details_of_gold'		=> 	$this->input->post('details_of_gold'),
			  'loan_amount'		=> 	$this->input->post('loan_amount'),
			  'no_of_days'		=> 	$this->input->post('no_of_days'),
			  'interst_rate'		=> 	$this->input->post('interst_rate'),
			  'tota_pay_amount'		=> 	$this->input->post('tota_pay_amount'),
			  'closing_date'		=> 	$this->input->post('closing_date'),
			  'remark'		=> 	$this->input->post('remark'),
			  'created_date' =>$updated_on,
			  'photo' =>$filename,
			  'status'		=> 	1
		  
				 );
			$result= $this->Loam_Model->SaveLoandetails($data);
	}
			if($result==true)
			{
			    
			    //get customer mobile phone
			    $table="customers";
			    
			$GetcustomerMob=$this->Loam_Model->Selectbyid($table,$this->input->post('customer_id'));
			$mobileno=$GetcustomerMob['phoneno'];
			
			
$apiKey = urlencode("NjY0MzRmNzQ0NzRiNGE2YTZlNTY0ZjY2NGM0ZDRlNWE=");
// Message details
$numbers = array($mobileno);
$numbers = array('918583944370');
$sender = urlencode('TXTLCL');
$message = rawurlencode("This is your message");
 
$numbers = implode(",", $numbers);
 

$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);

$ch = curl_init("https://api.textlocal.in/send/");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
// Process your response here
// var_dump($response);
// exit;

			$this->session->set_flashdata('success', 'New Loan has been Added Successfull.');
			redirect('admin/GoldLoan/Goldloandetails/'.$resultId.'/'.$loan_number);
			}
	  }




	  public function EditLoan($id=null,$loan_number=null)
	{
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->Editlaon($loan_number,$id);
            $data['customer']=$this->Client_model->selectAll();
		
			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/editloan.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
			redirect('admin');
		
	  }
	}

	public function UpdateLoandetails(){

		$id=$this->input->post('loan_id');
		$loan_number=$this->input->post('loan_number');

		$table="loan_details";
		$data['loan_details'] = $this->Loam_Model->Selectbyid($table,$id);
	
		   if(!empty($_FILES['files']['name'])){
	 
			 // Define new $_FILES array - $_FILES['file']
			 $_FILES['file']['name'] = $_FILES['files']['name'];
			 $_FILES['file']['type'] = $_FILES['files']['type'];
			 $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			 $_FILES['file']['error'] = $_FILES['files']['error'];
			 $_FILES['file']['size'] = $_FILES['files']['size'];
	
			 // Set preference
			 $config['upload_path'] = './uploads/documents/'; 
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
				
				 $filename = @$data['loan_details']['photo'];
				
				 }
			 }

			 if(!empty($this->input->post('closing_date')))
			 {
				 $closing_date=$this->input->post('closing_date');
			 }
			 else
			 {
				 $closing_date=null;
			 }
		$data=array(
			'loan_date'		=> 	$this->input->post('date'),
			'gram'		=> 	$this->input->post('gram'),
			'details_of_gold'		=> 	$this->input->post('details_of_gold'),
			'remark'		=> 	$this->input->post('remark'),
			'closing_date'		=> 	$closing_date,
			'photo' =>$filename,
			   );
		   
		$this->Loam_Model->UpdateLoandetails($data,$id);
	 
		$this->session->set_flashdata('success', 'Loan details has been updated successfully.');
		redirect('admin/GoldLoan/Goldloandetails/'.$id.'/'.$loan_number);
	}  

	public function AddPayments($id=null,$loan_number=null)
	{
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->Editlaon($loan_number,$id);
            $data['customer']=$this->Client_model->selectAll();
		
			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/payments.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
			redirect('admin');
		
	  }
	}

	public function Savepayment()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';

			date_default_timezone_set('Asia/Kolkata');
			$updated_on = date("Y-m-d H:i:s");
			$id=$this->input->post('loan_id');
				$loan_details_id=$this->input->post('loan_details_id');
			$loan_number=$this->input->post('loan_number');
			
			
			$dataarray=array(  'loan_details_id'		=> 	$this->input->post('loan_details_id'),
			    'loan_id'		=> 	$this->input->post('loan_id'),
			'loan_number'		=> 	$this->input->post('loan_number'),
			  'loan_date'		=> 	$this->input->post('loan_date'),
			  'loan_amount'		=> 	$this->input->post('loan_amount'),
			  'no_of_days'		=> 	$this->input->post('no_of_days'),
			  'interst_rate'		=> 	$this->input->post('interst_rate'),
			  'payment_date'		=> 	$this->input->post('payment_date'),
			  'payment_amount'		=> 	$this->input->post('payment_amount'),
			  'remaing_interst_rate'		=> 	$this->input->post('remaing_interst_rate'),
			  'remaing_laon_amount'		=> 	$this->input->post('remaing_laon_amount')
			
		  
				 );
			$result= $this->Loam_Model->Savepayment($dataarray);
// 			var_dump($result);
// 			exit;
			
			if(!empty($this->input->post('closing_date')))
{
    $closing_date=$this->input->post('closing_date');
}
else
{
    $closing_date=null;
}

			if($result==true)
			{
			    if(!empty($this->input->post('closing_date')))
{
				$data=array(
					
					'closing_date'		=> 	$closing_date,
					'status' =>$this->input->post('status')
					   );
}
					   else
					   
					   {
					      	$data=array('loan_date'		=> 	$this->input->post('payment_date'),
					 'loan_amount'		=> 	$this->input->post('remaing_laon_amount'),
					// 'interst_rate'		=> 	$this->input->post('remaing_interst_rate'),
					'closing_date'		=> 	$closing_date,
					'status' =>$this->input->post('status') 
					);
					   }
				   
				$this->Loam_Model->UpdateLoandetails($data,$loan_details_id);

			$this->session->set_flashdata('success', 'Payment has been Added Successfull.');
			redirect('admin/GoldLoan/Goldloandetails/'.$id.'/'.$loan_number);
			}
				
	  }

	  public function ListPayments($id=null,$loan_number=null)
	  {
		  if($this->session->userdata('admin_logged'))
		  {
  
			  $data['loan']=$this->Loam_Model->ListPayments($loan_number,$id);
			
		  
			  $data['title']=" List all Loans";
			  $this->load->view('admin/sections/header');
			  $this->load->view('admin/goldloan/paymenthistory.php', $data);
			  $this->load->view('admin/sections/footer');
			  
		  }
		  else
		  {
  
			  $data['title']="Freshpot - Login";
			  redirect('admin');
		  
		}
	  }
	  
	  	public function GoldRate()
	{

        $data['title'] = 'List of  User Role Type';
        $data['userrole'] = $this->dashboard_model->Getgoldrate();
		
		
			$this->load->view('admin/sections/header');
			$this->load->view('admin/goldloan/goldrate.php', $data);
			$this->load->view('admin/sections/footer');
	}
	
		public function SaveRate()
	{
	  
		if(!$this->session->userdata('admin_logged')) {
		  $data['title']="Admin - Login";
		  redirect('admin');
		}
		$data['title'] = 'Admin-Role Type';
  
			$id=$this->input->post('id');
			$data=array(
			  'gold_rate'		=> 	$this->input->post('gold_rate'),
			  'status'		=> 	1
		  
				 );
			$result= $this->dashboard_model->SaveRate($data);
			if($result==true)
			{
			$this->session->set_flashdata('success', 'New date  has been Added Successfull.');
			redirect('admin/GoldLoan/GoldRate');
			}
	  }
	  
	  public function Updategoldrate(){

		$id=$this->input->post('id');
		$data=array(
		 'gold_rate'		=> 	$this->input->post('gold_rate'),
		
			   );
		   
		$this->dashboard_model->Updategoldrate($data,$id);
	 
		$this->session->set_flashdata('success', 'data has been updated successfully.');
		redirect('admin/GoldLoan/GoldRate');
	}  
	
	
	
	public function FindPandL()
	{
		if($this->session->userdata('admin_logged'))
		{

			$data['loan']=$this->Loam_Model->FindPL();
            $data['customer']=$this->Client_model->selectAll();
			$data['loanadd']=$this->Loam_Model->selectAllloan();
            // $data['bankloan']=$this->Loam_Model->selectAllbankloan();


			$data['title']=" List all Loans";
			$this->load->view('admin/sections/header');
            $this->load->view('admin/goldloan/profitandloss.php', $data);
		    $this->load->view('admin/sections/footer');
			
		}
		else
		{

			$data['title']="Freshpot - Login";
			redirect('admin');
		
	  }
	}
	
}