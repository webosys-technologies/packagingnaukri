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
    
    function test()
    {
//        $data=$this->Jobs_model->getall_jobs();
//        print_r($data);
//        echo"<br><br>";
//        
//        print_r(get_user_info(1));
//        
//        echo"<br><br>";
//        foreach ($data as $d)
//        {
//            print_r($d);
//        }
//        echo"<br><br>";
//        $s=array('name1'=>"suraj",'name2'=>'pawan');
//        echo $s['name1'];
        
    }
    
    public function view_jobs()
    {        
            
    }
    
    public function job_add()
    {
        
        $form=$this->input->post();
       
//        echo $form['jobdesc'];
        
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
                   'job_skill_name' => $form['skill'],
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
                   'job_status'=>$form['status'],
                   'job_skill_name' => $form['skill'],
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
    
    
     public function search_page()
    {      
            $id=$this->session->userdata('admin_id');
            $result['user_data']=  get_user_info($id);
            $result['system']=$this->System_model->get_info();
                     
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/jobs');
             $this->load->view('admin/footer',$result);
       
    }
    function saved_jobs()
    {
        $id=$this->session->userdata('admin_id');
        $result['user_data']=  get_user_info($id);
        $result['saved']=$this->Saved_jobs_model->get_jobs_by_member($id);
        
        
        $this->load->view('admin/header',$result);
        $this->load->view('member/saved_jobs',$result);
        $this->load->view('admin/footer',$result);    

    }
    function applied_jobs()
    {
        
         $id=$this->session->userdata('admin_id');
        $result['user_data']=  get_user_info($id);
        
        $result['jobs']=$this->Applied_jobs_model->get_job_by_member($id);
       
         $this->load->view('admin/header',$result);
        $this->load->view('member/applied_jobs',$result);
        $this->load->view('admin/footer',$result);    
    }
    
    function search_title($title)
    {
      
              
        $result=$this->Members_model->search_query();
        
        echo json_encode($result);
    }
    
    function search_jobs()
    { $this->load->library('encryption');
         $id=$this->session->userdata('admin_id');
            $data['user_data']=  get_user_info($id);
            
                                
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
        
        $result=$this->Jobs_model->search_job($form);
        if($result){
            $result['jobs']=$result;
        }else{
            $result['error']="error";
        }
        $this->load->view('admin/header',$data);
        $this->load->view('admin/jobs',$result);
        $this->load->view('admin/footer',$data);      
        }else{
            redirect('admin/Jobs/search_page');
        }   
    }
    
    public function get_job_info($id)
    {
        $id=$this->session->userdata('admin_id');
            $result['user_data']=  get_user_info($id);
             $this->load->view('admin/header',$result);
             $this->load->view('member/job_info');
             $this->load->view('admin/footer',$result);
    }
    
        
    function save_job($id)
    {
        $mem_id=$this->session->userdata('admin_id');
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
       $this->Jobs_model->query_test();
   }
   
    
  
}

?>