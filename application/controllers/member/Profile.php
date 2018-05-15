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
    
    public function employment_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        $data=array();
        $where=array('member_id'=>$id);
        $res=$this->Employments_model->update_employment($where,$data);
        if($res)
        {
          echo json_encode('success','Employment updated sucessfully');
        }
        
    }
    
    public function project_update()
    {
        $id=$this->session->userdata('member_id');
        $form=$this->input->post();
        $data=array();
        $where=array('member_id'=>$id);
        $res=$this->Projects_model->update_project($where,$data);
        if($res)
        {
          echo json_encode('success','Project Detail updated sucessfully');
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
          echo json_encode('success','Skills updated sucessfully');
        }
    }
    
   
    
  
}

?>