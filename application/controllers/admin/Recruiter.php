<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Recruiter extends CI_Controller
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
            $result['user_data']=$this->User_model->get_user_by_id($id);
            $result['recruiters']=$this->Recruiters_model->getall();
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/recruiter_view',$result);
            $this->load->view('admin/footer');

        
    
    }
    
   
        
         function ajax_edit($id)
    {
            $data = $this->Recruiter_model->get_id($id);
         
            echo json_encode($data);
    }
        
         function center_delete($id)
    {

        $result=$this->Recruiter_model->delete_by_id($id);
              if($result)
                {
                $this->session->set_flashdata('success', 'Center Deleted Successfully');
                }
        echo json_encode(array("status" => true));
           // return ['status' => FALSE];

    }
    
     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

	
        
}