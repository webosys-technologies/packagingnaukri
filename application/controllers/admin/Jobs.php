<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jobs extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
     if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')))
     {
         redirect('admin/index');
     }
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {       
            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            $result['jobs']=$this->Jobs_model->getall_jobs();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['system']=$this->System_model->get_info();
           
             $this->load->view('admin/header',$result);
             $this->load->view('admin/view_jobs',$result);
             $this->load->view('admin/footer');      
       
    }
    
    public function view_jobs()
    {        
            
    }
    
    public function job_add()
    {
        $form=$this->input->post();
        
        $id=$this->Companies_model->get_recruiter_by_company($form['company']);
        $data=array(
                   'recruiter_id'=>$id,
                   'company_id'=>$form['company'],
                   'job_title'=>$form['jobtitle'],
                   'job_type'=>$form['jobtype'],
                   'job_education'=>$form['qualification'],
                   'job_description'=>$form['jobdesc'],
                   'job_city'=>$form['joblocation'],
                   'job_experience'=>$form['experience'],
                   'job_salary'=>$form['jobsalary'],
                   'job_created_at'=>date('Y-m-d'),
                   'job_status'=>'1'
                   );
        
          $res=$this->Jobs_model->job_add($data);
          if($res)
          {
               $this->session->set_flashdata('success','job added successfully');
              echo json_encode(array('success'=>'job added successfully'));
          }
    }
    
    public function job_update()
    {
//        echo $id;
         $form=$this->input->post();
        $job_id=$form['job_id'];       
        $id=$this->Companies_model->get_recruiter_by_company($form['company']);
       
        $data=array(
                   'recruiter_id'=>$id,
                   'company_id'=>$form['company'],
                   'job_title'=>$form['jobtitle'],
                   'job_type'=>$form['jobtype'],
                   'job_education'=>$form['qualification'],
                   'job_description'=>$form['jobdesc'],
                   'job_city'=>$form['joblocation'],
                   'job_experience'=>$form['experience'],
                   'job_salary'=>$form['jobsalary'],
                   'job_status'=>'1'
        );
        
         $result=$this->Jobs_model->update_job($data,$job_id);
         if($result)
         {
       $this->session->set_flashdata('success','Data Updated Successfully');
       echo json_encode(array('status'=>'Data Updated Successfully'));
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
    
    function job_info($id)
    {
        
        $result=$this->Jobs_model->job_info($id);
       
        echo json_encode($result);
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
    
    
    public function applied_members($id)
    {
         if($id)
        {       
               $result['members']=$this->Applied_jobs_model->members_by_jobid($id);

        if($result)
        {
            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            
        $this->load->view('admin/header',$result);
        $this->load->view('admin/applied_members',$result);
        $this->load->view('admin/footer',$result);
        }else{
             redirect('admin/Jobs');
        }
        }else{
            redirect('admin/Jobs');
        }
        
    }
    
    public function member_info($id)
    {
        $result=$this->Members_model->member_info($id);
        echo json_encode($result);
        
    }
    
  
}

?>