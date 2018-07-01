<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Users extends CI_Controller
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
            $result['users']=$this->User_model->getall_user("");
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/users',$result);
            $this->load->view('admin/footer');

        
    
    }
    
   function user_add()
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
                        'user_status'         =>'1'
                          );
        
      
        
      
        $res=$this->User_model->user_add($data);
        if($res)
        {
            $this->session->set_flashdata('success',"User added Successfully");
             echo json_encode(array('success','User added successfully'));
        }
           
        }
        
        function user_update()
        {
            $data=array(
                        'user_fname'          =>$this->input->post('fname'),
                        'user_lname'          => $this->input->post('lname'),
                        'user_email'          => $this->input->post('email'),
                        'user_mobile'         => $this->input->post('mobile'),
                        'user_password'       => $this->input->post('password'),
                        'user_gender'         => $this->input->post('gender'),
                        'user_type'           => $this->input->post('user_type')
                          );
            
                       
            $res=$this->User_model->user_update(array('user_id'=>$this->input->post('user_id')),$data);
          
                $this->session->set_flashdata('success','User Updated Successfully');
                echo json_encode(array('status'=>true));
            
        }
        
         function ajax_edit($id)
    {
             
            $data = $this->User_model->get_user_by_id($id);
         
            echo json_encode($data);
    }
        
         function user_delete($id)
    {

        $result=$this->User_model->delete_by_id($id);
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