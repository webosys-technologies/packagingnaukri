
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Saved_jobs_model extends CI_Model
{
     var $table='saved_job';
    
     public function save_job($data)
     {
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
     }
     
      public function unsave_job($data)
     {
          $this->db->where($data);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
     }
     
     function get_jobs_by_member($id)
     {
         $this->db->from('saved_job as save');
         $this->db->join('jobs as job','save.job_id=job.job_id','LEFT');
         $this->db->join('recruiters as rec','rec.recruiter_id=save.recruiter_id','LEFT');
         $this->db->join('companies as comp','save.company_id=comp.company_id','LEFT');
         $this->db->where('save.member_id',$id);
         $query=$this->db->get();
         return $query->result();
     }
     

   
}

  