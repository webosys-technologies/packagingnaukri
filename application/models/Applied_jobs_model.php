
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
     	$this->db->from('members as mem');
        $this->db->join('applied_job as app','app.member_id=mem.member_id','left');
     	$this->db->where('mem.member_id',$id);
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

   
}

  