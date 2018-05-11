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

    function register()
    {
        

        $data=array(
            'member_fname'          =>$this->input->post('fname'),
            'member_lname'          => $this->input->post('lname'),
            'member_email'          => $this->input->post('email'),
            'member_mobile'         => $this->input->post('mobile'),
            'member_password'       => $this->input->post('password'),
            'member_city'           => $this->input->post('city'),
            'member_state'          => $this->input->post('state'),
            'member_created_at' => date("Y-m-d "),
                        'member_status'        => '1'


        );

        $this->db->insert('members',$data);
        $insert=$this->db->insert_id();
                 //return $insert;
                return array($insert,$data);
    }

    public function getall_members()
    {
        $this->db->from($this->table);        
        $this->db->where('member_status','1');
        $query=$this->db->get();
        return $query->result();
       
    }
    
    public function getall_members_no()
    {
        $this->db->from($this->table);        
        $this->db->where('member_status','1');
        $query=$this->db->get();
        return $query->num_rows();
       
    }
    
    public function get_id($id)
    {
        $this->db->where('member_id',$id);
        $query=$this->db->get($this->table);
        return $query->row();
    }
   

   
        
               
        
        public function get_member_by_id($id)
	{
         $this->db->from($this->table);        
         $this->db->where('member_id',$id);
         $query = $this->db->get();
       	return $query->row();
	} 
        
        public function get_members_by_recruiter_id($id)
	{
         $this->db->from($this->table);        
         $this->db->where('recruiter_id',$id);
         $query = $this->db->get();
       	return $query->result();
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

        function check_if_email_exist($member_email)
        {
        $this->db->where('member_email',$member_email);
        $result=$this->db->get($this->table);

        if($result->num_rows()>0)
        {
            return FALSE;
        }else{
            return TRUE;
        }
        }
           
       public function test()
       {
        $query=$this->db->query("ALTER TABLE `members` CHANGE `meber_username` `member_username` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL");

        return $query;
       }
       
}

 ?>