
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employments_model extends CI_Model
{
     var $table='employments';
    
     public function getall_employments()
     {
       
     }
     
     public function insert_employment($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function update_employment($where,$data)
     {
         print_r($data);
         $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
     
     function get_employ_by_member($id)
     {
         $this->db->where('member_id',$id);
         $query=$this->db->get($this->table);
         return $query->row();
     }
     
     function get_employment_member($id)
     {
         $this->db->where('member_id',$id);
         $query=$this->db->get($this->table);
         return $query->result();
     }
     
    
}

  