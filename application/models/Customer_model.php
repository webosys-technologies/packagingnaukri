<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
	var $table='customers';

	public function __construct()
	{
		parent::__construct();
	}

	public function getall_customer()
     {
         $this->db->from($this->table);
//         $this->db->where('company_status','1');
       $query=$this->db->get();
       return $query->result();
     }

     public function customer_by_id($id)
     {
        $this->db->from($this->table);
        $this->db->where('customer_id',$id);
        $query=$this->db->get();
        return $query->row();
     }

     public function customer_add($data)
     {
         $res=$this->db->insert($this->table,$data);
         return $this->db->insert_id();
     }

     public function customer_update($where,$data)
     {
        $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }

     public function customer_delete($id)
     {
         $this->db->where('customer_id',$id);
         $this->db->delete($this->table);
         return $this->db->affected_rows();
     }
}
?>