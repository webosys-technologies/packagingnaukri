
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Skills_model extends CI_Model
{
     var $table='Skills';
    
     public function getall_employments()
     {
       
     }
     
     public function get_members_skill($id)
     {
         $this->db->where('member_id',$id);
         $query=$this->db->get($this->table);
         return $query->result();
     }
     
     public function add_new_skill($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function skill_delete($where)
     {
         $this->db->where($where);
         $this->db->delete($this->table);
         return $this->db->affected_rows();
     }
     
    
}

  