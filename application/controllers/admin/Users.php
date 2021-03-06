<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
              if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')) || $this->session->userdata('admin_type')!="admin")
                {
                    redirect('admin/Dashoard');
                }
	}

	public function index()
    {
                 
            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            $result['users']=$this->User_model->getall_user("",$id);
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/users',$result);
            $this->load->view('admin/footer');
  
    }
    
   function user_add()
   {
       $form=$this->input->post();
       list($err,$val)=$this->user_add_validation($form);
       
       if($val=="success")
       {
       $sys=$this->System_model->source_name();
       $recruiter=array(
            'recruiter_fname'          =>$this->input->post('fname'),
            'recruiter_lname'          => $this->input->post('lname'),
            'recruiter_email'          => $this->input->post('email'),
            'recruiter_mobile'         => $this->input->post('mobile'),
            'recruiter_address'        =>"",
            'recruiter_password'       => $this->input->post('password'),
            'recruiter_city'           => "",
            'recruiter_state'          => "",
            'recruiter_gender'         => $this->input->post('gender'),
            'recruiter_created_at'     => date("Y-m-d "),
            'recruiter_status'         => "2",
            'recruiter_source'         =>  ucfirst($sys),

        );
      $rec_id=$this->Recruiters_model->recruiter_add($recruiter);
       
       
        $data=array(
                        'user_fname'          =>$this->input->post('fname'),
                        'user_lname'          => $this->input->post('lname'),
                        'user_email'          => $this->input->post('email'),
                        'user_mobile'         => $this->input->post('mobile'),
                        'user_password'       => $this->input->post('password'),
                        'user_gender'         => $this->input->post('gender'),
                        'user_type'           => $this->input->post('user_type'),
                        'recruiter_id'        =>$rec_id,
                        'user_created_at'     => date('Y-m-d'),
                        'user_status'         =>$this->input->post('status'),
                          );
        
      
        
      
        $res=$this->User_model->user_add($data);
        if($res)
        {
            $this->session->set_flashdata('success',"User added Successfully");
             echo json_encode(array('success'=>'User added successfully'));
        }
           
        }else{
            echo json_encode(array($err=>$val));
        }
   }
        
        function user_add_validation($form)
        {
            
             if(!empty($form['fname']))
        { 
           if(!empty($form['lname']))
        {                 
           if(!empty($form['email']))
        {
              $email=$this->User_model->get_user(array('user_email'=>$form['email']));
         if(empty($email))
         {
        if(!empty($form['mobile']))
        {
            $mobile=$this->User_model->get_user(array('user_mobile'=>$form['mobile']));
            if(empty($mobile))
            {
              return array('status',"success");
            }else{
              return array('mobile_err',"Mobile already registered"); 
            }
        }
        else
        {
           return array('mobile_err',"Mobile Required"); 
        }        
        }
        else
        {
          return array('email_err',"Email Already Exists");  
        }
        }else
        {
           
            return array('email_err',"Email Required");
        }            
        }
        else
        {          
            return array('lname_err',"Last Name Required");
        }
        }
        else
        {            
             return array('fname_err',"First Name Required");
        }
        }
        function user_update()
        {
            $user_data=$this->User_model->get_user_by_id($this->input->post('user_id'));
             $recruiter=array(
            'recruiter_fname'          =>$this->input->post('fname'),
            'recruiter_lname'          => $this->input->post('lname'),
            'recruiter_email'          => $this->input->post('email'),
            'recruiter_mobile'         => $this->input->post('mobile'),
            'recruiter_address'        =>"",
            'recruiter_password'       => $this->input->post('password'),
            'recruiter_city'           => "",
            'recruiter_state'          => "",
            'recruiter_gender'         => $this->input->post('gender'),
//            'recruiter_created_at'     => date("Y-m-d "),
//            'recruiter_status'         => "2",
//            'recruiter_source'         =>  ucfirst($sys),
                             );
       $rec_id=$this->Recruiters_model->recruiter_update(array('recruiter_id'=>$user_data->recruiter_id),$recruiter);
            
            
            $data=array(
                        'user_fname'          =>$this->input->post('fname'),
                        'user_lname'          => $this->input->post('lname'),
                        'user_email'          => $this->input->post('email'),
                        'user_mobile'         => $this->input->post('mobile'),
                        'user_password'       => $this->input->post('password'),
                        'user_gender'         => $this->input->post('gender'),
                        'user_type'           => $this->input->post('user_type'),
                        'user_status'         =>$this->input->post('status'),
                          );
            
                       
            $res=$this->User_model->user_update(array('user_id'=>$this->input->post('user_id')),$data);
          
                $this->session->set_flashdata('success','User Updated Successfully');
                echo json_encode(array('success'=>true));
            
        }
        
         function ajax_edit($id)
    {
             
            $data = $this->User_model->get_user_by_id($id);
         
            echo json_encode($data);
    }
        
         function user_delete($id)
    {
        $data=array('user_status'=>'2');
        $result=$this->User_model->delete_by_id(array('user_id'=>$id),$data);
        
              if($result)
                {
                  
                   $this->session->set_flashdata('success', 'User Deleted Successfully');
                   echo json_encode(array("status" => true));
               
                }
       
    }
    
     function show_cities($state)
        {           
            $cities=$this->Cities_model->getall_cities(ltrim(str_replace("%20",' ', $state)));
          
            echo json_encode($cities);
        }

	
        
}