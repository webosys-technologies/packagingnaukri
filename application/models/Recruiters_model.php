<?php

class Recruiters_model extends CI_Model
{
    var $table='recruiters';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
	
     public function getall()
    {
        $this->db->from($this->table);        
        $query=$this->db->get();
        
        return $query->result();

    }
	function register()
	{
		

		$data=array(
			'recruiter_fname'			=>$this->input->post('fname'),
			'recruiter_lname'		 	=>$this->input->post('lname'),
			'recruiter_email' 		    => $this->input->post('email'),
			'recruiter_mobile' 		=> $this->input->post('mobile'),
			'recruiter_password' 		=> $this->input->post('password'),
			'recruiter_city'			=> $this->input->post('city'),
			'recruiter_state'			=> $this->input->post('state'),
                        'recruiter_created_at'	=> date("Y-m-d H:i:s"),
                        'recruiter_status'        => '1'


		);

		$this->db->insert('recruiters',$data);
		$insert=$this->db->insert_id();
                 //return $insert;
                return array($insert,$data);
	}
        
      
        
        function loginMe($where)
    {
         $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
    
        $res=$query->row();
        
        
        $this->db->where('recruiter_email',$where['recruiter_email']);
        $query1=$this->db->get($this->table);
        $valid=$query1->num_rows();
        if($res)
        {
            return array($res,$valid);
        }else{
            
            return array(false,$valid);
        }
    }
    
    public function login_with_otp($where)
    {
        $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
        return $query->row();
    }


    public function recruiter_name($cid)
        {
            $this->db->from($this->table);
            $this->db->where('recruiter_id',$cid);
            $query=$this->db->get();
            return $query->result();
        }
        
     function checkEmailExist($recruiter_email)
    {
      //  $this->db->select('userId');
        $this->db->where('recruiter_email', $recruiter_email);
      //  $this->db->where('isDeleted', 0);
        $query=$this->db->get('recruiters');
        $result=$query->num_rows();
        $info=$query->result();

        if ($result>0)
            {
            $otp=mt_rand(100000,999999);
             foreach($info as $i)
            {
             $data=array('recruiter_name'=>$i->recruiter_name,
                            'recruiter_fname'=>$i->recruiter_fname,
                               'recruiter_lname'=>$i->recruiter_lname,
                                'recruiter_mobile'=>$i->recruiter_mobile,
                                'recruiter_email'=>$i->recruiter_email,
                                'recruiter_id'=>$i->recruiter_id,
                                'otp'=>$otp
             );   
            }
            return array($result,$data);
        } 
        else {
            return false;
        }
    }
    
    public function recruiter_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
    
     function resetPasswordUser($data)
    {
         $this->db->where('id',$data['id']);
        $query=$this->db->get('tbl_reset_password');
        
        if($query->num_rows()>0)
        {
            $result = $this->db->replace('tbl_reset_password', $data);
        }
        else
        {
        $result = $this->db->insert('tbl_reset_password', $data);
        }
        
        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete_by_id($id)
	{
		$this->db->where('recruiter_id', $id);
		$this->db->delete($this->table);
                return $this->db->affected_rows();
	}
        
    function reset_password($data)
    {
        $this->db->set('recruiter_password',$data['password']);
        $this->db->where('recruiter_email',$data['recruiter_email']);
        $this->db->update('recruiters');
        return true;
    }
    
    
   function check_if_email_exist($recruiter_email)
	{
       
		$this->db->where('recruiter_email',$recruiter_email);
		$result=$this->db->get('recruiters');

		if($result->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
    public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('recruiter_id',$id);
		$query = $this->db->get();

		return $query->result();
	}

    public function recruiter_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_data_by_email($email)
	{
		$this->db->from($this->table);
		$this->db->where('recruiter_email',$email);
		$query = $this->db->get();

		return $query->row();
	}

    public function get_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('recruiter_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

     public function getall_recruiters_no()
    {
        $this->db->from($this->table);        
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    
    public function get_multiple_id($ids=array())
    {
            $this->db->from($this->table);
             foreach($ids as $id)
            {    // where $org is the instance of one object of active record
                 $this->db->or_where('recruiter_id',$id);
            }
            $query=$this->db->get();
            return $query->result();
    }
    public function check_mobile_exist($mob)
    { $this->db->where('recruiter_mobile',$mob  );
        $query=$this->db->get($this->table);
        $result=$query->num_rows();
        if($result > 0)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }


    function email_verification($email,$hash)
    {
        $this->db->from($this->table);
        $this->db->where('recruiter_email',$email);
        $query=$this->db->get();
        $res=$query->row();
        if($hash==$res->recruiter_verification)
        {
            $recruiter_email=array('recruiter_email'=>$email);
            $data=array('recruiter_status'=>'1');
            $this->recruiter_update($recruiter_email,$data);
            return true;
        }
        else
        {
           
            return false;
        }
    }
    
  
     

	
}
?>