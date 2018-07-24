<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
     var $table='users';

     public function getall_user($name,$id)
     {
       
        $this->db->from($this->table);
        if($name=="user")
        {
            $this->db->where('user_status','1');
            $this->db->where('user_type','user');
        }
        if($name=="admin")
        {
             $this->db->where('user_status','1');
            $this->db->where('user_type','admin');
        }
        if(isset($name))
        {
             $this->db->where_not_in('user_status','2');
             $this->db->where_not_in('user_id',$id);
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
    
    public function get_user($where)
    {
       $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
        return $query->row(); 
    }
    
    public function delete_by_id($where,$data)
    {
        // $this->db->where('user_id', $id);
        $this->db->update($this->table,$data,$where);
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
    
    public function getall_email()
    {
        $this->db->select('user_email');
        $this->db->from($this->table);
        $query=$this->db->get();
        return $query->result();
    }

    public function query()
    {
        // City=>    UPDATE `cities` SET `city_state` = 'Dadra Nagar Haveli' WHERE `cities`.`city_state` = 'Dadra & Nagar Haveli'
    }
}

?>
  