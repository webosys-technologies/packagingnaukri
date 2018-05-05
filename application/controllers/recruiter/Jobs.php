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
     if(!is_recruiter_LoggedIn($this->session->userdata('recruiter_LoggedIn')))
     {
         redirect('recruiter/index/login');
     }
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {       
        
            $id=$this->session->userdata('recruiter_id');
            $result['data']=$this->Recruiters_model->get_by_id($id);
            $result['jobs']=$this->Jobs_model->get_job_by_id($id);
           
                  
             $this->load->view('recruiter/header',$result);
             $this->load->view('recruiter/view_jobs');
             $this->load->view('recruiter/footer',$result);
       
    }
    
   
    
    public function update_job()
    {
//        echo $id;
        $form=$this->input->post();
       
        $data=array('job_title'=>$form['jobtitle'],
//                    ''=>$form['company'],
                    'job_education'=>$form['qualification'],
                    'job_experience'=>$form['experience'],
                    'job_description'=>$form['jobdesc'],
                    'job_city'=>$form['joblocation'],
                    'job_id'=>$form['id'],
                    
            
        );
         $result=$this->Jobs_model->update_job($data,$form['id']);
         if($result>0)
         {
       $this->session->set_flashdata('success','Data Updated Successfully');
       redirect('admin/Jobs/view_jobs');
         }
    }
    
  
}

?>