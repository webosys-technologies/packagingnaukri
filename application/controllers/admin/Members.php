<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Members extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

          
	}

	public function index()
    {
                 
            $id=$this->session->userdata('user_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
            $result['members']=$this->Members_model->getall_members();
            $result['states']=$this->Cities_model->getall_state();
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/member_view',$result);
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