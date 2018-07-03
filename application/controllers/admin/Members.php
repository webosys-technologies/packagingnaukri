<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Members extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
                if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')))
                {
                    redirect('admin/index');
                }
          
	}

	public function index()
    {                 
            $id=$this->session->userdata('admin_id');
            
            $result['user_data']=get_user_info($id);
            $result['members']=$this->Members_model->getall_members();
            $result['country']=$this->Cities_model->getall_country();
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
            
            $this->load->view('admin/header',$result);
            $this->load->view('admin/member_view',$result);
            $this->load->view('admin/footer');       
    
    }
    
    function search()
    {
        $data=$this->input->get();
        
            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            $result['states']=$this->Cities_model->getall_state();
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
            
            $result['members']=$this->Members_model->search_members($data);
            
            $this->load->view('admin/header',$result);
            $this->load->view('admin/member_view',$result);
            $this->load->view('admin/footer');       
       
    }
    
   function member_add()
   {
       $form=$this->input->post();
      if(!empty($form['source'])&& $form['source']!="--Select Source--")
      {
      if(!empty($form['fname']))
        { 
           if(!empty($form['lname']))
        {                 
           if(!empty($form['email']))
        {
            $em=$this->Members_model->login_with_otp(array('member_email'=>$form['email'])); 
        
            if($em==false)
            {              
           if(!empty($form['mobile']))
            {  
               $m=$this->Members_model->login_with_otp(array('member_mobile'=>$form['mobile'])); 
               if($m==false)
               {
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {         
          
          
          
        list($get_insert,$get_data)=$this->Members_model->register();
        if (isset($_FILES['photo']['name']))
        {
            $this->photo_upload($get_insert);
        }
        $this->session->set_flashdata('success',"member added Successfully");
        echo json_encode(array('success'=>'Member added successfully'));
        
                       
             
             
             
        }else {
          echo json_encode(array('city_err'=>'Please Select City'));
      }
  } else {
          echo json_encode(array('state_err'=>'Please Select State'));
      
        }}else{
             echo json_encode(array('mobile_err'=>'Mobile already register'));
            }}else{
             echo json_encode(array('mobile_err'=>'Mobile No required'));
            }}else{
              echo json_encode(array('email_err'=>'Email Already Exists'));   
            }
        }else{
           echo json_encode(array('email_err'=>'Email Required'));
        }}else{
             echo json_encode(array('lname_err'=>'Last Name Required'));
        }
        }
        else{
              
        echo json_encode(array('fname_err'=>'First Name Required'));
        }
      }else{
           echo json_encode(array('source_err'=>'Select Source Name'));
      }    
           
        }
        
        function member_update()
        {
            $form=$this->input->post();
             if(!empty($form['source'])&& $form['source']!="--Select Source--")
          {
             if(!empty($form['fname']))
        { 
           if(!empty($form['lname']))
        {     
               if(!empty($form['email']))
        {  
           if(!empty($form['mobile']))
        {  
  if(!empty($form['state']) && $form['state']!="-- Select State --")
  {
      if(!empty($form['city']) && $form['city']!="-- Select City --" && $form['city']!="")
      {
            $data=array(
                        'member_fname'          =>$this->input->post('fname'),
                        'member_lname'          => $this->input->post('lname'),
                        'member_email'          => $this->input->post('email'),
                        'member_mobile'         => $this->input->post('mobile'),
                        'member_password'       => $this->input->post('password'),
                        'member_city'           => $this->input->post('city'),
                        'member_state'          => $this->input->post('state'),
                        'member_country'           => $this->input->post('country'),
                        'member_address'        =>$this->input->post('address'),
                        'member_status'         =>$this->input->post('status'),
                        'member_pincode'         =>$this->input->post('pincode'),
                        'member_source'                =>$this->input->post('source'),
                          );
            
                       
            $res=$this->Members_model->member_update(array('member_id'=>$this->input->post('member_id')),$data);
            
            if (isset($_FILES['photo']['name']))
        {
            $this->photo_upload($this->input->post('member_id'));
        }
            
            
                $this->session->set_flashdata('success','Member Updated Successfully');
                echo json_encode(array('success'=>true));
       }
              else {
          echo json_encode(array('city_err'=>'Please Select City'));
      }
  } else {
          echo json_encode(array('state_err'=>'Please Select State'));
      
        }
        }else{
             echo json_encode(array('state_err'=>'Mobile No required'));
        }
        }else{
           echo json_encode(array('email_err'=>'Email Required'));
        }
        
        }else{
            echo json_encode(array('lname_err'=>'Last Name Required'));
        }
        }
        else{
              
           echo json_encode(array('fname_err'=>'First Name Required'));
        }
          }else{
           echo json_encode(array('source_err'=>'Select Source Name'));
      } 
        }
        
         function ajax_edit($id)
    {
             
            $data = $this->Members_model->get_id($id);
         
            echo json_encode($data);
    }
        
         function member_delete($id)
    {
              $info=$this->Members_model->get_id($id);
              $result=$this->Members_model->delete_by_id($id);
              if($result)
              {                  
            if(file_exists($info->member_profile_pic))        
            {
            unlink($info->member_profile_pic);
            }
            if(file_exists($info->member_resume))        
            {
            unlink($info->member_resume);
            }
            
            $this->Educations_model->delete_by_id($id);
            $this->Employments_model->delete_by_id($id);
            $this->Applied_jobs_model->delete_by_id($id);
            $this->Projects_model->delete_by_id($id);
            $this->Saved_jobs_model->delete_by_id($id);
            $this->Skills_model->delete_by_id($id);
                     
           
            $this->session->set_flashdata('success', 'Member Deleted Successfully');
             echo json_encode(array("status" => true));
              }
                  
                
       
             }
    
     function show_cities($state)
        {           
            $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }
        
        function photo_upload($rec_id)
    {
        $info=$this->Members_model->get_id($rec_id);
             
if (isset($_FILES['photo']['name'])) {
    if (0 < $_FILES['photo']['error']) {
//        echo 'Error during file upload' . $_FILES['logo']['error'];
        return false;
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
         $where=array('member_id'=>$rec_id);
        $data=array('member_profile_pic'=>'profile_pic/'.$filename);
         $res=$this->Members_model->member_update($where,$data);
         
        
           return true;
        
            }else{
                $where=array('member_id'=>$rec_id);
        $data=array('member_profile_pic'=>'profile_pic/'.$filename);
         $res=$this->Members_model->member_update($where,$data);   
        
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
    
    function delete_pic($id)
        {
             $info=$this->Members_model->get_id($id);
         if(file_exists($info->member_profile_pic))        
            {
            unlink($info->member_profile_pic);
            }
        $where=array('member_id'=>$id);
        $data=array('member_profile_pic'=>"");
         $res=$this->Members_model->member_update($where,$data);
        redirect('admin/Members');
        }

	
        
}