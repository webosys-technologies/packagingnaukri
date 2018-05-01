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
class Jobs extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        
       $this->load->helper(array('form','url'));
       $this->load->database();
       $this->load->library(array('session', 'form_validation', 'email'));
         $this->load->model('User_model');     
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        
         $user_LoggedIn = $this->session->userdata('user_LoggedIn');
        
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
            $id=$this->session->userdata('user_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/add_jobs');
             $this->load->view('admin/footer');
        }else
        {
            redirect("admin/Index");
        }
       
    
    }
    
    public function view_jobs()
    {
         
         $user_LoggedIn = $this->session->userdata('user_LoggedIn');
        
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
            $id=$this->session->userdata('user_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/view_jobs');
             $this->load->view('admin/footer');
        }else
        {
            redirect("admin/Index");
        }
    }
    
  
}

?>