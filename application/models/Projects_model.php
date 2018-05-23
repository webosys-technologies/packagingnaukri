
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Projects_model extends CI_Model
{
     var $table='projects';
    
     public function getall_employments()
     {
       
     }
     public function project_by_member($id)
     {
         $this->db->from('projects as pro');
         $this->db->join('employments as emp','emp.employment_id=pro.employment_id','LEFT');
         $this->db->where('pro.member_id',$id);
         $query=$this->db->get();
         return $query->result();
     }
     
     public function get_project_by_id($where)
     {
          $this->db->where($where);
         $query=$this->db->get($this->table);
         return $query->row();
     }
     
     public function update_project($data,$where)
     {
       $this->db->update($this->table,$data,$where); 
       return $this->db->affected_rows();
     }
     
     public function insert_project($data)             
     {
         $this->db->insert($this->table,$data);
         return $this->db->affected_rows();
     }
     
     public function check_project_name($name)
     {
         $this->db->where('project_name',$name);
         $query=$this->db->get($this->table);
         return $query->num_rows();
     }
     public function delete_project($where)
     {
         $this->db->where($where);
         $this->db->delete($this->table);
         return $this->db->affected_rows();
     }
    
}

  