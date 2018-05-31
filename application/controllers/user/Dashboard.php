<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';


class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        
       if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
       {
           redirect('user/index');
       }
       
     
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
      
            $id=$this->session->userdata('user_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
            $result['recruiters']=$this->Recruiters_model->getall();
            $result['members']=$this->Members_model->getall_members();
            $result['posted']=$this->Jobs_model->getall_jobs();
            $result['applied']=$this->Applied_jobs_model->applied_members();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['admins']=$this->User_model->getall_user($name="Admin");
            $result['staff']=$this->User_model->getall_user($name="Staff");
                  
             $this->load->view('user/header',$result);
             $this->load->view('user/dashboard');
             $this->load->view('user/footer');

       
    
    }
    
  

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    
     
}

?>