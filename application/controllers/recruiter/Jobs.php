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
            $data['companies']=$this->Companies_model->companies_by_recruiter($id);
            $data['jobs']=$this->Jobs_model->get_job_by_recruiterid($id);
            $sys=$this->session->userdata('recruiter_source');
            $result['system']=$this->System_model->get_system_info($sys);
                  
             $this->load->view('recruiter/header',$result);
             $this->load->view('recruiter/view_jobs',$data);
             $this->load->view('recruiter/footer',$result);
       
    }

    public function job_add()
    {
        $form=$this->input->post();
       if(!empty($form['jobtitle']))
        {
       if($form['company']!='-- Select Company --')
       { 
           if(!empty($form['qualification']))
        {
               if(!empty($form['experience']))
        {
                   if(!empty($form['joblocation']))
        {  
        $id=$this->Companies_model->get_recruiter_by_company($form['company']);
        $salary=$form['lacsalary'].".".$form['thsalary'];
        $data=array(
                   'recruiter_id'=>$id,
                   'company_id'=>$form['company'],
                   'job_title'=>$form['jobtitle'],
                   'job_type'=>$form['jobtype'],
                   'job_education'=>$form['qualification'],
                   'job_description'=>$form['jobdesc'],
                   'job_city'=>$form['joblocation'],
                   'job_experience'=>$form['experience'],
                   'job_salary'=>$salary,
                   'job_created_at'=>date('Y-m-d'),
                   'job_skill_name'=>$form['skill'],
                   'job_status'=>$form['status']
                   );
        
          $res=$this->Jobs_model->job_add($data);
         
          
               $this->session->set_flashdata('success','job added successfully');
              echo json_encode(array('success'=>'job added successfully'));
       }else{
           echo json_encode(array('loc_err'=>'Please Enter job Location'));           
        }}else{
           echo json_encode(array('exp_err'=>'Please Enter Experience'));
        }}else{
            echo json_encode(array('qua_err'=>'Please Enter Qualification'));
       }}else{
           echo json_encode(array('comp_err'=>'Please Select Company Name'));
       }}else{
            echo json_encode(array('job_err'=>'Please Enter Job Title'));
        }
    }
    
   
    
    public function job_update()
    {
//        echo $id;
         $form=$this->input->post();
        $job_id=$form['job_id'];       
        $id=$this->Companies_model->get_recruiter_by_company($form['company']);
        if(!empty($form['jobtitle']))
        {
       if($form['company']!='-- Select Company --')
       { 
           if(!empty($form['qualification']))
        {
               if(!empty($form['experience']))
        {
                   if(!empty($form['joblocation']))
        { 
                       $salary=$form['lacsalary'].".".$form['thsalary'];
        $data=array(
                   'recruiter_id'=>$id,
                   'company_id'=>$form['company'],
                   'job_title'=>$form['jobtitle'],
                   'job_type'=>$form['jobtype'],
                   'job_education'=>$form['qualification'],
                   'job_description'=>$form['jobdesc'],
                   'job_city'=>$form['joblocation'],
                   'job_experience'=>$form['experience'],
                   'job_salary'=>$salary,
                   'job_skill_name'=>$form['skill'],
                   'job_status'=>$form['status']
        );
        
         $result=$this->Jobs_model->update_job($data,$job_id);
         
                 
       $this->session->set_flashdata('success','Data Updated Successfully');
       echo json_encode(array('success'=>'Data Updated Successfully'));
     }else{
           echo json_encode(array('loc_err'=>'Please Enter job Location'));           
        }}else{
           echo json_encode(array('exp_err'=>'Please Enter Experience'));
        }}else{
            echo json_encode(array('qua_err'=>'Please Enter Qualification'));
       }}else{
           echo json_encode(array('comp_err'=>'Please Select Company Name'));
       }}else{
            echo json_encode(array('job_err'=>'Please Enter Job Title'));
        }    
    }

    public function ajax_edit($id)
    {
        $res=$this->Jobs_model->job_by_id($id);
        if($res)
        {
            echo json_encode($res);
        }
    }
    
    public function job_delete($id)
    {
        $res=$this->Jobs_model->delete_job($id);
        if($res)
        {
            $this->session->set_flashdata('success','job deleted successfully');
            echo json_encode(array('success'=>'job deleted successfully'));
        }
    }
    
    public function applicants($id)
    {
         if($id)
        {       
               $result['members']=$this->Applied_jobs_model->members_by_jobid($id);

        if($result)
        {
            $id=$this->session->userdata('recruiter_id');
            $result['data']=  get_recruiter_info($id);
            
        $this->load->view('recruiter/header',$result);
        $this->load->view('recruiter/applicants',$result);
        $this->load->view('recruiter/footer',$result);
        }else{
             redirect('recruiter/Jobs');
        }
        }else{
            redirect('recruiter/Jobs');
        }
        
    }
    
    public function member_info($id)
    {
        $result=$this->Members_model->member_info($id);
        echo json_encode($result);
        
    }
    
    function job_info($id)
    {
        
        $result=$this->Jobs_model->job_info($id);       
        echo json_encode($result);
    }
    
  
}

?>