<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Profile extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
       
     if(!is_member_LoggedIn($this->session->userdata('member_LoggedIn')))
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
            $result['member_data']=get_member_info($id);
            $result['cities']=$this->Cities_model->get_all_cities();
            $result['states']=$this->Cities_model->getall_state();
            $result['project_data']=$this->Projects_model->project_by_member($id);
            $result['employments']=$this->Employments_model->get_employment_member($id);
            $result['skills']=$this->Skills_model->get_members_skill($id);
            $result['educations']=$this->Educations_model->get_education_by_member($id);
            
            $result['system']=$this->System_model->get_info();
              
                  
             $this->load->view('member/header',$result);
             $this->load->view('member/profile');
             $this->load->view('member/footer');
       
    }
    
    public function member_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
       
       
        $data=array(
                  'member_fname'=>  $form['fname'],
                  'member_lname'=>  $form['lname'],
                  'member_dob'=>  $form['dob'],
                  'member_city'=>  $form['city'],
                  'member_gender'=> $form['gen'],
                  'member_email'=>$form['email'],
                  'member_mobile'=>$form['mobile']
        );
        $where=array('member_id'=>$id);
        $res=$this->Members_model->member_update($where,$data);
        if($res)
        {
            $this->session->set_flashdata('success','Personal Details Updated successfully');
            echo json_encode(array('success'=>"Pesonal Detail Updated Successfully"));
        }else{
            echo json_encode(array('success'=>"No Change"));
        }
        
    }
    
    function edit_member($id)
    {
       
        $data=get_member_info($id);
        $data1=(array('model'=>'personal_modal'));
        $result=((object)array_merge((array)$data,(array)$data1));
      
        echo json_encode($result);
    }
    
    function edit_education($id)
    {
         $data=$this->Educations_model->get_education_by_id($id);
        $data1=(array('model'=>'education_modal'));
        $result=((object)array_merge((array)$data,(array)$data1));
      
        echo json_encode($result);
    }
    
    function edit_employment($id)
    {
        $where=array('employment_id'=>$id);
        $data=$this->Employments_model->get_employ_by_id($where);
        $data1=(array('model'=>'employment_modal'));
        $result=((object)array_merge((array)$data,(array)$data1));
      
        echo json_encode($result);
    }
    
    function edit_skill($id)
    {
        $where=array('skill_id'=>$id);
        $data=$this->Skills_model->get_skill_by_id($where);
        $data1=(array('model'=>'skill_modal'));
        $result=((object)array_merge((array)$data,(array)$data1));
      
        echo json_encode($result);
    }
    
    function edit_project($id)
    {
        $where=array('project_id'=>$id);
        $data=$this->Projects_model->get_project_by_id($where);
        $data1=(array('model'=>'project_modal'));
        $result=((object)array_merge((array)$data,(array)$data1));
      
        echo json_encode($result);
    }
    
    public function education_update()
    {
         $id=$this->session->userdata('member_id');
         
         $check_member=$this->Educations_model->get_id($id);                      
         $form=$this->input->post();
        
         
         if($form['edu_name']=="spl_field" || $form['edu_name']=="--- Select Education ---")
         {
            $edu_name=""; 
         }else{
             $edu_name=$form['edu_name'];
         }
         
         if(empty($form['edu_spl']))
         {
             $edu_spl="";
         }else{
             $edu_spl=$form['edu_spl'];
         }
         
         
         
         if(empty($form['university']) || $form['university']=="-- Select University/Institute --")
         {
             $uni="";
         }else{
             $uni=$form['university'];
         }
         
         
        $data=array(
            'member_id'=>$id,
//            'education_degree'=>  $form['degree'],
            'education_degree'=>  $form['edu_title'],
            'education_name'=>  $edu_name,     
            'education_specialization'=> $edu_spl,
//            'education_type'=>  $form['type'],
//            'education_specialization'=>  $form['specialization'],
            'education_university'=>  $uni,
            'education_institute_name'=>  $form['inst_title'],
            'education_passing_out'=>  $form['passout'], 
            'education_percentage'=>  $form['percentage'], 
        );        
        
        $where=array('education_id'=>$form['education_id']);
       
        if(!empty($form['education_id']))
        {       

             $res1=$this->Educations_model->update_education($where,$data); 
          echo json_encode(array('success'=>'Education updated sucessfully'));
        
        }else
        {            
         $res1=$this->Educations_model->add_education($data);
       
          echo json_encode(array('success'=>'Education Added sucessfully'));
          
        }
        
    }
    
    public function employment_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        $member_data=  get_member_info($id);
        
     if(!empty($form['organization']))
     {
        $data=array(
            'member_id'=>$id,
            'employment_organization'=>  $form['organization'],
            'employment_city'=>  $form['city'],
            'employment_designation'=>  $form['designation'],
            'employment_profile'=>  $form['profile'],
            'employment_salary'=>$form['salary'],
            'employment_notice_period'=>  $form['period'],
            'employment_from'=>  $form['from'],
            'employment_to'=>  $form['to'],
            'employment_status'=>1
           
        );   
        $where=array('employment_id'=>$form['employment_id']);
        $where2=array('employment_organization'=>$form['organization']);
     
         
        if(empty($form['employment_id']))
        {
           if(!empty($form['from']))
            {
              if($form['from']<date("Y-m-d"))
              {
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($form['from']);
            $interval = $datetime1->diff($datetime2);
            $exp=$interval->format('%y yrs %m month');
          
                $mem_data=array('member_experience'=>$exp);
                $mem_where=array('member_id'=>$id);
               $this->Members_model->member_update($mem_where,$mem_data);
                $this->Employments_model->insert_employment($data);
            echo json_encode(array('success'=>'Employment Added sucessfully'));  
              } else {
                  echo json_encode(array('error'=>"Working date is greater than todays date"));
              }
            }        
            
        } else {      
           $where3=array('member_id'=>$id);
            $row=$this->Employments_model->get_employment($where3);
            if($row->employment_id==$form['employment_id'])
            {
                       if($form['from']<date("Y-m-d"))
              {
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($form['from']);
            $interval = $datetime1->diff($datetime2);
            $exp=$interval->format('%y yrs %m month');
          
                $mem_data=array('member_experience'=>$exp);
                $mem_where=array('member_id'=>$id);
               $this->Members_model->member_update($mem_where,$mem_data);
                 
              }
              else {
                  echo json_encode(array('error'=>"Working date is greater than todays date"));
              }
            }
            $res=$this->Employments_model->update_employment($where,$data);            
            echo json_encode(array('success'=>'Employment updated successfully'));
           
        }
               
    }
    }
    
   
    
    
    public function project_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        
       
        if(!empty($form['project_name']))
        {
        $data=array('member_id'=>$id,
                     'employment_id'=>$form['emp_id'],
                     'project_name'=>$form['project_name'],
                     'project_description'=>$form['desc'],
                     'project_client_name'=>$form['client'],
                     'project_start'=>$form['from'],
                     'project_to'=>$form['to'],
                     'project_status'=>1);
       
        $where=array('project_id'=>$form['project_id']);

       
        if(!empty($form['project_id']))
        {
             $this->Projects_model->update_project($data,$where);
             echo json_encode(array('success'=>'Project updated sucessfully'));
           
        }else{
                      $this->Projects_model->insert_project($data);
                     echo json_encode(array('success'=>'Project Added Successfully')); 
        }
        }else{
            echo json_encode(array('error'=>'Project Name Required'));
        }
      
    }
    
     public function resume_delete($id)
    {
         $file=get_member_info($id);
         $filename=$file->member_resume;
         if(file_exists($file->member_resume))
         {
             unlink($filename);
        $where=array('member_id'=>$id);
        $data=array('member_resume'=>"");
        $res=$this->Members_model->member_update($where,$data);
        if($res)
        {
            echo json_encode(array('success'=>'Resume Deleted Successfully'));
        }
         }  else {
             
         }
    }
    
    
    public function project_delete($id)
    {
        $where=array('project_id'=>$id);
        $res=$this->Projects_model->delete_project($where);
        if($res)
        {
            echo json_encode(array('success'=>'Project Deleted Successfully'));
        }
    }
    
    public function employment_delete($id)
    {
        $where=array('employment_id'=>$id);
        $res=$this->Employments_model->employment_delete($where);
        if($res)
        {
            echo json_encode(array('success'=>'Employment Deleted Successfully'));
        }
    }
    
     public function education_delete($id)
    {
        $where=array('education_id'=>$id);
        $res=$this->Educations_model->education_delete($where);
        if($res)
        {
            echo json_encode(array('success'=>'Employment Deleted Successfully'));
        }
    }
    
     
    
     public function skill_delete($id)
    {        
        $where=array('skill_id'=>$id);
         $res=$this->Skills_model->skill_delete($where);
        
           echo json_encode(array('success'=>'Skills Deleted sucessfully'));
        
    }
    
    public function resume_update()
    {
     $info=get_member_info($this->session->userdata('member_id'));
     
if (isset($_FILES['resume']['name'])) {
    if (0 < $_FILES['resume']['error']) {
        echo 'Error during file upload' . $_FILES['resume']['error'];
    } else {

        $rand=  mt_rand(1111,9999);
        $name = $_FILES["resume"]["name"];
        $ext = end((explode(".", $name)));
        $filename='resume_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['resume']['tmp_name'], 'resume/' . $filename);
       
        if(file_exists('resume/'.$filename))
        {
            if(file_exists($info->member_resume))
            {
            unlink($info->member_resume);
         $where=array('member_id'=>$this->session->userdata('member_id'));
        $data=array('member_resume'=>'resume/'.$filename);
         $res=$this->Members_model->member_update($where,$data);
         
        
            echo json_encode(array('success'=>"Resume Updated Successfully"));
        
            }else{
                $where=array('member_id'=>$this->session->userdata('member_id'));
               $data=array('member_resume'=>'resume/'.$filename);
               $res=$this->Members_model->member_update($where,$data);
               
                    echo json_encode(array('success'=>"Resume Updated Successfully"));               
            }
        }   else{
            echo json_encode(array('error'=>"Something Wrong"));
        }   
       
       
            
//        }
    }
} else {
    echo 'Please choose a file';
}
    
    
   
    }
    
    
        public function photo_update()
    {
     $info=get_member_info($this->session->userdata('member_id'));
     
if (isset($_FILES['photo']['name'])) {
    if (0 < $_FILES['photo']['error']) {
        echo 'Error during file upload' . $_FILES['photo']['error'];
    } else {

        $rand=  mt_rand(1111,9999);
        $name = $_FILES["photo"]["name"];
        $ext = end((explode(".", $name)));
        $filename='photo_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'profile_pic/' . $filename);
       
        if(file_exists('profile_pic/'.$filename))
        {
            if(file_exists($info->member_profile_pic))
            {
            unlink($info->member_profile_pic);
         $where=array('member_id'=>$this->session->userdata('member_id'));
        $data=array('member_profile_pic'=>'profile_pic/'.$filename);
         $res=$this->Members_model->member_update($where,$data);
         
        
            echo json_encode(array('success'=>"Resume Updated Successfully"));
        
            }else{
                $where=array('member_id'=>$this->session->userdata('member_id'));
               $data=array('member_profile_pic'=>'profile_pic/'.$filename);
               $res=$this->Members_model->member_update($where,$data);
               
                    echo json_encode(array('success'=>"Resume Updated Successfully"));               
            }
        }   else{
            echo json_encode(array('error'=>"Something Wrong"));
        }   
       
       
            
//        }
    }
} else {
    echo 'Please choose a file';
}
    
    
   
    }
    
    
    function skill_update()
    {
        $id=$this->session->userdata('member_id');
       $form=$this->input->post();
       
       if(!empty($form['skill_name']))
       {
       $data=array(
                   'member_id'=>$id,
                    'skill_name'=>$form['skill_name'],
                   'skill_description'=>$form['desc'],
                    'skill_created_at'=>date('Y-m-d'),
                    'skill_status'=>1);
       
       
         $where=array('skill_id'=>$form['skill_id']);
         if(empty($form['skill_id']))
         {
           $this->Skills_model->add_new_skill($data);      
           echo json_encode(array('success'=>'Skill Added successfully'));
           
         }else{
              $this->Skills_model->skill_update($data,$where); 
              echo json_encode(array('success'=>'Skill Updated successfully'));
         }
       }else{
           echo json_encode(array('skill_error'=>'Skill Name Required'));
       }
    }
    
     function show_cities($state)
        {    
             $st=str_replace('%20'," ",$state);
           
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }
        
        function education_name($title)
        {
            $result=$this->Master_edu_model->get_education_by_title($title);
            echo json_encode($result);
            
        }
        
         function specialization($name)
        {
            $result=$this->Master_edu_model->get_specialization_by_name($name);
            echo json_encode($result);
            
        }
        function get_university($university)
        {
            $res=$this->Institute_model->get_institute($university);
            echo json_encode($res);
        }
        
        
        
        function date_diff()
        {
            echo date("Y-m-d");
        
            $datetime1 = new DateTime(date("Y-m-d"));
    $datetime2 = new DateTime('2017-06-3');
    $interval = $datetime1->diff($datetime2);
    echo $interval->format('%y yrs %m month');
        }

  
}

?>