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
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Members_model');
      
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
       $member_LoggedIn= $this->session->userdata('member_LoggedIn');
        $member_LoggedIn;
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
             $id=$this->session->userdata('member_id');            
                      
             $result['data']=$this->Members_model->get_member_by_id($id);
//             $this->load->view('member/header',$result);
//             $this->load->view('member/dashboard');
//             $this->load->view('member/footer');
             
                    echo "success";
        }
        else
        {
            redirect('member/index/login');
        }
    }
    
    
    
    
}

?>