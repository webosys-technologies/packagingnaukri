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
            $result['project_data']=$this->Projects_model->project_by_member($id);
            $result['employments']=$this->Employments_model->get_employment_member($id);
            $result['skills']=$this->Skills_model->get_members_skill($id);
            
              
                  
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
        );
        $where=array('member_id'=>$id);
        $res=$this->Members_model->member_update($where,$data);
        if($res)
        {
//            $this->session->set_flashdata('success','Personal Details Updated successfully');
            echo json_encode(array('success'=>"Pesonal Detail Updated Successfully"));
        }
        
    }
    
    public function education_update()
    {
         $id=$this->session->userdata('member_id');
         $where=array('member_id'=>$id);
         $check_member=$this->Educations_model->get_id($id);                      
         $form=$this->input->post();
        
        $data=array(
            'member_id'=>$id,
            'education_degree'=>  $form['degree'],
            'education_name'=>  $form['education_name'],
            'education_type'=>  $form['type'],
            'education_specialization'=>  $form['specialization'],
            'education_university'=>  $form['university'],
            'education_passing_in'=>  $form['passin'],
            'education_passing_out'=>  $form['passout'], 
            'education_percentage'=>  $form['percentage'], 
        );        
       
        if($check_member)
        {            
        $res=$this->Educations_model->update_education($where,$data);
        if($res)
        {
          echo json_encode(array('success'=>'Education updated sucessfully'));
        }
        }else
        {            
         $res1=$this->Educations_model->add_education($data);
        if($res1)
        {
          echo json_encode(array('success'=>'Education Added sucessfully'));
        }   
        }
        
    }
    
    public function update_employment()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        
       echo "hello";
       die;
        $data=array(
            'member_id'=>$id,
            'employment_organization'=>  $form['organization'],
            'employment_city'=>  $form['city'],
            'employment_designation'=>  $form['designation'],
            'employment_profile'=>  $form['profile'],
            'employment_notice_period'=>  $form['period'],
            'employment_from'=>  $form['from'],
            'employment_to'=>  $form['to'],
            'employment_status'=>1
           
        );   
        $where=array('member_id'=>$id);
        
        $data=$this->Employments_model->get_employ_by_member($id);
        $this->Employments_model->update_employment($where,$data);
             
        if(empty($data))
        {
            $this->Employments_model->insert_employment($where,$data);
            echo json_encode(array('success'=>'Employment Added sucessfully'));    
        }else{        
            $res=$this->Employments_model->update_employment($where,$data);
            echo json_encode(array('success'=>'Employment updated successfully'));
        }
               
    }
    
    public function project_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
       
        
        $data=array('member_id'=>$id,
//                     'employment_id'=>$form['emp_id'],
                     'project_name'=>$form['project_name'],
                     'project_status'=>1);
        $where=array('member_id'=>$id);

        $check=$this->Projects_model->check_project_name($form['project_name']);
        if($check>0)
        {
             $res=$this->Projects_model->update_project($data,$where);
             echo json_encode(array('success'=>'Project updated sucessfully'));
        }else{
                       $this->Projects_model->insert_project($data);
        }
        
      
    }
    
    
    public function new_project_add()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        
        $data=array('member_id'=>$id,
                     'employment_id'=>$form['emp_id'],
                     'project_name'=>$form['project_name'],
                     'project_description'=>$form['desc'],
                     'project_client_name'=>$form['client'],
                     'project_start'=>$form['from'],
                     'project_to'=>$form['to'],
                     'project_status'=>1);
       

        $check=$this->Projects_model->check_project_name($form['project_name']);
        if($check>0)
        {
            echo json_encode(array('error'=>'Project Name Already Exists'));
        }else{
                      $this->Projects_model->insert_project($data);
                     echo json_encode(array('error'=>'Project Added Successfully'));

 
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
    
    public function skill_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        $data=array();
        $where=array('member_id'=>$id);
        $res=$this->Skills_model->update_skills($where,$data);
        if($res)
        {
           echo json_encode(array('success'=>'Skills updated sucessfully'));
        }
    }
    
    
     public function skill_delete($id)
    {        
        $where=array('skill_id'=>$id);
         $res=$this->Skills_model->skill_delete($where);
        if($res)
        {
           echo json_encode(array('success'=>'Skills Deleted sucessfully'));
        }
    }
    
    public function resume_update()
    {
     $info=get_member_info($this->session->userdata('member_id'));
     
if (isset($_FILES['resume']['name'])) {
    if (0 < $_FILES['resume']['error']) {
        echo 'Error during file upload' . $_FILES['resume']['error'];
    } else {
//        if (file_exists('resume/' . $_FILES['resume']['name'])) {
//            echo 'File already exists : resume/' . $_FILES['resume']['name'];
//        } else {
        $rand=  mt_rand(1111,9999);
        $name = $_FILES["resume"]["name"];
        $ext = end((explode(".", $name)));
        $filename='suraj_resume_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['resume']['tmp_name'], 'resume/' . $filename);
       
        if(file_exists('resume/'.$filename))
        {
            if(file_exists($info->member_resume))
            {
            unlink($info->member_resume);
         $where=array('member_id'=>$this->session->userdata('member_id'));
        $data=array('member_resume'=>'resume/'.$filename);
         $res=$this->Members_model->member_update($where,$data);
         
        
        if($res)
        
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
    
    function add_new_skill()
    {
        $id=$this->session->userdata('member_id');
       $form=$this->input->post();
       $data=array(
                   'member_id'=>$id,
                    'skill_name'=>$form['skill_name'],
                   'skill_description'=>$form['desc'],
                    'skill_created_at'=>date('Y-m-d'),
                    'skill_status'=>1);
       $res=$this->Skills_model->add_new_skill($data);
       if($res)
       {
           echo json_encode(array('success'=>'Skill Added successfully'));
       }
    }
  
}

?>