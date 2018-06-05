
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Job_skill_model extends CI_Model
{
     var $table='job_skills';
    
     public function getall_job_skill()
     {
        $this->db->from('jobs as job');
        $this->db->join('companies as camp','camp.company_id=job.company_id','LEFT');
        $res=$this->db->get();
        return $res->result();
     }
     
  
     
    
     
     
     public function skill_by_id($id)
     {
         $where=array('job_id'=>$id);
         $this->db->where($where);
         $res=$this->db->get($this->table);
         return $res->row();
     }
     
     public function add($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->insert_id();
     }
      public function skill_update($data,$where)
     {
        
         $this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
     
     public function delete_job($id)
     {
         $this->db->from($this->table);
         $this->db->where('job_id',$id);
         $this->db->delete();
         return $this->db->affected_rows();
     }
    
     
     function job_info($id)
     {
         $this->db->from('jobs as job');
          $this->db->join('companies as comp','comp.company_id=job.company_id','LEFT');
         $this->db->where('job.job_id',$id);
         $query=$this->db->get();
         return $query->row();
         
         
     }
     
     
     

     
   
}

  