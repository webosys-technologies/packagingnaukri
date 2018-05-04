<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
              
                
        }
	
	function index()
	{
                
		$this->load->view('admin/login');
	}
        
       
        
        function login()
    {
        
        if(is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
        {
           redirect('admin/Dashboard');
        }
        else
        {
             $this->load->view('admin/login');
            
        }
    }
    
    
    
    
    public function loginMe()
    {
        
        $this->load->library('form_validation');
        
      //  $this->form_validation->set_rules('email', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('user_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else  
        {
            $user_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            $where=array('user_email'=>$user_email,
                         'user_password'=>$user_password);
            list($result,$valid_email)=$this->User_model->check_user($where);
         
        
       if($valid_email)  //valid email >0
       {          
            
            if($result > 0 && $result->user_status==1)
            {
               
                    $sessionArray = array(                        
                         'user_id' => $result->user_id,
                    'user_fname' => $result->user_fname,
                    'user_lname' => $result->user_lname,
                    'user_email' => $result->user_email,
                    'user_LoggedIn' => true
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    redirect('admin/Dashboard');
                  
               
              }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                if($result > 0 && $result->user_status==0)
                {
                 $this->session->set_flashdata('error', 'This email is not active');
                }
                
                redirect('admin/Index/Login');  
            }  
        }
        else
        {
             $this->session->set_flashdata('error', 'This email id is not registered with us.');
                 redirect('admin/Index/Login'); 
        }
        }
    }
    
    
     public function signout()
    {        
       $this->session->sess_destroy();
       //  $this->session->unset_userdata('user_LoggedIn'); 
        redirect('admin/Index/login');  
    }

    
    public function test()
    {
        $this->Cities_model->test();
    }

   
    
        
}