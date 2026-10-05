<?php
class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function selectAllUsers()
{ 
    $table='users';
    $this->db->select($table.'.* ,user_roletype.role_type as roletype_name');
    $this->db->join('user_roletype','user_roletype.id='.$table.'.role');
    $this->db->order_by('name', 'Asc');
    $this->db->where('role!=', 1);
    

    $this->db->from($table);
    $query = $this->db->get();
    return $query->result();

}
    function SaveUsers($data){
        return $this->db->insert('users', $data);
    }

    public function GetUsers($id = FALSE)
{
	if($id === FALSE){
		$query = $this->db->get('users');
		return $query->result_array(); 
	}

	$query = $this->db->get_where('users', array('id' => $id));
	return $query->row_array();
}
function UpdateUsers($data,$id){
	$this->db->where('id',$id);
	 $this->db->update('users', $data);
	 return true;

}
public function get_profile($user_id)
    {

		$this->db->select('*');
        $this->db->from('users');
        $this->db->where("id = " . $user_id);
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
        {
            return [];
        }
    }

    public function updateProfileUser($user_id, $data)
    {

        $this->db->where('id', $user_id);
        $result = $this->db->update('users', $data);

        if($result){    
            return true;
        }
        else
        {
            return $this->db->error();
        }
    }
    //delivery module

    public function selectAllDeliveryPerson()
	{ 
		$table='delivery_login';
		$this->db->select($table.'.* ,outlet.name as outlet_name');
        $this->db->join('outlet','outlet.id='.$table.'.outlet_id');
		$this->db->order_by('name', 'Asc');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();

	}
    function SavePersons($data){
        return $this->db->insert('delivery_login', $data);
    }
    function UpdatePersons($data,$id){
        $this->db->where('id',$id);
         $this->db->update('delivery_login', $data);
         return true;
    
    }
    public function GetDelivery($id = FALSE)
    {
        if($id === FALSE){
            $query = $this->db->get('delivery_login');
            return $query->result_array(); 
        }
    
        $query = $this->db->get_where('delivery_login', array('id' => $id));
        return $query->row_array();
    }
}