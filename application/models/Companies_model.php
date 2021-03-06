    
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Companies_model extends CI_Model
{
     var $table='companies';
    
     public function getall_companies()
     {
         $this->db->from('companies as comp');
         $this->db->join('recruiters as rec','rec.recruiter_id=comp.recruiter_id','LEFT');
//         $this->db->where('company_status','1');
       $query=$this->db->get();
       return $query->result();
     }

     public function company_by_id($id)
     {
        $this->db->from('companies as comp');
        $this->db->join('recruiters as rec','rec.recruiter_id=comp.recruiter_id','LEFT');
        $this->db->join('states as st','st.stateID=comp.company_state','LEFT');
        $this->db->where('comp.company_id',$id);
        $query=$this->db->get();
        return $query->row();
     }
     
     public function job_by_company($form)
     {
          $this->db->from('companies as comp');
           $this->db->like('comp.company_name',$form['title']);
         $this->join_query();
        $this->db->where('comp.company_status','1');
        $this->db->where('comp.company_source',$form['source']);
         
         $result=$this->db->get();
         if($result->result())
         {
         return $result->result(); 
         }else{
             return false;
         }
     }
     
     public function check_company_jobs()
     {
         
     }
     
     function join_query()
     {
          $this->db->join('jobs as job','job.company_id=comp.company_id','LEFT');
         $this->db->join('recruiters as rec','rec.recruiter_id=job.recruiter_id','LEFT');
       
     }
     
     
     public function companies_by_recruiter($id)
     {
        $this->db->where('recruiter_id',$id);
        $query=$this->db->get($this->table);
        return $query->result();         
     }
     function check_company($comp)
     {
         $query=$this->db->from($this->table)->where('company_name',$comp)->get();
         return $query->num_rows();
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

     public function delete_by_recruiter_id($id)
     {
         $this->db->where('recruiter_id',$id);
         $this->db->delete($this->table);
         return $this->db->affected_rows();
     }
     
     function get_recent_company()
     {
         $this->db->from($this->table);
//          $this->db->order_by('company_id','desc');
//          $this->db->limit('5');
         $this->db->where('company_status','1');
        $res=$this->db->get();
       
         return $res->result();
     }

   
}

  