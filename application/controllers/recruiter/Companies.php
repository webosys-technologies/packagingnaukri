<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Companies extends CI_Controller
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
            $result['companies']=$this->Companies_model->companies_by_recruiter($id);
           
             $this->load->view('recruiter/header',$result);
             $this->load->view('recruiter/companies',$result);
             $this->load->view('recruiter/footer');
    }
    
  
    
    public function company_add()
    {
        $form=$this->input->post();
        $id=$this->session->userdata('recruiter_id');
        $this->input->post('company');
        $data=array(
                   'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_email'=>$form['email'],
                   'company_contact'=>$form['contact'],
                   'company_address'=>$form['address'],
                   'company_pincode'=>$form['pincode'],
                   'company_city'=>$form['city'],
                   'company_state'=>$form['state'],
                   'company_website'=>$form['website'],
                   'company_created_at'=>date('Y-m-d'),
                   'company_status'=>'1'
        );
        
          $res=$this->Companies_model->company_add($data);
          if($res)
          {
               $this->session->set_flashdata('success','company added successfully');
              echo json_encode(array('success'=>'company added successfully'));
          }
    }
    
    public function company_update()
    {
//        echo $id;
         $form=$this->input->post();
        $company_id=$form['company_id'];       
        $id=$this->Companies_model->get_recruiter_by_company($form['company']);
       
        $data=array(
                   'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_title'=>$form['companytitle'],
                   'company_type'=>$form['companytype'],
                   'company_education'=>$form['qualification'],
                   'company_description'=>$form['companydesc'],
                   'company_city'=>$form['companylocation'],
                   'company_experience'=>$form['experience'],
                   'company_salary'=>$form['companysalary'],
                   'company_status'=>'1'
        );
        
         $result=$this->Companies_model->update_company($data,$company_id);
         if($result)
         {
       $this->session->set_flashdata('success','Data Updated Successfully');
       echo json_encode(array('status'=>'Data Updated Successfully'));
         }
    }
    
    public function ajax_edit($id)
    {
        $res=$this->Companies_model->company_by_id($id);
        if($res)
        {
            echo json_encode($res);
        }
    }
    
    public function company_delete($id)
    {
        $res=$this->Companies_model->delete_company($id);
        if($res)
        {
            $this->session->set_flashdata('success','company deleted successfully');
            echo json_encode(array('success'=>'company deleted successfully'));
        }
    }
    
  
}

?>