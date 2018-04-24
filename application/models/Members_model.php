<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model
{
	var $table='members';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
        
         function loginMe($where)
    {
     
        $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
    
        $res=$query->row();
        
        
        $this->db->where('member_email',$where['member_email']);
        $query1=$this->db->get($this->table);
        $valid=$query1->num_rows();
        if($res)
        {
            return array($res,$valid);
        }else{
            
            return array(false,$valid);
        }
   
    }

    
    public function getall_members_no()
    {
        $this->db->from($this->table);        
        $this->db->where('member_status','1');
        $query=$this->db->get();
        return $query->num_rows();
       
    }
     public function get_all_stud($id)
    {
        $this->db->from($this->table); 
        $this->db->where('center_id',$id);
        $query=$this->db->get();
        return $query->num_rows();
       
    }
    
    public function get_members_count($id)
    {
        $this->db->from($this->table);
        $this->db->where('center_id',$id);
        $this->db->where('member_status',"1");
        $query=$this->db->get();
        return $query->num_rows();

       
    }

   
        
               
        
        public function get_member_by_id($id)
	{
         $this->db->from($this->table);        
         $this->db->where('member_id',$id);
         $query = $this->db->get();
       	return $query->row();
	}             

    public function member_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
        
      
     

	public function member_update($where, $data)
	{
           
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('member_id', $id);
		$this->db->delete($this->table);
                return $this->db->affected_rows();
	}
        
        public function delete_profile_pic($id)
	{     
                           
            $this->db->set('member_profile_pic',"");
                $this->db->where('member_id', $id);
                $this->db->update($this->table); 
                 return $this->db->affected_rows();
                
	}
        
        public function check_password($id)
        {
             $this->db->from($this->table);
            $this->db->where('member_id', $id);
            $query=$this->db->get();
            
            $result=$query->result();
            foreach($result as $res)
            {
                $password=$res->member_password;
            }
            return $password;
            
        }

        
        public function reset_password($data)
        {
             $this->db->set('member_password',$data['member_password']);
             $this->db->where('member_id',$data['member_id']);
            $this->db->update($this->table);
            return true;
            
                     
           
            
        }      
       
       
}

 ?>