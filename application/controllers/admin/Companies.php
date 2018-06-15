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
             $id=$this->session->userdata('admin_id');
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
        if(!empty($form['company']))
        {        
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {
        $data=array(
                  // 'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_type'=>$form['type'],
                   'company_email'=>$form['email'],
                   'company_contact'=>$form['contact'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
//                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
                   'company_pincode'=>$form['pincode'],
                   'company_establish_in'=>$form['established'],
                   'company_multinational'=>$form['mnc'],
                   'company_created_at'=>date('Y-m-d'),
                   'company_status'=>$form['status'],
                   'company_source' =>$form['source'],
        );
        
          $res=$this->Companies_model->company_add($data);
          
           if (isset($_FILES['logo']['name']))
          {
             
              $this->logo_upload($res);
          }
          
         
               $this->session->set_flashdata('success','company added successfully');
              echo json_encode(array('success'=>'Company added successfully'));
      }
              else {
          echo json_encode(array('city_err'=>'Please Select City'));
      }
  } else {
          echo json_encode(array('state_err'=>'Please Select State'));
      
        }}
        else{
              
           echo json_encode(array('company_err'=>'Please Enter Company Name'));
        }
         
    }
    
    public function company_update()
    {
//        echo $id;
         $form=$this->input->post();
        $company_id=$form['company_id'];       
       if(!empty($form['company']))
        {        
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {
       
         $data=array(// 'recruiter_id'=>$id,
                   'company_name'=>$form['company'],
                   'company_type'=>$form['type'],
                   'company_email'=>$form['email'],
                   'company_contact'=>$form['contact'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
//                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
                   'company_pincode'=>$form['pincode'],
                   'company_establish_in'=>$form['established'],
                   'company_multinational'=>$form['mnc'],
                   'company_created_at'=>date('Y-m-d'),
                    'company_status'=>$form['status'],
                    'company_source' =>$form['source'],
        );
         $result=$this->Companies_model->company_update(array('company_id' => $company_id),$data);
        
         
          if (isset($_FILES['logo']['name']))
          {
             
              $this->logo_upload($company_id);
          }
         
       $this->session->set_flashdata('success','Data Updated Successfully');
       echo json_encode(array('success'=>'Data Updated Successfully'));
       
         }
              else {
          echo json_encode(array('city_err'=>'Please Select City'));
      }
  } else {
          echo json_encode(array('state_err'=>'Please Select State'));
      
        }}
        else{
              
           echo json_encode(array('company_err'=>'Please Enter Company Name'));
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
         $info=$this->Companies_model->company_by_id($id);
        $res=$this->Companies_model->company_delete($id);
        if($res)
        {           
            if(file_exists($info->company_logo))        
            {
            unlink($info->company_logo);
            }
            $this->Jobs_model->delete_by_company_id($id);
            $this->Applied_jobs_model->delete_by_company_id($id);
            $this->Saved_jobs_model->delete_by_company_id($id);
            $this->session->set_flashdata('success','Company deleted successfully');
            echo json_encode(array('success'=>'Company deleted successfully'));
        }
    }
    
    function company_info($id)
    {
        $result=$this->Companies_model->company_by_id($id);
        echo json_encode($result);
        
    }
    
    function delete_logo($id)
    {
         $info=$this->Companies_model->company_by_id($id);
         if(file_exists($info->company_logo))        
            {
            unlink($info->company_logo);
            }
        $where=array('company_id'=>$id);
        $data=array('company_logo'=>"");
         $res=$this->Companies_model->company_update($where,$data);
        redirect('admin/Companies');
    }
    
    
        function logo_upload($comp_id)
    {
        $info=$this->Companies_model->company_by_id($comp_id);
             
if (isset($_FILES['logo']['name'])) {
    if (0 < $_FILES['logo']['error']) {
//        echo 'Error during file upload' . $_FILES['logo']['error'];
        return false;
    } else {

        $rand=  mt_rand(1111,9999);
        $name = $_FILES["logo"]["name"];
        $ext = end((explode(".", $name)));
        $filename='logo_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['logo']['tmp_name'], 'company_logo/' . $filename);
       
        if(file_exists('company_logo/'.$filename))
        {
            if(file_exists($info->company_logo))
            {
            unlink($info->company_logo);
         $where=array('company_id'=>$comp_id);
        $data=array('company_logo'=>'company_logo/'.$filename);
         $res=$this->Companies_model->company_update($where,$data);
         
        
           return true;
        
            }else{
                $where=array('company_id'=>$comp_id);
        $data=array('company_logo'=>'company_logo/'.$filename);
         $res=$this->Companies_model->company_update($where,$data);   
        
           return true;
                   
            }
        }   else{
            return false;
        }  
//        }
    }
} else {
    return false;
}
        
    }
    
    
     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim(str_replace("%20",' ', $state)));
          
            echo json_encode($cities);
        }
  
}

?>