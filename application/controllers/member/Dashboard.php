<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
     //$member_LoggedIn = $this->session->get_userdata('member_LoggedIn');
        
    public function __construct()
    {
        parent::__construct();
        if(!is_member_LoggedIn($this->session->userdata('member_id')))
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
//             $this->load->view('member/member_header',$result);
//             $this->load->view('member/dashboard');
               $this->load->view('member/jobs');
             $this->load->view('member/footer');
//             $this->load->view('member/member_footer');

           
    }
    
    
    
    
}

?>