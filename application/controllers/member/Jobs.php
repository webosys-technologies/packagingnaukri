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
             $sys=$this->session->userdata('member_source');          
            $result['system']=$this->System_model->get_system_info($sys);
                  
             $this->load->view('member/header',$result);
             $this->load->view('member/jobs');
             $this->load->view('member/footer',$result);
       
    }
    function saved_jobs()
    {
        $id=$this->session->userdata('member_id');
        $result['member_data']=  get_member_info($id);
        $result['saved']=$this->Saved_jobs_model->get_jobs_by_member($id);
        
             $sys=$this->session->userdata('member_source');          
            $result['system']=$this->System_model->get_system_info($sys);
        
        $this->load->view('member/header',$result);
        $this->load->view('member/saved_jobs',$result);
        $this->load->view('member/footer',$result);    

    }
    function applied_jobs()
    {
        
         $id=$this->session->userdata('member_id');
         $source=$this->session->userdata('member_source');
        $result['member_data']=  get_member_info($id);
        
        $result['jobs']=$this->Applied_jobs_model->get_job_by_member($id);
       
             $sys=$this->session->userdata('member_source');          
            $result['system']=$this->System_model->get_system_info($sys);
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
    { $this->load->library('encryption');
         $id=$this->session->userdata('member_id');
           $data['member_data']=  get_member_info($id);
            
             $sys=$this->session->userdata('member_source'); 
             echo "hello".$sys;
            $data['system']=$this->System_model->get_system_info($sys);
                                
        $form=$this->input->post();
        
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
        $form['source']=$data['system']->source;
        $result=$this->Jobs_model->search_job($form);
        if($result){
            $result['jobs']=$result;
        }else{
            $result['error']="error";
        }
        $this->load->view('member/header',$data);
        $this->load->view('member/jobs',$result);
        $this->load->view('member/footer',$data);      
        }else{
            redirect('member/Jobs');
        }   
    }
    
    public function get_job_info($id)
    {
        $id=$this->session->userdata('member_id');
            $result['member_data']=  get_member_info($id);
            
             $sys=$this->session->userdata('member_source');          
            $result['system']=$this->System_model->get_system_info($sys);
             $this->load->view('member/header',$result);
             $this->load->view('member/job_info');
             $this->load->view('member/footer',$result);
    }
    
    function job_info($id)
    {
        
        $result=$this->Jobs_model->job_info($id);
       
        echo json_encode($result);
    }
    
    function save_job($id)
    {
        $mem_id=$this->session->userdata('member_id');
        $rec_data=$this->Jobs_model->job_by_id($id);
       
        $data=array('job_id'=>$id,
                    'recruiter_id'=>$rec_data->recruiter_id,
                    'member_id'=>$mem_id,
                    'company_id'=>$rec_data->company_id,
                    'saved_at'=>date('Y-m-d'));
        
        $this->Saved_jobs_model->save_job($data);
        echo json_encode(array('status'=>'success'));
    }
    
    function unsave_job($id)
    {
        $where=array('job_id'=>$id,
                     'member_id'=>$this->session->userdata('member_id'));
        $this->Saved_jobs_model->unsave_job($where);
        echo json_encode(array('status'=>'success'));
    }
    
    function apply_job($id)
    {
        $rec_data=$this->Jobs_model->job_by_id($id);
        $data=array('job_id'=>$id,
                    'member_id'=>$this->session->userdata('member_id'),
                    'recruiter_id'=>$rec_data->recruiter_id,
                    'company_id'=>$rec_data->company_id,
                    'apply_at'=>date('Y-m-d'),
                    'apply_status'=>'1');
         $this->Applied_jobs_model->apply_job($data);
        echo json_encode(array('status'=>'success'));
        
    }
    
    function remove_job($id)
    {
         $where=array('job_id'=>$id,
                     'member_id'=>$this->session->userdata('member_id'));
        $this->Applied_jobs_model->remove_job($where);
        echo json_encode(array('status'=>'success'));
    }
   
   function query_test()
   {
       $this->Jobs_model->test();
   }
    
  
}

?>