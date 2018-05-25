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
    
    function login_with_otp($where)
    {
        $this->db->from($this->table);
        $this->db->where($where);
        $query=$this->db->get();
    
        $res=$query->row();
        
        if($res)
        {
            return $res;
        }else{
            return false;
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
         $emp=$this->check_id_in_employments($id);
         $edu=$this->check_id_in_education($id);
         $this->db->from('members as mem');  
         if($emp==true){
         $this->db->join('employments as emp','mem.member_id=emp.member_id','LEFT');         
         }
         if($edu==true){
         $this->db->join('educations as edu','edu.member_id=mem.member_id','LEFT');
         }
         $this->db->where('mem.member_id',$id);
         $query = $this->db->get();
       	return $query->row();
	} 
        
        public function member_info($id)
        {
         $emp=$this->check_id_in_employments($id);
         $edu=$this->check_id_in_education($id);
         $this->db->from('members as mem');  
         if($emp==true){
         $this->db->join('employments as emp','mem.member_id=emp.member_id','LEFT');         
         }
         if($edu==true){
         $this->db->join('educations as edu','edu.member_id=mem.member_id','LEFT');
         }
         $this->db->where('mem.member_id',$id);
         $query = $this->db->get();
       	return $query->row();
        }
        
        public function check_id_in_employments($id)
        {
           
            $this->db->where('member_id',$id);
            $query=$this->db->get('employments');
           if($query->num_rows()>0)
            {
                return true;
            }else{
                return false;
            }
            
        }
        public function check_id_in_education($id)
        {
            $this->db->where('member_id',$id);
            $query=$this->db->get('educations');
           if($query->num_rows()>0)
            {
                return true;
            }else{
                return false;
            }
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
        
         function check_mobile_exist($member_mobile)
        {
        $this->db->where('member_mobile',$member_mobile);
        $query=$this->db->get($this->table);
        $result=$query->num_rows();
        if($result > 0)
        {
            return FALSE;
        }else{
            return TRUE;
        }
        die();
        }
        
        function search_query()
        {
//            SELECT Customers.CustomerName, Orders.OrderID
//INTO CustomersOrderBackup2017
//FROM Customers
//LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID;
//            $result=$this->db->query('SELECT members.member_fname, members.member_mobile
//                                      FROM members ');
            $this->db->like(array('member_fname'=>'a'));
            $this->db->select('member_fname');
            $this->db->from($this->table);
            $result=$this->db->get();
           $result->result();
            $this->db->or_like(array('member_lname'=>'a'));
            $this->db->select('member_lname');
            $this->db->from($this->table);
            $result1=$this->db->get();
            $result1->result();
          
             $this->db->or_like(array('member_email'=>'a'));
            $this->db->select('member_email');
            $this->db->from($this->table);
            $result2=$this->db->get();
            $result2->result();
           
           return array_merge((array) $result1->result(), (array) $result->result(),(array) $result2->result());
            
          
            
        }
                 
       public function test()
       {
        $query=$this->db->query("ALTER TABLE `members` CHANGE `meber_username` `member_username` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL");

        return $query;
       }
       
}

 ?>