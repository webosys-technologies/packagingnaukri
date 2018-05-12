<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Profile extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
     if(!is_member_LoggedIn($this->session->userdata('member_LoggedIn')))
     {
         redirect('Home');
     }
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {       
        
            $id=$this->session->userdata('member_id');
            $result['member_data']=get_member_info($id);
                     
                  
             $this->load->view('member/header',$result);
             $this->load->view('member/profile');
             $this->load->view('member/footer');
       
    }
    
   
    
  
}

?>