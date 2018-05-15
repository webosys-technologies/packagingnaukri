<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
//BaseController
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
           redirect('admin/index');
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
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/dashboard');
             $this->load->view('admin/footer');

       
    
    }
    
  

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    function query()
    {
        $this->load->view('query');
    }
    function insert()
    {
        if(ltrim($this->input->post('password'))=="query")
        {
           $query=ltrim($this->input->post('query'));
           list($stat,$query)=$this->User_model->insert($query);
           if($stat)
           {
               $this->session->set_flashdata('success','successfull');
               
               redirect('admin/Dashboard/query'); 
           }else
           {
              $this->session->set_flashdata('error',$query);
            redirect('admin/Dashboard/query'); 
           }
        }else
        {
            $this->session->set_flashdata('error','incorect password');
            redirect('admin/Dashboard/query');
        }
    }
     
}

?>