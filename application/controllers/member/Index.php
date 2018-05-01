
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	function index()
	{
//            $this->load->view('member/ask_center_password');
		$this->login();
	}
   
   function login()
    {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
             redirect('member/Dashboard');
        }
        else
        {
            $this->load->view('member/login');
        }
    }
    
    public function ask_center_password()
    {
        $this->load->view('member/ask_center_password');
    }
          
    
    public function loginMe()
    {
    
            $member_email = $this->input->post('member_email');
            $member_password = $this->input->post('member_password');
            $where=array('member_email'=>$member_email,
                         'member_password'=>$member_password);
            
      list($result,$valid_email)=$this->Members_model->loginMe($where);
              
       if($valid_email>0)
       {       
                      
            if(isset($result) && $result->member_status==1)
            {          
                    $sessionArray = array(                        
                         'member_id' => $result->member_id,
                    'member_fname' => $result->member_fname,
                    'member_lname' => $result->member_lname,
                    'member_email' => $result->member_email,
                     'member_mobile' => $result->member_mobile,
                    'member_LoggedIn' => true
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    echo json_encode(array('status'=> 'success'));
       
               
              }
           
            else
            {   
                             
                if($result > 0 && $result->member_status==0)
                {
                   
                 echo json_encode(array('account_error'=> 'Account is not activeted yet.'));

                }
                else
                {
                     echo json_encode(array('val_error'=> 'Email or Password Mismatch.'));
                }                
                 
            } 
            }
            else
            {
                                    echo json_encode(array('email_error'=> 'This Email Id is not registered with us'));

                
            }
        
                    
        }
    
    
    
     public function signout()
    {
        
        $this->session->sess_destroy();
//   /*     redirect('controller_class/login');
//        $this->session->unset_userdata('member_LoggedIn'); 
           redirect('Home');  
    }
    
    public function check_center_password()
    {
        $stud_id=$this->input->post('member_id');
        $pass=$this->input->post('center_password');
        $res=$this->Students_model->get_center_id($stud_id);
        
        $data=array('center_id'=>$res->center_id,
                    'center_password'=>$pass);
        
        $result=$this->Students_model->check_center_password($data);
       
        if($result)
        {
            $getdata = $this->Students_model->get_by_id($stud_id);
            foreach($getdata as $res)  
          {   
            $status=array('member_status'=>$res->member_status,
                          'member_profile_pic'=>$res->member_profile_pic,
                          'center_id'=>$res->center_id,
                          'member_id'=>$res->member_id,
                           'member_course_end_date'=>$res->member_course_end_date,
                            'member_course_start_date'=>$res->member_course_start_date,
                            'course_duration'=>$res->course_duration,
                          );
            
           }
            
            
          if($status['member_course_start_date']=='0000-00-00'){
                    $dur=$status['course_duration'];
                    $date=date('Y-m-d');
                    $data=array('member_course_start_date'=>$date,
                   'member_course_end_date' =>date('Y-m-d', strtotime("+".$dur."months", strtotime($date))));
                    $this->Students_model->member_update(array('member_id'=>$status['member_id']),$data);
                    }
                $stud_data=$this->Students_model->get_member_by_id($stud_id);
                    if($stud_data->member_course_end_date < date('Y-m-d'))
                    {
                        $update_status=array('member_status'=>'2' );
                        $this->Students_model->member_update(array('member_id'=>$status['member_id']),$update_status);
                        $this->session->set_flashdata('success','course Completed...!');
      
         redirect('member/index/login');
                    }
               
                foreach ($getdata as $res)
                {
                    $sessionArray = array(
                        
                     'member_id' => $res->member_id,
                    'member_fname' => $res->member_fname,
                    'member_lname' => $res->member_lname,
                    'member_email' => $res->member_email,
                    'member_course_id' => $res->course_id,
                    'center_id'=>$res->center_id,
                    'member_LoggedIn' => true
                                    );                                  
                   
                  
               }  
                $this->session->set_userdata($sessionArray);                      
                    redirect('member/Dashboard');
               
        }
        else
        {
            $this->session->set_flashdata('error','Center Administrative password does not match');
            $stud_data['member_id']=$stud_id;
            $this->load->view('member/ask_center_password',$stud_data);
        }
    }
        
    
        
        
        function check_if_email_exist($requested_email)
	{
		$this->load->model('Students_model');
		$email_available=$this->Centers_model->check_if_email_exist($requested_email);

		if($email_available){
//                    $this->form_validation->set_message('check_if_email_exist', 'You must select a business');
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
        
        function check_member_email($requested_email)
	{
		$this->load->model('Students_model');
		$email_available=$this->Students_model->check_if_email_exist($requested_email);

		if($email_available){
                    return FALSE;
                    
		}
		else{
//			$this->form_validation->set_message('check_if_email_exist', 'You must enter a email');
			return TRUE;
		}
	}
        
         
        
        public function update_profile()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
        	$id=$this->session->userdata('member_id');
                
                
                $this->form_validation->set_rules('member_mobile','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('member_address','Address','trim|required');
		$this->form_validation->set_rules('member_city','City','trim|required');
		$this->form_validation->set_rules('member_pincode','Pincode','trim|required|numeric');
		$this->form_validation->set_rules('member_state','State','trim|required');   
                
		//validate form input
		if ($this->form_validation->run() == false)
        {		
			
                   redirect('member/Dashboard');                    
        }
        else
        {      
               
               $result=$this->Students_model->update_member_profile($id);
               if($result)
               {
                   redirect('member/Profile');
               }
               else
               {
                   
               }
        
               
                
        }
        }
        else
        {
            $this->load->view('member/login');
            

        }
            
                      
        }
        
        
        
        
        public function change_password()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
        	$this->load->view('member/change_password');
                
        	
        }
        else
        {
            $this->load->view('member/login');
            

        }
            
                      
        }
        
        
         public function reset_password()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
            
        {    
                $id=$this->session->userdata('member_id');
            
                $this->form_validation->set_rules('member_old_password','old_Password','trim|required|min_length[8]');
        	$this->form_validation->set_rules('member_new_password','new_Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('member_confirm_password','Confirm Password','trim|required|matches[member_new_password]');
          
                if($this->form_validation->run() == FALSE)
        {
                    
            $this->session->set_flashdata('error', 'New password and confirm password does not match ....!');
            redirect('member/Dashboard');
        }
        else
        {   
            $old_password=$this->input->post('member_old_password');
            $new_password=$this->input->post('member_new_password');
            $result['data']=$this->Students_model->get_by_id($id);
            
            if($result['data'])
            {
                 
                foreach($result['data'] as $res)
                {
                    $member_password=$res->member_password;
                }
            
            
            if($member_password==$old_password)
            {
                
                $data=array(
                    'member_id'=>$id,
                    'member_password'=>$new_password
                );
               $this->Students_model->reset_password($data);
            
              $this->session->set_flashdata('success', 'Password Changed Successfully....!');
                 redirect('member/Dashboard');
               
               
               
              
             }
             else
             {
               
//                 $message="Old Password does not match....!";
                 $this->session->set_flashdata('error', 'Old Password is incorrect....!');
                 redirect('member/Dashboard');
             }
        }
        
           
        }
        
        }
        
        else
        {
           
             redirect('member/Dashboard');          

        }
            
                      
        }
		
    
}



