<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jobs extends CI_Controller
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
        
//            $id=$this->session->userdata('user_id');
//            $result['user_data']=$this->User_model->get_user_by_id($id);
//                     
//                  
//             $this->load->view('admin/header',$result);
//             $this->load->view('admin/add_jobs');
//             $this->load->view('admin/footer');
       
    }
    
    public function view_jobs()
    {        
            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $result['jobs']=$this->Jobs_model->getall_jobs();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['system']=$this->System_model->get_info();
            
             $this->load->view('user/header',$result);
             $this->load->view('user/view_jobs',$result);
             $this->load->view('user/footer');       
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
                   'job_status'=>$form['status'],
                   'job_skill_name'=>$form['skill'],
                   'source'  =>$form['source'],

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
    
    public function applied_members($id)
    {
         if($id)
        {       
               $result['members']=$this->Applied_jobs_model->members_by_jobid($id);

        if($result)
        {
            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            
        $this->load->view('user/header',$result);
        $this->load->view('user/applied_members',$result);
        $this->load->view('user/footer',$result);
        }else{
             redirect('user/Jobs');
        }
        }else{
            redirect('user/Jobs');
        }
        
    }
     public function member_info($id)
    {
        $result=$this->Members_model->member_info($id);
        echo json_encode($result);
        
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
                   'job_status'=>$form['status'],
                   'source'  =>$form['source'],
                   

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
    
  
}

?>