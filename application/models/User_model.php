<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
     var $table='users';

     public function getall_user($name)
     {
       
        $this->db->from($this->table);
        if($name=="Staff")
        {
            $this->db->where('user_status','1');
            $this->db->where('user_type','Staff');
        }
        if($name=="Admin")
        {
             $this->db->where('user_status','1');
            $this->db->where('user_type','Admin');
        }
        if($name=="")
        {
             $this->db->where('user_status','1');
        }
        $query=$this->db->get();

        return $query->result();
     }

    public function check_user($where)
    {
        $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
    
        $res=$query->row();
        
        
        $this->db->where('user_email',$where['user_email']);
        $query1=$this->db->get($this->table);
        $valid=$query1->num_rows();
        if($res)
        {
            return array($res,$valid);
        }else{
            
            return array(false,$valid);
        }
    }

    public function user_add($data)
    {
        $this->db->insert($this->table,$data);

        return $this->db->insert_id();

    }

    public function user_update($where,$data)
    {
        $this->db->update($this->table,$data,$where);

        return $this->db->affected_rows();
    }

    
    public function get_user_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('user_id',$id);
        $query=$this->db->get();
        return $query->row();
    }
    
    
    public function delete_by_id($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    
    public function insert($query)
    {
        $res=$this->db->query($query);
        if($res)
        {
            return array(true,'success');
        }else
        {
            return array(false,mysqli_error());
        }
    }

    public function query()
    {
        // City=>    UPDATE `cities` SET `city_state` = 'Dadra Nagar Haveli' WHERE `cities`.`city_state` = 'Dadra & Nagar Haveli'
    }
}

?>
  