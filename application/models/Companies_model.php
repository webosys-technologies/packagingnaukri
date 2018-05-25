    
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Companies_model extends CI_Model
{
     var $table='companies';
    
     public function getall_companies()
     {
         $this->db->from('companies as comp');
         $this->db->join('recruiters as rec','rec.recruiter_id=comp.recruiter_id','LEFT');
         $this->db->where('company_status','1');
       $query=$this->db->get();
       return $query->result();
     }

     public function company_by_id($id)
     {
        $this->db->from($this->table);
        $this->db->where('company_id',$id);
        $query=$this->db->get();
        return $query->row();
     }
     
     public function companies_by_recruiter($id)
     {
        $this->db->where('recruiter_id',$id);
        $query=$this->db->get($this->table);
        return $query->result();         
     }
     
     public function company_add($data)
     {
         $res=$this->db->insert($this->table,$data);
         return $this->db->insert_id();
     }

     public function company_update($where,$data)
     {
        $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }

     
     public function company_delete($id)
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

  