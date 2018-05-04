
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
     
     

   
}

  