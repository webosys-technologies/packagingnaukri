
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model
{
     var $table='jobs';
    
     public function getall_jobs()
     {
        $this->db->from('jobs as job');
        $this->db->join('companies as camp','camp.company_id=job.company_id','LEFT');
        $res=$this->db->get();
        return $res->result();
     }
     
     public function update_job($data,$id)
     {
         $where=array('job_id'=>$id);
         $res=$this->db->update($this->table,$data,$where);
         return $this->db->affected_rows();
     }
     
      public function get_job_by_id($id)
     {
         $where=array('recruiter_id'=>$id);
         $res=$this->db->get($this->table,$where);
         return $res->result();
     }
     
     public function job_by_id($id)
     {
         $where=array('job_id'=>$id);
         $this->db->where($where);
         $res=$this->db->get($this->table);
         return $res->row();
     }
     
     public function job_add($data)
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function delete_job($id)
     {
         $this->db->from($this->table);
         $this->db->where('job_id',$id);
         $this->db->delete();
         return $this->db->affected_rows();
     }
     
     public function search_job($form)
     {
         $this->db->from('jobs as job');
         $this->db->join('companies as comp','comp.company_id=job.company_id','LEFT');
         $query=$this->db->get();
         return $query->result();
     }
     
     

   
}

  