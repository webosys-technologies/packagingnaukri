<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Recruiter extends CI_Controller
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
       
            $id=$this->session->userdata('user_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
            $result['recruiters']=$this->Recruiters_model->getall();
            $result['states']=$this->Cities_model->getall_state();
            $result['system']=$this->System_model->get_info();
            
            $this->load->view('admin/header',$result);
            $this->load->view('admin/recruiter_view',$result);
            $this->load->view('admin/footer');

        
    
    }
        
     function recruiter_add()
    {
        

        $data=array(
            'recruiter_fname'          =>$this->input->post('fname'),
            'recruiter_lname'          => $this->input->post('lname'),
            'recruiter_email'          => $this->input->post('email'),
            'recruiter_mobile'         => $this->input->post('mobile'),
            'recruiter_address'        =>$this->input->post('address'),
            'recruiter_password'       => $this->input->post('password'),
            'recruiter_city'           => $this->input->post('city'),
            'recruiter_state'          => $this->input->post('state'),
            'recruiter_created_at' => date("Y-m-d "),
            'recruiter_status'        => $this->input->post('status'),


        );

      $res=$this->Recruiters_model->recruiter_add($data);
      if($res)
      {
          $this->session->set_flashdata('success','recruiter added successfully');
          echo json_encode(array('status'=>'success'));
          
      }
      
    }
   
    function recruiter_update()
    {
        $data=array(
                         'recruiter_fname'          =>$this->input->post('fname'),
                        'recruiter_lname'          => $this->input->post('lname'),
                        'recruiter_email'          => $this->input->post('email'),
                        'recruiter_mobile'         => $this->input->post('mobile'),
                        'recruiter_address'        =>$this->input->post('address'),
                        'recruiter_password'       => $this->input->post('password'),
                        'recruiter_city'           => $this->input->post('city'),
                        'recruiter_state'          => $this->input->post('state'),
                        'recruiter_status'        => $this->input->post('status'),

                    );
       
        $res = $this->Recruiters_model->recruiter_update(array('recruiter_id'=>$this->input->post('recruiter_id')),$data);
        
           $this->session->set_flashdata('success','Recruiter Updated Successfully');
           echo json_encode(array('status'=>true));
        
    }
        
         function ajax_edit($id)
    {
            $data = $this->Recruiters_model->get_id($id);
         
            echo json_encode($data);
    }
        
        
     function show_cities($state)
        {
            $st=str_replace('%20', " ", $state);  
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }

        function recruiter_delete($id)
    {       
            $data=$this->Recruiters_model->get_id($id);
            
           $result=$this->Recruiters_model->delete_by_id($id);
             if ($result) {

                if (file_exists($data->recruiter_profile_pic)) {

             unlink($data->recruiter_profile_pic);
              
            }
            
            $com=$this->Companies_model->delete_by_recruiter_id($id);
            $job=$this->Jobs_model->delete_by_recruiter_id($id);
                
                   echo json_encode(array("status" => true));
                $this->session->set_flashdata('success', 'Recruiter Deleted Successfully');
              } 
                
             
    }
	
        
}