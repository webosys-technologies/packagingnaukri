<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Applicants extends CI_Controller
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
            $result['members']=$this->Applied_jobs_model->applied_members();
           
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/applicants',$result);
            $this->load->view('admin/footer');

        
    
    }
    
   function member_add()
   {
      
        list($get_insert,$get_data)=$this->Members_model->register();
        if($get_insert)
        {
            $this->session->set_flashdata('success',"member added Successfully");
             echo json_encode(array('success','Member added successfully'));
        }
           
        }
        
        function member_update()
        {
            $data=array(
                        'member_fname'          =>$this->input->post('fname'),
                        'member_lname'          => $this->input->post('lname'),
                        'member_email'          => $this->input->post('email'),
                        'member_mobile'         => $this->input->post('mobile'),
                        'member_password'       => $this->input->post('password'),
                        'member_city'           => $this->input->post('city'),
                        'member_state'          => $this->input->post('state'),
                          );
            
                       
            $res=$this->Members_model->member_update(array('member_id'=>$this->input->post('member_id')),$data);
            if($res)
            {
                $this->session->set_flashdata('success','Member Updated Successfully');
                echo json_encode(array('status'=>true));
            }
        }
        
         function ajax_edit($id)
    {
             
            $data = $this->Members_model->get_id($id);
         
            echo json_encode($data);
    }
        
         function member_delete($id)
    {

        $result=$this->Members_model->delete_by_id($id);
              if($result)
                {
                   echo json_encode(array("status" => true));
                $this->session->set_flashdata('success', 'Member Deleted Successfully');
                }
       
             }
    
     function show_cities($state)
        {           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

	
        
}