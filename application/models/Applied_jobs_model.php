
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

   
}

  