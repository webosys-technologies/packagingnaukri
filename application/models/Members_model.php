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
        if(is_numeric($where['member_email']))
        {
        $this->db->where('member_mobile',$where['member_email']);
        $this->db->where('member_password',$where['member_password']);
        }else{
            $this->db->where($where);
        }
        $query=$this->db->get();
    
        $res=$query->row();
        
         if(is_numeric($where['member_email']))
        {
          $this->db->where('member_mobile',$where['member_email']);
              $query1=$this->db->get($this->table);    
         }else{
              $this->db->where('member_email',$where['member_email']);
              $query1=$this->db->get($this->table);
         }
       
        $valid=$query1->num_rows();
        if($res)
        {
            return array($res,$valid);
        }else{
            
            return array(false,$valid);
        }
   
    }
    
    function search_members($data)
    {
       if(!empty($data['salary_from']) && !empty($data['salary_to']) && $data['salary_from']!="Salary From" && $data['salary_to']!="Salary To" && !empty($data['experience_from']) && !empty($data['experience_to']) && $data['experience_from']!="Experience From" && $data['experience_to']!="Experience To")
       {
//            $query=$this->db->query('SELECT * FROM members WHERE member_experience BETWEEN '.$data['experience_from'].' AND '.$data['experience_to'].' AND (member_anual_salary BETWEEN '.$data['salary_from'].' AND '.$data['salary_to']).')';               
            $query=$this->db->query('SELECT * FROM members WHERE member_experience >= '.$data['experience_from'].' AND member_experience <= '.$data['experience_to'].' AND (member_anual_salary >= '.$data['salary_from'].' AND member_anual_salary <= '.$data['salary_to'].')');
            return $query->result();
       }
       else  
       if(!empty($data['salary_from']) && !empty($data['salary_to']) && $data['salary_from']!="Salary From" && $data['salary_to']!="Salary To")
       {
      $query=$this->db->query('SELECT * FROM members WHERE member_anual_salary BETWEEN '.$data['salary_from'].' AND '.$data['salary_to']);               
      return $query->result();
       }else if(!empty($data['experience_from']) && !empty($data['experience_to']) && $data['experience_from']!="Experience From" && $data['experience_to']!="Experience To")
           {
            $query=$this->db->query('SELECT * FROM members WHERE member_experience BETWEEN '.$data['experience_from'].' AND '.$data['experience_to']);               
              return $query->result();
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
    
    function check_in_email_or_mobile($username)
    {
        $this->db->from($this->table);
        
     if(is_numeric($username)) 
     {
         $this->db->where('member_mobile',$username);
     }else{
         $this->db->where('member_email',$username);
     }
     
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
        $source=$this->input->post('source');
        if(empty($source))
        {
        $source=$this->System_model->source_name();
        }    
        
            

        $data=array(
            'member_fname'          =>$this->input->post('fname'),
            'member_lname'          => $this->input->post('lname'),
            'member_email'          => $this->input->post('email'),
            'member_mobile'         => $this->input->post('mobile'),
            'member_anual_salary'   =>$this->input->post('min_salary').".".$this->input->post('max_salary'),
            'member_experience'     =>$this->input->post('min_exp').".".$this->input->post('max_exp'),
            'member_password'       => $this->input->post('password'),
            'member_country'        => $this->input->post('country'),
            'member_city'           => $this->input->post('city'),
            'member_state'          => $this->input->post('state'),
            'member_created_at'     => date("Y-m-d "),
            'member_status'         => '1',
            'member_source'           =>ucfirst($source),
            );
        
        if (!empty($this->input->post('pincode'))) {
            $data['member_pincode']=$this->input->post('pincode');
        }

        $this->db->insert('members',$data);
        $insert=$this->db->insert_id();
                 //return $insert;
                return array($insert,$data);
    }

    public function getall_members()
    {
        $this->db->from($this->table);        
        // $this->db->where('member_status','1');   
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
        $this->db->from('members as mem');
        $this->db->join('states as st','st.stateID=mem.member_state','Left');
        $this->db->where('member_id',$id);
        $query=$this->db->get();
        return $query->row();
    }
    public function member_info_by_mobile($mobile)
    {
        $this->db->where('member_mobile',$mobile);
        $query=$this->db->get($this->table);
        return $query->row();
    }
    
     public function member_info_by_email($email)
    {
        $this->db->where('member_email',$email);
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
         $this->db->join('states as st','st.stateID=mem.member_state','Left');
          $this->db->join('countries as ct','ct.countryID=mem.member_country','Left');
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
        // die();
        }
        
        function search_query($title)
        {
//            SELECT Customers.CustomerName, Orders.OrderID
//INTO CustomersOrderBackup2017
//FROM Customers
//LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID;
//            $result=$this->db->query('SELECT members.member_fname, members.member_mobile
//                                      FROM members ');
            $this->db->like(array('job_title'=>$title));
            $this->db->select('job_title');
            $this->db->from('jobs');
            $result=$this->db->get();
           $result->result();
            $this->db->or_like(array('company_name'=>$title));
            $this->db->select('company_name');
            $this->db->from('companies');
            $result1=$this->db->get();
            $result1->result();
          
             $this->db->or_like(array('job_designation'=>$title));
            $this->db->select('job_designation');
            $this->db->from('jobs');
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