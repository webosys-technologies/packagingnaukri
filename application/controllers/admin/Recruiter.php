<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Recruiter extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

            $this->load->library('session');
            $this->load->helper('url');
            $this->load->database();
            $this->load->model('User_model');
	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
            $id=$this->session->userdata('recruiter_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/recruiter_view');
            $this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }
    
    function center_add()
	{
        $id=$this->session->userdata('center_id');

	
              
        
            	$data= array(
                
                'center_fname' => strtoupper($this->input->post('center_fname')),
                'center_lname' => strtoupper($this->input->post('center_lname')),
                'center_name' => strtoupper($this->input->post('center_name')),
                'center_email' => $this->input->post('center_email'),
                'center_mobile' => $this->input->post('center_mobile'),
                'center_gender' => $this->input->post('center_gender'),
                'center_dob' 	=> $this->input->post('center_dob'),
                'center_password' => $this->input->post('center_password'),
                'center_address' => $this->input->post('center_address'),
                'center_city' => $this->input->post('center_city'),
                'center_state' => $this->input->post('center_state'),
                'center_askfor_password' =>'disable',
                'center_pincode' =>$this->input->post('center_pincode'),
                'center_created_at' => date('Y-m-d'),
                'center_status'  => '0',
                );
                

               
                $result = $this->Recruiter_model->center_add($data);
                if($result)
                {
                    $default_sub_center=array('center_id'=>$result,
                                            'sub_center_fullname'=>'Owner Name',
                                            'sub_center_name'=>'Main Sub-Center',
                                            'sub_center_created_at'=>date('Y-m-d'),
                                            'sub_center_status'=>1);                    
                $this->Sub_centers_model->sub_center_add($default_sub_center); 
                
                $default_batch= array(
                'center_id' =>$result,
                'batch_name' => 'Default Batch',
                'batch_time' => 'Not Set',
                'batch_created_at' => date('Y-m-d'),
                'batch_status'  =>'1' ,
                );
                
                              
                $result= $this->Batches_model->batch_add($default_batch);
                
                
                $this->session->set_flashdata('success', 'Center added Successfully');
                }
                echo json_encode(array('status'=>true,
                                           ));
                       
            
    
                
	}
        
            function center_update()
    {
        
            
          
               $data= array(
                
                'center_fname' => strtoupper($this->input->post('center_fname')),
                'center_lname' => strtoupper($this->input->post('center_lname')),
                'center_name' => strtoupper($this->input->post('center_name')),
                'center_email' => $this->input->post('center_email'),
                'center_mobile' => $this->input->post('center_mobile'),
                'center_gender' => $this->input->post('center_gender'),
                'center_dob' 	=> $this->input->post('center_dob'),
                'center_password' => $this->input->post('center_password'),
                'center_address' => $this->input->post('center_address'),
                'center_city' => $this->input->post('center_city'),
                'center_state' => $this->input->post('center_state'),
                'center_pincode' =>$this->input->post('center_pincode'),
                'center_status' =>$this->input->post('status'),
                  );

                    
                  
               
               $result=$this->Recruiter_model->center_update(array('center_id' => $this->input->post('center_id')), $data);
               if($result)
                {
                $this->session->set_flashdata('success', 'Center Updated Successfully');
                }
               echo json_encode(array('status'=>true,
                                           ));
                               
                
                  
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