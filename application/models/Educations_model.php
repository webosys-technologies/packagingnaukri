
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Educations_model extends CI_Model
{
     var $table='educations';
    
     public function getall_employments()
     {
       
     }
     
      public function get_id($id)
    {         
        $this->db->where('member_id',$id);
        $query=$this->db->get($this->table);
        return $query->num_rows();        
    }
     
     public function update_education($where,$data)
     {
         $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
     public function add_education($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
    
}

  