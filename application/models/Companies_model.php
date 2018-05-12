
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
        $this->db->get($this->table);
        return $query->result();         
     }

   
}

  