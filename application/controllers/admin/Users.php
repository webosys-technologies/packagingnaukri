<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
              if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
                {
                    redirect('admin/index');
                }
	}

	public function index()
    {
                 
            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $result['users']=$this->User_model->getall_user("");
                      
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/users',$result);
            $this->load->view('admin/footer');

        
    
    }
    
   function user_add()
   {
       
       
        $data=array(
                        'user_fname'          =>$this->input->post('fname'),
                        'user_lname'          => $this->input->post('lname'),
                        'user_email'          => $this->input->post('email'),
                        'user_mobile'         => $this->input->post('mobile'),
                        'user_password'       => $this->input->post('password'),
                        'user_gender'         => $this->input->post('gender'),
                        'user_type'           => $this->input->post('user_type'),
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
            if($res)
            {
                $this->session->set_flashdata('success','User Updated Successfully');
                echo json_encode(array('status'=>true));
            }
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
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

	
        
}