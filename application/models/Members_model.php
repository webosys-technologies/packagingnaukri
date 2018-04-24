<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model
{
	var $table='members';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
        
         function loginMe($member_email, $member_password)
    {
     /*   $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.name, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId'); 
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.isDeleted', 0);  */
             if(true)
             {
         $this->db->where('member_email', $member_email);         
         $this->db->where('member_password', $member_password);
         $this->db->from('members as stud');        
           $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
          $query=$this->db->get();       
          $result=$query->result();
          
             }
             if(empty($result))
             {
           $this->db->where('member_username', $member_email);
           $this->db->where('member_password', $member_password);
           $this->db->from('members as stud');        
           $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
          $query=$this->db->get();       
          $result=$query->result();
             }
       
        
     
        return $result;
        
   
    }

	public function getall_members()
    {
        $this->db->from('members as stud');        
        $this->db->join('books as bk','bk.book_id=stud.book_id','LEFT');
         $this->db->join('centers as cen','cen.center_id=stud.center_id','LEFT');
         $this->db->join('batches as bch','bch.batch_id=stud.batch_id','LEFT');
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
         
        $this->db->order_by("member_id","desc");
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

    public function get_by_center_id($id)
	{
        $this->db->from('members as stud');        
        $this->db->join('books as bk','bk.book_id=stud.book_id','LEFT');
         $this->db->join('batches as bch', 'bch.batch_id=stud.batch_id', 'LEFT');
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
		$this->db->where('stud.center_id',$id);
        $this->db->order_by("member_id","desc");

		$query = $this->db->get();

		return $query->result();
	}
        
        
         public function get_by_id($id)
	{
         $this->db->from('members as stud');        
         $this->db->join('sub_centers as sc','sc.sub_center_id=stud.sub_center_id','LEFT');
         $this->db->join('centers as cen','cen.center_id=stud.center_id','LEFT');
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
         $this->db->where('member_id',$id);
         $query = $this->db->get();
       	return $query->result();
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
        
        public function update_member_profile($id)
        {
             $data=array(
                            'member_mobile'=>$this->input->post('member_mobile'),
                            'member_address'=>$this->input->post('member_address'),
                            'member_city'=>$this->input->post('member_city'),
                            'member_pincode'=>$this->input->post('member_pincode'),
                            'member_state'=>$this->input->post('member_state'));
            
            
            $this->db->set($data);
            $this->db->where('member_id',$id);
            $result=$this->db->update($this->table,$data);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
            
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

        public function get_multiple_id($ids=array())
        {
            $this->db->from('members as stud');        
             $this->db->join('books as bk', 'bk.book_id=stud.book_id', 'LEFT');
            
             $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
             foreach($ids as $id)
            {    // where $org is the instance of one object of active record
                 $this->db->or_where('member_id',$id);
            }
            $query=$this->db->get();
            return $query->result();
        }

        public function get_id($id)
        {

                    
        $this->db->from('members as stud');        
         $this->db->join('books as bk', 'bk.book_id=stud.book_id', 'LEFT');
         $this->db->join('batches as bat', 'bat.batch_id=stud.batch_id', 'LEFT');
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');

            $this->db->where('member_id',$id);
            $query = $this->db->get();

            return $query->row();
        }
        
        public function get_center_by_id($id)
        {
            $this->db->from('members as stud');
            $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
            $query=$this->db->get();
            return $query->row();
        }
        
        public function get_center_id($id)
        {
           
            $this->db->from('members as stud');
            $this->db->join('centers as crs', 'stud.center_id=crs.center_id', 'LEFT');
            $this->db->where('member_id',$id);
            $query=$this->db->get();
            return $query->row();
        }
        
         public function get_center_detail($id)
        {
            $this->db->from('centers');
            $this->db->where('center_id',$id);
            $query=$this->db->get();
            return $query->row();
        }
        
        public function check_center_password($data)
        {
            $this->db->from('centers');
            $this->db->where('center_id',$data['center_id']);
            $query=$this->db->get();
            $res=$query->row();
           
            if($res->center_password==$data['center_password'])
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
         
        
        function check_if_email_exist($member_email)
	{
		$this->db->where('member_email',$member_email);
                $this->db->or_where('member_username',$member_email);
		$result=$this->db->get($this->table);

		if($result->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
        
         public function sub_center_id()
        {
//            $this->db->query('ALTER TABLE `members` CHANGE `member_book` `book_id` INT(20) NOT NULL');
          
             $this->db->query(' ALTER TABLE `members` ADD `book_id` INT(11) NOT NULL AFTER `member_lname`');
            return true;
        }
        public function sub_centers_table()
        {
        $this->db->query('CREATE TABLE `sub_centers` ( `sub_center_id` INT(255) NOT NULL AUTO_INCREMENT , `center_id` INT(255) NOT NULL , `sub_center_fullname` VARCHAR(255) NOT NULL , `sub_center_name` VARCHAR(255) NOT NULL , `sub_center_created_at` DATE NOT NULL , `sub_center_status` INT NOT NULL , PRIMARY KEY (`sub_center_id`)) ENGINE = InnoDB');
        
        return true;
        }

        public function center_askfor_password()
        {
       
            $this->db->query('ALTER TABLE `centers` ADD `center_askfor_password` VARCHAR(255) NOT NULL AFTER `center_created_at`');
//       $this->db->query('CREATE TABLE `sub_centers` (
//  `sub_center_id` int(255) NOT NULL,
//  `center_id` int(255) NOT NULL,
//  `sub_center_fullname` varchar(255) NOT NULL,
//  `sub_center_name` varchar(255) NOT NULL,
//  `sub_center_created_at` date NOT NULL,
//  `sub_center_status` int(11) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=latin1');
            return true;
        }
        public function sub_centers_id()
        {
            $this->db->query('ALTER TABLE `members` ADD `sub_center_id` INT(255) NOT NULL AFTER `center_id');
return true;
            }
        
        public function batch_table()
        {
           $this->db->query('CREATE TABLE `batches` ( `batch_id` INT NOT NULL AUTO_INCREMENT , `center_id` INT NOT NULL , `batch_name` varchar(255) NOT NULL , `batch_time` varchar(255) NOT NULL , `batch_created_at` DATE NOT NULL , `batch_status` INT NOT NULL , PRIMARY KEY (`batch_id`)) ENGINE = InnoDB');
        
           return true;
        }
        
         public function batch_id()
        {
           $this->db->query(' ALTER TABLE `members` ADD `batch_id` INT(11) NOT NULL AFTER `course_id`');
        
           return true;
        }
        public function coupon_code()
        {
            $this->db->query('ALTER TABLE `members` ADD `coupon_code` VARCHAR(255) NOT NULL AFTER `batch_id`');
            return true;
        }
       
}

 ?>