<?php
class Client_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function selectAll()
	{ 
		$table='customers';
		$this->db->select($table.'.*');
		$this->db->from($table);
		
		$this->db->order_by('customers.id', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
	
	function UpdateStatus($data, $id)
    {
     $this->db->where('id', $id);
     $this->db->update('customers', $data);
    }

    function SaveUsers($data){
        return $this->db->insert('users', $data);
    }

    public function GetClients($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('customers');
		return $query->result(); 
	}

	$query = $this->db->get_where('customers', array('id' => $id));
	return $query->row_array();
}
function UpdateClients($data,$id){
	$this->db->where('id',$id);
	 $this->db->update('customers', $data);
	 return true;

}
public function client_contacts($id)
{
	$table="client_contacts";
	$this->db->select($table.'.* ,clients.id as client_id');
	$this->db->from($table);
	$this->db->join('clients','clients.id='.$table.'.client_id');
	$this->db->where('clients.id', $id);
	$query = $this->db->get();

	 return $query->result();
	//  var_dump($this->db->last_query());
	//  exit;


  }
  function UpdateClientContact($data,$id){
	$this->db->where('id',$id);
	 $this->db->update('client_contacts', $data);
	 return true;

}
}