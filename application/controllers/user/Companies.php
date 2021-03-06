<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Companies extends CI_Controller
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
             $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $result['country']=$this->Cities_model->getall_country();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['recruiters']=$this->Recruiters_model->getall();
            $sys=$this->session->userdata('user_source');
            $result['system']=$this->System_model->get_system_info($sys);
            
           
             $this->load->view('user/header',$result);
             $this->load->view('user/companies',$result);
             $this->load->view('user/footer');
    }
    
  
    
    public function company_add()
    {
       
        $form=$this->input->post();
               
              
         if(!empty($form['source'])&& $form['source']!="--Select Source--")
      {
        if(!empty($form['company']))
        {        
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {
        
          
        $data=array(
                   'recruiter_id'=>$form['recruiter'],
                   'company_name'=>$form['company'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
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
      }else{
           echo json_encode(array('source_err'=>'Select Source Name'));
      }
    }
    
    public function company_update()
    {
//        echo $id;
         $form=$this->input->post();
        $company_id=$form['company_id']; 
         if(!empty($form['source'])&& $form['source']!="--Select Source--")
      {
       if(!empty($form['company']))
        {        
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {
       
         $data=array(
                     'recruiter_id'=>$form['recruiter'],
                   'company_name'=>$form['company'],
                   'company_website'=>$form['website'],
                   'company_address'=>$form['address'],
                   'company_country'=>$form['country'],
                   'company_state'=>$form['state'],
                   'company_city'=>$form['city'],
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
         }else{
           echo json_encode(array('source_err'=>'Select Source Name'));
      }
         
    }
    
    public function ajax_edit($id)
    {
        $res=$this->Companies_model->company_by_id($id);
        if($res)
        {     
            $data['state']=$this->show_state($res);
            // print_r($state);

        $result=((object)array_merge((array)$res,(array)$data));
        // print_r($result);
            echo json_encode($result);
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
        redirect('user/Companies');
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
    
    
     function show_state($data)
        {
            $country=$data->company_country;
            $val['states']=$this->Cities_model->getall_states($country);
            $st=$data->company_state;
            $val['cities']=$this->Cities_model->getall_cities($st);
            
            return $val;
            // echo json_encode($cities);
        }
  
}

?>