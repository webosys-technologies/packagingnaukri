<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Applicants extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
                if(!is_recruiter_LoggedIn($this->session->userdata('recruiter_LoggedIn')))
                {
                    redirect('recruiter/index');
                }

          
	}

	public function index()
    {
                 
            $id=$this->session->userdata('recruiter_id');
            $result['data']=get_recruiter_info($id);
            $result['members']=$this->Applied_jobs_model->get_member_job($id);
           
                  
            $this->load->view('recruiter/header',$result);
            $this->load->view('recruiter/applicants',$result);
            $this->load->view('recruiter/footer');

        
    
    }
    
  
       
        
        
	
        
}