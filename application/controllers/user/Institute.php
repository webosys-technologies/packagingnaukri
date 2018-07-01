<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Institute extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
                {
                    redirect('user/index');
                }
	}
	public function index()
	{

//            $id=$this->session->userdata('user_id');
//            $result['user_data']=get_user_info($id);
//             $result['insti']=$this->Institute_model->getall();
//            $sys=$this->session->userdata('user_source');
//            $result['system']=$this->System_model->get_system_info($sys);
//             
//            $this->load->view('user/header',$result);
//            $this->load->view('user/institute',$result);
//            $this->load->view('user/footer');
	}


	function insti_add()
	{
            
		$dataSet=array();

	   $name = $this->input->post('name');
	   $uni = $this->input->post('university'); 
	   $desc = $this->input->post('desc');
	   $status = $this->input->post('status'); 

	   for($i=0;$i<sizeof($name);$i++)
	   {
	     $dataSet[$i] = array (         
	     				       'institute_name' => $name[$i],
	     					   'institute_university' => ltrim($uni[$i]),
	     					   'institute_description' => ltrim($desc[$i]),
	     					   'institute_status' => $status[$i],

	     					);
	   }
	   // $dataSet is an array of array
	   $this->Institute_model->add($dataSet);
	   
                $this->session->set_flashdata('success','Institute Added Successfully');

        echo json_encode(array("status" => TRUE));

	   

    }

    function insti_update()
	{

	     $data = array (        
	     				       'institute_id' => $this->input->post('id'),
	     					   'institute_name' => $this->input->post('name'),
	     					   'institute_university' =>$this->input->post('university'),
	     					   'institute_description' => $this->input->post('desc'),
	     					   'institute_status' =>$this->input->post('status'),
	     					);
	   
	   $this->Institute_model->update(array('institute_id' => $this->input->post('id')),$data);
	   
                $this->session->set_flashdata('success','Institute Updated Successfully');

        echo json_encode(array("status" => TRUE));


	   

    }
	

	public function ajax_edit($id)
	{
		$data = $this->Institute_model->get_by_id($id);



		echo json_encode($data);
	}

	function insti_delete($id)
    {

        $result=$this->Institute_model->delete_by_id($id);
              if($result)
                {
                   echo json_encode(array("status" => true));
                $this->session->set_flashdata('success', 'Institute Deleted Successfully');
                }
       
             }
}

 ?>