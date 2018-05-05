<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Members extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
                
                if(!is_recruiter_LoggedIn($this->session->userdata('recruiter_id')))
                {
                    redirect('recruiter/index/login');
                }

          
	}

	public function index()
    {
                 
            $id=$this->session->userdata('recruiter_id');
            $result['data']=$this->Recruiters_model->get_by_id($id);
            $result['members']=$this->Applied_jobs_model->get_member_job($id);
            $result['states']=$this->Cities_model->getall_state();
       
            $this->load->view('recruiter/header',$result);
            $this->load->view('recruiter/member_view',$result);
            $this->load->view('recruiter/footer');

        
    
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