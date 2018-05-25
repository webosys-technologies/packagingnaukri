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
     if(!is_recruiter_LoggedIn($this->session->userdata('member_LoggedIn')))
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
            $result['member_data']=  get_member_info($id);
                     
                  
             $this->load->view('member/header',$result);
             $this->load->view('member/jobs');
             $this->load->view('member/footer',$result);
       
    }
    function saved_jobs()
    {
        $id=$this->session->userdata('member_id');
        $result['member_data']=  get_member_info($id);
        
        
        $this->load->view('member/header',$result);
        $this->load->view('member/saved_jobs',$result);
        $this->load->view('member/footer',$result);    

    }
    function applied_jobs()
    {
        
         $id=$this->session->userdata('member_id');
        $result['member_data']=  get_member_info($id);
        
        $result['jobs']=$this->Applied_jobs_model->get_job_by_member($id);
       
         $this->load->view('member/header',$result);
        $this->load->view('member/applied_jobs',$result);
        $this->load->view('member/footer',$result);    
    }
    
    function search_title($title)
    {
      
              
        $result=$this->Members_model->search_query();
        
        echo json_encode($result);
    }
    
    function search_jobs()
    {
         $id=$this->session->userdata('member_id');
            $result['member_data']=  get_member_info($id);
                    
        $form=$this->input->post();
        echo $form['title'];
        if($form)
        {
        $title=$form['title'];
        $exp=$form['exp'];
        $salary=$form['salary'];
        $location=$form['location'];
        if(!empty($form['full']))
        {
        $full=$form['full'];
        }
         if(!empty($form['part']))
        {
        $part=$form['part'];
        }
         if(!empty($form['intern']))
        {
        $intern=$form['intern'];
        }
         if(!empty($form['temp']))
        {
        $part=$form['temp'];
        }
        
        $this->Jobs_model->search_job($form);
        $this->load->view('member/header',$result);
        $this->load->view('member/jobs',$result);
        $this->load->view('member/footer',$result);      
        }else{
            redirect('member/Jobs');
        }   
    }
    
    public function get_job_info($id)
    {
        $id=$this->session->userdata('member_id');
            $result['member_data']=  get_member_info($id);
             $this->load->view('member/header',$result);
             $this->load->view('member/job_info');
             $this->load->view('member/footer',$result);
    }
    
   
   
    
  
}

?>