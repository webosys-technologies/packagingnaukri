
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Companies_model extends CI_Model
{
     var $table='companies';
    
     public function getall_companies()
     {
       $query=$this->db->get($this->table);
       return $query->result();
     }
     
     public function companies_by_recruiter($id)
     {
        $this->db->where('recruiter_id',$id);
        $query=$this->db->get($this->table);
        return $query->result();         
     }
     
     public function company_add($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function delete_company($id)
     {
         $this->db->where('company_id',$id);
         $this->db->delete($this->table);
         return $this->db->affected_rows();
     }
     
     function get_recruiter_by_company($id)
     {
         $this->db->from($this->table);
         $this->db->where('company_id',$id);
         $query=$this->db->get();
         $res=$query->row();
         return $res->recruiter_id;
     }

   
}

  