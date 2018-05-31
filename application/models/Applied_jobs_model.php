
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Applied_jobs_model extends CI_Model
{
     var $table='applied_job';
    
  

     public function get_member_job($id)
     {
     	$this->db->from('applied_job as app');
        $this->db->join('members as mem','mem.member_id=app.member_id');
     	$this->db->where('app.recruiter_id',$id);
     	$query=$this->db->get();
            	return $query->result();
     }
     
     public function get_job_by_member($id)
     {
     	$this->db->from('applied_job as app');
         $this->db->order_by("app.job_id desc");
        $this->db->join('jobs as job','job.job_id=app.job_id','LEFT');
        $this->db->join('recruiters as rec','rec.recruiter_id=app.recruiter_id','LEFT');
        $this->db->join('companies as comp','app.company_id=comp.company_id','LEFT');
     	$this->db->where('app.member_id',$id);       
     	$query=$this->db->get();
        return $query->result();
     }
     
     public function applied_members()
     {       
         $this->db->from('applied_job as app');
        $this->db->join('members as mem','mem.member_id=app.member_id');
     	$query=$this->db->get();
        return $query->result();
     }
     
     public function get_by_job_id($id)
     {
         $where=array('job_id'=>$id,
                      'apply_status'=>1);
         $this->db->where($where);
         $query=$this->db->get($this->table);
         return $query->result();
     }
     
      public function members_by_jobid($id)
     {
        
         $this->db->from('applied_job as job');
         $this->db->join('members as mem','mem.member_id=job.member_id','LEFT');
         $this->db->join('employments as emp','job.member_id=emp.member_id','LEFT');         
         $this->db->join('educations as edu','edu.member_id=job.member_id','LEFT');
         
         $this->db->where('job.job_id',$id);
         $query=$this->db->get();
         return $query->result();
     }
     
     function members_applied_job($id)
     {
         $this->db->where('member_id',$id);
         $this->db->from($this->table);
         $query=$this->db->get();
         return $query->result();
     }

     
      public function apply_job($data)
     {
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
     }
     
     function remove_job($data)
     {
          $this->db->where($data);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
     }
   
}

  