<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Companies extends CI_Controller
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
             $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $result['states']=$this->Cities_model->getall_state();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['system']=$this->System_model->get_info();
            
           
             $this->load->view('admin/header',$result);
             $this->load->view('admin/companies',$result);
             $this->load->view('admin/footer');
    }
    
  
    
    public function company_add()
    {
        $form=$this->input->post();
        // print_r($form);
        // die();
        $data=array(
                  // 'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_type'=>$form['type'],
                   'company_email'=>$form['email'],
                   'company_contact'=>$form['contact'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
                   'company_pincode'=>$form['pincode'],
                   'company_establish_in'=>$form['established'],
                   'company_multinational'=>$form['mnc'],
                   'company_created_at'=>date('Y-m-d'),
                   'company_status'=>'1'
        );
        
          $res=$this->Companies_model->company_add($data);
          if($res)
          {
               $this->session->set_flashdata('success','company added successfully');
              echo json_encode(array('success'=>'Company added successfully'));
          }
    }
    
    public function company_update()
    {
//        echo $id;
         $form=$this->input->post();
        $company_id=$form['company_id'];       
        // $id=$this->Companies_model->get_recruiter_by_company($form['company']);
       
         $data=array(// 'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_type'=>$form['type'],
                   'company_email'=>$form['email'],
                   'company_contact'=>$form['contact'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
                   'company_pincode'=>$form['pincode'],
                   'company_establish_in'=>$form['established'],
                   'company_multinational'=>$form['mnc'],
                   'company_created_at'=>date('Y-m-d'),
                   'company_status'=>'1'
        );
         $result=$this->Companies_model->company_update(array('company_id' => $company_id),$data);
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
        $res=$this->Companies_model->company_delete($id);
        if($res)
        {
            $this->session->set_flashdata('success','job deleted successfully');
            echo json_encode(array('success'=>'Company deleted successfully'));
        }
    }
    
  
}

?>